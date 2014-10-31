<?php get_header(); ?>
<?php
	$arrayID_CAT = 	CatCheck();
	$ID_CAT_POST = 	$arrayID_CAT['header'];
	$ID_CAT = 		$arrayID_CAT['cat'];
	$ACTIVE_MENU = 	$arrayID_CAT['selector'];

	if (	
			in_array($ID_CAT, CATEGORIES_ID_SET("DESIGN")) ||
			in_array($ID_CAT, CATEGORIES_ID_SET("CONSTRUCTION")) ||
			in_array($ID_CAT, CATEGORIES_ID_SET("SERVICE"))
		){
		query_posts("page_id=".$ID_CAT_POST);
		if ( have_posts() ) while ( have_posts() ) : the_post();
		$field_font_size = FixFontSize(get_field('post_font_size_lv1'));
?>
	<div id="<?php echo $ACTIVE_MENU; ?>" class="cat_header">
		<div class="cat_header_div cat_header_bg" style="background-image: url(<?php the_field('category_bg_image'); ?>);">
			<?php if ( (current_user_can('editor')) || (current_user_can('administrator')) ) : ?>
				<a href="<?php echo get_edit_post_link(); ?>" title="Редактировать <?php the_title(); ?>" target="_blank">
					<div class="fp_edit edit_icon"><div></div></div>
				</a>
			<?php endif; ?>
		</div>
		<div class="cat_header_div cat_header_content">
			<div class="cat_header_arrow">
				<div class="cat_header_arrow_1"></div>
				<div class="cat_header_arrow_2"></div>
			</div>
			<div class="cat_header_icon" style="background-image: url(<?php the_field('category_icon'); ?>);"></div>
			<div class="cat_header_title">
				<div class="cat_header_title_1_res" style="font-size: <?php echo $field_font_size; ?>px; line-height: <?php echo $field_font_size; ?>px;"><?php the_title(); ?></div>
				<div class="cat_header_title_2"><?php the_content(); ?></div>
			</div>
		</div>
		<div class="cat_header_div cat_header_navi">
			<a href="<?php bloginfo( 'url' ); ?>"><div class="readmore_icon"></div><p><?php echo mlang_strs(9); ?></p></a>
		</div>
	</div>
	<?php endwhile; ?>

	<div class="cat_content">
		<div class="cat_content_column" id="column1">
			<div class="empty_area"></div>
			<?php
				query_posts("cat=".$ID_CAT);
				if ( have_posts() ) while ( have_posts() ) : the_post();
				
					//$post_title				= hyphen_words(get_the_title());
					$post_title				= get_the_title(); 
					$column_var 			= get_field('category_column');
					$img_head_state 		= get_field('category_img_head_state');
					$title_state 			= get_field('category_title_state');
					$description_state 		= get_field('category_description_state');
					$short_story_state 		= get_field('category_short_story_state');
					$category_del_p_state	= get_field('category_del_p_state');
					//$field_post_short_story	= strip_tags(get_field('category_short_content'), '<img>');
					$field_post_short_story	= get_field('category_short_content');
					$field_post_image		= get_field('post_image');
					$field_post_banner		= get_field('post_banner');
					$field_images_height	= get_field('post_images_height'); if (($field_images_height == '') || ($field_images_height == 0)){$field_images_height = 100;}
					$field_post_description	= get_field('category_description');
					$field_prioritty		= get_field('category_priority');
					$field_font_size = FixFontSize(get_field('post_font_size_lv1'));
					
					if ($column_var == 1){ 
			?>
				<div id="<?php echo 'col'.$column_var.'_pos'.$field_prioritty ?>" class="cat_post_container">
					<?php if ( (current_user_can('editor')) || (current_user_can('administrator')) ) : ?>
						<a href="<?php echo get_edit_post_link(); ?>" target="_blank">
							<div class="fp_edit edit_icon"><div></div></div>
						</a>
					<?php endif; ?>
					<?php
						if ((($img_head_state == 'Да') || ($img_head_state == 'Yes') || ($img_head_state == '')) && (($field_post_image != '') || ($field_post_banner != ''))){
					?>
					<div class="cat_post_small_img" style="height: <?php echo $field_images_height; ?>px;">
						<a href="<?php the_permalink(); ?>">
							<div class="cat_img_1" style="background-image: url(<?php echo $field_post_image; ?>); height: <?php echo $field_images_height; ?>px;"></div>
							<div class="cat_img_2" style="background-image: url(<?php echo $field_post_banner; ?>); height: <?php echo $field_images_height; ?>px;"></div>
						</a>
						<div class="banner_state"><?php echo $field_post_banner; ?></div>
					</div>
					<?php
						}
						if (($title_state == 'Да') || ($title_state == 'Yes') || ($title_state == '') ||
							($description_state == 'Да') || ($description_state == 'Yes') || ($description_state == '')){
					?>
					<a href="<?php the_permalink(); ?>">
						<div class="cat_content_header">
							<?php
								if (($title_state == 'Да') || ($title_state == 'Yes') || ($title_state == '')){
							?>
							<p class="cat_content_header_title_res" style="font-size: <?php echo $field_font_size; ?>px; line-height: <?php echo $field_font_size; ?>px;"><?php echo $post_title; ?></p>
							<?php
								}
								if ((($description_state == 'Да') || ($description_state == 'Yes') || ($description_state == '')) && ($field_post_description != '')){
							?>
							<p class="cat_content_header_description <?php if (($title_state == 'Да') || ($title_state == 'Yes')){ echo "cat_content_header_description_spacing";} ?>"><?php echo hyphen_words($field_post_description); ?></p>
							<?php
								}
							?>
						</div>
					</a>
					<?php
						}
						if ((($short_story_state == 'Да') || ($short_story_state == 'Yes') || ($short_story_state == '')) && ($field_post_short_story != '')){
							if ((($category_del_p_state == 'Да') || ($category_del_p_state == 'Yes') || ($category_del_p_state == ''))){
					?>
							<div class="cat_content_text" style="border: none;"><?php echo $field_post_short_story; ?></div>
					<?php
							} else {
					?>
							<a href="<?php the_permalink(); ?>"><div class="cat_content_text"><?php echo hyphen_words($field_post_short_story); ?></div></a>
					<?php			
							}
						}
					?>
				<div class="cat_post_spacing"></div>
				</div>
			<?php
				}
			?>
			<?php endwhile; ?>	
			</div>
			<div class="cat_content_column_spacing"></div>
		<div class="cat_content_column" id="column2">
			<div class="empty_area"></div>
			<?php 
				query_posts("cat=".$ID_CAT);
				if ( have_posts() ) while ( have_posts() ) : the_post();
				
					//$post_title				= hyphen_words(get_the_title());
					$post_title				= get_the_title(); 
					$column_var 			= get_field('category_column');
					$img_head_state 		= get_field('category_img_head_state');
					$title_state 			= get_field('category_title_state');
					$description_state 		= get_field('category_description_state');
					$short_story_state 		= get_field('category_short_story_state');
					$category_del_p_state	= get_field('category_del_p_state');
					$field_post_short_story	= get_field('category_short_content');
					$field_post_image		= get_field('post_image');
					$field_post_banner		= get_field('post_banner');
					$field_images_height	= get_field('post_images_height'); if (($field_images_height == '') || ($field_images_height == 0)){$field_images_height = 100;}
					$field_post_description	= get_field('category_description');
					$field_prioritty		= get_field('category_priority');
					$field_font_size = FixFontSize(get_field('post_font_size_lv1'));
					
					if ($column_var == 2){ 
			?>
				<div id="<?php echo 'col'.$column_var.'_pos'.$field_prioritty ?>" class="cat_post_container">
					<?php if ( (current_user_can('editor')) || (current_user_can('administrator')) ) : ?>
						<a href="<?php echo get_edit_post_link(); ?>" target="_blank">
							<div class="fp_edit edit_icon"><div></div></div>
						</a>
					<?php endif; ?>
					<?php
						if ((($img_head_state == 'Да') || ($img_head_state == 'Yes') || ($img_head_state == '')) && (($field_post_image != '') || ($field_post_banner != ''))){
					?>
					<div class="cat_post_small_img" style="height: <?php echo $field_images_height; ?>px;">
						<a href="<?php the_permalink(); ?>">
							<div class="cat_img_1" style="background-image: url(<?php echo $field_post_image; ?>); height: <?php echo $field_images_height; ?>px;"></div>
							<div class="cat_img_2" style="background-image: url(<?php echo $field_post_banner; ?>); height: <?php echo $field_images_height; ?>px;"></div>
						</a>
						<div class="banner_state"><?php echo $field_post_banner; ?></div>
					</div>
					<?php
						}
						if (($title_state == 'Да') || ($title_state == 'Yes') || ($title_state == '') ||
							($description_state == 'Да') || ($description_state == 'Yes') || ($description_state == '')){
					?>
					<a href="<?php the_permalink(); ?>">
						<div class="cat_content_header">
							<?php
								if (($title_state == 'Да') || ($title_state == 'Yes') || ($title_state == '')){
							?>
							<p class="cat_content_header_title_res" style="font-size: <?php echo $field_font_size; ?>px; line-height: <?php echo $field_font_size; ?>px;"><?php echo $post_title; ?></p>
							<?php
								}
								if ((($description_state == 'Да') || ($description_state == 'Yes') || ($description_state == '')) && ($field_post_description != '')){
							?>
							<p class="cat_content_header_description <?php if (($title_state == 'Да') || ($title_state == 'Yes')){ echo "cat_content_header_description_spacing";} ?>"><?php echo hyphen_words($field_post_description); ?></p>
							<?php
								}
							?>
						</div>
					</a>
					<?php
						}
						if ((($short_story_state == 'Да') || ($short_story_state == 'Yes') || ($short_story_state == '')) && ($field_post_short_story != '')){
							if ((($category_del_p_state == 'Да') || ($category_del_p_state == 'Yes') || ($category_del_p_state == ''))){
					?>
							<div class="cat_content_text" style="border: none;"><?php echo $field_post_short_story; ?></div>
					<?php
							} else {
					?>
							<a href="<?php the_permalink(); ?>"><div class="cat_content_text"><?php echo hyphen_words($field_post_short_story); ?></div></a>
					<?php			
							}
						}
					?>
				<div class="cat_post_spacing"></div>
				</div>
			<?php
				}
			?>
			<?php endwhile; ?>	
			</div>
			<div class="cat_content_column_spacing"></div>
		<div class="cat_content_column" id="column3">
			<div class="empty_area"></div>
			<?php 
				query_posts("cat=".$ID_CAT);
				if ( have_posts() ) while ( have_posts() ) : the_post();
				
					//$post_title				= hyphen_words(get_the_title());
					$post_title				= get_the_title(); 
					$column_var 			= get_field('category_column');
					$img_head_state 		= get_field('category_img_head_state');
					$title_state 			= get_field('category_title_state');
					$description_state 		= get_field('category_description_state');
					$short_story_state 		= get_field('category_short_story_state');
					$category_del_p_state	= get_field('category_del_p_state');
					$field_post_short_story	= get_field('category_short_content');
					$field_post_image		= get_field('post_image');
					$field_post_banner		= get_field('post_banner');
					$field_images_height	= get_field('post_images_height'); if (($field_images_height == '') || ($field_images_height == 0)){$field_images_height = 100;}
					$field_post_description	= get_field('category_description');
					$field_prioritty		= get_field('category_priority');
					$field_font_size = FixFontSize(get_field('post_font_size_lv1'));
		
					if ($column_var == 3){ 
			?>
				<div id="<?php echo 'col'.$column_var.'_pos'.$field_prioritty ?>" class="cat_post_container">
					<?php if ( (current_user_can('editor')) || (current_user_can('administrator')) ) : ?>
						<a href="<?php echo get_edit_post_link(); ?>" target="_blank">
							<div class="fp_edit edit_icon"><div></div></div>
						</a>
					<?php endif; ?>
					<?php
						if ((($img_head_state == 'Да') || ($img_head_state == 'Yes') || ($img_head_state == '')) && (($field_post_image != '') || ($field_post_banner != ''))){
					?>
					<div class="cat_post_small_img" style="height: <?php echo $field_images_height; ?>px;">
						<a href="<?php the_permalink(); ?>">
							<div class="cat_img_1" style="background-image: url(<?php echo $field_post_image; ?>); height: <?php echo $field_images_height; ?>px;"></div>
							<div class="cat_img_2" style="background-image: url(<?php echo $field_post_banner; ?>); height: <?php echo $field_images_height; ?>px;"></div>
						</a>
						<div class="banner_state"><?php echo $field_post_banner; ?></div>
					</div>
					<?php
						}
						if (($title_state == 'Да') || ($title_state == 'Yes') || ($title_state == '') ||
							($description_state == 'Да') || ($description_state == 'Yes') || ($description_state == '')){
					?>
					<a href="<?php the_permalink(); ?>">
						<div class="cat_content_header">
							<?php
								if (($title_state == 'Да') || ($title_state == 'Yes') || ($title_state == '')){
							?>
							<p class="cat_content_header_title_res" style="font-size: <?php echo $field_font_size; ?>px; line-height: <?php echo $field_font_size; ?>px;"><?php echo $post_title; ?></p>
							<?php
								}
								if ((($description_state == 'Да') || ($description_state == 'Yes') || ($description_state == '')) && ($field_post_description != '')){
							?>
							<p class="cat_content_header_description <?php if (($title_state == 'Да') || ($title_state == 'Yes')){ echo "cat_content_header_description_spacing";} ?>"><?php echo hyphen_words($field_post_description); ?></p>
							<?php
								}
							?>
						</div>
					</a>
					<?php
						}
						if ((($short_story_state == 'Да') || ($short_story_state == 'Yes') || ($short_story_state == '')) && ($field_post_short_story != '')){
							if ((($category_del_p_state == 'Да') || ($category_del_p_state == 'Yes') || ($category_del_p_state == ''))){
					?>
							<div class="cat_content_text" style="border: none;"><?php echo $field_post_short_story; ?></div>
					<?php
							} else {
					?>
							<a href="<?php the_permalink(); ?>"><div class="cat_content_text"><?php echo hyphen_words($field_post_short_story); ?></div></a>
					<?php			
							}
						}
					?>
					<div class="cat_post_spacing"></div>
				</div>
				
			<?php
				}
			?>
			<?php endwhile; ?>	
			</div>
	</div>
	<div class="cat_header_div cat_header_navi post_bottom_natigation">
		<a href="<?php bloginfo( 'url' ); ?>"><div class="readmore_icon"></div><p><?php echo mlang_strs(9); ?></p></a>
		<div class="totop_block"><a href="#top"><div class="totop_icon"></div><p><?php echo mlang_strs(14); ?></p></a></div> 
	</div>
	<div class="cat_footer">
		<div class="cat_footer_hspacing cat_footer_billboard"><?php get_template_part('favproject'); ?></div>
		<div class="cat_footer_hspacing cat_footer_news"><?php get_template_part('news'); ?></div>
	</div>	
<?php 
	}
	if (in_array($ID_CAT, CATEGORIES_ID_SET("NEWS"))){
		query_posts("cat=".$ID_CAT);
		if ( have_posts() ) while ( have_posts() ) : the_post();
?>
		<div id="<?php echo $ACTIVE_MENU; ?>" class="news_container">
			<div class="news_date"><?php the_time('F j, Y'); ?></div>
			<div class="news_content">
				<div class="news_content_title">
					<?php if ( (current_user_can('editor')) || (current_user_can('administrator')) ) : ?>
						<a href="<?php echo get_edit_post_link(); ?>" target="_blank">
							<div class="news_edit fp_edit edit_icon"><div></div></div>
						</a>
					<?php endif; ?>
					<a href="<?php the_permalink(); ?>"><p><?php the_title(); ?></p></a>
				</div>
				<div class="news_content_text"><?php the_field('news_short_story'); ?></div>
				<div class="news_content_readmore">
					<div class="readmore_area">
						<a href="<?php the_permalink(); ?>"><p class="read_more_text"><?php echo mlang_strs(0); ?></p><div class="read_more_icon"></div></a>
					</div>
					<div class="news_list_social_icons"><?php get_template_part('social_links'); ?></div>
				</div>
			</div>
		</div>
		<div class="news_space"></div>
		<?php endwhile; ?>
		<div class="cat_header_div cat_header_navi post_bottom_natigation">
			<a href="<?php bloginfo('url'); ?>"><div class="readmore_icon"></div><p><?php echo mlang_strs(9); ?></p></a>
			<div class="totop_block"><a href="#top"><div class="totop_icon"></div><p><?php echo mlang_strs(14); ?></p></a></div> 
		</div>
		
		<div class="cat_footer">
			<div class="cat_footer_hspacing cat_footer_billboard"><?php get_template_part( 'favproject'); ?></div>
			<div class="cat_footer_hspacing cat_footer_news"><?php get_template_part('news'); ?></div>
		</div>	
		
<?php 
	}
	if (in_array($ID_CAT, CATEGORIES_ID_SET("WORKS"))){
		query_posts("page_id=".$ID_CAT_POST);
		if ( have_posts() ) while ( have_posts() ) : the_post();
		$field_font_size = FixFontSize(get_field('post_font_size_lv1'));
		
		$IMG_BG = get_field('category_bg_image');
		$IMG_ICO = get_field('category_icon');
		
		if ($IMG_BG == ''){
			$IMG_BG = get_bloginfo('template_url')."/info_images/cat_bg_test.jpg";
		}
		if ($IMG_ICO == ''){
			$IMG_ICO = get_bloginfo('template_url')."/info_images/cat_ico_test.png";
		}	
		
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
			<div class="cat_header_arrow">
				<div class="cat_header_arrow_1"></div>
				<div class="cat_header_arrow_2"></div>
			</div>
			<div class="cat_header_icon" style="background-image: url(<?php echo $IMG_ICO; ?>);"></div>
			<div class="cat_header_title">
				<div class="cat_header_title_1_res" style="font-size: <?php echo $field_font_size; ?>px; line-height: <?php echo $field_font_size; ?>px;"><?php the_title(); ?></div>
				<div class="cat_header_title_2"><?php the_content(); ?></div>
			</div>
		</div>
		<div class="cat_header_div cat_header_navi">
			<a href="<?php bloginfo('url'); ?>">
				<div class="readmore_icon"></div>
				<p><?php echo mlang_strs(9); ?></p>
			</a>
		</div>
	</div>
<?php 
	endwhile; 
		query_posts("cat=".$ID_CAT);
		if ( have_posts() ) while ( have_posts() ) : the_post();
?>
		<div class="news_space"></div>
		<div class="works_container">
			<div class="works_content">
				<div class="works_content_title">
					<?php if ( (current_user_can('editor')) || (current_user_can('administrator')) ) : ?>
						<a href="<?php echo get_edit_post_link(); ?>" title="Редактировать <?php the_title(); ?>" target="_blank">
							<div class="fp_edit edit_icon"><div></div></div>
						</a>
					<?php endif; ?>
					<a href="<?php the_permalink(); ?>"><p><?php the_title(); ?></p></a>
				</div>
				<div class="works_content_text"><?php the_field("our_prj_short-story"); ?></div>
				<div class="works_content_readmore">
					<div class="readmore_area">
						<a href="<?php the_permalink(); ?>"><p class="read_more_text"><?php echo mlang_strs(0); ?></p><div class="read_more_icon"></div></a>
					</div>
					<div class="works_botom_area">
						<div class="works_list_social_icons"><?php get_template_part('social_links'); ?></div>
						<div class="works_date"><p><?php the_time('F j, Y'); ?></p></div>
					</div>
				</div>
			</div>
		</div>
<?php
	endwhile; 
?>
		<div class="news_space"></div>
		<div class="cat_header_div cat_header_navi post_bottom_natigation">
			<a href="<?php bloginfo('url'); ?>"><div class="readmore_icon"></div><p><?php echo mlang_strs(9); ?></p></a>
			<div class="totop_block"><a href="#top"><div class="totop_icon"></div><p><?php echo mlang_strs(14); ?></p></a></div> 
		</div>
		<div class="cat_footer">
			<div class="cat_footer_hspacing cat_footer_billboard"><?php get_template_part( 'favproject'); ?></div>
			<div class="cat_footer_hspacing cat_footer_news"><?php get_template_part('news'); ?></div>
		</div>
<?php	
	}
?>
<?php get_footer(); ?>