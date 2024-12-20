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
}
add_action('after_setup_theme', 'mythemefunction');
?>