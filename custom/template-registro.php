<?php
/*
Template Name: Registro
*/

get_header();

// Plantilla del registro personalizado con AJAX

?>

<div class="form-wrapper">
 
<h2 class="register-heading"><?php _e( 'Sign Up', 'debate' ); ?></h2>
 
<div id="error-message"></div>
<div id="mimsj"></div>
 
<form method="post" name="st-register-form">
 
 <div class="form-label"><label for="st-username"><?php _e( 'Username', 'debate' ); ?></label></div>
 <div class="field"><input type="text" autocomplete="off" name="username" id="st-username" /></div>
 
<div class="form-label"><label for="st-email"><?php _e( 'Email', 'debate' ); ?></label></div>
 <div class="field"><input type="text" autocomplete="off" name="mail" id="st-email" /></div>
 
<div class="form-label"><label for="st-psw"><?php _e( 'Password', 'debate' ); ?></label></div>
 <div class="field"><input type="password" name="password" id="st-psw" /></div>
 
 <div class="form-label"><label for="st-fname"><?php _e( 'First Name', 'debate' ); ?></label></div>
 <div class="field"><input type="text" autocomplete="off" name="fname" id="st-fname" /></div>
 
<div class="form-label"><label for="st-lname"><?php _e( 'Last Name', 'debate' ); ?></label></div>
 <div class="field"><input type="text" autocomplete="off" name="lname" id="st-lname" /></div>

 <div class="form-label"><label for="Certificado"><?php _e( 'Certificado', 'debate' ); ?></label></div>
 <div class="field"><input type="text" autocomplete="off" name="certificado" id="Certificado" /></div>
 
<div class="frm-button"><input type="button" id="register-me" value="Register" /></div>
 
</form>
 
</div>




<?php get_footer(); ?>