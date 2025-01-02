<?php 

//add enqueu style and script

if(!function_exists('mythemestyleandscript')){
    function mythemestyleandscript(){
        // include assets css
        wp_enqueue_style("unque_id", get_stylesheet_uri());

        // include assets bootstrap
        wp_enqueue_style("bootstrap_css",
        get_parent_theme_file_uri('/assets/css/bootstrap.css'),
        array(),
        // show version number
        wp_get_theme()->get('Version'),
        // media all
        'all',
        );

        // include style css
        wp_enqueue_style("unque_id", get_stylesheet_uri());

        // include assets style css
        wp_enqueue_style("style_css",
        get_parent_theme_file_uri('/assets/css/style.css'),
        array(),
        // show version number
        wp_get_theme()->get('Version'),
        // media all
        'all',
        );

        //responsive css
        wp_enqueue_style("responsive_css",
        get_parent_theme_file_uri('/assets/css/responsive.css'),
        array(),
        // show version number
        wp_get_theme()->get('Version'),
        // media all
        'all',
        );


        //include https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css
        // wp_enqueue_style("owl_carousel_css",
        // get_parent_theme_file_uri('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css'),
        // array(),
        // // show version number
        // wp_get_theme()->get('Version'),
        // // media all
        // 'all',
        // );
        wp_enqueue_style(
            "owl_carousel_css", // Handle name
            'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', // URL to the stylesheet
            array(), // Dependencies (none in this case)
            null, // Version number (use null for no version)
            'all' // Media (e.g., 'all', 'screen', 'print')
        );

        //google font
        wp_enqueue_style(
            "google_font", // Handle name
            'https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap', // URL to the stylesheet
            array(), // Dependencies (none in this case)
            null, // Version number (use null for no version)
            'all' // Media (e.g., 'all', 'screen', 'print')
        );

        // include js file
        wp_enqueue_script(
            "jquery_js", // Unique handle
            get_template_directory_uri() . "/assets/js/jquery-3.4.1.min.js", // File URL
            array(), // Dependencies (empty if none)
            wp_get_theme()->get('Version'), // Version (theme version for cache busting)
            true // Load in footer
        );
        //bootstrap js
        wp_enqueue_script(
            "bootstrap_js", // Unique handle
            get_template_directory_uri() . "/assets/js/bootstrap.js", // File URL
            array(), // Dependencies (empty if none)
            wp_get_theme()->get('Version'), // Version (theme version for cache busting)
            true // Load in footer
        );
        
    }
}

add_action('wp_enqueue_scripts', 'mythemestyleandscript');

if(!function_exists('mythemefunction')){
    function mythemefunction(){
        add_theme_support('post-thumbnails');
        add_theme_support( 'post-formats', array( 'aside', 'image', 'video' ) );
        add_image_size('custom-100x100', 100, 100, true);
    }
    load_theme_textdomain('neogymtextdomain', get_template_directory() . '/languages');
    //register new menu
        register_nav_menus(array(
            'top_menu' => __('Top Menu', 'neogymtextdomain'),
        
        ));
        // Add custom class to <ul>
        if (!function_exists('custom_ul_class_add')) {
            function custom_ul_class_add($args)
            {
                if (isset($args['add_ul_class'])) {
                    $args['menu_class'] .= ' ' . $args['add_ul_class']; // Add custom class to <ul>
                }
                return $args;
            }
        }
        add_filter('wp_nav_menu_args', 'custom_ul_class_add');

// Add custom class to <li> and active class for Home or current page
if (!function_exists('custom_li_class_add')) {
    function custom_li_class_add($classes, $item, $args)
    {
        if (isset($args->add_li_class)) {
            $classes[] = $args->add_li_class; // Add custom class to <li>
        }

        // Add "active" class to the current menu item
        if (in_array('current-menu-item', $classes) || in_array('current_page_item', $classes)) {
            $classes[] = 'active';
        }

        // Make Home active by default if no page is selected
        if (is_front_page() && $item->url === home_url('/')) {
            $classes[] = 'active';
        }

        return $classes;
    }
}
add_filter('nav_menu_css_class', 'custom_li_class_add', 10, 3);

// Add custom class to <a>
if (!function_exists('custom_a_class_add')) {
    function custom_a_class_add($atts, $item, $args)
    {
        if (isset($args->add_a_class)) {
            $atts['class'] = $args->add_a_class; // Add custom class to <a>
        }
        return $atts;
    }
}
add_filter('nav_menu_link_attributes', 'custom_a_class_add', 10, 3);
}
add_action('after_setup_theme', 'mythemefunction');
//add custom post type for services
if (!function_exists('neogym_service')) {
    function neogym_service() {
        register_post_type(
            'neogym_service_post',
            array(
                'labels'      => array(
                    'name'          => __('Services', 'textdomain'),
                    'singular_name' => __('Services', 'textdomain'),
                ),
                'public'      => true,
                'has_archive' => true,
            )
        ); // Missing semicolon added here
    }
}
add_action('init', 'neogym_service');

