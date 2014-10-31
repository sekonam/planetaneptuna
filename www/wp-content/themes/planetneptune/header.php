<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<?php
define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true); define('ICL_DONT_LOAD_NAVIGATION_CSS', true); define('ICL_DONT_LOAD_LANGUAGES_JS', true);
wp_enqueue_style('MainStyle', get_template_directory_uri().'/style.css');
wp_enqueue_style('Calculator', get_template_directory_uri().'/css/style.calc.css');
switch (ICL_LANGUAGE_CODE) {
case "ru": wp_enqueue_style('AddStyleRU', get_template_directory_uri().'/css/style.ru.css'); break;
case "uk": wp_enqueue_style('AddStyleUA', get_template_directory_uri().'/css/style.ua.css'); break;
case "en": wp_enqueue_style('AddStyleEN', get_template_directory_uri().'/css/style.en.css'); break;
case "kk": wp_enqueue_style('AddStyleKZ', get_template_directory_uri().'/css/style.kz.css'); break;
default  : wp_enqueue_style('AddStyleRU', get_template_directory_uri().'/css/style.ru.css'); break;
}
if ( (current_user_can('editor')) || (current_user_can('administrator')) ) : wp_enqueue_style('AdminStyle', get_template_directory_uri().'/css/style.admin.css'); endif;
wp_enqueue_script('jquery');
wp_head();
$SITE_TITLE		  	= mlang_strs(21);
$SITE_DESCRIPTION 	= mlang_strs(22);
$SITE_KEYWORDS 	 	= mlang_strs(23);
$SITE_HEADER_TEXT_1 = mlang_strs(24);
$SITE_HEADER_TEXT_2 = mlang_strs(25);
$SITE_MCONTACT		= mlang_strs(26);
$SITE_FB			= mlang_strs(27);
$SITE_TW			= mlang_strs(28);
$SITE_VK			= mlang_strs(29);
$SITE_RSS			= mlang_strs(30);
?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<meta name="description" content="<?php 
	if (is_page()) { echo $SITE_DESCRIPTION; } 
	else if(is_single()){
		
		// Переменная таже используется для keywords
		$cats = get_the_category($post->ID);
		
		if (in_array($cats[0]->cat_ID, CATEGORIES_ID_SET('DESIGN')) ||
			in_array($cats[0]->cat_ID, CATEGORIES_ID_SET('CONSTRUCTION')) ||
			in_array($cats[0]->cat_ID, CATEGORIES_ID_SET('SERVICE'))){
			foreach (get_the_category() as $category);
			if (get_field('category_description', $post->ID) != ''){ the_field('category_description', $post->ID); } 
			else if ($category->category_description != ''){ echo $category->category_description; } else { echo $SITE_DESCRIPTION; }
		} 
		else if (in_array($cats[0]->cat_ID, CATEGORIES_ID_SET('WORKS')) || in_array($cats[0]->cat_ID, CATEGORIES_ID_SET('NEWS'))){ the_title(); }
	} else if(is_category()){
			
		// Переменная таже используется для keywords
		foreach (get_the_category() as $category);
		
		if ($category->category_description != ''){	echo $category->category_description; } 
		else { echo $SITE_DESCRIPTION; }
	} else { echo $SITE_DESCRIPTION; }
?>" /> 
<meta name="keywords" content="<?php 
	if (is_page()){ echo $SITE_KEYWORDS; }
	else if(is_single()){
		function InSingleKeywords($category_id, $category_name, $currentPostID, $main_keywords){
			if ( in_array($category_id, CATEGORIES_ID_SET($category_name)) ){
				$get_field_post = get_field('content_keywords', $currentPostID);
				// Если на сайт в этот раздел будет добавлена шапка как в других категориях то это условие запилить
				if ($category_name == 'NEWS'){
					if ($get_field_post != ''){
						echo $main_keywords;
					} else {
						echo $main_keywords;
					}
				} else {
					$get_default_post_ID = CATEGORIES_ID_SET($category_name, 'DEFAULT_POST_FOR_META');
					$get_defaul_post_keywords = get_field('content_keywords', $get_default_post_ID);
					if ($get_field_post != ''){
						echo $get_field_post;
					} else if ($get_defaul_post_keywords != ''){
						echo $get_defaul_post_keywords;
					} else {
						echo $main_keywords;
					}
				}
			}
		}
		InSingleKeywords($cats[0]->cat_ID, 'DESIGN', $post->ID, $SITE_KEYWORDS);
		InSingleKeywords($cats[0]->cat_ID, 'CONSTRUCTION', $post->ID, $SITE_KEYWORDS);
		InSingleKeywords($cats[0]->cat_ID, 'SERVICE', $post->ID, $SITE_KEYWORDS);
		InSingleKeywords($cats[0]->cat_ID, 'WORKS', $post->ID, $SITE_KEYWORDS);
		InSingleKeywords($cats[0]->cat_ID, 'NEWS', $post->ID, $SITE_KEYWORDS);
	} else if(is_category()){
		//$CURRENT_CAT_ARRAY = CatCheck();
		//$DefaultPostOfCat = $CURRENT_CAT_ARRAY['header'];
		
		function IsCategoryKeywords(){
			$CurCarArray = get_the_category();
			$CurCatID = $CurCarArray[0]->cat_ID;
			if ( in_array($CurCatID, CATEGORIES_ID_SET('DESIGN')) ){
				return CATEGORIES_ID_SET('DESIGN', 'DEFAULT_POST_FOR_META');
			} 
			else if ( in_array($CurCatID, CATEGORIES_ID_SET('CONSTRUCTION')) ){
				return CATEGORIES_ID_SET('CONSTRUCTION', 'DEFAULT_POST_FOR_META');
			} 
			else if ( in_array($CurCatID, CATEGORIES_ID_SET('SERVICE')) ){
				return CATEGORIES_ID_SET('SERVICE', 'DEFAULT_POST_FOR_META');
			} 
			else if ( in_array($CurCatID, CATEGORIES_ID_SET('WORKS')) ){
				return CATEGORIES_ID_SET('WORKS', 'DEFAULT_POST_FOR_META');
			//} 
			//else if ( in_array($current_cat, CATEGORIES_ID_SET('NEWS')) ){
			//	return '';
			} else {
				return '';
			}
		}
	
		$DefaultPostOfCat = IsCategoryKeywords();
		
		if ( ($DefaultPostOfCat == '') || ($DefaultPostOfCat == null) ){
			echo $SITE_KEYWORDS;
		} else if(get_field('content_keywords', $DefaultPostOfCat) == ''){
			echo $SITE_KEYWORDS;
		} else {
			the_field('content_keywords', $DefaultPostOfCat);
		}
    }
    else { echo $SITE_KEYWORDS; }
