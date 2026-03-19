<?php
/**
 * cotswoldsportingclub-Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cotswoldsportingclub-Theme
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cotswoldsportingclub_theme_setup()
{
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on cotswoldsportingclub-Theme, use a find and replace
     * to change 'cotswoldsportingclub-theme' to the name of your theme in all the template files.
     */
    load_theme_textdomain('cotswoldsportingclub-theme', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'menu-1' => esc_html__('Primary', 'cotswoldsportingclub-theme'),
        )
    );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'cotswoldsportingclub_theme_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        )
    );
}
add_action('after_setup_theme', 'cotswoldsportingclub_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cotswoldsportingclub_theme_content_width()
{
    $GLOBALS['content_width'] = apply_filters('cotswoldsportingclub_theme_content_width', 640);
}
add_action('after_setup_theme', 'cotswoldsportingclub_theme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cotswoldsportingclub_theme_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar', 'cotswoldsportingclub-theme'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'cotswoldsportingclub-theme'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}
add_action('widgets_init', 'cotswoldsportingclub_theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function cotswoldsportingclub_theme_scripts()
{
    wp_enqueue_style('cotswoldsportingclub-theme-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_style_add_data('cotswoldsportingclub-theme-style', 'rtl', 'replace');

    wp_enqueue_script('cotswoldsportingclub-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'cotswoldsportingclub_theme_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}


function enqueue_custom_styles_and_scripts()
{

    wp_enqueue_style('Owl-Carousel-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css');

    // Enqueue Bootstrap CSS
    wp_enqueue_style(
        'bootstrap-css', // Handle
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', // URL
        array(), // Dependencies
        null // Version (null to use the latest version)
    );



    // Enqueue Custom CSS with filemtime for cache busting
    wp_enqueue_style(
        'custom--mk-style', // Handle
        get_stylesheet_directory_uri() . '/assets/css/autoo-style.css', // URL
        array(), // Dependencies
        rand(9, 999990999) // Last modified time as version
    );

    wp_enqueue_style(
        'custom-new-mk-style', // Handle
        get_stylesheet_directory_uri() . '/assets/css/new-style.css', // URL
        array(), // Dependencies
        rand(9, 999990999) // Last modified time as version
    );

    wp_enqueue_style('responsive-style', get_stylesheet_directory_uri() . '/assets/css/style-responsive.css');


    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css' // URL

    );

    wp_enqueue_script('Jquery-slim-cdn', 'https://code.jquery.com/jquery-3.5.1.slim.min.js');


    wp_enqueue_script('Popper-cdn', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js');

    wp_enqueue_script('Bootstrap-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js');

    wp_enqueue_script(
        'custom-js', // Handle
        'https://cotswoldsportingclub.com/wp-content/themes/cotswoldsportingclub-theme/assets/js/user.js?ver=6.7.1', // URL
        array('jquery'), // Dependencies (Bootstrap JS depends on jQuery)
        null, // Version (null to use the latest version)
        true // Load in footer
    );

    wp_enqueue_script(
        'lzstring-js', // Handle
        'https://cdn.jsdelivr.net/npm/lz-string@1.4.4/libs/lz-string.min.js', // URL
        array('jquery'), // Dependencies (Bootstrap JS depends on jQuery)
        null, // Version (null to use the latest version)
        true // Load in footer
    );

    wp_enqueue_script('Jquery-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js');

    wp_enqueue_script('Owl-Carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js');



    wp_enqueue_script('Organizer-script', get_template_directory_uri() . '/assets/js/organizer.js');

    // Enqueue Bootstrap JS
    wp_enqueue_script(
        'bootstrap-js', // Handle
        'https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', // URL
        array('jquery'), // Dependencies (Bootstrap JS depends on jQuery)
        null, // Version (null to use the latest version)
        true // Load in footer
    );

    // Enqueue Alertify.js CSS
    wp_enqueue_style('alertify-css', 'https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css');

    // Enqueue Alertify.js JavaScript
    wp_enqueue_script('alertify-js', 'https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js', array(), null, true);
}

add_action('wp_enqueue_scripts', 'enqueue_custom_styles_and_scripts');


function bbloomer_add_event_listing_endpoint()
{
    add_rewrite_endpoint('event_listing', EP_ROOT | EP_PAGES);
}
add_action('init', 'bbloomer_add_event_listing_endpoint');

function bbloomer_event_listing_query_vars($vars)
{
    $vars[] = 'event_listing';
    return $vars;
}
add_filter('query_vars', 'bbloomer_event_listing_query_vars', 0);


function tribe_event_categories_choice()
{
    $terms = get_terms(array(
        'taxonomy' => 'tribe_events_cat',
        'hide_empty' => false,
    ));

    if (!empty($terms) && !is_wp_error($terms)) {
        $options = array();
        foreach ($terms as $term) {
            $options[$term->slug] = $term->name;
        }

    }
    return $options;
}



function dd($val)
{
    echo "<pre>";
    print_r($val);
    echo "</pre>";
    wp_die();
}

function p($val)
{
    echo "<pre>";
    print_r($val);
    echo "</pre>";
}

function cotswoldsportingclub_theme_post_thumbnail()
{
    if (has_post_thumbnail()) {
        // Display the full-size image
        the_post_thumbnail('full'); // 'full' ensures the full-size image is displayed
    }
}


// function show_admin_bar_for_orgamozer($show_admin_bar)
// {
// 	if (current_user_can('organizer')) {
// 		return true;  // Show the admin bar
// 	}
// 	return $show_admin_bar;  // Keep the default behavior
// }
// add_filter('show_admin_bar', 'show_admin_bar_for_orgamozer');

function bypass_woocommerce_login_redirect($redirect_url)
{
    if (current_user_can('organizer')) {
        return admin_url(); // Redirect to the WordPress admin dashboard
    }

    return $redirect_url;
}
add_filter('woocommerce_login_redirect', 'bypass_woocommerce_login_redirect');

add_action(
    'admin_init',
    function () {
        add_filter('woocommerce_prevent_admin_access', '__return_false', 100);
    },
    1
);

add_action('wp_ajax_update_user_profile', 'update_user_profile');
function update_user_profile()
{
    $user_id = get_current_user_id();

    if (!empty($_FILES['user_profile']['name'])) {
        $uploaded_file = $_FILES['user_profile'];

        $file_type = wp_check_filetype($uploaded_file['name']);
        $valid_types = ['image/jpeg', 'image/png', 'image/gif'];

        if (in_array($file_type['type'], $valid_types)) {
            $upload_dir = wp_upload_dir();
            $target_path = $upload_dir['path'] . '/' . basename($uploaded_file['name']);
            $upload_success = move_uploaded_file($uploaded_file['tmp_name'], $target_path);

            if ($upload_success) {
                $attachment = array(
                    'guid' => $upload_dir['url'] . '/' . basename($uploaded_file['name']),
                    'post_mime_type' => $file_type['type'],
                    'post_title' => sanitize_file_name($uploaded_file['name']),
                    'post_content' => '',
                    'post_status' => 'inherit'
                );
                $attachment_id = wp_insert_attachment($attachment, $target_path);

                update_user_meta($user_id, 'current_user_profile_image', $attachment_id);

                wp_send_json_success(['image_url' => wp_get_attachment_url($attachment_id)]);
            } else {
                wp_send_json_error(['message' => 'Image upload failed.']);
            }
        } else {
            wp_send_json_error(['message' => 'Invalid image type.']);
        }
    }

    if (!empty($_POST['first_name'])) {
        wp_update_user([
            'ID' => $user_id,
            'first_name' => sanitize_text_field($_POST['first_name']),
        ]);
    }

    if (isset($_POST['facebook_social_link'])) {
        update_user_meta($user_id, 'facebook_social_link', sanitize_text_field($_POST['facebook_social_link']));
    }
    if (isset($_POST['instagram_social_link'])) {
        update_user_meta($user_id, 'instagram_social_link', sanitize_text_field($_POST['instagram_social_link']));
    }
    if (isset($_POST['twitter_social_link'])) {
        update_user_meta($user_id, 'twitter_social_link', sanitize_text_field($_POST['twitter_social_link']));
    }

    if (isset($_POST['area_of_interest'])) {
        $interests = array_map('sanitize_text_field', $_POST['area_of_interest']);
        update_user_meta($user_id, 'user_area_of_interests', $interests);
    }

    wp_send_json_success();
}



// Save Area of Interest after registration or profile update
add_action('um_after_user_is_updated', 'save_area_of_interest', 10, 2);
function save_area_of_interest($user_id, $args)
{
    if (isset($args['area_of_interest'])) {
        update_user_meta($user_id, 'area_of_interest', array_map('intval', $args['area_of_interest']));
    }
}


// Handle password update via AJAX
add_action('wp_ajax_update_new_password', 'update_new_password');
function update_new_password()
{
    // Check if the user is logged in
    if (!is_user_logged_in()) {
        wp_send_json_error([
            'message' => 'You need to be logged in to change your password.',
        ]);
    }

    // Get the current user ID
    $user_id = get_current_user_id();
    $old_password = isset($_POST['old_password']) ? $_POST['old_password'] : '';
    $new_password = isset($_POST['new_password']) ? $_POST['new_password'] : '';

    // Validate the old password
    $user = get_user_by('id', $user_id);

    if (!wp_check_password($old_password, $user->user_pass, $user_id)) {
        wp_send_json_error([
            'message' => 'Old password is incorrect.',
        ]);
    }

    // Check if the new password is valid
    if (empty($new_password) || strlen($new_password) < 6) {
        wp_send_json_error([
            'message' => 'New password must be at least 6 characters long.',
        ]);
    }

    // Update the password
    wp_set_password($new_password, $user_id);

    // Optionally, you can log the user out after changing their password
    // wp_logout();

    wp_send_json_success([
        'message' => 'Password updated successfully.',
    ]);
}

//Notification 

function enqueue_toggle_script()
{
    wp_enqueue_script('notification-toggle', get_template_directory_uri() . '/assets/js/notification.js', array('jquery'), null, true);

    wp_localize_script('notification-toggle', 'ajaxurl', admin_url('admin-ajax.php'));
}

add_action('wp_enqueue_scripts', 'enqueue_toggle_script');


function save_notification_status()
{
    if (is_user_logged_in() && isset($_POST['notification_status'])) {
        $user_id = get_current_user_id();
        $status = sanitize_text_field($_POST['notification_status']);

        update_user_meta($user_id, 'notification_status', $status);
    }

    wp_die();
}
add_action('wp_ajax_save_notification_status', 'save_notification_status');


// function -> this category

add_action('save_post', 'sendEventNotifications');
function sendEventNotifications($post_id)
{
    if (get_post_type($post_id) !== 'tribe_events') {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    $categories = wp_get_post_terms($post_id, 'tribe_events_cat');

    if (empty($categories)) {
        return;
    }

    $category_slugs = wp_list_pluck($categories, 'slug');

    global $wpdb;

    $placeholders = implode(',', array_fill(0, count($category_slugs), '%s'));  // prepare placeholders for slugs
    $query = "
        SELECT u.ID, u.user_email, um.meta_value
        FROM {$wpdb->users} u
        INNER JOIN {$wpdb->prefix}usermeta um ON u.ID = um.user_id
        WHERE um.meta_key = 'user_area_of_interests'
        AND um.meta_value != ''  -- Ensure that the meta_value is not empty
    ";

    $prepared_query = $wpdb->prepare($query, ...$category_slugs);

    $results = $wpdb->get_results($prepared_query);

    if (empty($results)) {
        return;
    }

    $user_emails = array();

    foreach ($results as $user) {
        $user_interests = maybe_unserialize($user->meta_value);

        if (is_array($user_interests) && array_intersect($category_slugs, $user_interests)) {
            $notification_status = get_user_meta($user->ID, 'notification_status', true);

            if ($notification_status === 'true') {
                $user_emails[] = $user->user_email;
            }
        }
    }

    if (empty($user_emails)) {
        return;
    }

    $event_title = get_the_title($post_id);
    $event_url = get_permalink($post_id);
    $event_content = get_post_field('post_content', $post_id);

    $subject = "Event Notification: $event_title";
    $message = "Hello, event update has been posted that matches your interests:\n\n";
    $message .= "Event Title: $event_title\n";
    $message .= "Event Details: $event_url\n\n";
    $message .= "Event Content: " . wp_strip_all_tags($event_content) . "\n\n";
    $message .= "Don't miss out on this opportunity!";

    wp_mail($user_emails, $subject, $message);
}

function save_user_profile_picture($user_id)
{
    if (isset($_FILES['user_profile']) && !empty($_FILES['user_profile']['tmp_name'])) {
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        $uploaded_file = $_FILES['user_profile'];

        $upload = wp_handle_upload($uploaded_file, array('test_form' => false));

        if (isset($upload['url'])) {
            update_user_meta($user_id, 'user_profile_picture', $upload['url']);
        }
    }
}
add_action('personal_options_update', 'save_user_profile_picture');
add_action('edit_user_profile_update', 'save_user_profile_picture');


add_action('woocommerce_single_product_summary', 'add_custom_product_title', 5);

function add_custom_product_title()
{
    echo '<h3 class="custom-product-title">' . get_the_title() . '</h3>';
}

function add_custom_capability_to_roles()
{
    $admin_role = get_role('administrator');
    $organizer_role = get_role('organizer');

    if ($admin_role) {
        $admin_role->add_cap('manage_tournament_pages');
    }
    if ($organizer_role) {
        $organizer_role->add_cap('manage_tournament_pages');
    }
}
add_action('init', 'add_custom_capability_to_roles');

function organizer_dashboard_css()
{
    if (current_user_can('organizer')) {
        ?>
        <style>
            #wpadminbar {
                display: none !important;
            }

            td.check_in.column-check_in {
                display: none !important;
            }

            #menu-posts {
                display: none !important;
            }

            #toplevel_page_wpcf7 {
                display: none !important;
            }

            #menu-comments {
                display: none !important;
            }

            #menu-tools {
                display: none !important;
            }

            #menu-settings {
                display: none !important;
            }

            #menu-users {
                display: none !important;
            }

            #menu-dashboard {
                display: none !important;
            }

            #footer-thankyou {
                display: none !important;
            }

            .subsubsub .all,
            .subsubsub .open,
            .subsubsub .in_progress,
            .subsubsub .publish {
                display: none !important;
            }

            #filter-by-date {
                display: none !important;
            }

            #post-query-submit {
                display: none !important;
            }

            #toplevel_page_tec-tickets {
                display: none !important;
            }

            #menu-posts-tribe_events {
                display: none !important;
            }

            #toplevel_page_ultimatemember {
                display: none !important;
            }

            #toplevel_page_wpforms-overview {
                display: none !important;
            }

            #toplevel_page_edit-post_type-acf-field-group {
                display: none !important;
            }

            #toplevel_page_wp-mail-smtp {
                display: none !important;
            }

            #toplevel_page_mailchimp-for-wp {
                display: none !important;
            }

            #toplevel_page_litespeed {
                display: none !important;
            }

            #toplevel_page_oa_social_login_setup {
                display: none !important;
            }

            #toplevel_page_iubenda {
                display: none !important;

            }

            .handle-actions.hide-if-no-js {
                display: none;
            }

            #toplevel_page_extendify-assist {
                display: none !important;
            }

            /* a.page-title-action {
                                        display: none !important;
                                    } */

            /* li:nth-child(3) {
                                        display: none !important;
                                    } */
        </style>

        <script>
            jQuery(document).ready(function ($) {
                $("#wpadminbar").remvoe()
                $("#menu-posts").remvoe()
                $("#toplevel_page_wpcf7").remove()
                $("#menu-comments").remove()
                $("#menu-tools").remove()
                $("#menu-settings").remove()
                $("#menu-users").remove()
                $("#menu-dashboard").remove()
                $("#footer-thankyou").remove()
                $("#filter-by-date").remove()
                $("#post-query-submit").remove()
                $("#toplevel_page_tec-tickets").remove()
                $("#menu-posts-tribe_events").remove()
                $("#toplevel_page_ultimatemember").remove()
                $("#toplevel_page_wpforms-overview").remove()
                $("#toplevel_page_edit-post_type-acf-field-group").remove()
                $("#toplevel_page_wp-mail-smtp").remove()
                $("#toplevel_page_mailchimp-for-wp").remove()
                $("#toplevel_page_litespeed").remove()
                $("#toplevel_page_oa_social_login_setup").remove()
                $("toplevel_page_iubenda").remove()
                $("toplevel_page_extendify-assist").remove()
            })
        </script>
        <?php
    }
}
add_action('admin_head', 'organizer_dashboard_css');

