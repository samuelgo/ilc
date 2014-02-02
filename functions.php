<?php
//Error reporting
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_COMPILE_ERROR);

//Define constants
define('SITE_URL', home_url().'/');
define('AJAX_URL', admin_url('admin-ajax.php'));
define('THEME_PATH', get_template_directory().'/');
define('THEME_URI', get_template_directory_uri().'/');
define('CHILD_URI', get_stylesheet_directory_uri().'/');
define('THEMEX_PATH', THEME_PATH.'framework/');
define('THEMEX_URI', THEME_URI.'framework/');
define('THEMEX_PREFIX', 'themex_');

//Set content width
$content_width=1140;

//Load language files
load_theme_textdomain('academy', THEME_PATH.'languages');

//Include theme functions
include(THEMEX_PATH.'functions.php');

//Include configuration
include(THEMEX_PATH.'config.php');

//Include core class
include(THEMEX_PATH.'classes/themex.core.php');

//Create theme instance
$themex=new ThemexCore($config);

# Código Concepto Web PHP



# Obteniendo roles Bronce, plata y oro
// $rolesPers = array(
// 'sinasignar'  => get_role( 'usuario_sin_asignar'),
// 'bronce' => get_role( 'usuario_bronce'),
// 'plata' => get_role( 'usuario_plata' ),
// 'oro' => get_role( 'usuario_oro' )
// );

// // Si no existen esos roles, se añaden
// if ( $rolesPers['bronce'] == null && $rolesPers['plata'] == null  && $rolesPers['oro'] == null && $rolesPers['sinasignar'] == null ) {
// /*Añadiendo usuarios Sin Asignar,Bronce, Oro, Plata*/
// $sinAsignar = add_role(
//     'usuario_sin_asignar',
//     __( 'Sin Asignar' ),
//     array(
//         'read'         => true,
//         'edit_posts'   => false,
//         'delete_posts' => false,
//     )
// );

// $bronce = add_role(
//     'usuario_bronce',
//     __( 'Usuario Bronce' ),
//     array(
//         'read'         => true,
//         'edit_posts'   => false,
//         'delete_posts' => false,
//     )
// );

// $plata = add_role(
//     'usuario_plata',
//     __( 'Usuario Plata' ),
//     array(
//         'read'         => true,
//         'edit_posts'   => false,
//         'delete_posts' => false,
//     )
// );


// $oro = add_role(
//     'usuario_oro',
//     __( 'Usuario Oro' ),
//     array(
//         'read'         => true,
//         'edit_posts'   => false,
//         'delete_posts' => false,
//     )
// );

// //Añadiendo capacidades al usuario Oro
// function oroCap() {
//     $role = get_role('usuario_oro');
//     $role->add_cap('ver_webinar');
//     echo "El oro vera webinars";
// }

// add_action( 'admin_init', 'oroCap');

// //Añadiendo capacidades al usuario Bronce
// function bronceCap() {
//     $role = get_role('usuario_bronce');
//     $role->add_cap('ver_gratuito');
//     echo "El bronce verá gratuitos";
// }

// add_action( 'admin_init', 'bronceCap');

// echo 'ver webinar';
// }

function modify_contact_methods($profile_fields) {

	//Añadiendo nuevos campos
	$profile_fields['Certificado'] = 'Número de certificado';

	return $profile_fields;

}

add_filter('user_contactmethods', 'modify_contact_methods' );

add_filter('manage_users_columns', 'ilc_add_user_custom_column' );
add_filter('manage_users_sortable_columns', 'ilc_add_user_custom_column' );

function ilc_add_user_custom_column( $columns ){

	$new_columns = $columns + array('user_id' => 'Certificado' );
	return $new_columns;
}

add_action( 'manage_users_custom_column', 'ilc_show_user_custom_column_content', 10, 3);
 
function ilc_show_user_custom_column_content( $value, $column_name, $user_id ) {
  	
   if ( 'user_id' == $column_name )
     return get_usermeta($user_id, 'Certificado');
    
   return $value;
}

function st_ajaxurl(){ ?>
 

<script>

var ajaxurl = '<?php echo admin_url('admin-ajax.php') ?>';

</script>

<?php }


