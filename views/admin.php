
<!DOCTYPE html>
<html>
<head>
	<title>Blog-Mannarino Moises	</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
				<h1>	Blog</h1>
				<a href="<?php echo BASE_URL; ?>?route=/">Volver a index</a>
		</div>
	</div>	
	<div class="row">	
			<div class="col-md-8">	
			    <h2>Posts</h2>
			 
			    <a href="<?php echo BASE_URL; ?>?route=create">Crear New Post</a>
					<table class="table">
						<tr>	
						    <th>Title</th>
						    
						    <th>Delete</th>	
						</tr>
						<?php
						foreach($blogPosts as $blogPosts){
								echo '<tr>';
								echo '<td>'.$blogPosts['title'].'</td>';
								
								echo '<td><a href="' .BASE_URL . '?route=delete/' . $blogPosts['id'] . '">Delete</a></td>';
								
								echo '</tr>';
						}
						?>	
					</table>
			</div>
			<div class="col-md-4">
					Este sencillo sitio, lo contrui con php 7, utilizando su objeto PDO para la comunicacion con la base de datos, la base de datos esta contruida con mysql. <br>	
					Tambien utilice composer para el manejo de dependencias php, aunque para estesencillo sitio utilice una sola dependencia, que es phroute, la cual utilice para el manejo de rutas. <br>	
					Utilice el patron de diseño frontcontroller, donde desde un unico archivo index,  se va accediendo a direntes vistas con diferentes funcionalidades, mmanejadas con estas rutas con la libre phroute.			
			</div>
	</div>	
		
</div>
</body>
</html>