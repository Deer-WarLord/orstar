<?php
/**
 * Title: Options customizer
 *
 * Description: Defines option fields for theme customizer.
 *
 * Please do not edit this file. This file is part of the Cyber Chimps Framework and all modifications
 * should be made in a child theme.
 *
 * @category Cyber Chimps Framework
 * @package  Framework
 * @since    1.0
 * @author   CyberChimps
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     http://www.cyberchimps.com/
 */

// create the admin menu for the theme options page
add_action('admin_menu', 'cyberchimps_admin_add_customizer_page');
function cyberchimps_admin_add_customizer_page() {
	// add the Customize link to the admin menu
	add_theme_page( __('Customize', 'cyberchimps_core' ), __('Customize', 'cyberchimps_core' ), 'edit_theme_options', 'customize.php' );
}

add_action('customize_register', 'cyberchimps_customize');
function cyberchimps_customize( $wp_customize ) {
	
	//set up defaults if they don't exist. Useful if theme is set up through live preview
	$option_defaults = cyberchimps_get_default_values();
	if( ! get_option( 'cyberchimps_options' ) ) {
		update_option( 'cyberchimps_options', $option_defaults );
	}
	
	class Cyberchimps_Typography_Size extends WP_Customize_Control {
		public $type = 'select';

    public function render_content() {?>
    	<label>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<select <?php $this->link(); ?>>
						<?php
						foreach ( $this->choices as $value => $label )
							echo '<option value="' . esc_attr( $label ) . 'px"' . selected( $this->value(), $value, false ) . '>' . $label . 'px</option>';
						?>
					</select>
				</label>
    <?php
		}
	}
	
	/********** Class for background image option starts *************/
	class Cyberchimps_Background_Image extends WP_Customize_Control {
		public $type = 'radio';

		public function render_content() {?>
			<style>
				.images-radio-subcontainer img {
							margin-top: 5px;
							padding: 2px;
				  border: 5px solid #eee;
				}
				.images-radio-subcontainer img.of-radio-img-selected {
				  border: 5px solid #5DA7F2;
				}
				.images-radio-subcontainer img:hover {
				  cursor: pointer;
				  border: 5px solid #5DA7F2;
				}
			</style>
			<script>
			  jQuery( function($) {							
					$('.of-radio-img-img').click(function(){
						$(this).parent().parent().parent().find('.of-radio-img-img').removeClass('of-radio-img-selected');
						$(this).addClass('of-radio-img-selected');
					});
				});
			</script>
			
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<em><small><?php _e( 'make sure you have removed the image above before selecting one of these', 'cyberchimps_core' ); ?></small></em>
			<?php
			foreach( $this->choices as $value => $label ) :
			
				//if get theme mod background image has a value then we need to set cyberchimps bg to none
				$test_bg = $this->value();
				$test_bg = ( get_theme_mod( 'background_image' ) ) ? 'none' : $test_bg;
				$name = '_customize-radio-' . $this->id;
				$selected = ( $test_bg == $value ) ? 'of-radio-img-selected' : '';
				?>
				<div class="images-radio-subcontainer">
					<label>
						<input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $test_bg, $value ); ?> style="display:none;" />
						<img src="<?php echo esc_html( $label ); ?>" class="of-radio-img-img <?php echo esc_attr( $selected ); ?>" /><br/>
					</label> 
				</div>
			<?php
			endforeach;
		}
	}
	/********** Class for background image option ends *************/

	/********** Class for skin color selection option starts *************/
	class Cyberchimps_skin_selector extends WP_Customize_Control {
		public $type = 'radio';

		public function render_content() {?>
			<style>
				.images-skin-subcontainer {
					display: inline;
				}
				.images-skin-subcontainer img {
					margin-top: 5px;
					padding: 2px;
					border: 5px solid #eee;
					height: 44px;
				}
				.images-skin-subcontainer img.of-radio-img-selected {
					border: 5px solid #5DA7F2;
				}
				.images-skin-subcontainer img:hover {
					cursor: pointer;
					border: 5px solid #5DA7F2;
				}
			</style>
			<script>
			  jQuery( function($) {							
					$('.of-radio-img-img').click(function(){
						$(this).parent().parent().parent().find('.of-radio-img-img').removeClass('of-radio-img-selected');
						$(this).addClass('of-radio-img-selected');
					});
				});
			</script>
			
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php
			foreach( $this->choices as $value => $label ) :
			
				//if get theme mod background image has a value then we need to set cyberchimps bg to none
				$test_skin = $this->value();
				$name = '_customize-radio-' . $this->id;
				$selected = ( $test_skin == $value ) ? 'of-radio-img-selected' : '';
				?>
				<div class="images-skin-subcontainer">
					<label>
						<input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $test_skin, $value ); ?> style="display:none;" />
						<img src="<?php echo esc_html( $label ); ?>" class="of-radio-img-img <?php echo esc_attr( $selected ); ?>" />
					</label> 
				</div>
			<?php
			endforeach;
		}
	}
	/********** Class for skin color selection option ends *************/

	$wp_customize->add_section( 'cyberchimps_design_section', array(
		'title'          => 'Design',
		'priority'       => 35,
	) );

