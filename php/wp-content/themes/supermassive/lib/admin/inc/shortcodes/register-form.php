<?php

//////////////////////////////////////// Register Form ////////////////////////////////////////

function gp_register_form($atts, $content = null) {
	extract(shortcode_atts(array(
		'username' => __('Username', 'gp_lang'),
		'email' => __('Email', 'gp_lang'),
		'redirect' => 'wp-login.php?action=register'
	), $atts));

	global $user_ID, $user_identity, $user_level;
	
	if($redirect == "") {
		$redirect = site_url($redirect, 'login_post');
	}
	
	if (is_user_logged_in()) {} else {
	
		return
		
		'<form id="registerform" action="'.site_url($redirect, 'login_post').'" method="post">
			<p class="login-username"><input type="text" name="user_login" id="user_register" class="input" value="'.esc_attr(stripslashes($user_login)).'" size="22" /><label>'.$username.'</label></p>
			<p class="login-email"><input type="text" name="user_email" id="user_email" class="input" value="'.esc_attr(stripslashes($user_email)).'" size="22" /><label>'.$email.'</label></p>			
			'.do_action('register_form').'
			<p>'.__('A password will be emailed to you', 'gp_lang').'</p>
			<p><input type="submit" name="wp-submit" id="wp-register" value="'.__('Register', 'gp_lang').'" tabindex="100" /></p>
		</form>';	
	
	}

}

add_shortcode("register", "gp_register_form");

?>