function disable_admin_bar_for_organizer()
{
    if (current_user_can('organizer')) {
        add_filter('show_admin_bar', '__return_false');
    }
}
add_action('init', 'disable_admin_bar_for_organizer');


function organizer_dashboard_active_ui()
{
    if (current_user_can('organizer')):
        ?>
        <script>
            // jQuery(document).ready(function ($) {
            // 	let isAnchor = localStorage.getItem('activeAnchor');

            // 	if (isAnchor && isAnchor != null) {
            // 		$('.nav-item a[href="' + isAnchor + '"]').addClass('active').fadeIn();
            // 	} else {
            // 		console.log("coming HERE")
            // 		$('.first-item a').addClass('active').fadeIn()
            // 	}

            // 	$('.nav-item').on('click', function (e) {
            // 		let anchor = $(this).find('a');
            // 		console.log(anchor)

            // 		let href = anchor.attr('href');

            // 		localStorage.setItem('activeAnchor', href);

            // 		$('.nav-item a').removeClass('active').fadeOut();
            // 		anchor.addClass('active').fadeIn();;
            // 	});
            // });

        </script>
        <?php
    endif;
}
add_action('wp_footer', 'organizer_dashboard_active_ui');

add_action('wp_ajax_current_oranizer_profile_image', 'update_profile_image');
function update_profile_image()
{
    // Check if the user has the right permissions
    if (!current_user_can('edit_user', get_current_user_id())) {
        wp_send_json_error(['message' => 'Unauthorized']);
        return;
    }

    $user_id = get_current_user_id();
    $response = [];

    // Check if first name is provided and update it
    if (!empty($_POST['organizer_first_name'])) {
        $first_name = sanitize_text_field($_POST['organizer_first_name']);
        update_user_meta($user_id, 'first_name', $first_name);
        $response['first_name'] = $first_name;  // Store updated first name in response
    }

    // Handle profile image upload
    if (!empty($_FILES['user_profile']['name'])) {
        $uploaded_file = $_FILES['user_profile'];
        $upload = wp_handle_upload($uploaded_file, ['test_form' => false]);

        if (isset($upload['file'])) {
            $attachment_id = wp_insert_attachment([
                'guid' => $upload['url'],
                'post_mime_type' => $upload['type'],
                'post_title' => sanitize_file_name($uploaded_file['name']),
                'post_content' => '',
                'post_status' => 'inherit',
            ], $upload['file']);

            // Generate attachment metadata
            require_once(ABSPATH . 'wp-admin/includes/image.php');
            $attach_data = wp_generate_attachment_metadata($attachment_id, $upload['file']);
            wp_update_attachment_metadata($attachment_id, $attach_data);

            // Update user meta with the new profile image ID
            update_user_meta($user_id, 'current_oranizer_profile_image', $attachment_id);

            // Get the image URL
            $image_url = wp_get_attachment_url($attachment_id);
            $response['image_url'] = $image_url; // Add image URL to the response
        } else {
            wp_send_json_error(['message' => 'Image upload failed.']);
            return;
        }
    }

    // Return success response with updated name and image URL
    wp_send_json_success([
        'message' => 'Profile updated successfully',
        'data' => $response
    ]);
}