// website width
	$wp_customize->add_setting( 'cyberchimps_options[max_width]', array(
		'default'        => 1020,
		'type'           => 'option',
	) );

	$wp_customize->add_control( 'max_width', array(
		'label'   => __( 'Max Width', 'cyberchimps_core' ),
		'section' => 'cyberchimps_design_section',
		'type'    => 'text',
		'settings'   => 'cyberchimps_options[max_width]',
	) );
	
// theme skin
	$wp_customize->add_setting( 'cyberchimps_options[cyberchimps_skin_color]', array(
			'default'        => array( 'default' => get_template_directory_uri(). '/inc/css/skins/images/default.png' ),
			'type'           => 'option',
		) );
	
	$wp_customize	-> add_control( new Cyberchimps_skin_selector( $wp_customize, 'skin_color', array(
		'label'		=>  __( 'Skin Color', 'cyberchimps_core' ),
		'section'	=> 'cyberchimps_design_section',
		'settings'	=> 'cyberchimps_options[cyberchimps_skin_color]',
		'choices'	=> apply_filters( 'cyberchimps_skin_color', array( 'default' => get_template_directory_uri(). '/inc/css/skins/images/default.png' ) ),
	) ) );
	
	
// text color
	$wp_customize->add_setting( 'cyberchimps_options[text_colorpicker]', array(
			'default'        => '',
			'type'           => 'option',
		) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_colorpicker', array(
    'label'   => __( 'Text Color', 'cyberchimps_core' ),
    'section' => 'cyberchimps_design_section',
    'settings'   => 'cyberchimps_options[text_colorpicker]',
	) ) );
	
// link color
	$wp_customize->add_setting( 'cyberchimps_options[link_colorpicker]', array(
			'default'        => '',
			'type'           => 'option',
		) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_colorpicker', array(
    'label'   => __( 'Link Color', 'cyberchimps_core' ),
    'section' => 'cyberchimps_design_section',
    'settings'   => 'cyberchimps_options[link_colorpicker]',
	) ) );
	
// link hover color
	$wp_customize->add_setting( 'cyberchimps_options[link_hover_colorpicker]', array(
			'default'        => '',
			'type'           => 'option',
		) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_hover_colorpicker', array(
    'label'   => __( 'Link Hover Color', 'cyberchimps_core' ),
    'section' => 'cyberchimps_design_section',
    'settings'   => 'cyberchimps_options[link_hover_colorpicker]',
	) ) );
	
