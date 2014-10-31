<?php

//DELETE META TAGS FROM WP_HEAD()
	remove_action( 'wp_head', 'feed_links_extra', 3 ); 
	remove_action( 'wp_head', 'feed_links', 2 );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'index_rel_link' );
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); 
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', array($sitepress, 'meta_generator_tag' ) );
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
	//define('WP_DEBUG', true);
	remove_filter( 'the_content', 'wpautop' );
	remove_filter( 'the_excerpt', 'wpautop' );
	remove_filter( 'comment_text', 'wpautop' );
	remove_filter( 'the_content', 'wptexturize' );
	remove_filter( 'term_description','wpautop' ); //delete autoP from category description

// DELETE AUTO <P>
	/*
	function filter_ptags_on_images($content){
	    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
	}
	add_filter('the_content', 'filter_ptags_on_images');
	*/
	
//	TREE TITLES
function pn_wp_title($title){
	/*
	$ID_SITE_INFO = 5235;
	query_posts("page_id=".$ID_SITE_INFO); 
	
	if (have_posts()) while (have_posts()) : the_post();
		$ml_title 			   = get_field('site_title');
	endwhile;
	*/
	$ml_title = mlang_strs(21);
	if ( is_home() || is_front_page() ){
		$title = $ml_title;
	} else {
		$title = "$title".$ml_title;
	}
	return $title;
}
add_filter('wp_title', 'pn_wp_title', 10, 2);

// MENU LINKS
if ( ! function_exists( 'menu_href' ) ) :
function menu_href($cur_href_id){
	$mhref[0] = array("ru" => "/category/design_ru/",
					  "uk" => "/category/design_ua/", 
					  "kk" => "/category/design_kz/", 
					  "en" => "/category/design_en/");
					  
	$mhref[1] = array("ru" => "/category/construction_ru/",
					  "uk" => "/category/construction_ua/", 
					  "kk" => "/category/construction_kz/", 
					  "en" => "/category/construction_en/");
					  
	$mhref[2] = array("ru" => "/category/service_ru/",
					  "uk" => "/category/service_ua/", 
					  "kk" => "/category/service_kz/", 
					  "en" => "/category/service_en/");
					  
	$mhref[3] = array("ru" => "/category/works_ru/",
					  "uk" => "/category/works_ua/", 
					  "kk" => "/category/works_kz/", 
					  "en" => "/category/works_ru/");
					  
	$mhref[4] = array("ru" => "/contacts_info_ru/",
					  "uk" => "/contacts_info_ua/", 
					  "kk" => "/contacts_info_kz/", 
					  "en" => "/contacts_info_en/");
					  
	$mhref[7] = array("ru" => "/category/news_ru/",
					  "uk" => "/category/news_ua/",
					  "kk" => "/category/news_kz/", 
					  "en" => "/category/news_en/");

	switch (ICL_LANGUAGE_CODE){
		case "ru": return $mhref[$cur_href_id]["ru"];  break;
		case "uk": return $mhref[$cur_href_id]["uk"];  break;
		case "kk": return $mhref[$cur_href_id]["kk"];  break;
		case "en": return $mhref[$cur_href_id]["en"];  break;
		default: return $mhref[$cur_href_id]["ru"];  break;
	}
}
endif;
// END