add_action('wp_head','st_ajaxurl');

function st_handle_registration(){

if( $_POST['action'] == 'register_action' ) {

$error = '';

$uname = trim( $_POST['username'] );
 $email = trim( $_POST['mail_id'] );
 $fname = trim( $_POST['firname'] );
 $lname = trim( $_POST['lasname'] );
 $Certificado = trim( $_POST['certificado'] );
 $pswrd = $_POST['passwrd'];

if( empty( $_POST['username'] ) )
 $error .= '<p class="error">Enter Username</p>';

if( empty( $_POST['mail_id'] ) )
 $error .= '<p class="error">Enter Email Id</p>';
 elseif( !filter_var($email, FILTER_VALIDATE_EMAIL) )
 $error .= '<p class="error">Enter Valid Email</p>';

if( empty( $_POST['passwrd'] ) )
 $error .= '<p class="error">Password should not be blank</p>';

if( empty( $_POST['firname'] ) )
 $error .= '<p class="error">Enter First Name</p>';
 elseif( !preg_match("/^[a-zA-Z'-]+$/",$fname) )
 $error .= '<p class="error">Enter Valid First Name</p>';

if( empty( $_POST['lasname'] ) )
 $error .= '<p class="error">Enter Last Name</p>';
 elseif( !preg_match("/^[a-zA-Z'-]+$/",$lname) )
 $error .= '<p class="error">Enter Valid Last Name</p>';

if( empty( $_POST['certificado'] ) )
 echo "paniitaaa";

if( empty( $error ) ){

$status = wp_create_user( $uname, $pswrd ,$email );

if( is_wp_error($status) ){

$msg = '';

 foreach( $status->errors as $key=>$val ){

 foreach( $val as $k=>$v ){

 $msg = '<p class="error">'.$v.'</p>';
 }
 }

echo $msg;

 }else{

$msg = '<p class="success">Registration Successful</p>';

 echo $msg;
 }

}
 else{

echo $error;
 }
 die(1);
 }
}
add_action( 'wp_ajax_register_action', 'st_handle_registration' );
add_action( 'wp_ajax_nopriv_register_action', 'st_handle_registration' );

function user_metadata( $user_id ){
 
if( !empty( $_POST['firname'] ) && !empty( $_POST['lasname'] ) ){
 
update_user_meta( $user_id, 'first_name', trim($_POST['firname']) );
 update_user_meta( $user_id, 'last_name', trim($_POST['lasname']) );
 update_user_meta( $user_id, 'certificado', trim($_POST['certificado']) );
 }
 
 update_user_meta( $user_id, 'show_admin_bar_front', false );
}
add_action( 'user_register', 'user_metadata' );
add_action( 'profile_update', 'user_metadata' );



// $role = get_role('usuario_bronce');
// $role->add_cap('edit_user');


$labels = array(
    'name' => _x('Certificados', 'post type general name'),
    'singular_name' => _x('Certificado', 'post type singular name'),
    'add_new' => _x('Agregar nuevo', 'gallery'),
    'add_new_item' => __("Agregar nuevo certificado"),
    'edit_item' => __("Editar certificado"),
    'new_item' => __("Nuevo certificado"),
    'view_item' => __("Ver certificado"),
    'search_items' => __("Buscar certificado"),
    'not_found' =>  __('Ningun certificado encontrado'),
    'not_found_in_trash' => __('Ningun certificado encontrado en la papelera'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','thumbnail','excerpt')
  );
  register_post_type('certificados',$args);

  // Add to admin_init function
add_filter('manage_edit-gallery_columns', 'add_new_gallery_columns');

function add_new_gallery_columns($gallery_columns) {
    $new_columns['cb'] = '<input type="checkbox" />';
     
    $new_columns['id'] = __('ID');
    $new_columns['title'] = _x('Gallery Name', 'column name');
    $new_columns['images'] = __('Images');
    $new_columns['author'] = __('Author');
     
    $new_columns['categories'] = __('Categories');
    $new_columns['tags'] = __('Tags');
 
    $new_columns['date'] = _x('Date', 'column name');
 
    return $new_columns;
}