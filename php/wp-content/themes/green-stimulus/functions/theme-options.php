<?php

wp_enqueue_script('swfupload-all');
wp_enqueue_script('swfupload-handlers');
wp_enqueue_script('image-edit');
wp_enqueue_script('set-post-thumbnail' );
wp_enqueue_style('imgareaselect');

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_menu' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'stimulus_options', 'stimulus_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_menu() {
	add_theme_page( __( 'Настройки темы' ), __( 'Тема Stimulus' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create arrays for our select and radio options
 */
$style_options = array(
	'green' => array(
		'value' =>	'green',
		'label' => __( 'Зеленая' )
	),
	'brown' => array(
		'value' =>	'brown',
		'label' => __( 'Коричневая и зеленая' )
	),
	'teal' => array(
		'value' => 'teal',
		'label' => __( 'Голубая' )
	)
);

$type_options = array(
	'typography1' => array(
		'value' =>	'typography1',
		'label' => __( 'Helvetica или Arial' )
	),
	'typography2' => array(
		'value' =>	'typography2',
		'label' => __( 'Trebuchet или Verdana' )
	),
	'typography3' => array(
		'value' => 'typography3',
		'label' => __( 'Lucida Grande или Verdana' )
	),
	'typography4' => array(
		'value' => 'typography4',
		'label' => __( 'Georgia или Times New Roman' )
	)
);

$cols_options = array(
		'one-col' => array(
			'value' =>	'one-col',
			'label' => __( 'Одна колонка - Нет сайдбаров' )
		),
		'two-col' => array(
			'value' =>	'two-col',
			'label' => __( 'Две колонки' )
		),
		'three-col' => array(
			'value' => 'three-col',
			'label' => __( 'Три колонки' )
		)
	);

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $style_options, $cols_options, $type_options;

	if ( ! isset( $_REQUEST['updated'] ) )
		$_REQUEST['updated'] = false;

	?>	<div class="wrap">		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Настройки темы' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Настройки сохранены' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'stimulus_options' ); ?>
			<?php $options = get_option( 'stimulus_theme_options' ); ?>
			


		<div style="width: 49%; float: left">
			<div class="postbox metabox-holder" style="padding-top: 0px">
				<h3 class="hndle" style="font-size: 16px; padding: 10px 10px"><span>Бизнес-информация</span></h3>		
				<table class="form-table">
	
					<?php
					/**
					 * Business or Organization Name
					 */
					?>
					<tr valign="top"><th scope="row"><?php _e( 'Название организации' ); ?></th>
						<td>
							<input id="stimulus_theme_options[businessname]" class="regular-text" type="text" name="stimulus_theme_options[businessname]" value="<?php esc_attr_e( $options['businessname'] ); ?>" />
							<br /><label class="description" for="stimulus_theme_options[businessname]"><?php _e( 'Это название будет показано в шапке и в подвале сайта. Вы можете указать другое название для сайта в целом' ); ?></label>
						</td>
					</tr>
					
					<?php
					/**
					 * Street Name
					 */
					?>
					<tr valign="top"><th scope="row"><?php _e( 'Улица, номер дома' ); ?></th>
						<td>
							<input id="stimulus_theme_options[addressline1]" class="regular-text" type="text" name="stimulus_theme_options[addressline1]" value="<?php esc_attr_e( $options['addressline1'] ); ?>" />
							<br /><label class="description" for="stimulus_theme_options[addressline1]"><?php _e( 'Эта строка появится в нижней части сайта. Например, ул. Первого Мая, 4.' ); ?></label>
						</td>
					</tr>
					
					<?php
					/**
					 * City, State, Zip/Postal Code
					 */
					?>
					<tr valign="top"><th scope="row"><?php _e( 'Город, почтовый индекс' ); ?></th>
						<td>
							<input id="stimulus_theme_options[addressline2]" class="regular-text" type="text" name="stimulus_theme_options[addressline2]" value="<?php esc_attr_e( $options['addressline2'] ); ?>" />
							<br /><label class="description" for="stimulus_theme_options[addressline2]"><?php _e( 'Эта строка появиться в нижней части сайта. Например, Москва, 89503' ); ?></label>
						</td>
					</tr>
					
					
					<?php
					/**
					 * Phone Number
					 */
					?>
					<tr valign="top"><th scope="row"><?php _e( 'Номер телефона' ); ?></th>
						<td>
							<input id="stimulus_theme_options[phonenumber]" class="regular-text" type="text" name="stimulus_theme_options[phonenumber]" value="<?php esc_attr_e( $options['phonenumber'] ); ?>" />
							<br /><label class="description" for="stimulus_theme_options[phonenumber]"><?php _e( 'Номер телефона будет показан в нижней части сайта. ' ); ?></label>
						</td>
					</tr>
					
					
						<?php
						/**
						 * Logo URL
						 */
						?>
						<tr valign="top"><th scope="row"><?php _e( 'Ваше лого' ); ?></th>
							<td>
								<input id="stimulus_theme_options[logoaddress]" class="regular-text" type="text" name="stimulus_theme_options[logoaddress]" value="<?php esc_attr_e( $options['logoaddress'] ); ?>" />
								<br /><label class="description" for="stimulus_theme_options[logoaddress]"><?php _e( 'Логотип будет показан в верхней части сайта. Высота логотипа должна быть как минимум 83px. Рекомендуется прозрачный фон, или фон, соответствующий фону сайта. Вы можете загрузить логотип с помощью <a href = "' . get_bloginfo('url') .'/wp-admin/media-new.php" target = "_blank">медиа-загрузчика WordPress</a>.' ); ?></label>
							</td>
						</tr>
					<tr>
						<td colspan="2">
							<p class="submit" style="text-align: center; border-top: 1px #dddddd solid; padding: 10px 0 0 0">
								<input type="submit" class="button-primary" value="<?php _e( 'Сохранить настройки' ); ?>" style="padding: 8px 20px; font-size: 12px !	important"/>
							</p>	
						</td>
					</tr>
					</table>
				</div>
			<div class="postbox metabox-holder" style="padding-top: 0px">
				<h3 class="hndle" style="font-size: 16px; padding: 10px 10px"><span>Социальные сети</span></h3>		
				<table class="form-table">				
	
					</tr>
					
					<?php
					/**
					 * Twitter
					 */
					?>
					<tr valign="top"><th scope="row"><?php _e( 'Twitter' ); ?></th>
						<td>
							<input id="stimulus_theme_options[twitter]" class="regular-text" type="text" name="stimulus_theme_options[twitter]" value="<?php esc_attr_e( $options['twitter'] ); ?>" />
							<br /><label class="description" for="stimulus_theme_options[twitter]"><?php _e( 'Ссылка на профиль в Twitter. Пожалуйста, не включайте символ @ (например: salesforce)' ); ?></label>
						</td>
					</tr>
					
					<?php
					/**
					 * Facebook
					 */
					?>
					<tr valign="top"><th scope="row"><?php _e( 'Facebook' ); ?></th>
						<td>
							<input id="stimulus_theme_options[facebook]" class="regular-text" type="text" name="stimulus_theme_options[facebook]" value="<?php esc_attr_e( $options['facebook'] ); ?>" />
							<br /><label class="description" for="stimulus_theme_options[facebook]"><?php _e( 'Ссылка на профиль в Facebook, окончание после www.facebook.com/ (например: salesforce)' ); ?></label>
						</td>
					</tr>
					
					<?php
					/**
					 * Flickr
					 */
					?>
					<tr valign="top"><th scope="row"><?php _e( 'Flickr' ); ?></th>
						<td>
							<input id="stimulus_theme_options[flickr]" class="regular-text" type="text" name="stimulus_theme_options[flickr]" value="<?php esc_attr_e( $options['flickr'] ); ?>" />
							<br /><label class="description" for="stimulus_theme_options[flickr]"><?php _e( 'Ваше имя в Flickr, окончание после www.flickr.com/ (например: salesforce)' ); ?></label>
						</td>
					</tr>					
					
					<?php
					/**
					 * YouTube
					 */
					?>
					<tr valign="top"><th scope="row"><?php _e( 'YouTube' ); ?></th>
						<td>
							<input id="stimulus_theme_options[youtube]" class="regular-text" type="text" name="stimulus_theme_options[youtube]" value="<?php esc_attr_e( $options['youtube'] ); ?>" />
							<br /><label class="description" for="stimulus_theme_options[youtube]"><?php _e( 'Ваша ссылка в YouTube, окончание после www.youtube.com/ (например: salesforce)' ); ?></label>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<p class="submit" style="text-align: center; border-top: 1px #dddddd solid; padding: 10px 0 0 0">
								<input type="submit" class="button-primary" value="<?php _e( 'Сохранить настройки' ); ?>" style="padding: 8px 20px; font-size: 12px !	important"/>
							</p>	
						</td>
					</tr>
				</table>
			</div>
	</div>
		<div style="width: 49%; float: right">
			<div class="postbox metabox-holder" style="padding-top: 0px">
				<h3 class="hndle" style="font-size: 16px; padding: 10px 10px"><span>Стили темы</span></h3>

			<table class="form-table">
				<tr valign="top"><th scope="row"><?php _e( 'Выберите стиль' ); ?></th>
					<td>
						<select name="stimulus_theme_options[templatestyle]">
							<?php
								$selectedStyle = $options['templatestyle'];
								$p = '';
								$r = '';

								foreach ( $style_options as $option ) {
									$label = $option['label'];
									if ( $selectedStyle == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
						</select>
						<br /><label class="description" for="stimulus_theme_options[templatestyle]"><?php _e( 'Выберите одну из трех цветовых схем' ); ?></label>
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Выберите типографский стиль' ); ?></th>
					<td>
						<select name="stimulus_theme_options[typography]">
							<?php
								$selectedStyle = $options['typography'];
								$p = '';
								$r = '';

								foreach ( $type_options as $option ) {
									$label = $option['label'];
									if ( $selectedStyle == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
						</select>
						<br /><label class="description" for="stimulus_theme_options[typography]"><?php _e( 'Выберите одну из типографских схем' ); ?></label>
					</td>
				</tr>  
				 
				<tr valign="top"><th scope="row"><?php _e( 'Использовать custom.css?' ); ?></th>
				  	 <td>
							<input id="stimulus_theme_options[customcss]" name="stimulus_theme_options[customcss]" type="checkbox" value="1" <?php checked( '1', $options['customcss'] ); ?> />
							<label class="description" for="stimulus_theme_options[customcss]"><?php _e( 'Используйте свои собственные стили, указанные в custom.css' ); ?></label>
						</td>
				</tr>
				
				<?php
				/**
				 * Checkbox to show or hide the blog entries on the home page
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Записи блога' ); ?></th>
					<td>
						<input id="stimulus_theme_options[showPosts]" name="stimulus_theme_options[showPosts]" type="checkbox" value="1" <?php checked( '1', $options['showPosts'] ); ?> />
						<label class="description" for="stimulus_theme_options[showPosts]"><?php _e( 'Показывать на главной' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Checkbox to show or hide dates on blog entries
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Даты записей блога' ); ?></th>
					<td>
						<input id="stimulus_theme_options[showDates]" name="stimulus_theme_options[showDates]" type="checkbox" value="1" <?php checked( '1', $options['showDates'] ); ?> />
						<label class="description" for="stimulus_theme_options[showPosts]"><?php _e( 'Показывать даты для записей' ); ?></label>
					</td>
				</tr>
			

				<?php
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Количество колонок' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Количество колонок' ); ?></span></legend>
						<?php
							if ( ! isset( $checked ) )
								$checked = '';
							foreach ( $cols_options as $option ) {
								$radio_setting = $options['numcols'];

								if ( '' != $radio_setting ) {
									if ( $options['numcols'] == $option['value'] ) {
										$checked = "checked=\"checked\"";
									} else {
										$checked = '';
									}
								}
								?>
								<label class="description"><input type="radio" name="stimulus_theme_options[numcols]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> /> <?php echo $option['label']; ?></label><br />
								<?php
							}
						?>
						</fieldset>
					</td>
				</tr>
					<tr>
						<td colspan="2">
							<p class="submit" style="text-align: center; border-top: 1px #dddddd solid; padding: 10px 0 0 0">
								<input type="submit" class="button-primary" value="<?php _e( 'Сохранить настройки' ); ?>" style="padding: 8px 20px; font-size: 12px !	important"/>
							</p>	
						</td>
					</tr>
			</table>	
		</div>	

		<div class="postbox metabox-holder" style="padding-top: 0px">
			<h3 class="hndle" style="font-size: 16px; padding: 10px 10px"><span>Вступительное слово</span></h3>		
				<?php
				/**
				 * Intro Text
				 */
				?>
			<table class="form-table">					
	
				<tr valign="top"><th scope="row"><?php _e( 'Текст на главной' ); ?></th>
					<td>
						<textarea id="stimulus_theme_options[introtextarea]" class="large-text" cols="50" rows="10" name="stimulus_theme_options[introtextarea]"><?php echo stripslashes( $options['introtextarea'] ); ?></textarea>
						<br /><label class="description" for="stimulus_theme_options[introtextarea]"><?php _e( 'Этот текст будет показан на главной странице' ); ?></label>
					</td>
				</tr>
									<tr>
						<td colspan="2">
							<p class="submit" style="text-align: center; border-top: 1px #dddddd solid; padding: 10px 0 0 0">
								<input type="submit" class="button-primary" value="<?php _e( 'Сохранить настройки' ); ?>" style="padding: 8px 20px; font-size: 12px !	important"/>
							</p>	
						</td>
					</tr>
				
			</table>
		</div>
		
		
		<div class="postbox metabox-holder" style="padding-top: 0px">
			<h3 class="hndle title" style="font-size: 16px; padding: 10px 10px"><span>Слайдер</span></h3>
				<table class="form-table">

					<?php
					/**
					 * Rotator Instructions
					 */
					?>
					<tr valign="top">
						<td>
							<label class="description">Чтобы выбрать изображение и текст, которые будут показаны в слайдах, вам нужно создать слайды в панели Слайдер Stimulus. Изображения должны быть 940 на 340 пикселей. <a href = "<?php bloginfo('url'); ?>/wp-admin/edit.php?post_type=slider" target = "_blank">[Настройка]</a></label>
						</td>
					</tr>    
					<tr valign="top">
							<td><?php _e( 'Автоматическая смена слайдов' ); ?>
								 <select name="stimulus_theme_options[sliderTimer]"> 
									   <option style = "padding-right: 10px;" <?php if($options['sliderTimer'] == 0) echo 'selected'; ?> value = "0">Нет автоматической ротации</option>
									   <option style = "padding-right: 10px;" <?php if($options['sliderTimer'] == 1000) echo 'selected'; ?> value = "1000">1 секунда</option>
									   <option style = "padding-right: 10px;" <?php if($options['sliderTimer'] == 2000) echo 'selected'; ?> value = "2000">2 секунды</option>
									   <option style = "padding-right: 10px;" <?php if($options['sliderTimer'] == 3000) echo 'selected'; ?> value = "3000">3 секунды</option>
									   <option style = "padding-right: 10px;" <?php if($options['sliderTimer'] == 4000) echo 'selected'; ?> value = "4000">4 секунды</option>
									   <option style = "padding-right: 10px;" <?php if($options['sliderTimer'] == 5000) echo 'selected'; ?> value = "5000">5 секунд</option>
									   <option style = "padding-right: 10px;" <?php if($options['sliderTimer'] == 6000) echo 'selected'; ?> value = "6000">6 секунд</option>
									   <option style = "padding-right: 10px;" <?php if($options['sliderTimer'] == 7000) echo 'selected'; ?> value = "7000">7 секунд</option>     
									   <option style = "padding-right: 10px;" <?php if($options['sliderTimer'] == 8000) echo 'selected'; ?> value = "8000">8 секунд</option>
									   <option style = "padding-right: 10px;" <?php if($options['sliderTimer'] == 9000) echo 'selected'; ?> value = "9000">9 секунд</option>
									   <option style = "padding-right: 10px;" <?php if($options['sliderTimer'] == 10000) echo 'selected'; ?> value = "10000">10 секунд</option>
									</select><br />
								<label class="description" for="stimulus_theme_options[sliderTimer]"><?php _e( 'Выберите время в секундах' ); ?></label>
							</td>
						</tr>
					<tr>
						<td colspan="2">
							<p class="submit" style="text-align: center; border-top: 1px #dddddd solid; padding: 10px 0 0 0">
								<input type="submit" class="button-primary" value="<?php _e( 'Сохранить настройки' ); ?>" style="padding: 8px 20px; font-size: 12px !	important"/>
							</p>	
						</td>
					</tr>
				</table>

			</div>

		<div class="postbox metabox-holder" style="padding-top: 0px">
				<h3 class="hndle" style="font-size: 16px; padding: 10px 10px"><span>Виджеты</span></h3>

			<table class="form-table">				
		

				<?php
				/**
				 * Widgets options
				 */
				?>
				<tr valign="top">
					<td>
						<label class="description">Для показа виджетов, настройте их в секции Внешний вид -> Виджеты. <a href = "<?php bloginfo('url'); ?>/wp-admin/widgets.php" target = "_blank">[Настройка]</a></label>
					</td>
				</tr>

			</table>
		</div>
		<div class="postbox metabox-holder" style="padding-top: 0px">
			<h3 class="hndle" style="font-size: 16px; padding: 10px 10px"><span>Меню и навигация</span></h3>

			<table class="form-table">					
				<?php
				/**
				 * Navigation Options
				 */
				?>
				<tr valign="top">
					<td>
						<label class="description">Эта тема поддерживает меню WordPress. Вы можете настроить их в секции Внешний вид -> Меню. <a href = "<?php bloginfo('url'); ?>/wp-admin/nav-menus.php" target = "_blank">[Настройка]</a></label>					</td>
				</tr>
			</table>
		</div>
		</div>
		</div>
		</form>
		</form>
	</div>
	<?php
}
/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $style_options, $cols_options, $type_options;

	if ( ! isset( $input['showPosts'] ) )
		$input['showPosts'] = null;
		$input['showPosts'] = ( $input['showPosts'] == 1 ? 1 : 0 );
		
	if ( ! isset( $input['showDates'] ) )
		$input['showDates'] = null;
		$input['showDates'] = ( $input['showDates'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['customcss'] ) )
		$input['customcss'] = null;
		$input['customcss'] = ( $input['customcss'] == 1 ? 1 : 0 );
                                  
	$input['sliderTimer'] = $input['sliderTimer'];
	$input['twitter'] = wp_filter_nohtml_kses( $input['twitter'] );
	$input['facebook'] = wp_filter_nohtml_kses( $input['facebook'] );
	$input['flickr'] = wp_filter_nohtml_kses( $input['flickr'] );
	$input['foursquare'] = wp_filter_nohtml_kses( $input['foursquare'] );
	$input['youtube'] = wp_filter_nohtml_kses( $input['youtube'] );
	$input['businessname'] = wp_filter_nohtml_kses( $input['businessname'] );
	$input['addressline1'] = wp_filter_nohtml_kses( $input['addressline1'] );
	$input['addressline2'] = wp_filter_nohtml_kses( $input['addressline2'] );
	$input['phonenumber'] = wp_filter_nohtml_kses( $input['phonenumber'] );
	$input['logoaddress'] = wp_filter_nohtml_kses( $input['logoaddress'] );
	$input['rotatorImage'] = wp_filter_nohtml_kses( $input['rotatorImage'] );
	$input['rotatorExcerpt'] = wp_filter_nohtml_kses( $input['rotatorExcerpt'] );
	$input['rotatorHeadline'] = wp_filter_nohtml_kses( $input['rotatorHeadline'] );
	$input['rotatorImage2'] = wp_filter_nohtml_kses( $input['rotatorImage2'] );
	$input['rotatorExcerpt2'] = wp_filter_nohtml_kses( $input['rotatorExcerpt2'] );
	$input['rotatorHeadline2'] = wp_filter_nohtml_kses( $input['rotatorHeadline2'] );
	

	if ( ! array_key_exists( $input['templatestyle'], $style_options ) )
		$input['templatestyle'] = null;

	if ( ! array_key_exists( $input['typography'], $type_options ) )
		$input['typography'] = null;

	if ( ! isset( $input['numcols'] ) )
		$input['numcols'] = null;
	if ( ! array_key_exists( $input['numcols'], $cols_options ) )
		$input['numcols'] = null;

	$input['introtextarea'] = wp_filter_post_kses( $input['introtextarea'] );

	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/