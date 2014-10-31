<?php get_header(); ?>
<?php
	$arrayID_POST = 	CatCheck();
	$ID_CAT	= 			$arrayID_POST['cat'];
	$ACTIVE_MENU = 		$arrayID_POST['selector'];

	$FindPostState = "FALSE";
	
	if ($FindPostState != "TRUE"){
		if (in_array($ID_CAT, CATEGORIES_ID_SET("DESIGN"))){
			$CatNameUpperCase = "DESIGN"; 
			$FindPostState = "TRUE";
			$SelfNameCatUPPERCASE = "DESIGN";
		}
	}
	
	if ($FindPostState != "TRUE"){
		if (in_array($ID_CAT, CATEGORIES_ID_SET("CONSTRUCTION"))){
			$CatNameUpperCase = "CONSTRUCTION";
			$FindPostState = "TRUE";
			$SelfNameCatUPPERCASE = "CONSTRUCTION";
		}
	}
	
	if ($FindPostState != "TRUE"){
		if (in_array($ID_CAT, CATEGORIES_ID_SET("SERVICE"))){
			$CatNameUpperCase = "SERVICE";
			$FindPostState = "TRUE";
			$SelfNameCatUPPERCASE = "SERVICE";
		}
	}
	
	if ( $FindPostState == "TRUE" ){
?>
	<?php 
		$IMG_BG = get_field('category_bg_image');
		$IMG_ICO = get_field('category_icon');
			
		if (($IMG_BG == '') || ($IMG_ICO == '')){
			$SELF_CAT_ID = CATEGORIES_ID_SET($SelfNameCatUPPERCASE, "DEFAULT_POST");
			if ($IMG_BG == ''){
				$IMG_BG = get_field('category_bg_image', $SELF_CAT_ID);
			}
			if ($IMG_ICO == ''){
				$IMG_ICO = get_field('category_icon', $SELF_CAT_ID);
			}
			if ($IMG_BG == ''){
				$IMG_BG = get_bloginfo('template_url')."/info_images/cat_bg_test.jpg";
			}
			if ($IMG_ICO == ''){
				$IMG_ICO = get_bloginfo('template_url')."/info_images/cat_ico_test.png";
			}
		}
		
		$field_font_size_3 = FixFontSize(get_field('post_font_size_3'));
		$category_link_var = get_category_link($ID_CAT);
	?>
	<div id="<?php echo $ACTIVE_MENU; ?>" class="cat_header">
		<div class="cat_header_div cat_header_bg" style="background-image: url(<?php echo $IMG_BG; ?>);">
			<?php if ( (current_user_can('editor')) || (current_user_can('administrator')) ) : ?>
				<a href="<?php echo get_edit_post_link(); ?>" title="Редактировать <?php the_title(); ?>" target="_blank">
					<div class="fp_edit edit_icon"><div></div></div>
				</a>
			<?php endif; ?>
		</div>
		<div class="cat_header_div cat_header_content">
			<div class="cat_header_arrow"><div class="cat_header_arrow_1"></div><div class="cat_header_arrow_2"></div></div>
			<div class="cat_header_icon" style="background-image: url(<?php echo $IMG_ICO; ?>);"></div>
			<div class="cat_header_title">
				<div class="cat_header_title_1_res" style="font-size: <?php echo $field_font_size_3; ?>px; line-height: <?php echo $field_font_size_3; ?>px;"><?php the_title(); ?></div>
				<div class="cat_header_title_2"><?php the_field('category_description'); ?></div>
			</div>
		</div>
		<div class="cat_header_div cat_header_navi">
			<a href="<?php echo $category_link_var; ?>"><div class="readmore_icon"></div><p><?php echo mlang_strs(9); ?></p></a>	
		</div>
	</div>
	<div class="cat_content"><div class="simple_post"><?php the_content();?></div></div>
	<div class="cat_header_div cat_header_navi post_bottom_natigation">
		<div class="readmore_btn">
			<a href="<?php echo $category_link_var; ?>">
				<div class="readmore_icon"></div>
				<p><?php echo mlang_strs(9); ?></p>
			</a>
		</div>
		<div class="single_bottom_social_icons"><?php get_template_part('social_links'); ?></div>
		<div class="totop_block"><a href="#top"><div class="totop_icon"></div><p><?php echo mlang_strs(14); ?></p></a></div>
	</div>
	<div class="cat_footer">
		<div class="cat_footer_hspacing cat_footer_billboard"><?php get_template_part( 'favproject'); ?></div>
		<div class="cat_footer_hspacing cat_footer_news"><?php get_template_part('news'); ?></div>
	</div>	
<?php
	}
	if ( in_array($ID_CAT, CATEGORIES_ID_SET("NEWS")) ){
	$category_link_var = menu_href(7);
?>
	<div class="cat_header_div cat_header_navi post_bottom_natigation">
		<a href="<?php echo $category_link_var; ?>"><div class="readmore_icon"></div><p><?php echo mlang_strs(1); ?></p></a> 
	</div>
	<p class="simlpe_post_title"><?php the_title();?></p>
	<div id="<?php echo $ACTIVE_MENU; ?>" class="simple_post">
		<?php if ( (current_user_can('editor')) || (current_user_can('administrator')) ) : ?>
			<a href="<?php echo get_edit_post_link(); ?>" target="_blank">
				<div class="fp_edit edit_icon"><div></div></div>
			</a>
		<?php endif; ?>
		<?php the_content();?>
	</div>	
	<div class="cat_header_div cat_header_navi post_bottom_natigation">
		<div class="readmore_btn">
			<a href="<?php echo $category_link_var; ?>">
				<div class="readmore_icon"></div>
				<p><?php echo mlang_strs(9); ?></p>
			</a>
		</div>
		<div class="single_bottom_social_icons"><?php get_template_part('social_links'); ?></div>
		<div class="totop_block"><a href="#top"><div class="totop_icon"></div><p><?php echo mlang_strs(14); ?></p></a></div>
	</div>
	<div class="cat_footer">
		<div class="cat_footer_hspacing cat_footer_billboard"><?php get_template_part( 'favproject'); ?></div>
		<div class="cat_footer_hspacing cat_footer_news"><?php get_template_part('news'); ?></div>
	</div>	
<?php	
	}
	if ( in_array($ID_CAT, CATEGORIES_ID_SET("WORKS")) ){
?>
	<?php 
		$IMG_BG = get_field('category_bg_image');
		$IMG_ICO = get_field('category_icon');
		if (($IMG_BG == '') || ($IMG_ICO == '')){
			$SELF_CAT_ID = CATEGORIES_ID_SET("WORKS", "DEFAULT_POST");
			if ($IMG_BG == ''){
				$IMG_BG = get_field('category_bg_image', $SELF_CAT_ID);
			}
			if ($IMG_ICO == ''){
				$IMG_ICO = get_field('category_icon', $SELF_CAT_ID);
			}
			if ($IMG_BG == ''){
				$IMG_BG = get_bloginfo('template_url')."/info_images/cat_bg_test.jpg";
			}
			if ($IMG_ICO == ''){
				$IMG_ICO = get_bloginfo('template_url')."/info_images/cat_ico_test.png";
			}
			
		}
		$field_font_size_3 = FixFontSize(get_field('post_font_size_3'));
		$category_link_var = menu_href(3);
	?>
	<div id="<?php echo $ACTIVE_MENU; ?>" class="cat_header">
		<div class="cat_header_div cat_header_bg" style="background-image: url(<?php echo $IMG_BG; ?>);">
			<?php if ( (current_user_can('editor')) || (current_user_can('administrator')) ) : ?>
				<a href="<?php echo get_edit_post_link(); ?>" title="Редактировать <?php the_title(); ?>" target="_blank">
					<div class="fp_edit edit_icon"><div></div></div>
				</a>
			<?php endif; ?>
		</div>
		<div class="cat_header_div cat_header_content">
			<div class="cat_header_arrow"><div class="cat_header_arrow_1"></div><div class="cat_header_arrow_2"></div></div>
			<div class="cat_header_icon" style="background-image: url(<?php echo $IMG_ICO; ?>);"></div>
			<div class="cat_header_title">
				<div class="cat_header_title_1_res" style="font-size: <?php echo $field_font_size_3; ?>px; line-height: <?php echo $field_font_size_3; ?>px;"><?php the_title(); ?></div>
				<div class="cat_header_title_2"><?php the_field('category_description'); ?></div>
			</div>
		</div>
		<div class="cat_header_div cat_header_navi">
			<a href="<?php echo $category_link_var; ?>"><div class="readmore_icon"></div><p><?php echo mlang_strs(9); ?></p></a>
		</div>
	</div>
	
	<div class="cat_content"><div class="simple_post"><?php the_content();?></div></div>
	<div class="cat_header_div cat_header_navi post_bottom_natigation">
		<div class="readmore_btn">
			<a href="<?php echo $category_link_var; ?>">
				<div class="readmore_icon"></div>
				<p><?php echo mlang_strs(9); ?></p>
			</a>
		</div>
		<div class="single_bottom_social_icons"><?php get_template_part('social_links'); ?></div>
		<div class="totop_block"><a href="#top"><div class="totop_icon"></div><p><?php echo mlang_strs(14); ?></p></a></div>
	</div>
	<div class="cat_footer">
		<div class="cat_footer_hspacing cat_footer_billboard"><?php get_template_part('favproject'); ?></div>
		<div class="cat_footer_hspacing cat_footer_news"><?php get_template_part('news'); ?></div>
	</div>
<?php	
	}
?>
<?php get_footer(); ?>