add_action('wp_ajax_update_new_password', 'handle_update_password');

function handle_update_password()
{
    if (!is_user_logged_in()) {
        wp_send_json_error(['message' => 'You need to be logged in to change the password.']);
        return;
    }

    $user_id = get_current_user_id();
    $user = get_user_by('id', $user_id);

    $old_password = isset($_POST['old_password']) ? sanitize_text_field($_POST['old_password']) : '';
    $new_password = isset($_POST['new_password']) ? sanitize_text_field($_POST['new_password']) : '';

    if (!wp_check_password($old_password, $user->user_pass, $user_id)) {
        wp_send_json_error(['message' => 'Old password is incorrect.']);
        return;
    }

    if (strlen($new_password) < 6) {
        wp_send_json_error(['message' => 'New password must be at least 6 characters long.']);
        return;
    }

    $update = wp_set_password($new_password, $user_id);

    if ($update) {
        wp_send_json_success(['message' => 'Password updated successfully.']);
    } else {
        wp_send_json_error(['message' => 'Failed to update password. Please try again later.']);
    }
}


add_action('wp_ajax_update_new_password', 'new_update_password_function');

function new_update_password_function()
{
    if (is_user_logged_in()) {
        $user_id = get_current_user_id();

        $old_password = sanitize_text_field($_POST['old_password']);
        $new_password = sanitize_text_field($_POST['new_password']);

        if (strlen($new_password) < 6) {
            wp_send_json_error(['message' => 'New password must be at least 6 characters.']);
        }

        $user = get_user_by('ID', $user_id);
        if (!wp_check_password($old_password, $user->user_pass, $user_id)) {
            wp_send_json_error(['message' => 'The old password is notcorrect.']);
        }

        $update_result = wp_update_user([
            'ID' => $user_id,
            'user_pass' => $new_password
        ]);

        if (is_wp_error($update_result)) {
            wp_send_json_error(['message' => 'Failed to update password.']);
        } else {
            wp_send_json_success(['message' => 'Password updated successfully.']);
        }
    } else {
        wp_send_json_error(['message' => 'User not logged in.']);
    }
}


