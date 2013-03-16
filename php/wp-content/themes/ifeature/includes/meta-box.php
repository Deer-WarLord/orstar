<?php

/********************* BEGIN DEFINITION OF META BOXES ***********************/

add_action('init', 'initialize_the_meta_boxes');

function initialize_the_meta_boxes() {

	global  $themename, $themeslug, $themenamefull, $options; // call globals.
	
	// Call taxonomies for select options
	
	$terms2 = get_terms('category', 'hide_empty=0');
	$blogoptions = array();
	$blogoptions['all'] = "Все";

		foreach($terms2 as $term) {
			$blogoptions[$term->slug] = $term->name;
		}
	
	// End taxonomy call
	
	$meta_boxes = array();

	$mb = new Chimps_Metabox('post_slide_options', $themenamefull.' Настройки слайдера', array('pages' => array('post')));
	$mb
		->tab("Настройки слайдера")
			->single_image('slider_image', 'Изображение слайдера', '')
			->text('slider_text', 'Текст слайда', 'Введите текст слайда здесь')
			->sliderhelp('', 'Нужна помощь?', '')
		->end();
	
	$mb = new Chimps_Metabox('pages', $themenamefull.' Настройки страницы', array('pages' => array('page')));
	$mb
		->tab("Настройки страницы")
			->image_select('page_sidebar', 'Выберите структуру страницы', '',  array('options' => array(TEMPLATE_URL . '/images/options/right.png', TEMPLATE_URL . '/images/options/none.png')))
			->checkbox('hide_page_title', 'Заголовок страницы', '', array('std' => 'on'))
			->section_order('page_section_order', 'Элементы страницы', '', array('options' => array(
					'breadcrumbs' => 'Хлебные крошки',
					'page_section' => 'Страница',
					'twitterbar_section' => 'Блок Twitter',	
					'product_element' => 'Продукт'		
					),
					'std' => 'breadcrumbs,page_section'
				))
			->pagehelp('', 'Нужна помощь?', '')
		->tab("Настройки Twitter")
			->text('twitter_handle', 'Логин Twitter', 'Введите свой логин в Twitter, чтобы использовать этот блок')
			->checkbox('twitter_reply', 'Показывать ответы', '')
		->tab("Настройки продукта")
			->select('product_text_align', 'Расположение текста', '', array('options' => array('Лево', 'Право')) )
			->text('product_title', 'Название продукта', '', array('std' => 'Продукт'))
			->textarea('product_text', 'Описание продукта', '', array('std' => 'Тут может быть описание продукта. Задайте при редактировании записи.'))
			->select('product_type', 'Медиа-тип', '', array('options' => array('Картинка', 'Видео')) )
			->single_image('product_image', 'Изображение продукта', '', array('std' =>  TEMPLATE_URL . '/images/product.jpg'))
			->textarea('product_video', 'Вставка видео', '')
			->checkbox('product_link_toggle', 'Ссылка на продукт', '', array('std' => 'on'))
			->text('product_link_url', 'Адрес ссылки', '', array('std' => home_url()))
			->text('product_link_text', 'Текст ссылки', '', array('std' => 'Купить сейчас'))
		->tab("Настройки SEO")
			->text('seo_title', 'SEO заголовок', '')
			->textarea('seo_description', 'SEO описание', '')
			->textarea('seo_keywords', 'SEO ключевые слова', '')
			->pagehelp('', 'Нужна помощь?', '')
		->end();

	foreach ($meta_boxes as $meta_box) {
		$my_box = new RW_Meta_Box_Taxonomy($meta_box);
	}

}