// TEMPLATE STRINGS
if ( ! function_exists( 'mlang_strs' ) ) :
function mlang_strs($cur_str_id){
	$mlang_str[0]  = array( "ru" => "Подробнее...",
						    "uk" => "Докладніше...",
						    "kk" => "Подробнее...",
						    "en" => "Read More...");
						   
	$mlang_str[1]  = array( "ru" => "Другие публикации...",
							"uk" => "Інші публікації...",
							"kk" => "Другие публикации...",
							"en" => "More Posts...");
	
	$mlang_str[2]  = array( "ru" => "Публикации",
							"uk" => "Публікації",
							"kk" => "Публикации",
							"en" => "Publications");
	
	$mlang_str[3]  = array( "ru" => "Домой",
							"uk" => "Додому",
							"kk" => "Домой",
							"en" => "Home");
	
	$mlang_str[4]  = array( "ru" => "Проектирование",
							"uk" => "Проєктування",
							"kk" => "Проектирование","en" => "Design");
	
	$mlang_str[5]  = array( "ru" => "Строительство",
							"uk" => "Будівництво",
							"kk" => "Строительство",
							"en" => "Construction");
	
	$mlang_str[6]  = array( "ru" => "Обслуживание",
							"uk" => "Обслуговування",
							"kk" => "Обслуживание",
							"en" => "Service");
	
	$mlang_str[7]  = array( "ru" => "Наши работы",
							"uk" => "Наші роботи",
							"kk" => "Наши работы",
							"en" => "Our works");
	
	$mlang_str[8]  = array( "ru" => "Контакты",
							"uk" => "Контакти",
							"kk" => "Контакты",
							"en" => "Contacts");
	
	$mlang_str[9]  = array( "ru" => "Назад",
							"uk" => "Назад",
							"kk" => "Назад",
							"en" => "Back");
	
	$mlang_str[10] = array( "ru" => "ПЛАНЕТА НЕПТУНА",
							"uk" => "ПЛАНЕТА НЕПТУНА",
							"kk" => "ПЛАНЕТА НЕПТУНА",
							"en" => "PLANETA NEPTUNA");
	
	$mlang_str[11] = array( "ru" => "Все права защищены.",
							"uk" => "Всі права захищені.",
							"kk" => "Все права защищены.",
							"en" => "All rights reserved.");	
	
	$mlang_str[12] = array( "ru" => "Разработано",
							"uk" => "Розроблено",
							"kk" => "Разработано",
							"en" => "Developed by");
	/*
	$mlang_str[13] = array("ru" => "Изменить информацию сайта (TITLE, DESCRIPTION, KEYWORDS)", 			
						   "uk" => "Изменить информацию сайта (TITLE, DESCRIPTION, KEYWORDS)",
						   "kk" => "Изменить информацию сайта (TITLE, DESCRIPTION, KEYWORDS)",  		
						   "en" => "Изменить информацию сайта (TITLE, DESCRIPTION, KEYWORDS)");
	*/					   
	$mlang_str[14] = array("ru" => "Наверх",
						   "uk" => "Вгору",
						   "kk" => "Наверх",
						   "en" => "Top");

	$mlang_str[15] = array("ru" => "Спасибо что зашли на наш сайт",
						   "uk" => "Дякуємо що зайшли на нашу сторінку",
						   "kk" => "Спасибо что зашли на наш сайт",
						   "en" => "Thank you for visiting our website");
			   
	$mlang_str[16] = array("ru" => "project@planetaneptuna.ru", 	
						   "uk" => "project@planetaneptuna.kiev.ua",
						   "kk" => "project@planetaneptuna.kz",
						   "en" => "project@planetaneptuna.com");
						   
	$mlang_str[17] = array("ru" => "Cтраница не найдена, воспользуйтесь другими ссылками.", 	
						   "uk" => "Сторінка не знайдена, скористайтесь іншими посыланнями.",
						   "kk" => "Cтраница не найдена, воспользуйтесь другими ссылками.",
						   "en" => "Page not found, use the other links.");
						   
	$mlang_str[18] = array("ru" => "http://www.planetaneptuna.ru/sitemap.xml",
						   "uk" => "http://www.planetaneptuna.kiev.ua/sitemap_ua.xml",
						   "kk" => "http://www.planetaneptuna.kz/sitemap_kz.xml",
						   "en" => "http://www.planetaneptuna.com/sitemap_en.xml");
						   
	$mlang_str[19] = array("ru" => "Карта сайта",
						   "uk" => "Мапа сайту",
						   "kk" => "Карта сайта",
						   "en" => "Site Map");
						   
	$mlang_str[20] = array("ru" => "Запрещено использование материалов сайта без согласия его авторов и обратной ссылки.",
						   "uk" => "Заборонено використання матеріалів сайту без згоди його авторів та зворотного посилання.",
						   "kk" => "Запрещено использование материалов сайта без согласия его авторов и обратной ссылки.",
						   "en" => "Website assets usage without permission of authors and references to source is forbidden.");
	// HEADER
	$mlang_str[21] = array("ru" => "Планета Нептуна - строительство, проектирование океанариумов",
						   "uk" => "Планета Нептуна - будівництво, проектування океанаріумів",
						   "kk" => "Планета Нептуна - строительство, проектирование океанариумов",
						   "en" => "Планета Нептуна - строительство, проектирование океанариумов");
	//DESCRIPTION				   
	$mlang_str[22] = array("ru" => "Строительство, проектирование океанариумов. Реализация масштабных проектов с аквариумами уникальных форм и размеров.",
						   "uk" => "Будівництво, проектування океанаріумів. Реалізація масштабних проектів з акваріумами унікальних форм і розмірів.",
						   "kk" => "Строительство, проектирование океанариумов. Реализация масштабных проектов с аквариумами уникальных форм и размеров.",
						   "en" => "Строительство, проектирование океанариумов. Реализация масштабных проектов с аквариумами уникальных форм и размеров.");			
	//KEYWORDS					   
	$mlang_str[23] = array("ru" => "океанариум, дельфинарий, строительство, обслуживание, аквариум, аквариум купить, аквариумы фото, проектирование, декорации, аквариумы на заказ, дизайн аквариума, формы аквариумов, стол аквариум, уход за аквариумом, акриловое стекло, океанариум в москве, акриловые панели, океанариумы россии, московский океанариум, проектно строительная организация, акриловый аквариум",
						   "uk" => "океанариум, океанаріум, дельфинарий, дельфінарій, будівництво, строительство, обслуживание, обслуговування, аквариум, акваріум, аквариум купить, аквариумы фото, проектирование, декорации, аквариумы на заказ, дизайн аквариума, формы аквариумов, стол аквариум, уход за аквариумом, акриловое стекло, акриловые панели, океанариумы мира, проектно строительная организация, акриловый аквариум", 
						   "kk" => "океанариум, дельфинарий, строительство, обслуживание, аквариум, аквариум купить, аквариумы фото, проектирование, декорации, аквариумы на заказ, дизайн аквариума, формы аквариумов, стол аквариум, уход за аквариумом, акриловое стекло, акриловые панели, океанариумы мира, проектно строительная организация, акриловый аквариум",
						   "en" => "oceanarium, dolphinarium, construction, service, aquarium, aquarium buy, aquariums photo, design, decoration, aquariums for order, design aquarium, aquariums form, table aquarium, aquarium care, acrylic glass, acrylic panels, design builder, aquariums world, acrylic aquarium");			
						   
	$mlang_str[24] = array("ru" => "Здесь строят океанариумы",
						   "uk" => "Тут будують океанаріуми",
						   "kk" => "Здесь строят океанариумы",
						   "en" => "Oceanariums are built here!");
						   
	$mlang_str[25] = array("ru" => "Проектно-строительная организация, специализация-океанариумы",
						   "uk" => "Проектно-будівельна організація, спеціалізація-океанаріуми",
						   "kk" => "Проектно-строительная организация, специализация-океанариумы",
						   "en" => "Design & Construction Organization that specializes in oceanariums");
						   
	$mlang_str[26] = array("ru" => 'Москва:  <span style="font-family: Arial;">+</span>7 (495) 783-66-07',
						   "uk" => 'Суми:  <span style="font-family: Arial;">+</span>38 (093) 802-22-33',
						   //"kk" => 'Алматы:  <span style="font-family: Arial;">+</span>7 (727) 243-47-41',
						   "kk" => 'Москва:  <span style="font-family: Arial;">+</span>7 (495) 783-66-07',
						   "en" => 'Moscow:  <span style="font-family: Arial;">+</span>7 (495) 783-66-07');			
						   
	$mlang_str[27] = array("ru" => "http://www.facebook.com/planetaneptuna",
						   "uk" => "http://www.facebook.com/planetaneptuna",
						   "kk" => "http://www.facebook.com/planetaneptuna",
						   "en" => "http://www.facebook.com/planetaneptuna");			
						   
	$mlang_str[28] = array("ru" => "http://twitter.com/planetaneptuna",
						   "uk" => "http://twitter.com/planetaneptuna",
						   "kk" => "http://twitter.com/planetaneptuna",
						   "en" => "http://twitter.com/planetaneptuna");		
						   
	$mlang_str[29] = array("ru" => "http://vk.com/planetaneptuna",
						   "uk" => "http://vk.com/planetaneptuna",
						   "kk" => "http://vk.com/planetaneptuna",
						   "en" => "http://vk.com/planetaneptuna");			
						   
	$mlang_str[30] = array("ru" => "#",
						   "uk" => "#",
						   "kk" => "#",
						   "en" => "#");				   

	switch (ICL_LANGUAGE_CODE) {
		case "ru": return $mlang_str[$cur_str_id]["ru"]; break;
		case "uk": return $mlang_str[$cur_str_id]["uk"]; break;
		case "kk": return $mlang_str[$cur_str_id]["kk"]; break;
		case "en": return $mlang_str[$cur_str_id]["en"]; break;
		//default:   return $mlang_str[$cur_str_id]["ru"]; break;
	}
}
endif;
// END

