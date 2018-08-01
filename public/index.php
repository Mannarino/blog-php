<?php
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
 
 require_once '../vendor/autoload.php';

$baseDir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
$baseUrl = 'http://' . $_SERVER['HTTP_HOST'] . $baseDir;
define('BASE_URL', $baseUrl);

function render($fileName, $params =[]){
	ob_start();
	extract($params);
	include $fileName;
	return ob_get_clean();
}


 use Phroute\Phroute\RouteCollector;

$router = new RouteCollector();

		include_once '../config.php';	

		$route = $_GET['route'] ?? '/';

		$router->get('/admin',function() use ($pdo){
			$query = $pdo->prepare('SELECT * FROM 	blog_posts ORDER BY id DESC');
			$query->execute();
			$blogPosts = $query->fetchAll(PDO::FETCH_ASSOC);
			return render('../views/admin.php',['blogPosts'=>$blogPosts]);
		});

		$router->get('/create',function() {
		return render('../views/insertPost.php');
		});	
		$router->post('/create',function() use ($pdo){	
			$sql='INSERT INTO blog_posts (title,content) VALUES (:title,:content)';
			$query=$pdo->prepare($sql);
			$result= $query->execute([
				'title'=>$_POST['title'],
				'content'=>$_POST['content']
				]);
			return render('../views/insertPost.php',['result'=>$result]);
		});	

		$router->get('/delete/{id}',function($id) use ($pdo){
			$sql='DELETE FROM blog_posts WHERE id='.$id.'';
			$query=$pdo->prepare($sql);
			$delete= $query->execute();
			$lookPost = $pdo->prepare('SELECT * FROM 	blog_posts ORDER BY id DESC');
			$lookPost->execute();
			$blogPosts = $lookPost->fetchAll(PDO::FETCH_ASSOC);
			return render('../views/admin.php',['blogPosts'=>$blogPosts]);
		
		});	

		$router->get('/',function() use ($pdo){
			$query = $pdo->prepare('SELECT * FROM 	blog_posts ORDER BY id DESC');
			$query->execute();
			$blogPosts = $query->fetchAll(PDO::FETCH_ASSOC);
			return render('../views/index.php',['blogPosts'=>$blogPosts]);
		});

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $route);

echo $response;
?>		
