<?php 
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


add_action('after_setup_theme', 'mythemefunction');
?>