// LANGUAGE LIST ON FRONT PAGE
if ( ! function_exists( 'languages_list' ) ) :
function languages_list(){
    $languages = icl_get_languages('skip_missing=0&orderby=code');
    if($l['icl_lso_native_lang']){$lang_native_hidden = false;}else{$lang_native_hidden = true;}	
    if($l['icl_lso_display_lang']){$lang_translated_hidden = false;}else{$lang_translated_hidden = true;}    
    if(!empty($languages)){
        echo '<div id="language">';
        foreach($languages as $l){
        	if ($l['language_code'] == ICL_LANGUAGE_CODE){ $lang_selector_active = " menu_item_active"; }
			echo '<div class="lang_item'.$lang_selector_active.'"><a href="'.$l['url'].'"><div id="'.$l['language_code'].'"></div></a></div>';
			$lang_selector_active = '';
        }
        echo '</div>';
    }
}
endif;
// END

// LANG_VIA_ARRAY
if ( ! function_exists('LANG_VIA_POST') ) :
	function LANG_VIA_POST($array_id){
		switch (ICL_LANGUAGE_CODE) {
			case "ru": return $array_id[0]; break;
			case "kk": return $array_id[1]; break;
			case "uk": return $array_id[2]; break;
			case "en": return $array_id[3]; break;
		}
	}
