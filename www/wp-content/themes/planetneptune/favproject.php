<?php $ID_CUR_PRJ = 6613; ?>
<?php query_posts("page_id=".$ID_CUR_PRJ); ?>
<?php if (have_posts()) while (have_posts()) : the_post(); ?>
<?php 
	$field_images_height = get_field('post_images_height'); if (($field_images_height == '') || ($field_images_height == 0)){$field_images_height = 100;}
	$cat_link_top_prj = get_field('fp_to_cat_link');
	$var_font_size_top_prj = FixFontSize(get_field('post_font_size_lv1'));
?>		
	<div class="cat_post_container">
		<?php if ( (current_user_can('editor')) || (current_user_can('administrator')) ) : ?>
			<a href="/wp-admin/post.php?post=<?php the_id(); ?>&action=edit" target="_blank"><div class="fp_edit edit_icon"><div></div></div></a>
		<?php endif; ?>
		<div class="cat_post_small_img" style="height: <?php echo $field_images_height; ?>px;">
			<a href="<?php echo $cat_link_top_prj; ?>">
				<div class="cat_img_1" style="background-image: url(<?php the_field('post_image'); ?>); height: <?php echo $field_images_height; ?>px;"></div>
				<div class="cat_img_2" style="background-image: url(<?php the_field('post_banner'); ?>); height: <?php echo $field_images_height; ?>px;"></div>
			</a>
			<div class="banner_state"><?php the_field('post_banner'); ?></div>
		</div>
		<a href="<?php echo $cat_link_top_prj; ?>">
			<div class="cat_content_header">
				<p class="cat_content_header_title" style="font-size: <?php echo $var_font_size_top_prj; ?>px; line-height: <?php echo $var_font_size_top_prj; ?>px;"><?php the_title(); ?></p>
				<div class="cat_content_header_description"><?php echo hyphen_words(get_the_content()); ?></div>
			</div>
		</a>
	</div>
<?php endwhile; ?>	