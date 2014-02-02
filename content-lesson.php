<?php ThemexLesson::refresh($GLOBALS['lesson']->ID); ?>
<!--Las lecciones que en realidad serán los modulos del curso-->
<div class="lesson-item <?php if($GLOBALS['lesson']->post_parent!=0) { ?>lesson-child<?php } ?> <?php if(ThemexCourse::isMember() && ThemexLesson::$data['progress']!=0) { ?>completed<?php } ?>">
	<div class="lesson-title">
		<?php if(ThemexLesson::$data['status']=='free') { ?>
		<div class="course-status"><?php _e('Free', 'academy'); ?></div>
		<?php } ?>
		<h4 class="nomargin"><a href="<?php echo get_permalink(ThemexLesson::$data['ID']); ?>" class="<?php if(ThemexLesson::$data['status']=='free') { ?>disabled<?php } ?>"><?php echo get_the_title(ThemexLesson::$data['ID']); ?></a></h4>
		<?php if(ThemexCourse::isMember() && !empty(ThemexLesson::$data['quiz']) && !empty(ThemexLesson::$data['progress'])) { ?>
		<div class="course-progress">
			<span style="width:<?php echo ThemexLesson::$data['progress']; ?>%;"></span>
		</div>
		<?php } ?>
	</div>

	<!-- Archivos adjuntos de muestra -->
	 <?php if(!empty(ThemexLesson::$data['attachments'])) { ?>
	<div class="lesson-attachments">
		<?php foreach(ThemexLesson::$data['attachments'] as $attachment) { ?>
		<a href="<?php echo $attachment['redirect']; ?>" target="_blank" title="<?php echo $attachment['title']; ?>" class="<?php echo $attachment['type']; ?> <?php if(ThemexLesson::$data['status']=='free') { ?>disabled<?php } ?>"></a>
		<?php } ?>
	</div>
	<?php } else { ?>
	<div class="lesson-title"></div>
	<?php } ?> 
</div>

