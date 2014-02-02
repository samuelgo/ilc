<?php get_header(); ?>
<?php the_post(); ?>
<?php ThemexLesson::refresh(ThemexCore::getPostRelations($post->ID, 0, 'quiz_lesson', true), true); ?>
<?php ThemexCourse::refresh(ThemexLesson::$data['course'], true); ?>
<div class="eightcol column">
	<h2><?php the_title(); ?></h2>
	<?php the_content(); ?>
	<div class="quiz-listing">
		<form id="quiz_form" action="<?php the_permalink(); ?>" method="POST">
			<div class="message">
				<?php ThemexInterface::renderMessages(ThemexLesson::$data['progress']); ?>
			</div>
			<?php 
			$counter=0;
			foreach(ThemexLesson::$data['quiz']['questions'] as $key => $question) {
			$counter++;
			?>
			<div class="quiz-question <?php echo $question['type']; ?>">
				<div class="question-title">
					<div class="question-number"><?php echo $counter; ?></div>
					<h4 class="nomargin"><?php echo themex_stripslashes($question['title']); ?></h4>
				</div>
				<?php ThemexLesson::renderAnswers($key, $question); ?>
			</div>
			<?php } ?>
			<input type="hidden" name="course_action" value="complete_course" />
			<input type="hidden" name="lesson_action" value="complete_quiz" />
			<input type="hidden" name="course_id" value="<?php echo ThemexCourse::$data['ID']; ?>" />
			<input type="hidden" name="lesson_id" value="<?php echo ThemexLesson::$data['ID']; ?>" />
			<input type="hidden" name="nonce" class="nonce" value="<?php echo wp_create_nonce(THEMEX_PREFIX.'nonce'); ?>" />
			<input type="hidden" name="action" class="action" value="<?php echo THEMEX_PREFIX; ?>update_lesson" />
		</form>
	</div>
</div>
<aside class="sidebar fourcol column last">
	<?php get_template_part('sidebar', 'lesson'); ?>
</aside>
<?php get_footer(); ?>