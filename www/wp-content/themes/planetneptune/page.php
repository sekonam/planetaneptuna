<?php get_header(); ?>
<?php 
	$arrayID_POST = 	CatCheck();
	$ID_POST	= 		$arrayID_POST['cat'];
	$ACTIVE_MENU = 		$arrayID_POST['selector'];
	$CONTACTS_STATE = "FALSE";
?>
<div <?php if ( in_array($ID_POST, CATEGORIES_ID_SET("CONTACTS")) ){ echo 'id="'.$ACTIVE_MENU.'"'; $CONTACTS_STATE = "TRUE"; } ?> class="single_post">
	<?php if ( (current_user_can('editor')) || (current_user_can('administrator')) ) : ?>
		<a href="<?php echo get_edit_post_link(); ?>" target="_blank"><div class="fp_edit edit_icon"><div></div></div></a>
	<?php endif; ?>
	<?php the_content();?>
	<?php
		if ($CONTACTS_STATE == "TRUE"){
	?>
		<div class="contacts_map">
			<div class="map_container_first">
				<div class="map_address_first"><div class="map_address_content_large"><?php the_field('contact_address_1'); ?></div></div>
				<div class="map_html_first"><?php the_field('contact_map_1'); ?></div>
			</div>
			<div class="map_container_second">
				<div class="map_address_second"><div class="map_address_content_small"><?php the_field('contact_address_2'); ?></div></div>
				<div class="map_html_second"><?php the_field('contact_map_2'); ?></div>
			</div>
			<div class="map_container_second">
				<div class="map_address_second"><div class="map_address_content_small"><?php the_field('contact_address_3'); ?></div></div>
				<div class="map_html_second"><?php the_field('contact_map_3'); ?></div>
			</div>
		</div>
	<?php
		}
	?>
</div>

<?php if ( in_array($ID_POST, CATEGORIES_ID_SET("CALCULATOR")) ){ get_template_part('calculator'); } ?>
<?php if ( in_array($ID_POST, CATEGORIES_ID_SET("CALCULATOR_ADMIN")) ){ get_template_part('calc_admin'); } ?>

<div class="cat_header_div cat_header_navi post_bottom_natigation">
	<div class="readmore_btn">
		<a href="<?php bloginfo( 'url' ); ?>">
			<div class="readmore_icon"></div>
			<p><?php echo mlang_strs(9); ?></p>
		</a>
	</div>
	<?php
		if ($CONTACTS_STATE == "FALSE"){
	?>
		<div class="single_bottom_social_icons"><?php get_template_part('social_links'); ?></div>	
	<?php	
		}
	?>
	<div class="totop_block"><a href="#top"><div class="totop_icon"></div><p><?php echo mlang_strs(14); ?></p></a></div>
</div>
<div class="cat_footer">
	<div class="cat_footer_hspacing cat_footer_billboard"><?php get_template_part('favproject'); ?></div>
	<div class="cat_footer_hspacing cat_footer_news"><?php get_template_part('news'); ?></div>
</div>


<?php get_footer(); ?>