endif;
// END

// LIST ID
if ( ! function_exists('CATEGORIES_ID_SET') ) :
function CATEGORIES_ID_SET($curList, $Default){
	
	switch ($curList){
		
		// CATEGORIES: FIRST ID IS RUSSIAN - Default
		//RU - KZ - UA - EN
		case "DESIGN":			 	$IDsARRAY = array(7, 57, 46, 12); 
									$DefaultPostsIDsARRAY = array(2667, 2670, 2671, 2669);
									switch ($Default){
										case "DEFAULT_CAT": return $IDsARRAY[0]; break;
										case "DEFAULT_POST": return 2667; break;
										case "DEFAULT_POST_FOR_META": $def_post = LANG_VIA_POST($DefaultPostsIDsARRAY); return $def_post; break;
										default: return $IDsARRAY; break;
									} break;
									
		case "CONSTRUCTION":	 	$IDsARRAY = array(8, 58, 48, 13);
									$DefaultPostsIDsARRAY = array(2716, 2719, 2720, 2718); 
									switch ($Default){
										case "DEFAULT_CAT": return $IDsARRAY[0]; break;
										case "DEFAULT_POST": return 2716; break;
										case "DEFAULT_POST_FOR_META": $def_post = LANG_VIA_POST($DefaultPostsIDsARRAY); return $def_post; break;
										default: return $IDsARRAY; break;
									} break;
									
		case "SERVICE":	 			$IDsARRAY = array(5, 56, 44, 10);
									$DefaultPostsIDsARRAY = array(2490, 2494, 2495, 2493);
									switch ($Default){
										case "DEFAULT_CAT": return $IDsARRAY[0]; break;
										case "DEFAULT_POST": return 2490; break;
										case "DEFAULT_POST_FOR_META": $def_post = LANG_VIA_POST($DefaultPostsIDsARRAY); return $def_post; break;
										default: return $IDsARRAY; break;
									} break;
									
		case "WORKS":	 			$IDsARRAY = array(36, 54, 40, 37);
									$DefaultPostsIDsARRAY = array(2618, 2621, 2622, 2620);
									switch ($Default){
										case "DEFAULT_CAT": return $IDsARRAY[0]; break;
										case "DEFAULT_POST": return 2618; break;
										case "DEFAULT_POST_FOR_META": $def_post = LANG_VIA_POST($DefaultPostsIDsARRAY); return $def_post; break;
										default: return $IDsARRAY; break;
									} break;
									
		case "NEWS":	 			$IDsARRAY = array(4, 55, 42, 9); 
									switch ($Default){
										case "DEFAULT_CAT": return $IDsARRAY[0]; break;
										default: return $IDsARRAY; break;
									} break;
									
		// STATIC POSTS
		case "CONTACTS": 			$IDsARRAY = array(6213, 6216, 6217, 6367); 
									switch ($Default){
										case "DEFAULT_POST": return $IDsARRAY[0]; break;
										default: return $IDsARRAY; break;
									} break;
									
		case "CALCULATOR": 			$IDsARRAY = array(6855, 6858, 6859, 6860); 
									switch ($Default){
										case "DEFAULT_POST": return $IDsARRAY[0]; break;
										default: return $IDsARRAY; break;
									} break;
									
		case "CALCULATOR_ADMIN": 	$IDsARRAY = array(6877, 6877, 6877, 6877); 
									switch ($Default){
										case "DEFAULT_POST": return $IDsARRAY[0]; break;
										default: return $IDsARRAY; break;
									} break;
	}
}
endif;
// END