function filter_events()
{
    $category = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '';

    $args = [
        'post_type' => 'tribe_events',
        'posts_per_page' => -1, // Show all events
        'orderby' => 'date',
        'order' => 'ASC'
    ];

    if ($category) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'tribe_events_cat',
                'field' => 'id',
                'terms' => $category,
                'operator' => 'IN',
            ),
        );
    }

    $events_query = new WP_Query($args);

    if ($events_query->have_posts()) {
        echo '<div class="inner-event typography">';
        echo '<div class="tribe-events-calendar-list">';

        while ($events_query->have_posts()) {
            $events_query->the_post();

            echo '<div class="event">';

            $event_location = get_post_meta(get_the_ID(), 'show_event_location', true);

            if ($event_location) {
                echo '<div class="event-location">';
                echo '<strong>Location:</strong> ' . esc_html($event_location);
                echo '</div>';
            }

            echo '<h3>' . get_the_title() . '</h3>';
            echo '<p>' . get_the_excerpt() . '</p>';


            echo '</div>'; // Close .event
        }

        echo '</div>'; // Close .tribe-events-calendar-list

        get_template_part('list/nav'); // Replace with correct path if needed

        get_template_part('components/ical-link'); // Replace with correct path if needed

        get_template_part('components/after'); // Replace with correct path if needed

        echo '</div>'; // Close .inner-event
    } else {
        echo '<p>No events found.</p>';
    }

    wp_die(); // End AJAX request
}

add_action('wp_ajax_filter_events', 'filter_events');
add_action('wp_ajax_nopriv_filter_events', 'filter_events');



function filter_events_by_category($query)
{
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('tribe_events')) {

        if (isset($_GET['tribe_events_cat']) && !empty($_GET['tribe_events_cat'])) {
            $category_id = intval($_GET['tribe_events_cat']);

            $query->set('tax_query', array(
                array(
                    'taxonomy' => 'tribe_events_cat',
                    'field' => 'id',
                    'terms' => $category_id,
                    'operator' => 'IN',
                )
            ));
        }
    }
}
add_action('pre_get_posts', 'filter_events_by_category');

add_action('um_after_login_fields', 'add_password_reset_link_before_submit', 10);
function add_password_reset_link_before_submit()
{
    ?>
    <div class="forget-remember-me">
        <div class="um-login-remember">
            <label>
                <?php _e('Remember Me', 'ultimate-member'); ?> </label>
            <input type="checkbox" name="rememberme" value="1" />

        </div>

        <div class="um-login-forgot-password">
            <p class="um-password-reset-link">
                <a href="<?php echo wp_lostpassword_url(); ?>"><?php _e('Forgot your password?', 'ultimate-member'); ?></a>
            </p>
        </div>
    </div>
    <?php
}


// Action to fetch order details
function fetch_order_details()
{
    if (isset($_POST['order_id'])) {
        $order_id = intval($_POST['order_id']);
        $order = wc_get_order($order_id);

        if ($order) {
            // Display order details (customize this as needed)
            echo '<h4>Order #' . $order_id . '</h4>';
            echo '<p><strong>Status:</strong> ' . ucfirst($order->get_status()) . '</p>';
            echo '<p><strong>Total:</strong> ' . wc_price($order->get_total()) . '</p>';
            echo '<p><strong>Date:</strong> ' . $order->get_date_created()->format('d-M-Y') . '</p>';

            // Loop through order items and display details
            echo '<h5>Order Items:</h5><ul>';
            foreach ($order->get_items() as $item_id => $item) {
                echo '<li>' . $item->get_name() . ' x ' . $item->get_quantity() . ' (' . wc_price($item->get_total()) . ')</li>';
            }
            echo '</ul>';
        }
    }
    wp_die(); // Always call wp_die() to properly terminate AJAX requests
}
add_action('wp_ajax_fetch_order_details', 'fetch_order_details');
add_action('wp_ajax_nopriv_fetch_order_details', 'fetch_order_details');


function custom_related_product_button_image()
{
    global $product;

    if (is_product()) {
        $related_products = wc_get_related_products($product->get_id());

        if (!empty($related_products)) {
            echo '<a href="' . esc_url($product->add_to_cart_url()) . '" class="button alt">
                    <img src="' . esc_url(site_url() . '/wp-content/uploads/2024/12/Vector.png') . '" alt="Add to Cart" style="max-width: 100%; height: auto;">
                  </a>';
        } else {
            woocommerce_template_loop_add_to_cart();
        }
    }
}

add_action('woocommerce_after_shop_loop_item', 'custom_related_product_button_image', 20);


function custom_redirect_my_account_pages()
{
    $current_url = $_SERVER['REQUEST_URI'];

    if (strpos($current_url, '/my-account/') !== false || strpos($current_url, '/account/') !== false) {
        wp_redirect(site_url('/user/wp-cotswoldsportingclubcouk/'));
        exit;
    }
}
add_action('template_redirect', 'custom_redirect_my_account_pages');

function redirect_logged_in_user()
{
    if (is_user_logged_in()) {
        if (is_page('login') || is_page('sign-up')) {
            wp_redirect(home_url('/my-account/'));
            exit();
        }
    }
}
add_action('template_redirect', 'redirect_logged_in_user', 10);