//add custom post type for students
if (!function_exists('neogym_student')) {
    function neogym_student() {
        register_post_type(
            'neogym_student_post',
            array(
                'labels'      => array(
                    'name'          => __('Students', 'textdomain'),
                    'singular_name' => __('Student', 'textdomain'),
                    'add_new_item'          => __( 'Add New Student', 'textdomain' ),
                    'not_found'             => __( 'Not found any student', 'textdomain' ),
		            'not_found_in_trash'    => __( 'Not found any student in Trash', 'textdomain' ),
                    'set_featured_image'    => __( 'Set student image', 'textdomain' ),
                ),
                'public'      => true,
                'supports'   => array('title', 'editor', 'thumbnail'),
                'has_archive' => true,
            )
        ); // Missing semicolon added here
    }
}
add_action('init', 'neogym_student');

//add taxonomy for students
if (!function_exists('mystudentdepartment')) {
    function mystudentdepartment() {
        $labels = array(
            'name'              => _x( 'students', 'textdomain' ),
            'singular_name'     => _x( 'Course', 'textdomain' ),
            'search_items'      => __( 'Search students' ),
            'all_items'         => __( 'All students' ),
            'parent_item'       => __( 'Parent students' ),
            'parent_item_colon' => __( 'Parent students:' ),
            'edit_item'         => __( 'Edit students' ),
            'update_item'       => __( 'Update students' ),
            'add_new_item'      => __( 'Add New students' ),
            'new_item_name'     => __( 'New students Name' ),
            'menu_name'         => __( 'Student Department' ),
        );
        $args   = array(
            'hierarchical'      => true, // make it hierarchical (like categories)
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => [ 'slug' => 'neogym_student' ],
        );
        register_taxonomy('student_department',['neogym_student_post'], $args);
    }
}
add_action('init', 'mystudentdepartment');

//shortcode for test
if(!function_exists('neogym_test_shortcode')){
    function neogym_test_shortcode(){
        add_shortcode('neogym_test', 'neogym_test_shortcode_function');
        if(!function_exists('neogym_test_shortcode_function')){
            function neogym_test_shortcode_function(){
                return 'Hello World';
            }
        }
    }
}
add_action('init', 'neogym_test_shortcode');


//01 shortcode for contact form
// if (!function_exists('neogym_contact_form_shortcode_function')) {
//     function neogym_contact_form_shortcode_function() {
//         $form = '<form action="" method="post">
//             <label for="name">Name:</label><br>
//             <input type="text" id="name" name="name"><br>
//             <label for="email">Email:</label><br>
//             <input type="email" id="email" name="email"><br>
//             <label for="message">Message:</label><br>
//             <textarea id="message" name="message"></textarea><br>
//             <input type="submit" value="Submit">
//         </form>';
//         return $form;
//     }

//     add_shortcode('neogym_contact_form', 'neogym_contact_form_shortcode_function');
// }

// 02 shortcode for contact form
if (!function_exists('neogym_contact_form_shortcode_function')) {
    function neogym_contact_form_shortcode_function() {
        // Start output buffering
        ob_start();
        
        // Define the form HTML
        ?>
        <form action="" method="post">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email"><br>
            <label for="message">Message:</label><br>
            <textarea id="message" name="message"></textarea><br>
            <input type="submit" value="Submit">
        </form>
        <?php
        
        // Get the contents of the buffer and clean it
        return ob_get_clean();
    }

    // Register the shortcode
    add_shortcode('neogym_contact_form', 'neogym_contact_form_shortcode_function');
}



// add theme option use codestar framework

require_once get_theme_file_path(). '/inc/codestar/codestar-framework.php';
require_once get_theme_file_path(). '/inc/codestar/samples/admin-options.php';
require_once get_theme_file_path(). '/inc/customposttype/price.php';

require_once __DIR__ . '/inc/cmb2/init.php';
// require_once __DIR__ . '/inc/cmb2/example-functions.php';
require_once __DIR__ . '/inc/cmb2/student-cmb.php';


?>