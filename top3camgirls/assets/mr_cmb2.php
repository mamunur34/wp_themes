<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'arielle_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/CMB2/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( get_template_directory() . '/assets/cmb2/init.php' ) ) {
	require_once get_template_directory() . '/assets/cmb2/init.php';
} 

/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' cmb2_box parameter
 *
 * @param  CMB2 $cmb CMB2 object.
 *
 * @return bool      True if metabox should show
 */
function arielle_show_if_front_page( $cmb ) {
	// Don't show this metabox if it's not the front page template.
	if ( get_option( 'page_on_front' ) !== $cmb->object_id ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field $field Field object.
 *
 * @return bool              True if metabox should show
 */
function arielle_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category.
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

/**
 * Manually render a field.
 *
 * @param  array      $field_args Array of field arguments.
 * @param  CMB2_Field $field      The field object.
 */
function arielle_render_row_cb( $field_args, $field ) {
	$classes     = $field->row_classes();
	$id          = $field->args( 'id' );
	$label       = $field->args( 'name' );
	$name        = $field->args( '_name' );
	$value       = $field->escaped_value();
	$description = $field->args( 'description' );
	?>
	<div class="custom-field-row <?php echo esc_attr( $classes ); ?>">
		<p><label for="<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $label ); ?></label></p>
		<p><input id="<?php echo esc_attr( $id ); ?>" type="text" name="<?php echo esc_attr( $name ); ?>" value="<?php echo $value; ?>"/></p>
		<p class="description"><?php echo esc_html( $description ); ?></p>
	</div>
	<?php
}

/**
 * Manually render a field column display.
 *
 * @param  array      $field_args Array of field arguments.
 * @param  CMB2_Field $field      The field object.
 */
function arielle_display_text_small_column( $field_args, $field ) {
	?>
	<div class="custom-column-display <?php echo esc_attr( $field->row_classes() ); ?>">
		<p><?php echo $field->escaped_value(); ?></p>
		<p class="description"><?php echo esc_html( $field->args( 'description' ) ); ?></p>
	</div>
	<?php
}

/**
 * Conditionally displays a message if the $post_id is 2
 *
 * @param  array      $field_args Array of field parameters.
 * @param  CMB2_Field $field      Field object.
 */
function arielle_before_row_if_2( $field_args, $field ) {
	if ( 2 == $field->object_id ) {
		echo '<p>Testing <b>"before_row"</b> parameter (on $post_id 2)</p>';
	} else {
		echo '<p>Testing <b>"before_row"</b> parameter (<b>NOT</b> on $post_id 2)</p>';
	}
}

add_action( 'cmb2_admin_init', 'arielle_register_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function arielle_register_metabox() {
	$prefix = 'custom_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Custom Metabox', 'cmb2' ),
		'object_types'  => array( 'page','post' ), // Post type
		// 'show_on_cb' => 'arielle_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'arielle_add_some_classes', // Add classes through a callback.
	) );

	  
	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Set iframe url', 'cmb2' ),
		'desc' => esc_html__( 'Input iframe url', 'cmb2' ),
		'id'   => $prefix . 'iframe_url',
		'type' => 'text',
                'default' => 'http://awejmp.com/?siteId=jasmin&categoryName=girl&pageName=random&performerName=&prm[psid]=jb0000&prm[pstool]=205_1&prm[psprogram]=revs&prm[campaign_id]=&subAffId={SUBAFFID}'
            
	) );
	  
//	$cmb_demo->add_field( array(
//		'name' => esc_html__( 'Set Banner Image URL', 'cmb2' ),
//		'desc' => esc_html__( 'Input Banner Image URL', 'cmb2' ),
//		'id'   => $prefix . 'banner_img_url',
//		'type' => 'text',
//	) );
    
	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Set Page Custom Headers Height', 'cmb2' ),
		'desc' => esc_html__( 'Set Page Custom Header height in px. Number Only', 'cmb2' ),
		'id'   => $prefix . 'header_height',
		'type' => 'text_medium',
                'default' => '110'
	) );
    
	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Set Call To Action Button Text', 'cmb2' ),
		'desc' => esc_html__( 'Set Call to action Button Text', 'cmb2' ),
		'id'   => $prefix . 'call_to_action_button_text',
		'type' => 'text',
             'default'   => 'Click Here'
	) );
    
	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Set Call To Action Link', 'cmb2' ),
		'desc' => esc_html__( 'Set Call to action Link', 'cmb2' ),
		'id'   => $prefix . 'call_to_action_link',
		'type' => 'text',
	) );
    

    
	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Set custom Header HTML', 'cmb2' ),
		'desc' => esc_html__( 'Set custom Header HTML', 'cmb2' ),
		'id'   => $prefix . 'header_html',
		'type' => 'textarea',
                'default' => '<h1> the test</h1>'
	) );
    	$cmb_demo->add_field( array(
		'name'             => esc_html__( 'Custom HTML/Call To Action', 'cmb2' ),
		'desc'             => esc_html__( 'Alternative choice, Custom html or call to action', 'cmb2' ),
		'id'               => $prefix . 'radio_inline_html_cta',
		'type'             => 'radio_inline',
		//'show_option_none' => 'Default C',
		'options'          => array(
			'cta' => esc_html__( 'Call To Action', 'cmb2' ),
			'html'   => esc_html__( 'HTML', 'cmb2' ), 
		),
                'default' => 'cta',
	) );
 
    
	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Header Background Color', 'cmb2' ),
		'desc' => esc_html__( 'Header Background Color', 'cmb2' ),
		'id'   => $prefix . 'header_bgcolor',
		'type'    => 'colorpicker',
		'default' => '#0086d2',
	) );
    
	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Header Text Color', 'cmb2' ),
		'desc' => esc_html__( 'Header Text Color', 'cmb2' ),
		'id'   => $prefix . 'header_h1_color',
		'type'    => 'colorpicker',
                'default' => '#cdcdcd',
	) );
        
	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Header Text Hover Color', 'cmb2' ),
		'desc' => esc_html__( 'Header Text Hover Color', 'cmb2' ),
		'id'   => $prefix . 'header_h1_hover_color',
		'type'    => 'colorpicker',
                'default' => '#cdcdcd',
	) );
    
	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Footer Background Color', 'cmb2' ),
		'desc' => esc_html__( 'Footer Background Color', 'cmb2' ),
		'id'   => $prefix . 'footer_bgcolor',
		'type'    => 'colorpicker',
                'default' => '#bd0000',
	) );
    
	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Footer copyright text', 'cmb2' ),
		'desc' => esc_html__( 'Footer copyright text', 'cmb2' ),
		'id'   => $prefix . 'footer_copyright',
		'type' => 'text',
             'default'   => '&copy; 2018 '
	) );
    
	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Footer tracking code', 'cmb2' ),
		'desc' => esc_html__( 'Footer tracking code', 'cmb2' ),
		'id'   => $prefix . 'footer_tracking_code',
		'type' => 'text',
	) );
    
	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Additional CSS  code', 'cmb2' ),
		'desc' => esc_html__( 'Additional CSS  code', 'cmb2' ),
		'id'   => $prefix . 'additional_css',
		'type' => 'textarea',
	) );
    
  
    

}
    