function custom_breadcrumbs()
{

    $separator = ' <img src="https://cotswoldsportingclub.com/wp-content/uploads/2025/01/CaretRight.svg"> ';
    echo '<div class="bred-block">';
    echo '<div class="container-fluid">';
    echo '<nav class="breadcrumbs" aria-label="Breadcrumb">';

    if (is_singular('product')) {

        echo '<a href="' . esc_url(wc_get_page_permalink('shop')) . '">All Products</a>' . $separator;

        the_title();
    } elseif (is_account_page()) {
        echo '<a href="' . esc_url(wc_get_page_permalink('myaccount')) . '">My Account</a>';

        if (is_wc_endpoint_url('orders')) {
            echo $separator . 'Orders';
        } elseif (is_wc_endpoint_url('edit-account')) {
            echo $separator . 'Account Details';
        } elseif (is_wc_endpoint_url('addresses')) {
            echo $separator . 'Addresses';
        } elseif (is_wc_endpoint_url('payment-methods')) {
            echo $separator . 'Payment Methods';
        } elseif (is_wc_endpoint_url('downloads')) {
            echo $separator . 'Downloads';
        } elseif (is_wc_endpoint_url('view-order')) {
            echo $separator . 'View Order';
        } elseif (is_wc_endpoint_url('edit-address')) {
            echo $separator . 'Addresses';
        }
    } elseif (is_cart()) {
        echo '<a href="' . esc_url(wc_get_page_permalink('shop')) . '">All Products</a>' . $separator;

        echo 'Cart';
    } elseif (is_checkout()) {
        echo '<a href="' . esc_url(wc_get_page_permalink('shop')) . '">All Products</a>' . $separator;
        echo 'Checkout';
    } elseif (is_singular('service')) {
        $service_archive_url = get_post_type_archive_link('service');
        echo '<a href="' . esc_url($service_archive_url) . '">Service</a>' . $separator;
        the_title();
    } elseif (is_singular('post')) {
        $post_archive_url = get_post_type_archive_link('post');
        echo '<a href="' . esc_url($post_archive_url) . '/all-news-and-announcement/">ALL NEWS AND ANNONCEMENT</a>' . $separator;
        the_title();
    } elseif (is_singular('testimonial')) {
        echo 'Testimonial' . $separator;
        the_title();
    } elseif (is_page()) {
        the_title();
    } elseif (is_category()) {
        single_cat_title();
    } elseif (is_tag()) {
        single_tag_title();
    } elseif (is_home()) {
        echo 'Blog';
    }
    echo '</nav>';
    echo '</div>';
    echo '</div>';
}

add_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_description', 10);

function woocommerce_output_product_description()
{
    global $post;

    if (!empty($post->post_content)) {
        echo '<div class="woocommerce-product-description">';
        echo '<h3>Product Details</h3>';
        echo apply_filters('the_content', $post->post_content);
        echo '</div>';
    }
}


function custom_um_password_reset_placeholder()
{
    if (is_page('password-reset')) { 
        ?>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function () {
                var passwordField = document.querySelector('input[name="user_password"]');
                if (passwordField) {
                    passwordField.setAttribute('placeholder', 'Enter password');
                }
            });
            document.addEventListener('DOMContentLoaded', function () {
                var passwordField = document.querySelector('input[name="username_b"]');
                if (passwordField) {
                    passwordField.setAttribute('placeholder', 'Enter Email Address');
                }
            });
            document.addEventListener('DOMContentLoaded', function () {
                var Confirm_passwordField = document.querySelector('input[name="confirm_user_password-528"]');
                if (Confirm_passwordField) {
                    Confirm_passwordField.setAttribute('placeholder', 'Enter Confirm Password');
                }
            });

        </script>
        <?php
    }
}
add_action('wp_footer', 'custom_um_password_reset_placeholder');

function custom_um_password_placeholder()
{
    ?>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            var Confirm_passwordField = document.querySelector('input[name="confirm_user_password-55"]');
            if (Confirm_passwordField) {
                Confirm_passwordField.setAttribute('placeholder', 'Enter Confirm Password');
            }
        });
        document.addEventListener('DOMContentLoaded', function () {
            var Confirm_passwordField = document.querySelector('input[name="confirm_user_password-66"]');
            if (Confirm_passwordField) {
                Confirm_passwordField.setAttribute('placeholder', 'Enter Confirm Password');
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            var emailField = document.querySelector('input[name="purchaser-email"]');
            if (emailField) {
                emailField.setAttribute('placeholder', 'Enter Email');
            }
        });

        // document.addEventListener('DOMContentLoaded', function () {
        //     // Initialize the select2 plugin with the placeholder text
        //     $('#user_area_of_interests').select2({
        //         placeholder: "Please select Your Choices",  // Set the placeholder
        //         allowClear: true  // Allows clearing of selection
        //     });
        // });
    </script>
    <?php
}
add_action('wp_footer', 'custom_um_password_placeholder');


function custom_event_schedule_format($html, $event_id)
{
    $start_date = tribe_get_start_date($event_id, false, 'j F Y');

    return $start_date;
}

add_filter('tribe_events_event_schedule_details_inner', 'custom_event_schedule_format', 10, 2);


// add_action('wp_ajax_load_orders_page', 'load_orders_page_handler');
// add_action('wp_ajax_nopriv_load_orders_page', 'load_orders_page_handler');

// function load_orders_page_handler()
// {
//     $orders_per_page = 5;
//     $paged = isset($_POST['paged']) ? (int) $_POST['paged'] : 1;
//     $user_id = isset($_POST['user_id']) ? (int) $_POST['user_id'] : 0;

//     // Get orders for current page
//     $args = array(
//         'customer' => $user_id,
//         'post_status' => array('wc-completed', 'wc-processing', 'wc-pending', 'wc-cancelled'),
//         'posts_per_page' => $orders_per_page,
//         'paged' => $paged
//     );

//     $orders = wc_get_orders($args);

//     // Get total orders for pagination
//     $total_orders = wc_get_orders(array(
//         'customer' => $user_id,
//         'post_status' => array('wc-completed', 'wc-processing', 'wc-pending', 'wc-cancelled'),
//         'posts_per_page' => -1
//     ));

//     $total_orders_count = count($total_orders);
//     $total_pages = ceil($total_orders_count / $orders_per_page);

//     ob_start();

//     // Output table
//     echo '<div class="table-responsive">';
//     echo '<table class="table">';
//     echo '<thead><tr><th>Order ID</th><th>Status</th><th>Date</th><th>Total</th><th>Actions</th></tr></thead>';
//     echo '<tbody>';

//     foreach ($orders as $order) {
//         $order_id = $order->get_id();
//         $status = ucfirst($order->get_status());
//         $total = wc_price($order->get_total());
//         $date_created = $order->get_date_created()->format('Y-m-d');

//         echo '<tr>';
//         echo '<td>#' . $order_id . '</td>';
//         echo '<td>' . $status . '</td>';
//         echo '<td>' . $date_created . '</td>';
//         echo '<td>' . $total . '</td>';
//         echo '<td><button class="btn fourth-btn table_btn btn-info" data-toggle="modal" data-target="#orderModal" data-orderid="' . $order_id . '">View Details</button></td>';
//         echo '</tr>';
//     }

//     echo '</tbody>';
//     echo '</table>';
//     echo '</div>';

//     // Output pagination
//     if ($total_pages > 1) {
//         echo '<nav aria-label="Page navigation">';
//         echo '<ul class="pagination">';

