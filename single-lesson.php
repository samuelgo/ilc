<?php
get_header();

/* Si el usuario actual puede ver contenido gratuito (es bronce) ó puede ver webinars (es Oro)
o puede editar artículos (es Admin) muéstrales el contenido de las lecciones...*/
if(	is_user_logged_in()) {

the_post();
ThemexLesson::refresh($post->ID, true);
ThemexCourse::refresh(ThemexLesson::$data['course'], true);
$layout=ThemexCore::getOption('lessons_layout', 'right');

if($layout=='left') {
?>
<aside class="sidebar column fourcol">
	<?php get_sidebar('lesson'); ?>
</aside>
<div class="column eightcol last">
<?php } else { ?>
<div class="column eightcol">
<?php } ?>
	<h1><?php the_title(); ?></h1>
	<?php 
	if(ThemexLesson::$data['prerequisite']['progress']==0 && ThemexLesson::$data['status']!='free' && ThemexCore::checkOption('lesson_hide')) { 
		printf(__('Complete "%s" lesson before taking this lesson.', 'academy'), '<a href="'.get_permalink(ThemexLesson::$data['prerequisite']['ID']).'">'.get_the_title(ThemexLesson::$data['prerequisite']['ID']).'</a>');
	} else {
		the_content();
		comments_template('/questions.php');
	}
	?>
</div>
<?php if($layout=='right') { ?>
<aside class="sidebar fourcol column last">
	<?php get_sidebar('lesson'); ?>
</aside>
<?php } ?>

<?php } else { //...de lo contrario es un usuario Sin-Asignar, muestra un mensaje
	$msjASinAsignar = '<p>Disculpa, el contenido no está disponible, puedes <a title="Galeria de Cursos" href="http://127.0.0.1/academy/?page_id=2129">comprar un curso</a> 
	o simplemente <a title="Al formulario de registro" href="#formularioderegistro">registrarte</a> para ver el material gratuito .</p>'; // TODO: Agregar enlace de registro.
	echo $msjASinAsignar;
}?>
<?php get_footer(); ?>