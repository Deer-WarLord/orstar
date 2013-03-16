<?php
	// Initiate Custom Post Type
	add_action('init', 'create_slider');
	function create_slider() {
    	$slider_args = array(
        	'label' => __('Слайдер Stimulus'),
			
        	'singular_label' => __('slider'),
        	'public' => true,
        	'capability_type' => 'post',
        	'hierarchical' => false,
        	'rewrite' => true,
					'menu_icon' => get_stylesheet_directory_uri() . '/assets/images/slider.png',
        	'supports' => array('thumbnail', 'title', 'editor', 'page-attributes')
        );
    	register_post_type('slider',$slider_args);
	}	

	add_action("admin_init", "add_slider");

	// Save Metaboxes
	add_action('save_post', 'update_rotatorlink'); 
	add_action('save_post', 'update_rotator_new_window');                                                 
	add_action('save_post', 'update_rotatormediacontent');
		
	
	// Adds Metaboxes
	function add_slider(){
		add_meta_box("rotatorlink_details", "Добавьте ссылку к этому слайду", "rotatorlink_options", "slider", "normal", "low");  
		add_meta_box("rotatormediacontent_details", "По-желанию: Добавьте видео, которое будет проигрываться, если нажать на этот слайд", "rotatormediacontent_options", "slider", "normal", "low"); 	
	}
	
	
	// Print Metaboxes
	
	// Rotator Link
	function rotatorlink_options(){
		global $post;
 		
		$stimulus_rotatorlink =  get_post_meta($post->ID, 'stimulus_rotatorlink', true);
		$stimulus_new_window = get_post_meta($post->ID, 'stimulus_new_window', true);  
	?>
	<div id="portfolio-options">
		<input name="stimulus_rotatorlink" size="100" value="<?php echo $stimulus_rotatorlink; ?>" /> <input type = "checkbox" <?php if($stimulus_new_window == 'on') echo 'checked'; ?> name = "stimulus_new_window"> Открыть ссылку в новом окне  <br />  
      <p><em>Например: http://www.domain.com/pagename или /about. Если вы ссылаетесь на другой сайт, вы должны включить в ссылку http://</em></p>
	</div><!--end portfolio-options-->   
	<?php
	}
	  
	// Rotator Media
	function rotatormediacontent_options(){
		global $post;

		$stimulus_mediacontent = get_post_meta($post->ID, 'stimulus_mediacontent', true);
	?>
	<div id="portfolio-options">
		<textarea name="stimulus_mediacontent" style = "width: 100%; height: 100px"><?php echo $stimulus_mediacontent; ?></textarea> <br />
        <p><em>Вставьте embed-код с YouTube, Vimeo и пр.</em></p>
	</div><!--end portfolio-options-->   
	<?php
	}
	
	
	// Saves to Post Meta
	function update_rotatorlink(){
		global $post;
		update_post_meta($post->ID, "stimulus_rotatorlink", $_POST["stimulus_rotatorlink"]);
	}  
	
	function update_rotator_new_window(){
		global $post;
		update_post_meta($post->ID, "stimulus_new_window", $_POST["stimulus_new_window"]);
	}     
	
	function update_rotatormediacontent(){
		global $post;
		update_post_meta($post->ID, "stimulus_mediacontent", $_POST["stimulus_mediacontent"]);
	}

?>