//         // First and Previous
//         echo '<li class="page-item' . ($paged == 1 ? ' disabled' : '') . '"><a class="page-link" href="#" data-page="1">&laquo;&laquo;</a></li>';
//         echo '<li class="page-item' . ($paged == 1 ? ' disabled' : '') . '"><a class="page-link" href="#" data-page="' . ($paged - 1) . '">&laquo;</a></li>';

//         // Page numbers
//         for ($i = 1; $i <= $total_pages; $i++) {
//             if ($i == $paged) {
//                 echo '<li class="page-item active"><a class="page-link" href="#" data-page="' . $i . '">' . $i . '</a></li>';
//             } else {
//                 echo '<li class="page-item"><a class="page-link" href="#" data-page="' . $i . '">' . $i . '</a></li>';
//             }
//         }

//         // Next and Last
//         echo '<li class="page-item' . ($paged == $total_pages ? ' disabled' : '') . '"><a class="page-link" href="#" data-page="' . ($paged + 1) . '">&raquo;</a></li>';
//         echo '<li class="page-item' . ($paged == $total_pages ? ' disabled' : '') . '"><a class="page-link" href="#" data-page="' . $total_pages . '">&raquo;&raquo;</a></li>';

//         echo '</ul>';
//         echo '</nav>';
//     }

//     $html = ob_get_clean();
//     echo $html;
//     wp_die();
// }

function hide_tickets_for_organizers()
{
    if (is_user_logged_in() && current_user_can('organizer')) {
        echo '<style>
                .tribe-common.event-tickets, 
                .tribe-tickets__tickets-wrapper {
                    display: none !important;
                }
              </style>';
    }
}
add_action('wp_head', 'hide_tickets_for_organizers');



function load_more_products()
{
    // Get offset and category filter from the AJAX request
    $offset = isset($_POST['offset']) ? absint($_POST['offset']) : 0;
    $category_filter = isset($_POST['category_filter']) ? sanitize_text_field($_POST['category_filter']) : '';

    // Set up the arguments for the new WP_Query
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'offset' => $offset,
    );

    if (!empty($category_filter)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'id',
                'terms' => $category_filter,
                'operator' => 'IN',
            ),
        );
    }

    $query = new WP_Query($args);

    // Loop through products and output them
    if ($query->have_posts()):
        while ($query->have_posts()):
            $query->the_post();
            global $product;
            ?>
            <div class="product-item">
                <div class="product-thumbnail">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) {
                            echo get_the_post_thumbnail(get_the_ID(), 'full');
                        } ?>
                    </a>
                </div>
                <div class="product-details">
                    <div class="pro-title">
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <h4 class="product-price"><?php echo $product->get_price_html(); ?></h4>
                    </div>
                    <div class="cart-btn">
                        <?php
                        if ($product) {
                            if ($product->is_type('variable')) {
                                echo '<a href="' . esc_url($product->get_permalink()) . '" class="button select_options_button">Select Options</a>';
                            } else {
                                echo '<a href="' . esc_url($product->add_to_cart_url()) . '" class="button add_to_cart_button"><img src="/wp-content/uploads/2024/12/Vector.png"></a>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php endwhile;
    endif;

    wp_reset_postdata();
    die(); // End the AJAX request
}

add_action('wp_ajax_load_more_products', 'load_more_products'); // Logged-in users
add_action('wp_ajax_nopriv_load_more_products', 'load_more_products'); // Non-logged-in users


// Function to enqueue the custom JS for the login redirection
function enqueue_custom_login_redirect_script()
{
    if (!is_user_logged_in()) { // Check if the user is not logged in
        ?>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function () {
                var loginButton = document.querySelector('.tribe-common-c-btn--small');
                if (loginButton) {
                    loginButton.addEventListener('click', function (e) {
                        e.preventDefault(); // Prevent default link action
                        var redirectUrl = loginButton.getAttribute('href');
                        var customLoginUrl = 'https://cotswoldsportingclub.com/login?redirect_to=' + encodeURIComponent(redirectUrl.split('?redirect_to=')[1]);
                        window.location.href = customLoginUrl; // Redirect to the custom login page with the event URL
                    });
                }
            });
        </script>
        <?php
    }
}
add_action('wp_footer', 'enqueue_custom_login_redirect_script');


function custom_no_ticket_message($event_id)
{
    $event = get_post($event_id);
    $tickets = tribe_get_event_meta($event_id, '_tribe_tickets', true);

    if (empty($tickets)) {
        // Show a custom message to the user about missing tickets
        echo '<div class="tribe-event-error-message">No tickets have been added for this event. Please add tickets to proceed with payment.</div>';
    }
}

add_action('tribe_community_event_saved', 'custom_no_ticket_message');


function send_email_to_author_on_save($post_id, $post, $update)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    if ('tec_tc_order' !== get_post_type($post_id))
        return;

    if (get_post_meta($post_id, '_email_sent', true))
        return;

    $real_post_id = get_post_meta($post_id, '_tec_tc_order_events_in_order', true);

    if (!$real_post_id) {
        return;
    }

    $postData = get_post($real_post_id);

    if (!$postData) {
        return;
    }

    $postAuthor = $postData->post_author;
    $author_email = get_the_author_meta('user_email', $postAuthor);
    $author_name = get_the_author_meta('display_name', $postAuthor);  // Get the author's name

    // Assuming 'event_name' is stored as a custom field in the event post
    $event_name = get_the_title($real_post_id);  // Get the event name

    // Get ticket details from the custom field '_tec_tc_order_items'
    $ticket_details = get_post_meta($post_id, '_tec_tc_order_items', true);  // Get the ticket details

    // Get purchaser name and email
    $purchaser_name = get_post_meta($post_id, '_tec_tc_order_purchaser_full_name', true);
    $purchaser_email = get_post_meta($post_id, '_tec_tc_order_purchaser_email', true);

    // Initialize ticket count and ticket ID tracker (to avoid double counting)
    $ticket_count = 0;
    $ticket_ids = [];

    // Calculate total ticket count based on the correct data structure
    if ($ticket_details && is_array($ticket_details)) {
        foreach ($ticket_details as $ticket) {
            if (isset($ticket['ticket_id']) && isset($ticket['quantity']) && is_numeric($ticket['quantity'])) {
                // Only count tickets once based on the unique 'ticket_id'
                if (!in_array($ticket['ticket_id'], $ticket_ids)) {
                    $ticket_count += $ticket['quantity'];  // Add quantity to the total count
                    $ticket_ids[] = $ticket['ticket_id'];  // Add ticket_id to the tracker
                }
            }
        }
    }

    // Constructing the email message
    if ($author_email) {
        $subject = 'Your Post Has Been Saved';
        $message = 'Hello ' . $author_name . ',<br><br>';
        $message .= 'Below are the details of the user who purchased a ticket for your event:';
        $message .= 'Event: <strong>' . $event_name . '</strong><br>';

        if ($ticket_count > 0) {
            $message .= 'Total Tickets Purchased: <strong>' . $ticket_count . '</strong><br>';
            $message .= 'You have purchased ' . $ticket_count . ' tickets for this event.<br><br>';
        } else {
            $message .= 'No tickets purchased.<br><br>';
        }

        // Include purchaser's name and email
        if ($purchaser_name && $purchaser_email) {
            $message .= 'Purchaser Name: <strong>' . $purchaser_name . '</strong><br>';
            $message .= 'Purchaser Email: <strong>' . $purchaser_email . '</strong><br><br>';
        }

        $message .= 'Thank you for your purchase!';

        wp_mail($author_email, $subject, $message);

        update_post_meta($post_id, '_email_sent', true);
    }
}

