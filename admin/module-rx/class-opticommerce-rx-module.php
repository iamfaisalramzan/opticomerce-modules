<?php if (!defined('ABSPATH')) { exit; } // Exit if accessed directly

/**
* Opticommerce_CL_Module Class 
* The CL module specific functionality of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Opticommerce_Modules
 * @subpackage Opticommerce_Modules/admin
 */

/**
 * The CL module specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Opticommerce_Modules
 * @subpackage Opticommerce_Modules/admin
 * @author     Faisal Ramzan <faisalpak14@gmail.com>
 */
class Opticommerce_CL_Module {

    /**
     * Save job application meta box.
     * 
     * @since   2.5.0
     * 
     * @param   int     $post_id    Post id
     * @return  void
     */
    public static function sjb_save_jobpost_applicants_meta($post_id) {

        $POST_data = filter_input_array(INPUT_POST);       

        foreach ( $POST_data as $key => $value ) {
            if (strstr($key, 'sjb_jobapp_status')) {
                update_post_meta( $post_id, sanitize_key( $key ), $value );
            }
        }
    }
}