// new typography section
	$wp_customize->add_section( 'cyberchimps_typography_section', array(
		'title'          => 'Typography',
		'priority'       => 40,
	) );
	
	// typography sizes
	$wp_customize->add_setting( 'cyberchimps_options[typography_options][size]', array(
			'default'        => '14px',
			'type'           => 'option',
		) );
	
	$wp_customize->add_control( new Cyberchimps_Typography_Size( $wp_customize, 'typography_size', array(
		'label'   => __( 'Typography Size', 'cyberchimps_core' ),
    'section' => 'cyberchimps_typography_section',
    'type'    => 'select',
		'settings'   => 'cyberchimps_options[typography_options][size]',
    'choices'    => apply_filters( 'cyberchimps_typography_sizes', '' )
  ) ) );
	
 	// typography face
	/* Default font faces */
	$faces = array(
				'Arial, Helvetica, sans-serif'							=> 'Arial',
				'Arial Black, Gadget, sans-serif'					 	=> 'Arial Black',
				'Comic Sans MS, cursive'							 	=> 'Comic Sans MS',
				'Courier New, monospace'							 	=> 'Courier New',
				'Georgia, serif'									 	=> 'Georgia',
				'"HelveticaNeue-Light", "Helvetica Neue Light",
				"Helvetica Neue",Helvetica, Arial, "Lucida Grande",
				sans-serif' 											=> 'Helvetica Neue',
				'Impact, Charcoal, sans-serif'						 	=> 'Impact',
				'Lucida Console, Monaco, monospace'					 	=> 'Lucida Console',
				'Lucida Sans Unicode, Lucida Grande, sans-serif'	 	=> 'Lucida Sans Unicode',
				'"Open Sans", sans-serif'								=> 'Open Sans',
				'Palatino Linotype, Book Antiqua, Palatino, serif'	 	=> 'Palatino Linotype',
				'Tahoma, Geneva, sans-serif'						 	=> 'Tahoma',
				'Times New Roman, Times, serif'						 	=> 'Times New Roman',
				'Trebuchet MS, sans-serif'							 	=> 'Trebuchet MS',
				'Verdana, Geneva, sans-serif'						 	=> 'Verdana',
				'Symbol'											 	=> 'Symbol',
				'Webdings'											 	=> 'Webdings',
				'Wingdings, Zapf Dingbats'							 	=> 'Wingdings',
				'MS Sans Serif, Geneva, sans-serif'					 	=> 'MS Sans Serif',
				'MS Serif, New York, serif'							 	=> 'MS Serif',
			);
	$wp_customize->add_setting( 'cyberchimps_options[typography_options][face]', array(
			'default'        => 'Arial',
			'type'           => 'option',
		) );
	
	$wp_customize->add_control( 'typography_face', array(
		'label'		=> __( 'Typography Face', 'cyberchimps_core' ),
		'section' 	=> 'cyberchimps_typography_section',
		'type'		=> 'select',
		'settings'	=> 'cyberchimps_options[typography_options][face]',
		'choices'	=> apply_filters( 'cyberchimps_typography_faces', $faces )
	  ) );
	// typography style
	$wp_customize->add_setting( 'cyberchimps_options[typography_options][style]', array(
			'default'        => 'normal',
			'type'           => 'option',
		) );
	
	$wp_customize->add_control( 'typography_style', array(
		'label'   => __( 'Typography Style', 'cyberchimps_core' ),
    'section' => 'cyberchimps_typography_section',
    'type'    => 'select',
		'settings'   => 'cyberchimps_options[typography_options][style]',
    'choices'    => apply_filters( 'cyberchimps_typography_styles', '' )
  ) );
	
	// background image
	$wp_customize->add_setting( 'cyberchimps_background', array(
			'default'        => 'none',
			'type'           => 'theme_mod',
		) );
	
	$wp_customize->add_control( new Cyberchimps_Background_Image( $wp_customize, 'cyberchimps_background', array(
    'label'   => 'CyberChimps '. __( 'Background Image', 'cyberchimps_core' ),
    'section' => 'background_image',
    'settings'   => 'cyberchimps_background',
		'choices' => apply_filters( 'cyberchimps_background_image', '' ),
	) ) );
}