add_action('save_post', 'send_email_to_author_on_save', 10, 3);

function limit_product_image_uploads($attachment_ids, $post_id)
{
    if (get_post_type($post_id) === 'product') {
        $product_images = count($attachment_ids);

        // Limit to 3 images
        if ($product_images > 3) {
            $attachment_ids = array_slice($attachment_ids, 0, 3);
            add_action('admin_notices', function () {
                echo '<div class="error"><p><strong>Note:</strong> You can only upload up to 3 images for this product.</p></div>';
            });
        }
    }
    return $attachment_ids;
}
add_filter('woocommerce_product_image_gallery', 'limit_product_image_uploads', 10, 2);

// Add this code to your theme's functions.php file or in a custom plugin

add_action('init', 'make_ticket_generation_mandatory');

function make_ticket_generation_mandatory()
{
    // Hook earlier in the process to catch all save attempts
    add_action('tribe_events_community_before_event_submission', 'check_ticket_requirement', 5, 1);
    add_action('tribe_community_events_before_save_event', 'check_ticket_requirement', 5, 1);
}

function check_ticket_requirement($event_id)
{
    // Skip validation if this is a ticket creation action
    if (isset($_POST['ticket_name']) || isset($_POST['ticket_price'])) {
        return;
    }

    $has_ticket = false;

    // Check for any type of tickets
    $ticket_types = array('tribe_tpp_tickets', 'tribe_wooticket');

    foreach ($ticket_types as $ticket_type) {
        $tickets = get_posts(array(
            'post_type' => $ticket_type,
            'post_parent' => $event_id,
            'posts_per_page' => 1,
            'fields' => 'ids'
        ));

        if (!empty($tickets)) {
            $has_ticket = true;
            break;
        }
    }

    // If no ticket found, prevent saving and redirect
    if (!$has_ticket) {
        // Store error state
        set_transient('tribe_event_ticket_error_' . get_current_user_id(), true, 30);

        // Get the referer URL or default to the events page
        $redirect_url = wp_get_referer();
        if (empty($redirect_url)) {
            $redirect_url = tribe_community_events_list_url();
        }

        // Add error parameter
        $redirect_url = add_query_arg('ticket_error', '1', $redirect_url);

        // Prevent the event from being saved
        wp_redirect($redirect_url);
        exit;
    }
}

// Add notice to the event submission form
add_action('tribe_events_community_form_before_template', 'add_ticket_requirement_notice');
add_action('tribe_events_community_before_event_submission_page', 'add_ticket_requirement_notice');

function add_ticket_requirement_notice()
{
    // Check if we're showing an error message
    $show_error = isset($_GET['ticket_error']) && get_transient('tribe_event_ticket_error_' . get_current_user_id());

    // Display the notice
    echo '<div class="tribe-community-notice" style="margin-bottom: 20px;">';
    echo '<p class="ticket-requirement-notice" style="color: #856404; background-color: #fff3cd; padding: 12px; border: 1px solid #ffeeba; border-radius: 4px; margin: 0;">';
    // echo '<strong>Important:</strong> A ticket is required for this event. Please create a ticket before saving.';
    echo '</p>';

    if ($show_error) {
        echo '<div class="ticket-error-message" style="color: #721c24; background-color: #f8d7da; padding: 12px; border: 1px solid #f5c6cb; border-radius: 4px; margin-top: 10px;">';
        echo '<strong>Error:</strong> You must add a ticket to your event before it can be saved.';
        echo '</div>';

        // Clear the transient
        delete_transient('tribe_event_ticket_error_' . get_current_user_id());
    }
    echo '</div>';
}

// Add JavaScript to handle form preservation
add_action('wp_footer', 'add_event_form_scripts');

function add_event_form_scripts()
{
    ?>
    <script>
        jQuery(document).ready(function ($) {
            // Save form data before submission
            $('.tribe-community-events form').on('submit', function (e) {
                // Check if tickets exist
                if ($('.tribe-tickets-editor-table-tickets-body tr').length === 0) {
                    e.preventDefault();
                    alert('Please create a ticket for this event before saving.');
                    return false;
                }

                // Save form data
                const formData = {};
                $(this).find('input, textarea, select').each(function () {
                    if (this.name) {
                        formData[this.name] = $(this).val();
                    }
                });
                localStorage.setItem('eventFormData', JSON.stringify(formData));
            });

            // Restore form data if validation failed
            if (window.location.search.indexOf('ticket_error=1') > -1) {
                const savedData = localStorage.getItem('eventFormData');
                if (savedData) {
                    const formData = JSON.parse(savedData);
                    Object.keys(formData).forEach(key => {
                        $(`[name="${key}"]`).val(formData[key]);
                    });
                    localStorage.removeItem('eventFormData');
                }
            }
        });
    </script>
    <?php
}

// Add additional validation hook for extra security
add_filter('tribe_events_community_allowed_to_save', 'validate_ticket_exists', 10, 2);

function validate_ticket_exists($allowed, $submission)
{
    // Skip for ticket creation
    if (isset($_POST['ticket_name']) || isset($_POST['ticket_price'])) {
        return $allowed;
    }

    $event_id = $submission->ID;
    $has_ticket = false;

    // Check for any type of tickets
    $ticket_types = array('tribe_tpp_tickets', 'tribe_wooticket');

    foreach ($ticket_types as $ticket_type) {
        $tickets = get_posts(array(
            'post_type' => $ticket_type,
            'post_parent' => $event_id,
            'posts_per_page' => 1,
            'fields' => 'ids'
        ));

        if (!empty($tickets)) {
            $has_ticket = true;
            break;
        }
    }

    return $has_ticket ? $allowed : false;
}