// CATEGORY CHECK
if ( ! function_exists('CatCheck') ) :
function CatCheck(){
	
	if (is_category()){
		
		$current_cat_array = get_the_category();
		$current_cat = $current_cat_array[0]->cat_ID;
				
		if (in_array($current_cat, CATEGORIES_ID_SET("DESIGN"))){
			return array("header" => CATEGORIES_ID_SET("DESIGN", "DEFAULT_POST"), "cat" => $current_cat, "selector" => 'design_active'); break;
		}
		if (in_array($current_cat, CATEGORIES_ID_SET("CONSTRUCTION"))){
			return array("header" => CATEGORIES_ID_SET("CONSTRUCTION", "DEFAULT_POST"), "cat" => $current_cat, "selector" => 'construction_active'); break;
		}
		if (in_array($current_cat, CATEGORIES_ID_SET("SERVICE"))){
			return array("header" => CATEGORIES_ID_SET("SERVICE", "DEFAULT_POST"), "cat" => $current_cat, "selector" => 'service_active'); break;
		}
		if (in_array($current_cat, CATEGORIES_ID_SET("NEWS"))){
			return array("header" => null, "cat" => $current_cat, "selector" => 'news_active'); break;
		}
		if (in_array($current_cat, CATEGORIES_ID_SET("WORKS"))){
			return array("header" => CATEGORIES_ID_SET("WORKS", "DEFAULT_POST"), "cat" => $current_cat, "selector" => 'works_active'); break;
		}
	}
			
	else if (is_single()){
		$current_cat_array = get_the_category();
		$current_cat = $current_cat_array[0]->cat_ID;
		
		if (in_array($current_cat, CATEGORIES_ID_SET("DESIGN"))){
			return array("cat" => $current_cat, "selector" => 'design_active'); break;
		}
		if (in_array($current_cat, CATEGORIES_ID_SET("CONSTRUCTION"))){
			return array("cat" => $current_cat, "selector" => 'construction_active'); break;
		}
		if (in_array($current_cat, CATEGORIES_ID_SET("SERVICE"))){
			return array("cat" => $current_cat, "selector" => 'service_active'); break;
		}
		if (in_array($current_cat, CATEGORIES_ID_SET("WORKS"))){
			return array("cat" => $current_cat, "selector" => 'works_active'); break;
		}
		if (in_array($current_cat, CATEGORIES_ID_SET("NEWS"))){
			return array("cat" => $current_cat, "selector" => 'news_active'); break;
		}
	}

	else if (is_page()){
		$current_page_id = get_the_ID();
		if (in_array($current_page_id, CATEGORIES_ID_SET("CONTACTS"))){
			return array("cat" => $current_page_id, "selector" => 'contacts_active'); break;
		}
		if (in_array($current_page_id, CATEGORIES_ID_SET("CALCULATOR"))){
			return array("cat" => $current_page_id/*, "selector" => 'calculator_active'*/); break;
		}
		if (in_array($current_page_id, CATEGORIES_ID_SET("CALCULATOR_ADMIN"))){
			return array("cat" => $current_page_id/*, "selector" => 'calc_admin_active'*/); break;
		}
	}
}
endif;
// END

