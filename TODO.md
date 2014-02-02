# Por hacer (Importante):

- Los TODO en los archivos.
- Cambiar la moneda a $.
- Culminar la traducción del tema a español.
- Correción ortográfica de la traducción.
- Comentar correctamente el CSS nuevo, pereza zzzZZZzzz
- Comprobación de datos en certificado (solo numeros)
y longitud de caracteres.
- Certificado sólo visible para los bronce.
- Arreglar bug de imagenes en el directorio.
- Añadir mensajes en el perfil de usuario.
	1. La imagen debe tener como minimo 200px de ancho.
	2. Luego de añadir la imagen NO presionar en guardar cambios.
	3. En caso de que la imagen no actualice: limpiar la cache del navegador. 
- Link sociales acomodarlos. 

# Por hacer (Importacia moderada):

- Jerarquía de los archivos para una mejor edición.
- Imagen Generica para los módulos públicos.
- Numerar dimensiones de las imagenes principales del tema que sreán sustituidas
por la del material del curso.
- Que el usuario Bronce pueda comentar
.
# Por hacer (Opcional):

- Númerar todas las modificaciones que se realizaron al tema para pasarlo a español,
por ejemplo: 
	- L9_Single-course.php: es decir, linea número 9 de Single-course.php, es opcional
	porque Github marca estos cambios, pero sería útil luego de terminar el trabajo ennumerarlas para la versión ingles-español que haremos en Enero.

# Caracteristicas futuras:

- Crear una traducción automatizada con handlebars (frontend), un ES_es.mo (backend) o una
combinación de ambas.
- Indexedb y .cache para que el usuario tenga disponible los cursos offline (videos, audio, etc) lo que practicamente convertiria el sitio web en una aplicación web local.
- Estilos para los modulos emparentados.
- Estilos para los adjuntos de los modulos.
- Terminos de privacidad, opción de perfiles de usuario sean privados.
- Efecto hakim scroll para directorio.
- Autocompletado al buscar certificados o usuarios.


# DONE:

- Verificar cuando qué sucede cuando un usuario se desuscribe de un curso, ¿deja de recibir emails?, ya que el curso sigue disponible para el usuario (¿Bug?)__ **Comentario: Mientras el usuario tenga pago registrado no importa si se desuscribe del curso puede acceder a el en cualquier momento.**
- Realizar un grid de los modulos parecido al que presenta los cursos.**(hecho)**
- Aplicar solución en php para que el ultimo elemento de los modulos tenga la
clase .last (en template-courses.php).
- Usar la función is_user_login() o is_Member para ocultar los cursos del menú**Comentario: se utilizó en los modulos de los cursos**.	
- Paginar los modulos cuando sean muy numerosos o que se muestren al hacer scroll (incluso lazy-load)**Comentario: falto el lazy-load**.
- Colocar todos los modulos que se creen en una carpeta aparte, e.j: custom.
- Bug popups de modulos**Comentario: se codeo una solución temporal***.
- Añadir en el manual de usuario que el orden de las lecciones DEBE ser obligatorio 
porque esto influye en el orden en que se muestra la galerias de modulos.
- Recomendarle al cliente (convencerlo mejor) que las imagenes destacadas de los modulos (lecciones) sean de un tamaño fijo que nosotros le proporcionaremos para evitar que el tema se quiebre, se puede implementar una medida en código por si al cliente se le olvida esto pero mejor hacer el habito.
- Colocar las preguntas del curso debajo de los modulos (Parcialmente, fix responsive en móvil viewport).**Comentario: clearfix**.


# Documentos o enlaces del proyecto
- https://www.google.com/calendar/render
- https://docs.google.com/document/d/1cJWqFUQj_Q5BpW23gFQ7fS90C8N8slbjC_oDt_3hJig/edit
- https://github.com/lordcaos/academy
- http://themeforest.net/item/academy-learning-management-theme/4169073

-------------------------------------------------------------------------------------------

# Enlaces de interes

- http://www.trazos-web.com/2012/04/17/plugins-de-administracion-de-usuarios-para-wordpress/
- http://es.wordpress.org/
http://www.emenia.es/funciones-plugins-usuarios-wordpress/
http://www.wpmayor.com/articles/roles-capabilities-wordpress/
http://wordpress.org/plugins/achievements/
http://codecanyon.net/item/wpachievements-wordpress-achievements-plugin/4265703
https://credly.com/
http://sharethingz.com/wordpress/custom-user-registration-in-wordpress-using-ajax/
http://tommcfarlin.com/add-custom-user-meta-during-registration/
http://wordpress.stackexchange.com/questions/31791/how-do-i-programmatically-set-default-role-for-new-users
http://wordpress.org/plugins/coaching-staffs/screenshots/
http://premium.wpmudev.org/blog/how-to-create-a-custom-buddypress-members-directory/
http://wordpress-hackers.1065353.n5.nabble.com/get-users-exhausts-memory-with-all-with-meta-argument-td43102.html
http://wordpress.org/plugins/custom-post-type-ui/screenshots/
http://wp.tutsplus.com/articles/getting-started-with-ajax-wordpress-pagination/
http://shibashake.com/wordpress-theme/wordpress-admin-panels
http://shibashake.com/wordpress-theme/add-custom-post-type-columns
http://keibee.com/custom_post_type/
http://wp.smashingmagazine.com/2012/11/08/complete-guide-custom-post-types/
https://encrypted.google.com/search?hl=en&q=custom%20tags%20on%20custom%20post%20type

-------------------------------------------------------------------------------------------

# Notas importantes:
- Los estilos de concepto web comienzan en la linea 3903  (style.css).
- Tipos de usuario:
	- usuario gold del curso todo 
	- usuario plata solo contenido especifico Neiii
	- usuario bronce, certificados, sólo free
	- Usuario Registrado, no ve nada, ni módulos
- Imagen destacada para las lecciones (modulos), L367_framework/config.php.
- L27 /wp-content/plugins/wp-members/admin/post.php.
- Las modificaciones en en el código original de widgets y el tema estaran comentadas
como Código Concepto Web.
- Permisos a 755w