function handle_tournament_submission()
{
    if (!isset($_POST['submit_tournament']) || !isset($_POST['tournament_nonce'])) {
        return;
    }

    if (!wp_verify_nonce($_POST['tournament_nonce'], 'submit_tournament')) {
        wp_die('Security check failed');
    }

    $title = sanitize_text_field($_POST['title']);
    $sub_heading = sanitize_text_field($_POST['sub_heading']);
    $tournament_content = wp_kses_post($_POST['tournament_content']);
    $event_bracket_content = wp_kses_post($_POST['event_bracket_content']);
    $event_result_content = wp_kses_post($_POST['event_result_content']);
    $competitors = array_filter(array_map('trim', explode("\n", $_POST['competitors'])));

    if (!in_array(count($competitors), [4, 8, 16, 32, 64, 128, 256])) {
        wp_die("Invalid number of competitors. Please ensure you have a valid number (4, 8, 16, 32, 64, 128, or 256).");
    }

    // Insert Tournament Post
    $tournament_id = wp_insert_post([
        'post_title' => $title,
        'post_content' => '',
        'post_status' => 'publish',
        'post_type' => 'stb-tournament'
    ]);

    if (is_wp_error($tournament_id)) {
        wp_die('Failed to create tournament post: ' . $tournament_id->get_error_message());
    }

    // Update Custom Fields (Meta)
    update_post_meta($tournament_id, 'tournament_sub_heading', $sub_heading);
    update_post_meta($tournament_id, 'add_tournament_content', $tournament_content);
    update_post_meta($tournament_id, 'event_bracket_content', $event_bracket_content);
    update_post_meta($tournament_id, 'event_result_content', $event_result_content);
    update_post_meta($tournament_id, 'stb_competitors', implode("\n", $competitors)); // Changed key from 'competitors' to 'stb_competitors'

    // Handle Featured Image Upload (ACF)
    if (!empty($_FILES['add_featured_image']['name'])) {
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        require_once(ABSPATH . 'wp-admin/includes/image.php');
        require_once(ABSPATH . 'wp-admin/includes/media.php');

        $attachment_id = media_handle_upload('add_featured_image', $tournament_id);
        if (!is_wp_error($attachment_id)) {
            set_post_thumbnail($tournament_id, $attachment_id);
            update_field('add_featured_image', $attachment_id, $tournament_id); // Store image ID in ACF
        }
    }

    $success_message = 'Tournament successfully created and updated! You will be redirected shortly.';

    add_action('wp_footer', function() use ($success_message) {
        ?>
        <div class="success-message"><?php echo esc_html($success_message); ?></div>
        <script type="text/javascript">
            setTimeout(function() {
                window.location.href = '<?php echo esc_url(home_url('/my-account')); ?>';
            }, 1500); // Redirect after 3 seconds
        </script>
        <?php
    });

}



function update_tournament_status() {
    if (!isset($_POST['tournament_id']) || !isset($_POST['status'])) {
        wp_send_json_error('Invalid request');
    }

    $tournament_id = intval($_POST['tournament_id']);
    $new_status = sanitize_text_field($_POST['status']);

    if (!current_user_can('edit_post', $tournament_id)) {
        wp_send_json_error('Permission denied');
    }

    if (!in_array($new_status, ['open', 'in_progress', 'finished'])) {
        wp_send_json_error('Invalid status');
    }

    if ($new_status === 'in_progress') {
        // Get competitors
        $competitors_raw = get_post_meta($tournament_id, 'stb_competitors', true);
        if (empty($competitors_raw)) {
            wp_send_json_error('No competitors found. Cannot start tournament.');
        }

        // Convert competitors string to array and clean up
        $competitors_array = array_filter(array_map('trim', explode("\n", $competitors_raw)));
        $competitor_count = count($competitors_array);

        // Validate competitor count is a power of 2
        if (!isPowerOfTwo($competitor_count) || $competitor_count < 4) {
            wp_send_json_error('Number of competitors must be a power of 2 (4, 8, 16, etc.) and at least 4.');
        }

        // Calculate number of rounds
        $rounds = log($competitor_count, 2);
        
        // Format competitors for bracket
        $formatted_competitors = [];
        foreach ($competitors_array as $index => $name) {
            $formatted_competitors[] = [
                'id' => $index,
                'name' => $name
            ];
        }

        // Generate initial matches
        $matches = [];
        $match_id = 0;
        
        // First round matches
        for ($i = 0; $i < $competitor_count; $i += 2) {
            $matches[] = [
                'id' => $match_id,
                'one_id' => $formatted_competitors[$i]['id'],
                'two_id' => $formatted_competitors[$i + 1]['id']
            ];
            $match_id++;
        }

        // Generate subsequent round empty matches
        $remaining_matches = ($competitor_count - 1) - count($matches);
        for ($i = 0; $i < $remaining_matches; $i++) {
            $matches[] = [
                'id' => $match_id,
                'one_id' => null,
                'two_id' => null
            ];
            $match_id++;
        }

        // Create match data structure
        $match_data = [
            'rounds' => $rounds,
            'competitors' => $formatted_competitors,
            'matches' => $matches
        ];

        // Save match data
        update_post_meta($tournament_id, 'stb_match_data', $match_data);
    }

    if ($new_status === 'open' && isset($_POST['reset']) && $_POST['reset'] == true) {
        // Reset tournament data
        delete_post_meta($tournament_id, 'stb_competitors');
        delete_post_meta($tournament_id, 'stb_match_data');
        delete_post_meta($tournament_id, 'event_bracket_content');
        delete_post_meta($tournament_id, 'event_result_content');
    }

    // Update the status
    update_post_meta($tournament_id, 'stb_status', $new_status);
    
    wp_send_json_success([
        // 'message' => 'Tournament status updated successfully',
        'status' => $new_status
    ]);
}

// Helper function to check if number is power of 2
function isPowerOfTwo($n) {
    return ($n & ($n - 1)) === 0 && $n !== 0;
}

add_action('wp_ajax_update_tournament_status', 'update_tournament_status');


function update_tournament() {
    if (!isset($_POST['tournament_id'])) {
        wp_send_json_error(['message' => 'Invalid request']);
    }

    $tournament_id = intval($_POST['tournament_id']);

    // Verify user has permission
    if (!current_user_can('edit_post', $tournament_id)) {
        wp_send_json_error(['message' => 'Permission denied']);
    }

    // Update tournament fields
    $updated = wp_update_post([
        'ID' => $tournament_id,
        'post_title' => sanitize_text_field($_POST['title'])
    ]);

    if ($updated) {
        // Update custom fields
        update_post_meta($tournament_id, 'tournament_sub_heading', sanitize_text_field($_POST['sub_heading']));
        update_post_meta($tournament_id, 'add_tournament_content', wp_kses_post($_POST['tournament_content']));
        update_post_meta($tournament_id, 'event_bracket_content', wp_kses_post($_POST['event_bracket_content']));
        update_post_meta($tournament_id, 'event_result_content', wp_kses_post($_POST['event_result_content']));

        if (isset($_POST['competitors'])) {
            update_post_meta($tournament_id, 'stb_competitors', sanitize_textarea_field($_POST['competitors']));
        }

        // Handle featured image
        if (!empty($_POST['featured_image_id'])) {
            // Update the featured image ID
            update_post_meta($tournament_id, 'add_featured_image', intval($_POST['featured_image_id']));
        } else {
            // Remove featured image if it was deleted
            delete_post_meta($tournament_id, 'add_featured_image');
        }

        wp_send_json_success(['message' => 'Tournament updated successfully']);
    } else {
        wp_send_json_error(['message' => 'Failed to update tournament']);
    }
}

add_action('wp_ajax_update_tournament', 'update_tournament');



