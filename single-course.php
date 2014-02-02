<?php get_header(); ?>

		<h2><?php _e('Módulos', 'academy'); ?></h2>
		<!--Progreso-->
		<div class="course-progress">
			<span style="width:<?php echo ThemexCourse::$data['progress']; ?>%;"></span>
		</div>
		<!-- Contenedor de lecciones (módulos) -->
		<div id='modulos' class="course-content clearfix popup-container">

		<?php if(!empty(ThemexCourse::$data['questions'])) { ?>
		<?php } else { ?>
		<?php } ?>
			<?php if(!empty(ThemexCourse::$data['lessons'])) { ?>
			<?php if(ThemexCourse::isMember()) { //Para futuras restricciones ?>
			<?php } ?>
				<!-- Grid de modulos -->
				<?php get_template_part('custom/custom', 'lessons'); ?>
			<?php } ?>
	
		<!-- Popup para las lecciones-->
		<?php if((!ThemexCourse::isSubscriber() || !ThemexCourse::isMember()) && !ThemexCourse::isAuthor()) { ?>
		<div class="popup hidden">
			<?php if(!ThemexCourse::isSubscriber()) { ?>
			<h2 class="popup-text"><?php _e('Suscribete para ver este contenido', 'academy'); ?></h2>
			<?php } else { ?>
			<h2 class="popup-text"><?php _e('Compra el curso para acceder al contenido', 'academy'); ?></h2>
			<?php } ?>
		</div>
		<!-- /popup -->
		<?php } ?>
	</div>

	<!-- Preguntas del curso. -->
	<?php if(!empty(ThemexCourse::$data['questions'])) { ?>
	<div class="questions full-width clear"><!-- Clear fix preguntas. -->
		<h2><?php _e('Preguntas', 'academy'); ?></h2>
		<ul class="styled-list style-2 bordered">
		<?php foreach(ThemexCourse::$data['questions'] as $question) {?>
		<li><a href="<?php echo get_comment_link($question->comment_ID); ?>"><?php echo get_comment_meta($question->comment_ID, 'title', true); ?></a></li>
		<?php } ?>
		</ul>	
	</div>
	<?php } ?>
<!-- /course content -->

<?php get_template_part('module', 'related'); ?>
<?php get_footer(); ?>