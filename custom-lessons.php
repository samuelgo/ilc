<?php
	/*Modulo que tiene la función de mostrar las lecciones con la misma estructura de los
	'cursos relacionados' o 'cursos populares'*/
?>

<?php

$longitud = count(ThemexCourse::$data['lessons']);
$contador = 0;

while($longitud > -1) {
	if($longitud >= 0) {
		echo '<div class="row">';
		for($i = 0; $i < 4 ;$i++) {

			$ultimaColumna = $i == 3  ? 'last': '';
			if($contador < count(ThemexCourse::$data['lessons'])) {
				ThemexLesson::refresh(ThemexCourse::$data['lessons'][$contador]->ID);
				
		 ?>	
		 		<div class="column threecol <?php echo $ultimaColumna; ?>">
				<div class="course-preview free-course">
					<div class="course-image">
						<?php echo get_the_post_thumbnail( ThemexLesson::$data['ID'] ); #Imagen destacada con ID de la lección ?>
					</div>
					
					<div class="course-meta">
						<header class="course-header">
							<h5 class="nomargin"><a href="<?php echo get_permalink(ThemexLesson::$data['ID']); ?>" class="<?php if(ThemexLesson::$data['status']=='free') { ?>disabled<?php } ?>"><?php echo get_the_title(ThemexLesson::$data['ID']); ?></a></h5>
						</header>
					</div>
				</div>
			</div>
<?
			}
			$longitud -= 1;
			$contador++;
			}
		echo '</div>';

	} elseif($longitud <= 0) {
		break;
	}
}

?>

