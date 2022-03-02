<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.linkedin.com/in/hamzahabibdev/
 * @since             1.0.0
 * @package           Learndash_Custom_Tabs
 *
 * @wordpress-plugin
 * Plugin Name:       LearnDash Custom Tabs
 * Plugin URI:        https://www.linkedin.com/in/hamzahabibdev/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Hamza Habib
 * Author URI:        https://www.linkedin.com/in/hamzahabibdev/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       learndash-custom-tabs
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'LEARNDASH_CUSTOM_TABS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-learndash-custom-tabs-activator.php
 */
function activate_learndash_custom_tabs() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-learndash-custom-tabs-activator.php';
	Learndash_Custom_Tabs_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-learndash-custom-tabs-deactivator.php
 */
function deactivate_learndash_custom_tabs() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-learndash-custom-tabs-deactivator.php';
	Learndash_Custom_Tabs_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_learndash_custom_tabs' );
register_deactivation_hook( __FILE__, 'deactivate_learndash_custom_tabs' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-learndash-custom-tabs.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_learndash_custom_tabs() {

	$plugin = new Learndash_Custom_Tabs();
    function register_custom_tabs() {

    /**
     * Post Type: Custom Tabs.
     */

    $labels = [
        "name" => __( "Custom Tabs", "twentytwenty" ),
        "singular_name" => __( "Custom Tab", "twentytwenty" ),
        "menu_name" => __( "Custom Tabs", "twentytwenty" ),
        "all_items" => __( "All Custom Tabs", "twentytwenty" ),
        "add_new" => __( "Add new", "twentytwenty" ),
        "add_new_item" => __( "Add new Custom Tab", "twentytwenty" ),
        "edit_item" => __( "Edit Custom Tab", "twentytwenty" ),
        "new_item" => __( "New Custom Tab", "twentytwenty" ),
        "view_item" => __( "View Custom Tab", "twentytwenty" ),
        "view_items" => __( "View Custom Tabs", "twentytwenty" ),
        "search_items" => __( "Search Custom Tabs", "twentytwenty" ),
        "not_found" => __( "No Custom Tabs found", "twentytwenty" ),
        "not_found_in_trash" => __( "No Custom Tabs found in trash", "twentytwenty" ),
        "parent" => __( "Parent Custom Tab:", "twentytwenty" ),
        "featured_image" => __( "Featured image for this Custom Tab", "twentytwenty" ),
        "set_featured_image" => __( "Set featured image for this Custom Tab", "twentytwenty" ),
        "remove_featured_image" => __( "Remove featured image for this Custom Tab", "twentytwenty" ),
        "use_featured_image" => __( "Use as featured image for this Custom Tab", "twentytwenty" ),
        "archives" => __( "Custom Tab archives", "twentytwenty" ),
        "insert_into_item" => __( "Insert into Custom Tab", "twentytwenty" ),
        "uploaded_to_this_item" => __( "Upload to this Custom Tab", "twentytwenty" ),
        "filter_items_list" => __( "Filter Custom Tabs list", "twentytwenty" ),
        "items_list_navigation" => __( "Custom Tabs list navigation", "twentytwenty" ),
        "items_list" => __( "Custom Tabs list", "twentytwenty" ),
        "attributes" => __( "Custom Tabs attributes", "twentytwenty" ),
        "name_admin_bar" => __( "Custom Tab", "twentytwenty" ),
        "item_published" => __( "Custom Tab published", "twentytwenty" ),
        "item_published_privately" => __( "Custom Tab published privately.", "twentytwenty" ),
        "item_reverted_to_draft" => __( "Custom Tab reverted to draft.", "twentytwenty" ),
        "item_scheduled" => __( "Custom Tab scheduled", "twentytwenty" ),
        "item_updated" => __( "Custom Tab updated.", "twentytwenty" ),
        "parent_item_colon" => __( "Parent Custom Tab:", "twentytwenty" ),
    ];

    $args = [
        "label" => __( "Custom Tabs", "twentytwenty" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => false,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => [ "slug" => "custom_tabs", "with_front" => true ],
        "query_var" => true,
        "supports" => [ "title", "editor" ],
        "show_in_graphql" => false,
    ];

    register_post_type( "custom_tabs", $args );
}

add_action( 'init', 'register_custom_tabs' );




add_action('admin_menu', 'add_custom_tabs_post_type');
function add_custom_tabs_post_type()
{

add_submenu_page('learndash-lms', __('Custom Tabs', 'your-plugin-textdomain'), 'Custom Tabs', 'edit_courses', 'edit.php?post_type=custom_tabs');

}


/**
 * Example usage for learndash_content_tabs filter.
 */
add_filter(
    'learndash_content_tabs',
    function( $tabs = array(), $context = '', $course_id = 0, $user_id = 0 ) {
        $post_id = get_the_ID();
        $user_id = get_current_user_id();
        $post_id = 42;
        $meta_query = array(
                'relation' => 'AND',
            );
        // Display user meta
        $meta_query[] = array(
                    'key' => 'display_to',
                    'value' => array('',$user_id),
                    'compare' => 'IN',
                );
        // Display meta context
        $meta_query[] = array(
                    'key' => 'display_on',
                    'value' => array('', $context),
                    'compare' => 'in',
                );
        // Display meta course
        if ($context == 'course') {
            $meta_query[] = array(
                    'key' => 'select_courses',
                    'value' => array('', $post_id),
                    'compare' => 'in',
                );
        }
        if ($context == 'lesson') {
            $meta_query[] = array(
                    'key' => 'select_lessons',
                    'value' => array('', $post_id),
                    'compare' => 'in',
                );
        }
        if ($context == 'topic') {
            $meta_query[] = array(
                    'key' => 'select_topics',
                    'value' => array('', $post_id),
                    'compare' => 'in',
                );
        }
        if ($context == 'quiz') {
            $meta_query[] = array(
                    'key' => 'select_quiz',
                    'value' => array('', $post_id),
                    'compare' => 'exp_in',
                );
        }
        // wp_die();
        $query_args = array(
            'post_type' => 'custom_tabs',
            'post_status' => 'publish',
        );

        $query_args['meta_query'] = $meta_query;
        // The Query
        $the_query = new WP_Query( $query_args );

        // The Loop
        if ( $the_query->have_posts() ) {
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                if ( ! isset( $tabs['tab-'.get_the_ID()] ) ) {
                    $tabs['tab-'.get_the_ID()] = array(
                        'id'      => 'tab-'.get_the_ID(),
                        // The value here is to a CSS class you control to show an icon.
                        'icon'    => get_post_meta(get_the_ID(), 'icon', true),
                        'label'   => get_the_title(),
                        'content' => get_the_content( ),
                    );
                }
            }
            /* Restore original Post Data */
            wp_reset_postdata();
        } else {
            // no posts found
        }

        

        // Always return $tabs.
        return $tabs;
    },
    30,
    4
);

function acf_admin_notice__success() {
    ?>
        <?php if (!is_plugin_active('advanced-custom-fields/acf.php')): ?>
    <div class="notice notice-warning is-dismissible">
            <p><?php _e( 'ACF Plugin Required!'.'<a href="'.admin_url('plugin-install.php').'?s=advanced%20custom%20fields&tab=search&type=term">Install & Activate</a>', 'sample-text-domain' ); ?></p>
            
    </div>
        <?php endif ?>
    <?php
}
add_action( 'admin_notices', 'acf_admin_notice__success' );

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_62171e85e45ae',
    'title' => 'Custom Tab Settings',
    'fields' => array(
        array(
            'key' => 'field_62171e990afa9',
            'label' => 'Display To',
            'name' => 'display_to',
            'type' => 'user',
            'instructions' => 'leave empty to display on all users',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'role' => '',
            'allow_null' => 1,
            'multiple' => 0,
            'return_format' => 'id',
        ),
        array(
            'key' => 'field_62171ec90afaa',
            'label' => 'Display On',
            'name' => 'display_on',
            'type' => 'select',
            'instructions' => 'leave empty to display on all context',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                'course' => 'course',
                'lesson' => 'lesson',
                'topic' => 'topic',
                'quiz' => 'quiz',
            ),
            'default_value' => false,
            'allow_null' => 1,
            'multiple' => 0,
            'ui' => 0,
            'return_format' => 'value',
            'ajax' => 0,
            'placeholder' => '',
        ),
        array(
            'key' => 'field_62171f23cbb7f',
            'label' => 'Select Courses',
            'name' => 'select_courses',
            'type' => 'post_object',
            'instructions' => 'leave empty to display on all courses',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'post_type' => array(
                0 => 'sfwd-courses',
            ),
            'taxonomy' => '',
            'allow_null' => 1,
            'multiple' => 0,
            'return_format' => 'id',
            'ui' => 1,
        ),
        array(
            'key' => 'field_62171f3bcbb80',
            'label' => 'Select Lessons',
            'name' => 'select_lessons',
            'type' => 'post_object',
            'instructions' => 'leave empty to display on all lessons',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'post_type' => array(
                0 => 'sfwd-lessons',
            ),
            'taxonomy' => '',
            'allow_null' => 1,
            'multiple' => 0,
            'return_format' => 'id',
            'ui' => 1,
        ),
        array(
            'key' => 'field_62171f50cbb81',
            'label' => 'Select Topics',
            'name' => 'select_topics',
            'type' => 'post_object',
            'instructions' => 'leave empty to display on all topics',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'post_type' => array(
                0 => 'sfwd-topic',
            ),
            'taxonomy' => '',
            'allow_null' => 1,
            'multiple' => 0,
            'return_format' => 'id',
            'ui' => 1,
        ),
        array(
            'key' => 'field_62171f6acbb82',
            'label' => 'Select Quiz',
            'name' => 'select_quiz',
            'type' => 'post_object',
            'instructions' => 'leave empty to display on all quizes',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'post_type' => array(
                0 => 'sfwd-quiz',
            ),
            'taxonomy' => '',
            'allow_null' => 1,
            'multiple' => 0,
            'return_format' => 'id',
            'ui' => 1,
        ),
        array(
            'key' => 'field_62171f7fcbb83',
            'label' => 'Icon',
            'name' => 'icon',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'custom_tabs',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
));

endif;      
	$plugin->run();

}
run_learndash_custom_tabs();
