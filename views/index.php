
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
				<p>	Contruído por <b>Moises Mannarino	</b> , tecnologías utilizadas : php, mysql, bootstrap,html5, css3, composer.</p>

		</div>
	</div>	
	<div class="row">	
			<div class="col-md-8">	
					<p>	En este blog puedes ingresar post o eliminarlos si lo prefieres. <br>	
					Este blog lo construi con php y mysql. <br>	
					<br>	
					Para ingresar al panel de administracion del blog puedes hacer desde aqui: <a href="<?php echo BASE_URL; ?>?route=admin">administrar</a></p>
					<?php
					   foreach ($blogPosts as $blogPosts)
					   {
					   		echo '<div class="blog-post">';
					   		echo '<h2>'.$blogPosts['title'].'</h2>';
					   	
						
							echo '<div class="blog-post-content">';	
							echo $blogPosts['content'];		
							echo '</div>';
					   		echo '</div>';
					   }
					?>
			</div>
			<div class="col-md-4">
					<p>Este sencillo sitio, lo contrui con php 7, utilizando su objeto PDO para la comunicacion con la base de datos, la base de datos esta contruida con mysql. <br>	
					Tambien utilice composer para el manejo de dependencias php, aunque para estesencillo sitio utilice una sola dependencia, que es phroute, la cual utilice para el manejo de rutas. <br>	
					Utilice el patron de diseño frontcontroller, donde desde un unico archivo index,  se va accediendo a direntes vistas con diferentes funcionalidades, mmanejadas con estas rutas con la libre phroute.</p>	
					<p>	Puedes ver el codigo de este proyecto en mi repositorio de github, encontraras un enlace a mi respositorio de github en mi portfolio.</p>	
			</div>
	</div>	
	
</div>
</body>
</html>