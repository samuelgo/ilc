<?php
/*
Template Name: Directorio
*/

get_header();

// Plantilla que tiene la función de mostrar a los usuarios registrados en un  directorio público

/*TODO: Imagen de fondo para el directorio, predefinida o del usuario*/

?>


<div id="directorio"> 

<?php

//Obtiene el total de los usuarios ordenándolos por Email de forma ascendente en un Array.
$usuarios = get_users(array(
			'orderby' => 'email',
			'order' => 'ASC'
		));

foreach ($usuarios as $usuario) {

	$nombre_usuario = trim($usuario->first_name.' '.$usuario->last_name); //Concatena el nombre con el apellido y borra los espacios en blanco.
	$inf_usuario = get_user_meta($usuario->ID, 'description'); //Obtiene la descripción del usuario contenida en su perfil
	$perfil_usuario = ThemexUser::getProfile($usuario->ID); //Perfil de usuario por parte del tema, usado para las redes sociales
?>

		<div class="row course-preview free-course">
			<div class="column twelvecol last">
					<a title="<?php echo $nombre_usuario; ?>" href="<?php echo get_author_posts_url($usuario->ID); ?>">
						<span class="column twocol course-image"><?php echo get_avatar( $usuario->ID, 200 ); ?></span>
						<span class="column twocol nombre_directorio">
							<h5><?php echo $nombre_usuario; ?></h5> 
						</span>
					</a> 
						
					<div class="directory-description row">
						<p>
						<?php 
							$j = strlen($inf_usuario[0]) == '' ?  'No hay descripción disponible': $inf_usuario[0]; // Si no hay descripción se muestra 'No hay descripción disponible'
							echo  $j;
						?>
						</p>
						<div class="user-links redes-directorio">
							<!-- FIX: Enlaces sociales -->
							<a href="https://www.facebook.com/<?php echo $perfil_usuario['facebook']; ?>" class="facebook" target="_blank" title="Facebook"></a>
							<a href="<?php echo $perfil_usuario['twitter']; ?>" class="twitter" target="_blank" title="Twitter"></a>
							<a href="<?php echo $perfil_usuario['tumblr']; ?>" class="tumblr" target="_blank" title="Tumblr"></a>
						</div>
					</div>
			</div><!--  Fin de columna -->
		</div><!--  Fin de fila -->

<?php } ?>

</div> <!-- Fin directorio -->



<?php get_footer(); ?>