?>" /> 
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/script.js"></script>
<?php if ( (current_user_can('editor')) || (current_user_can('administrator')) ) : 	?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/script.admin.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/script.calc.admin.js"></script>
<?php endif; ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/script.calc.js"></script>
<?php if (!is_user_logged_in()) : ?>
<script type="text/javascript">var message="";function clickIE(){if(document.all){(message);return false}}function clickNS(e){if(document.layers||(document.getElementById&&!document.all)){if(e.which==2){(message);return false}}}if(document.layers){document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS}else{document.onmouseup=clickNS;document.oncontextmenu=clickIE}document.oncontextmenu=new Function("return false")</script>
<?php endif; ?>
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.png" type="image/png"/>
<!--Google .ru--><meta name="google-site-verification" content="SxVxsgm9a_FAQF87jWQYS1U98S5YHYHdbHeZZMH1cSk" />
<!--Google .com--><meta name="google-site-verification" content="h-yPQ0YBd7R3Grb8SJ5znWmOMYM_Z9VbFnviySAzdKU" />
<!--Google .kz--><meta name="google-site-verification" content="jYqkg2558JihOFPWIpA7DF-SItnAvZqfFUNLlvINGHg" />
<!--Google .kiev.ua--><meta name="google-site-verification" content="xeMt79PxtJs2jCfpB-CBWt_Nbm1YPP4g1LKJ2ntcIDE" />
<!--Sepyra--><script type="text/javascript"> var Grapery1=window.Grapery1||{sCode:13387};(function($){var d=document,w=window,e="addEventListener",a=d.createElement("script");$.r=!1;a.type="text/javascript";a.async=!0;a.charset="UTF-8";a.src="//storage.sepyra.com/gg1.js";d.getElementsByTagName("head")[0].appendChild(a);d[e]&&d[e]("DOMContentLoaded",function(){if($.r){return;}$.r=!0;w.__gG&&__gG(w);},!1);})(Grapery1); </script>
</head>
<body>
<!-- © <?php echo (date("Y")); ?> <?php echo mlang_strs(10); ?>. <?php echo mlang_strs(11); ?> <?php echo mlang_strs(20); ?> -->
	<div id="main">
		<div id="header">
			<a href="<?php bloginfo('url'); ?>"><div id="logo"></div></a>
			<div id="info">
				<div id="description">
					<div id="dscr_text1"><?php echo $SITE_HEADER_TEXT_1 ?></div>
					<div id="dscr_text2"><?php echo $SITE_HEADER_TEXT_2 ?></div>
				</div>
				<div id="social">
					<a href="<?php echo $SITE_FB; ?>" target="_blank"><div id="fb" class="hover"><div></div></div></a>
					<a href="<?php echo $SITE_TW; ?>" target="_blank"><div id="twitter" class="hover"><div></div></div></a>
					<a href="<?php echo $SITE_VK; ?>" target="_blank"><div id="vk" class="hover"><div></div></div></a>
					<a href="<?php echo $SITE_RSS; ?>" target="_blank"><div id="rss" class="hover"><div></div></div></a>
				</div>
				<div id="contacts">
					<a href="mailto:<?php echo mlang_strs(16); ?>" target="_blank"><div class="main_mail hover"><div></div></div></a>
					<a href="<?php echo menu_href(4); ?>">
					<div id="main_contac">
						<div class="main_tel hover_contact"><div></div></div>
						<div id="tell"><p><?php echo $SITE_MCONTACT; ?></p></div>
					</div>
					</a>
				</div>
				<?php languages_list(); ?>
			</div>
		</div>
		<?php wp_reset_query(); ?>
		<div id="menu">
			<a href="<?php bloginfo('url'); ?>"><div id="item1" class="menu_item"><p><?php echo mlang_strs(3); ?></p></div></a>
			<a href="<?php echo menu_href(0); ?>"><div id="item2" class="menu_item"><p><?php echo mlang_strs(4); ?></p></div></a>
			<a href="<?php echo menu_href(1); ?>"><div id="item3" class="menu_item"><p><?php echo mlang_strs(5); ?></p></div></a>
			<a href="<?php echo menu_href(2); ?>"><div id="item4" class="menu_item"><p><?php echo mlang_strs(6); ?></p></div></a>
			<a href="<?php echo menu_href(3); ?>"><div id="item5" class="menu_item"><p><?php echo mlang_strs(7); ?></p></div></a>
			<a href="<?php echo menu_href(4); ?>"><div id="item6" class="menu_item"><p><?php echo mlang_strs(8); ?></p></div></a>
		</div>
		<div id="content_markup">