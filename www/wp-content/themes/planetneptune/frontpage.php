<?php 
	$ID_FP_POST1 = 5700;
	$ID_FP_POST2 = 5702;
	$ID_FP_POST3 = 5704;
	$ID_NEWS = 4;
	$ID_BILLBOARD = 95;
?>
<div id="frontpage_column1">
	<div id="frontpage_posts_area_1">
		<?php 
			query_posts("page_id=".$ID_FP_POST1);
		    if ( have_posts() ) while ( have_posts() ) : the_post();
			$cat_link = get_field('fp_to_cat_link');
			$var_banner_img = get_field('post_banner');
			$var_font_size = FixFontSize(get_field('post_font_size_lv1'));
		?>
				<div class="fp_post_large">
					<div class="fp_post_large_img">
						<?php if ( (current_user_can('editor')) || (current_user_can('administrator')) ) : ?>
							<a href="<?php echo get_edit_post_link(); ?>" target="_blank"><div class="fp_edit edit_icon"><div></div></div></a>
						<?php endif; ?>
						<a href="<?php echo $cat_link; ?>">
							<div class="img_large_1" style="background-image: url(<?php the_field('post_image'); ?>);"></div>
							<div class="img_large_2" style="background-image: url(<?php echo $var_banner_img; ?>);"></div>
						</a>
						<div class="banner_state"><?php echo $var_banner_img; ?></div>
					</div>
					<div class="fp_post_large_title">
						<div class="fp_post_large_title_text">
							<div class="fp_post_large_title_top" style="font-size: <?php echo $var_font_size; ?>px; line-height: <?php echo $var_font_size; ?>px;"><?php the_title(); ?></div>
							<div class="fp_post_large_title_bottom"><?php echo hyphen_words(get_the_content()); ?></div>
						</div>	
						<div class="fp_post_more"><a href="<?php echo $cat_link; ?>"><div class="readmore_icon"></div><p><?php echo mlang_strs(0); ?></p></a></div>
					</div>
				</div>
		<?php endwhile; ?>
		<?php 
			query_posts("page_id=".$ID_FP_POST2);
		    if ( have_posts() ) while ( have_posts() ) : the_post();
			$cat_link = get_field('fp_to_cat_link');
			$var_banner_img = get_field('post_banner');
			$var_font_size = FixFontSize(get_field('post_font_size_lv1'));
		?>
			<div class="fp_post_small">
				<div class="fp_post_small_img">
					<?php if ( (current_user_can('editor')) || (current_user_can('administrator')) ) : ?>
						<a href="<?php echo get_edit_post_link(); ?>" target="_blank">
							<div class="fp_edit edit_icon"><div></div></div>
						</a>
					<?php endif; ?>
					<a href="<?php echo $cat_link; ?>">
						<div class="img_small_1" style="background-image: url(<?php the_field('post_image'); ?>);"></div>
						<div class="img_small_2" style="background-image: url(<?php echo $var_banner_img; ?>);"></div>
					</a>
					<div class="banner_state"><?php echo $var_banner_img; ?></div>
				</div>
				<div class="fp_post_small_title">
					<div class="fp_post_small_title_text">
						<div class="fp_post_small_title_top" style="font-size: <?php echo $var_font_size; ?>px; line-height: <?php echo $var_font_size; ?>px;"><?php the_title(); ?></div>
						<div class="fp_post_small_title_bottom"><?php echo hyphen_words(get_the_content()); ?></div>
					</div>	
					<div class="fp_post_more">
						<a href="<?php echo $cat_link; ?>"><div class="readmore_icon"></div><p><?php echo mlang_strs(0); ?></p></a>
					</div>
				</div>
			</div>
			<div class="fp_post_spacing"></div>
		<?php endwhile; ?>
		<?php 
			query_posts("page_id=".$ID_FP_POST3);
		    if ( have_posts() ) while ( have_posts() ) : the_post();
			$cat_link = get_field('fp_to_cat_link');
			$var_banner_img = get_field('post_banner');
			$var_font_size = FixFontSize(get_field('post_font_size_lv1'));
		?>
			<div class="fp_post_small">
				<div class="fp_post_small_img">
					<?php if ( (current_user_can('editor')) || (current_user_can('administrator')) ) : ?>
						<a href="<?php echo get_edit_post_link(); ?>" target="_blank">
							<div class="fp_edit edit_icon"><div></div></div>
						</a>
					<?php endif; ?>
					<a href="<?php echo $cat_link; ?>">
						<div class="img_small_1" style="background-image: url(<?php the_field('post_image'); ?>);"></div>
						<div class="img_small_2" style="background-image: url(<?php echo $var_banner_img; ?>);"></div>
					</a>
					<div class="banner_state"><?php echo $var_banner_img; ?></div>
				</div>
				<div class="fp_post_small_title">
					<div class="fp_post_small_title_text">
						<div class="fp_post_small_title_top" style="font-size: <?php echo $var_font_size; ?>px; line-height: <?php echo $var_font_size; ?>px;"><?php the_title(); ?></div>
						<div class="fp_post_small_title_bottom"><?php echo hyphen_words(get_the_content()); ?></div>
					</div>	
					<div class="fp_post_more">
						<a href="<?php echo $cat_link; ?>"><div class="readmore_icon"></div><p><?php echo mlang_strs(0); ?></p></a>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
  	</div>
	<div id="frontpage_posts_area_2"><?php get_template_part('news'); ?></div>
</div>
<div id="frontpage_column2">
	<?php query_posts("page_id=".$ID_BILLBOARD); ?>
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<?php if ( (current_user_can('editor')) || (current_user_can('administrator')) ) : ?>
			<a href="<?php echo get_edit_post_link(); ?>" target="_blank">
				<div class="fp_edit edit_icon"><div></div></div>
			</a>
		<?php endif; ?>
		<?php the_content(); ?>
	<?php endwhile; ?>
</div>