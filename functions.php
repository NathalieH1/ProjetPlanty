<?php
/**
 * OceanWP Child Theme Functions
 *
 * When running a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions will be used.
 *
 * Text Domain: oceanwp
 * @link http://codex.wordpress.org/Plugin_API
 *
 */

/**
 * Load the parent style.css file
 *
 * @link http://codex.wordpress.org/Child_Themes
 */
function oceanwp_child_enqueue_parent_style() {

	// Dynamically get version number of the parent stylesheet (lets browsers re-cache your stylesheet when you update the theme).
	$theme   = wp_get_theme( 'OceanWP' );
	$version = $theme->get( 'Version' );

	// Load the stylesheet.
	wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
	wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), 
    filemtime (get_stylesheet_directory() . '/css/theme.css'));
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'oceanwp-style' ), $version, 
	filemtime (get_stylesheet_directory() . '/css/theme.css'));;
	
}

add_action( 'wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style' );
<<<<<<< HEAD

function display_button_for_admin($items, $args) {


    if ($args->theme_location === 'main_menu') {
        if ( is_user_logged_in() ) { 
        
        $menu_items = explode('</li>', $items);
        $middle_index = ceil(count($menu_items) / 2);
        // Insérez votre bouton entre les deux parties
        $new_button = '<a href="http://localhost/Planty/wp-admin/about.php" class="admin-button">Admin</a>';
        array_splice($menu_items, 2, 0, $new_button);

        // Rejoignez à nouveau les parties pour former le menu complet
        $items = implode('</li>', $menu_items);	

        }
        return $items;
    }
    if ($args->theme_location==='footer_menu'){
        return $items;
    }
   
}
add_action('wp_nav_menu_items', 'display_button_for_admin', 10, 2);
/*
$middle_index = ceil(count($menu_items) / 2);
        // Insérez votre bouton entre les deux parties
        $new_button = '<li><a href="URL_DE_VOTRE_BOUTON">Texte du bouton</a></li>';
        array_splice($menu_items, $middle_index, 0, $new_button);

        // Rejoignez à nouveau les parties pour former le menu complet
        $items = implode('</li>', $menu_items);
        */
=======
>>>>>>> 2a4fe5471d6448497d4f2edcdccd50a18a40d0fe
