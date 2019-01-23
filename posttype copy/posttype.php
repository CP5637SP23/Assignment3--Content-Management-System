<?php
/**
*Plugin Name: Taxonomies and custom post
*Description: A plugin that adds taxonomies and custom post
*Version:0.1
*Author:Ranjith Ambalakandy Kanakarajan
*Licence:GPL2
*/
/*  Copyright 2019  Ranjith Ambalakandy Kanakarajan
  (ranjith.ambalakandykanakarajan@my.jcu.edu.au)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
function my_custom_posttypes() {

	/**
	 * Post Type: Testimonials posttype.
	 */

    $labels = array(
      'name'               => 'Testimonials',
      'singular_name'      => 'Testimonial',
      'menu_name'          => 'Testimonials',
      'name_admin_bar'     => 'Testimonial',
      'add_new'            => 'Add New',
      'add_new_item'       => 'Add New Testimonial',
      'new_item'           => 'New Testimonial',
      'edit_item'          => 'Edit Testimonial',
      'view_item'          => 'View Testimonial',
      'all_items'          => 'All Testimonials',
      'search_items'       => 'Search Testimonials',
      'parent_item_colon'  => 'Parent Testimonials:',
      'not_found'          => 'No testimonials found.',
      'not_found_in_trash' => 'No testimonials found in Trash.',
      'show_in_rest'       => true,

  );

  $args = array(
      'labels'             => $labels,
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'menu_icon'          => 'dashicons-id-alt',
      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'testimonials' ),
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => 5,
      'supports'           => array( 'title', 'editor', 'thumbnail' )
  );

	register_post_type( "testimonials", $args );
  /**
	 * Post Type: Reviews.
	 */


       $labels = array(
           'name'               => 'Reviews',
           'singular_name'      => 'Review',
           'menu_name'          => 'Reviews',
           'name_admin_bar'     => 'Review',
           'add_new'            => 'Add New',
           'add_new_item'       => 'Add New Review',
           'new_item'           => 'New Review',
           'edit_item'          => 'Edit Review',
           'view_item'          => 'View Review',
           'all_items'          => 'All Reviews',
           'search_items'       => 'Search Reviews',
           'parent_item_colon'  => 'Parent Reviews:',
           'not_found'          => 'No reviews found.',
           'not_found_in_trash' => 'No reviews found in Trash.',
       );

       $args = array(
           'labels'             => $labels,
           'public'             => true,
           'publicly_queryable' => true,
           'show_ui'            => true,
           'show_in_menu'       => true,
           'query_var'          => true,
           'rewrite'            => array( 'slug' => 'reviews' ),
           'capability_type'    => 'post',
           'has_archive'        => true,
           'hierarchical'       => false,
           'menu_position'      => 5,
           'menu_icon'          => 'dashicons-star-half',
           'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
           'taxonomies'         => array( 'category', 'post_tag' ),
   		'show_in_rest'		 => true
       );
       register_post_type( 'review', $args );


     }

     add_action( 'init', 'my_custom_posttypes' );

  function my_rewrite_flush() {
    // First, we "add" the custom post type via the above written function.
    // Note: "add" is written with quotes, as CPTs don't get added to the DB,
    // They are only referenced in the post_type column with a post entry,
    // when you add a post of this CPT.
    my_custom_posttypes();

    // ATTENTION: This is *only* done during plugin activation hook in this example!
    // You should *NEVER EVER* do this on every page load!!
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'my_rewrite_flush' );





/*custom taxonomies*/

function my_custom_taxonomies() {

    // Type of Product/Service taxonomy
    $labels = array(
        'name'              => 'Type of Products/Services',
        'singular_name'     => 'Type of Product/Service',
        'search_items'      => 'Search Types of Products/Services',
        'all_items'         => 'All Types of Products/Services',
        'parent_item'       => 'Parent Type of Product/Service',
        'parent_item_colon' => 'Parent Type of Product/Service:',
        'edit_item'         => 'Edit Type of Product/Service',
        'update_item'       => 'Update Type of Product/Service',
        'add_new_item'      => 'Add New Type of Product/Service',
        'new_item_name'     => 'New Type of Product/Service Name',
        'menu_name'         => 'Type of Product/Service',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'product-types' ),
        'show_in_rest'      => true,
    );

    register_taxonomy( 'product-type', array( 'review' ), $args );



    // Price Range Taxonomy
    $labels = array(
        'name'              => 'Price Ranges',
        'singular_name'     => 'Price Range',
        'search_items'      => 'Search Price Range',
        'all_items'         => 'All Types of Price Range',
        'parent_item'       => 'Parent Type of Price Range',
        'parent_item_colon' => 'Parent Type of Price Range:',
        'edit_item'         => 'Edit Type of Price Range',
        'update_item'       => 'Update Type of Price Range',
        'add_new_item'      => 'Add New Type of Price Range',
        'new_item_name'     => 'New Type of Price Range Name',
        'menu_name'         => 'Price Range',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'product-types' ),
       'show_in_rest'      => true,
    );

    register_taxonomy( 'price', array( 'review' ), $args );


    $labels = array(
        'name'              => 'Moods',
        'singular_name'     => 'Mood',
        'search_items'      => 'Search Mood',
        'all_items'         => 'All Types of Mood',
        'parent_item'       => 'Parent Type of Mood',
        'parent_item_colon' => 'Parent Type of Mood:',
        'edit_item'         => 'Edit Type of Mood',
        'update_item'       => 'Update Type of Mood',
        'add_new_item'      => 'Add New Type of Mood',
        'new_item_name'     => 'New Type of Mood Name',
        'menu_name'         => 'Mood',
    );

    $args = array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'product-types' ),
        'show_in_rest'      => true,
    );

    register_taxonomy( 'mood', array( 'review' ), $args );

}
add_action ('init','my_custom_taxonomies');
