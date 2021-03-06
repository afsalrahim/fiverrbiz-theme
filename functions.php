<?php

/**
 * Storefront automatically loads the core CSS even if using a child theme as it is more efficient
 * than @importing it in the child theme style.css file.
 *
 * Uncomment the line below if you'd like to disable the Storefront Core CSS.
 *
 * If you don't plan to dequeue the Storefront Core CSS you can remove the subsequent line and as well
 * as the sf_child_theme_dequeue_style() function declaration.
 */
//add_action( 'wp_enqueue_scripts', 'sf_child_theme_dequeue_style', 999 );

/**
 * Dequeue the Storefront Parent theme core CSS
 */
function sf_child_theme_dequeue_style() {
    wp_dequeue_style( 'storefront-style' );
    wp_dequeue_style( 'storefront-woocommerce-style' );
}

/**
 * Note: DO NOT! alter or remove the code above this text and only add your custom PHP functions below this text.
 */

// Add custom footer credits
if ( ! function_exists( 'storefront_credit' ) ) {
   function storefront_credit() {
   	$creds = '<div class="site-info">Copyright &copy; &nbsp;' . date('Y') . '&nbsp; fiverrbiz.com</div><!-- .site-info -->';
   	echo $creds;
  }
}

// Remove The Product Search Form From The Header
add_action( 'init', 'remove_storefront_product_search' );
function remove_storefront_product_search() {
    remove_action( 'storefront_header', 'storefront_product_search', 40 );
}