		
		<a href="<?php echo menu_href(7); ?>" id="link_posts"><div id="frontpage_news_title">
			<div class="news_area">
				<div class="news_hline_left"></div>
				<div class="news_arrow_left"></div>
				<div class="news_icon"></div>
				<div class="news_text"><p><?php echo mlang_strs(2); ?></p></div>
				<div class="news_arrow_right"></div>
				<div class="news_hline_right"></div>
			</div>
		</div></a>
		<?php 
			$news_counter = 1; 
			query_posts("cat=4&orderby=date&order=DESC&showposts=2");
		    if ( have_posts() ) while ( have_posts() ) : the_post();
		    	if ($news_counter == 1){	
		?>
		<div class="fp_news">
			<?php if ( (current_user_can('editor')) || (current_user_can('administrator')) ) : ?>
				<a href="<?php echo get_edit_post_link(); ?>" target="_blank">
					<div class="fp_edit edit_icon"><div></div></div>
				</a>
			<?php endif; ?>
			<a href="<?php the_permalink(); ?>">
				<div class="fp_news_img" style="background-image: url(<?php the_field('news_image'); ?>);"></div>
			</a>
			<div class="fp_news_title"><p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p></div>
			<div class="fp_news_date"><p><?php the_time('F j, Y'); ?></p></div>
			<a href="<?php the_permalink(); ?>"><div class="fp_news_text"><?php echo hyphen_words(get_field("news_short_text")); ?></div></a>
		</div>
		<div class="fp_news_spacing"></div>
		<?php
			$news_counter++;
			} else {
		?>
		<div class="fp_news">
			<?php if ( (current_user_can('editor')) || (current_user_can('administrator')) ) : ?>
				<a href="<?php echo get_edit_post_link(); ?>" target="_blank">
					<div class="fp_edit edit_icon"><div></div></div>
				</a>
			<?php endif; ?>
			<a href="<?php the_permalink(); ?>">
				<div class="fp_news_img" style="background-image: url(<?php the_field('news_image'); ?>);"></div>
			</a>
			<div class="fp_news_title"><p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p></div>
			<div class="fp_news_date"><p><?php the_time('F j, Y'); ?></p></div>
			<a href="<?php the_permalink(); ?>"><div class="fp_news_text"><?php echo hyphen_words(get_field("news_short_text")); ?></div></a>
		</div>
		<?php
		}
		?>
		<?php endwhile; ?>
		<div id="frontpage_news_more">
			<a href="<?php echo menu_href(7); ?>"><div class="readmore_icon"></div><p><?php echo mlang_strs(1); ?></p></a>
		</div>