// FIX FONT SIZE
if ( ! function_exists('FixFontSize') ) :
function FixFontSize($curSel){
	if ( ($curSel == '') || ($curSel == 0) ){
		return 26;
	} else {
		return $curSel;
	}
}
endif;
// END

/** 
 * Расстановка "мягких" переносов в словах. 
 * Браузеры, которые показывают их: IE 6.0.x, Opera 7.54u2 
 * В Firefox 1.0.4, Opera 7.11 не работает. 
 * Поддерживается текст для русского (UTF-8) и английского языков (ANSI). 
 * 
 * [url]http://shy.dklab.ru/newest/[/url] 
 * Nasibullin Rinat <rin at starlink ru> 
 * ANSI 
 * 2.0.2 
 */ 
if ( ! function_exists('hyphen_words') ) :
function hyphen_words($text){
    #буква (letter) 
    $l = '(?:\xd0[\x90-\xbf\x81]|\xd1[\x80-\x8f\x91]  #А-я (все) 
           | [a-zA-Z] 
           )'; 

    #гласная (vowel) 
    $v = '(?:\xd0[\xb0\xb5\xb8\xbe]|\xd1[\x83\x8b\x8d\x8e\x8f\x91]  #аеиоуыэюяё (гласные) 
           | \xd0[\x90\x95\x98\x9e\xa3\xab\xad\xae\xaf\x81]         #АЕИОУЫЭЮЯЁ (гласные) 
           | (?i:[aeiouy]) 
           )'; 

    #согласная (consonant) 
    $c = '(?:\xd0[\xb1-\xb4\xb6\xb7\xba-\xbd\xbf]|\xd1[\x80\x81\x82\x84-\x89]  #бвгджзклмнпрстфхцчшщ (согласные) 
           | \xd0[\x91-\x94\x96\x97\x9a-\x9d\x9f-\xa2\xa4-\xa9]                #БВГДЖЗКЛМНПРСТФХЦЧШЩ (согласные) 
           | (?i:sh|ch|qu|[bcdfghjklmnpqrstvwxz]) 
           )'; 

    #специальные 
    $x = '(?:\xd0[\x99\xaa\xac\xb9]|\xd1[\x8a\x8c])';   #ЙЪЬйъь (специальные) 

    /* 
    #алгоpитм П.Хpистова в модификации Дымченко и Ваpсанофьева 
    $rules = array( 
        # $1       $2 
        "/($x)     ($l$l)/sx", 
        "/($v)     ($v$l)/sx", 
        "/($v$c)   ($c$v)/sx", 
        "/($c$v)   ($c$v)/sx", 
        "/($v$c)   ($c$c$v)/sx", 
        "/($v$c$c) ($c$c$v)/sx" 
    ); 
    */ 

    #improved rules by D. Koteroff 
    $rules = array( 
        # $1       $2 
        "/($x)     ($l$l)/sx", 
        "/($v$c$c) ($c$c$v)/sx", 
        "/($v$c$c) ($c$v)/sx", 
        "/($v$c)   ($c$c$v)/sx", 
        "/($c$v)   ($c$v)/sx", 
        "/($v$c)   ($c$v)/sx", 
        "/($c$v)   ($v$l)/sx", 
    ); 

    #\xc2\xad = &shy; 
    return preg_replace($rules, "$1\xc2\xad$2", $text);
}
endif;
// END

//SYSTEM SITE INFO
	function usage() {
	printf(('Queries: %d  /  Time: %s'), get_num_queries(), timer_stop(0, 3));
	if ( function_exists('memory_get_usage') ) echo '  /  RAM: '
	. round(memory_get_usage()/1024/1024, 2) . 'MB ';
	}
	add_action('admin_footer_text', 'usage'); 
?>