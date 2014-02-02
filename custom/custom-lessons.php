<?php

/*Modulo que tiene la función de mostrar las lecciones con la misma estructura de los
'cursos relacionados' o 'cursos populares' (grid de módulos o lecciones)*/

/* Si el usuario actual puede ver contenido gratuito (es bronce) ó puede ver webinars (es Oro)
o puede editar artículos (es Admin) muéstrales el contenido el grid de módulos... TODO: ¡REFACTORIZAR!*/


$longitudLecciones = count(ThemexCourse::$data['lessons']);
$contador = 0; // Contador de lecciones añadidas

//Mientras todavía hayas lecciones por mostrar
while($longitudLecciones > -1) {
	//Si todavía hay lecciones por mostrar
	if($longitudLecciones >= 0) {
		//Imprime una fila
		echo '<div class="row">';
		//Con este bucle se imprimirán sólo 4 lecciones (de 3 columnas) por 1 fila
		for($i = 0; $i < 4 ;$i++) {	
			$ultimaColumna = $i == 3  ? 'last': ''; //Si i es igual a 3 $ultimaColumna tendrá valor 'last' sino ''

			//Si el número de lecciones añadidas es menor que la longitud total de lecciones
			if($contador < count(ThemexCourse::$data['lessons'])) {
				//Actualiza el ID de la lección en la posición indicada por $contador
				ThemexLesson::refresh(ThemexCourse::$data['lessons'][$contador]->ID);	
?>	
		 		<div class="column threecol <?php echo $ultimaColumna; ?>">
					<div class="course-preview free-course">
						<div class="course-image">
							<?php echo get_the_post_thumbnail( ThemexLesson::$data['ID'] ); //Imagen destacada obtenida con ID de la lección ?>
						</div>
						
						<div class="course-meta">
							<header class="course-header">
								<h5 class="nomargin enlace_modulo"><a href="<?php echo get_permalink(ThemexLesson::$data['ID']); ?>" class="<?php if(ThemexLesson::$data['status']=='free') { ?>disabled<?php } ?>" class="<?php if(ThemexLesson::$data['status']=='free') { ?>disabled<?php } ?>"><?php echo get_the_title(ThemexLesson::$data['ID']); ?></a></h5>
							</header>
						</div>
					</div>
				</div>
<?php
			}
			//Decremento de la lección añadida a la longitud de lecciones
			$longitudLecciones -= 1;
			//Incrementa lección añadida a la longitud de lecciones
			$contador++;
			}
		echo '</div>';

	} elseif($longitudLecciones <= 0) { // 
		/*  En caso contrario, si la longitud de las lecciones es menor o igual a cero,
		termina el bucle while (todas las lecciones añadidas)*/
		break;
	}
}

?>

