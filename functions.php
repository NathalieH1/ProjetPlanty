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
/*function display_button_for_admin($items, $args) {
    if ($args->theme_location === 'primary') {
        if ( is_user_logged_in() ) { 
            // Récupérer la position du milieu
            $middle_position = ceil(strlen($items) / 2);
            
            // Insérer le bouton "Admin" au milieu
            $items = substr_replace($items, '<a href="http://localhost/Projet6_Planty/Projet6_Planty/wp-admin/index.php" class="admin-button">Admin</a>', $middle_position, 0);
        }
        return $items;
    }
    if ($args->theme_location === 'footer_menu') {
        return $items;
    }
}
add_action('wp_nav_menu_items', 'display_button_for_admin', 10, 2);*/
add_action( 'wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style' );

/*function display_button_for_admin($items, $args) {
    
    

    if ($args->theme_location === 'main_menu') {
        if ( is_user_logged_in() ) { 
            $items .= '<a href="http://localhost/Planty/wp-admin/index.php" class="admin-button">Admin</a>';

        }
    
        return $items;
    }
    
    if ($args->theme_location==='footer_menu'){
        return $items;
    }
   
}
add_action('wp_nav_menu_items', 'display_button_for_admin', 10, 2);*/



/*function custom_menu_items($items, $args) {
    if ($args->theme_location === 'main_menu') {
        if (is_user_logged_in()) {
            // Construit manuellement le lien 'Admin' après 'Nous rencontrer'
            $admin_link = '<li id="menu-item-admin" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-admin">';
            $admin_link .= '<a href="http://localhost/Planty/wp-admin/index.php" class="admin-button">Admin</a>';
            $admin_link .= '</li>';

            // Trouve la position de 'Commander' dans le menu
            $position = strpos($items, '<li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-25 current_page_item menu-item-1054">');

            // Insère le lien 'Admin' après 'Nous rencontrer' et devant 'Commander'
            if ($position !== false) {
                $items = substr_replace($items, $admin_link, $position, 0);
            }
        }

        return $items;
    }

    if ($args->theme_location === 'footer_menu') {
        return $items;
    }
}

add_filter('wp_nav_menu_items', 'custom_menu_items', 10, 2);*/

function custom_menu_items($items, $args) {
    if ($args->theme_location === 'main_menu') {
        if (is_user_logged_in()) {
            // Construit manuellement le lien 'Admin'
            $admin_link = '<li id="menu-item-admin" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-admin">';
            $admin_link .= '<a href="http://localhost/Planty/wp-admin/index.php" class="admin-button">Admin</a>';
            $admin_link .= '</li>';

            // Trouve l'ID du deuxième élément ('Commander') dans le menu
            $order_id = wp_filter_object_list(wp_get_nav_menu_items('Principal'), array('title' => 'Commander'));
            $order_id = reset($order_id)->ID;

            // Trouve la position du deuxième élément dans le menu
            $position = strpos($items, '<li id="menu-item-' . $order_id . '"');

            // Insère le lien 'Admin' avant le deuxième élément
            if ($position !== false) {
                $items = substr_replace($items, $admin_link, $position, 0);
            }
        }

        return $items;
    }

    if ($args->theme_location === 'footer_menu') {
        return $items;
    }
}

add_filter('wp_nav_menu_items', 'custom_menu_items', 10, 2);




/*function display_button_for_admin($items, $args) {


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
add_action('wp_nav_menu_items', 'display_button_for_admin', 10, 2);*/
/*
$middle_index = ceil(count($menu_items) / 2);
        // Insérez votre bouton entre les deux parties
        $new_button = '<li><a href="URL_DE_VOTRE_BOUTON">Texte du bouton</a></li>';
        array_splice($menu_items, $middle_index, 0, $new_button);

        // Rejoignez à nouveau les parties pour former le menu complet
        $items = implode('</li>', $menu_items);
        */



       /* add_filter( 'wp_nav_menu_items', 'add_extra_item_to_nav_menu', 10, 2 );
        function add_extra_item_to_nav_menu( $items, $args ) {
            if (is_user_logged_in() && $args->menu == 303) {
                $items .= '<li><a href="'. get_permalink( get_option('woocommerce_myaccount_page_id') ) .'">My Account</a></li>';
            }
            elseif (!is_user_logged_in() && $args->menu == 303) {
                $items .= '<li><a href="' . get_permalink( wc_get_page_id( 'myaccount' ) ) . '">Sign in  /  Register</a></li>';
            }
            return $items;
        }*/

        