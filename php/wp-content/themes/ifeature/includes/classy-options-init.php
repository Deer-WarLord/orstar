<?php
/**
* Initializes the iFeature Theme Options
*
* Author: Tyler Cunningham
* Copyright: © 2011
* {@link http://cyberchimps.com/ CyberChimps LLC}
*
* Released under the terms of the GNU General Public License.
* You should have received a copy of the GNU General Public License,
* along with this software. In the main directory, see: /licensing/
* If not, see: {@link http://www.gnu.org/licenses/}.
*
* @package iFeature
* @since 3.0
*/

require( get_template_directory() . '/core/classy-options/classy-options-framework/classy-options-framework.php');

add_action('init', 'chimps_init_options');

function chimps_init_options() {

global $options, $themeslug, $themename, $themenamefull;
$options = new ClassyOptions($themename, $themenamefull." Настройки");

$terms2 = get_terms('category', 'hide_empty=0');

	$blogoptions = array();
                                    
	$blogoptions['all'] = "Все";

    	foreach($terms2 as $term) {

        	$blogoptions[$term->slug] = $term->name;

        }


$options
		->section("Welcome")
		->info("<h1>iFeature 4</h1>
		
Вы можете обновиться до <div id='upgrade2'><strong><a href='http://cyberchimps.com/ifeaturepro/' target='_blank' class='upgrade'>iFeature Pro 4</a> и получить еще больше восхитительных новых возможностей!</strong></div>


<p>iFeature 4 - это дизайн в стиле Apple (который магически адаптируется для мобильных устройств, таких как iPhone и iPad), слайдер, возможность перетаскивать элементы шапки. Интуитивная панель настроек и код по стандарту HTML5/CSS3.</p>

<p>Чтобы начать, просто выберите в админке секцию Внешний вид - Настройки темы.</p>

<p>Мы постарались сделать тему iFeature 4 настолько простой, насколько возможно, но на всякий случай ознакомьтесь, пожалуйста с <a href='http://cyberchimps.com/ifeature-free/docs/' target='_blank'>документацией</a>, и посетите наш <a href='http://cyberchimps.com/forum/' target='_blank'>форум поддержки</a>.</p>

<p>Спасибо за использование темы iFeature 4.</p>

<p><a href='http://cyberchimps.com' target='_blank'>Тема CyberChimps WordPress</a></p>")
		->section("Design")
		->open_outersection()
			->checkbox($themeslug."_responsive_design", "Поддержка мобильных устройств", array('default' => true))
			->select($themeslug."_color_scheme", "Выберите цветовую схему", array( 'options' => array("grey" => "Серая (по-умолчанию)", "green" => "Зеленая"), 'default' => 'grey'))
		->close_outersection()
		->subsection("Типография")
			->select($themeslug."_font", "Выберите шрифт", array( 'options' => array("Arial" => "Arial (по-умолчанию)", "Courier New" => "Courier New", "Georgia" => "Georgia", "Helvetica" => "Helvetica", "Lucida Grande" => "Lucida Grande", "Tahoma" => "Tahoma", "Times New Roman" => "Times New Roman", "Verdana" => "Verdana", "Maven+Pro" => "Maven Pro", "Ubuntu" => "Ubuntu")))
		->subsection_end()
		->subsection("Фон")
			->images($themeslug."_background_image", "Выберите фон", array( 'options' => array(  'dark' => TEMPLATE_URL . '/images/backgrounds/thumbs/dark.png', 'wood' => TEMPLATE_URL . '/images/backgrounds/thumbs/wood.png', 'default' => TEMPLATE_URL . '/images/backgrounds/thumbs/noise.png'), 'default' => 'default'))
			->checkbox($themeslug."_custom_background", "Отметьте, чтобы использовать свой фон")
			->color($themeslug."_background_color", "Цвет фона")
			->upload($themeslug."_background_upload", "Изображение фона")
			->radio($themeslug."_bg_image_position", "Позиция изображения", array( 'options' => array("top left" => "Left", "top center" => "Center", "top right" => "Right")))
			->radio($themeslug."_bg_image_repeat", "Повтор изображения", array( 'options' => array("repeat" => "Вертикально и горизонтально", "repeat-x" => "Повтор горизонтально", "repeat-y" => "Повтор вертикально", "no-repeat" => "Без повтора")))
			->radio($themeslug."_bg_image_attachment", "Закрепление изображения", array( 'options' => array("scroll" => "Прокрутка", "fixed" => "Фиксировано")))
		->subsection_end()
		->subsection("Пользовательские цвета")
			->color($themeslug."_sitetitle_color", "Цвет заголовка сайта")
			->color($themeslug."_tagline_color", "Цвет описания сайта")
			->color($themeslug."_link_color", "Цвет ссылки")
		->subsection_end()
	->section("Header")
		->open_outersection()
			->section_order("header_section_order", "Перетаскивание элементов шапки", array('options' => array("ifeature_header_content" => "Лого + Иконки", "ifeature_sitename_contact" => "Лого + Контакт", "ifeature_description_icons" => "Описание + Иконки", "ifeature_logo_Description" => "Лого + Описание", "synapse_navigation" => "iMenu"), 'default' => 'ifeature_header_content,synapse_navigation'))
			->upload($themeslug."_banner", "Баннер")
			->textarea($themeslug."_header_contact", "Контактная информация")
		->close_outersection()
		->subsection("Настройки шапки")
			->upload($themeslug."_logo", "Ваше лого")
			->checkbox($themeslug."_enable_header_contact", "Секция контактов в шапке")
			->textarea($themeslug."_header_contact", "Введите контакты")
			->checkbox($themeslug."_show_description", "Показывать описание сайта")
			->upload($themeslug."_favicon", "Favicon сайта")
			->checkbox($themeslug."_disable_breadcrumbs", "Хлебные крошки" , array('default' => true))
		->subsection_end()
		->subsection("Настройки iMenu")
			->select($themeslug."_menu_font", "Выберите шрифт меню", array( 'options' => array("Arial" => "Arial (default)", "Courier New" => "Courier New", "Georgia" => "Georgia", "Helvetica" => "Helvetica", "Lucida Grande" => "Lucida Grande", "Tahoma" => "Tahoma", "Times New Roman" => "Times New Roman", "Verdana" => "Verdana", "Maven+Pro" => "Maven Pro", "Ubuntu" => "Ubuntu")))
			->checkbox($themeslug."_hide_home_icon", "Иконка главной страницы", array('default' => true))
			->checkbox($themeslug."_hide_search", "Строка поиска", array('default' => true))
		
		->subsection_end()
		->subsection("Социальные сети")
			->images($themeslug."_icon_style", "Набор иконок", array( 'options' => array( 'legacy' => TEMPLATE_URL . '/images/social/thumbs/icons-classic.png', 'default' =>
TEMPLATE_URL . '/images/social/thumbs/icons-default.png' ), 'default' => 'default' ) )
			->text($themeslug."_twitter", "Адрес Twitter", array('default' => 'http://twitter.com'))
			->checkbox($themeslug."_hide_twitter_icon", "Спрятать иконку Twitter", array('default' => true))
			->text($themeslug."_facebook", "Адрес Facebook", array('default' => 'http://facebook.com'))
			->checkbox($themeslug."_hide_facebook_icon", "Спрятать иконку Facebook" , array('default' => true))
			->text($themeslug."_gplus", "Адрес Google +", array('default' => 'http://plus.google.com'))
			->checkbox($themeslug."_hide_gplus_icon", "Спрятать иконку Google +" , array('default' => true))
			->text($themeslug."_flickr", "Адрес Flickr", array('default' => 'http://flikr.com'))
			->checkbox($themeslug."_hide_flickr", "Hide Flickr Icon")
			->text($themeslug."_pinterest", "Адрес Pinterest", array('default' => 'http://pinterest.com'))
			->checkbox($themeslug."_hide_pinterest", "Спрятать иконку Pinterest")
			->text($themeslug."_linkedin", "Адрес LinkedIn", array('default' => 'http://linkedin.com'))
			->checkbox($themeslug."_hide_linkedin", "Спрятать иконку LinkedIn")
			->text($themeslug."_youtube", "Адрес YouTube", array('default' => 'http://youtube.com'))
			->checkbox($themeslug."_hide_youtube", "Спрятать иконку YouTube")
			->text($themeslug."_googlemaps", "Адрес Google Maps", array('default' => 'http://maps.google.com'))
			->checkbox($themeslug."_hide_googlemaps", "Спрятать иконку Google maps")
			->text($themeslug."_email", "Адрес Email")
			->checkbox($themeslug."_hide_email", "Спрятать иконку Email")
			->text($themeslug."_rsslink", "Адрес RSS")
			->checkbox($themeslug."_hide_rss_icon", "Спрятать иконку RSS" , array('default' => true))
		->subsection_end()
		->subsection("Статистика")
			->textarea($themeslug."_ga_code", "Код Google Analytics")
		->subsection_end()
	->section("Blog")
		->open_outersection()
			->section_order($themeslug."_blog_section_order", "Перетаскивание элементов", array('options' => array("synapse_index" => "Post Page", "synapse_blog_slider" => "Слайдер iFeature", "synapse_twitterbar_section" => "Блок Twitter", "synapse_product_element" => "Продукт"), "default" => 'synapse_blog_slider,synapse_index'))
		->close_outersection()
		->subsection("Настройки блога")
			->checkbox($themeslug."_post_formats", "Иконка формата записи",  array('default' => true))
			->checkbox($themeslug."_show_excerpts", "Анонс")
			->text($themeslug."_excerpt_link_text", "Текст ссылки Далее", array('default' => 'Далее…'))
			->text($themeslug."_excerpt_length", "Длина анонса", array('default' => '55'))
			->checkbox($themeslug."_show_featured_images", "Разрешить изображения в слайдере")
			->select($themeslug."_featured_image_align", "Расположение картинки", array( 'options' => array("key1" => "Лево", "key2" => "Сентр", "key3" => "Право", "key4" => "Нет")))
			->text($themeslug."_featured_image_height", "Размер изображения", array('default' => '100'))
			->text($themeslug."_featured_image_width", "Ширина изображения", array('default' => '100'))
			->multicheck($themeslug."_hide_byline", "Информация о записи", array( 'options' => array($themeslug."_hide_author" => "Автор" , $themeslug."_hide_categories" => "Рубрика", $themeslug."_hide_date" => "Дата", $themeslug."_hide_comments" => "Комментарии", $themeslug."_hide_share" => "Поделиться", $themeslug."_hide_tags" => "Метки"), 'default' => array( $themeslug."_hide_tags" => true, $themeslug."_hide_share" => true, $themeslug."_hide_author" => true, $themeslug."_hide_date" => true, $themeslug."_hide_comments" => true, $themeslug."_hide_categories" => true ) ) )
			->checkbox($themeslug."_show_fb_like", "Показывать кнопку Facebook Like")
			->checkbox($themeslug."_show_gplus", "Показывать кнопку Google Plus One")
		->subsection_end()
		->subsection("Слайдер блога")
			->select($themeslug.'_slider_category', 'Рубрика для слайдера', array( 'options' => $blogoptions ))
			->text($themeslug."_slider_posts_number", "Количество записей в слайдере")
			->text($themeslug."_slider_delay", "Задержка смены слайдов")
			->checkbox($themeslug."hide_slider_navigation", "Навигация слайдера" , array('default' => true))
		->subsection_end()
		->subsection("Настройки блока Twtter")
			->text($themeslug."_blog_twitter", "Введите свой ник в Twitter")
			->checkbox($themeslug."_blog_twitter_reply", "Показывать ответы")
		->subsection_end()
		->subsection("Настройки продукта")
			->select($themeslug."_blog_product_text_align", "Расположение продукта", array( 'options' => array("key1" => "Текст слева - Картинка справа", "key2" => "Текст справа - Картинка слева")))
			->text($themeslug."_blog_product_title", "Название продукта", array('default' =>'Продукт'))
			->textarea($themeslug."_blog_product_text", "Описание продукта", array('default' => 'Тут может быть описание продукта, меняется в настройках темы. '))
			->select($themeslug."_blog_product_type", "Медиа-тип", array( 'options' => array("key1" => "Картинка", "key2" => "Видео")))
			->upload($themeslug."_blog_product_image", "Изображение продукта", array('default' => array('url' => TEMPLATE_URL . '/images/product.jpg')))
			->textarea($themeslug."_blog_product_video", "Вставка видео")
			->checkbox($themeslug."_blog_product_link_toggle", "Ссылка продукта", array('default' => true))
			->text($themeslug."_blog_product_link_url", "Link", array('default' => home_url()))
			->text($themeslug."_blog_product_link_text", "Text", array('default' => 'Купить сейчас'))
		->subsection_end()
		->subsection("SEO")
			->textarea($themeslug."_home_description", "Описание главной")
			->textarea($themeslug."_home_keywords", "Ключевые слова для главной")
			->text($themeslug."_home_title", "Заголовок для главной (по желанию)")
		->subsection_end()
		->section("Templates")
		->subsection("Одиночная запись")
			->checkbox($themeslug."_single_breadcrumbs", "Хребные крошки", array('default' => true))
			->checkbox($themeslug."_single_show_featured_images", "Избранные изображения")
			->checkbox($themeslug."_single_post_formats", "Иконки формата записи",  array('default' => true))
			->multicheck($themeslug."_single_hide_byline", "Информация о записи", array( 'options' => array($themeslug."_hide_author" => "Автор" , $themeslug."_hide_categories" => "Рубрики", $themeslug."_hide_date" => "Дата", $themeslug."_hide_comments" => "Комментарии", $themeslug."_hide_share" => "Поделиться", $themeslug."_hide_tags" => "Метки"), 'default' => array( $themeslug."_hide_tags" => true, $themeslug."_hide_share" => true, $themeslug."_hide_author" => true, $themeslug."_hide_date" => true, $themeslug."_hide_comments" => true, $themeslug."_hide_categories" => true ) ) )
			->checkbox($themeslug."_single_show_fb_like", "Кнопка Facebook Like")
			->checkbox($themeslug."_single_show_gplus", "Кнопка Google Plus One")
			->checkbox($themeslug."_post_pagination", "Ссылки пагинации для записи",  array('default' => true))
		->subsection_end()	
		->subsection("Архив")
			->checkbox($themeslug."_archive_breadcrumbs", "Хлебные крошки", array('default' => true))
			->checkbox($themeslug."_archive_show_excerpts", "Анонсы", array('default' => true))
			->checkbox($themeslug."_archive_show_featured_images", "Избранные изображения")
			->checkbox($themeslug."_archive_post_formats", "Иконки формата записи",  array('default' => true))
			->multicheck($themeslug."_archive_hide_byline", "Информация о записи", array( 'options' => array($themeslug."_hide_author" => "Автор" , $themeslug."_hide_categories" => "Рубрики", $themeslug."_hide_date" => "Дата", $themeslug."_hide_comments" => "Комментарии", $themeslug."_hide_share" => "Поделиться", $themeslug."_hide_tags" => "Метки"), 'default' => array( $themeslug."_hide_tags" => true, $themeslug."_hide_share" => true, $themeslug."_hide_author" => true, $themeslug."_hide_date" => true, $themeslug."_hide_comments" => true, $themeslug."_hide_categories" => true ) ) )
			->checkbox($themeslug."_archive_show_fb_like", "Кнопка Google Plus One")
			->checkbox($themeslug."_archive_show_gplus", "Кнопка Google Plus One")
			->subsection_end()
		->subsection("Поиск")
			->checkbox($themeslug."_search_show_excerpts", "Анонсы", array('default' => true))
		->subsection_end()
		->subsection("404")
			->textarea($themeslug."_custom_404", "Ваш текст на странице 404")
		->subsection_end()
	->section("Footer")
		->open_outersection()
			->text($themeslug."_footer_text", "Ваш текст в подвале")
		->close_outersection()
	
;
}