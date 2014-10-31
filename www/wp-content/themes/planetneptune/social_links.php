<?php $soc_permalink = urlencode(get_permalink()); ?>
<div class="social_links">
	<a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo $soc_permalink; ?>&t=<?php the_title(); ?>&src=sp"><div class="social_icon FB_icon"></div></a>
	<a target="_blank" href="http://vkontakte.ru/share.php?url=<?php echo $soc_permalink; ?>"><div class="social_icon VK_icon"></div></a>
	<a target="_blank" href="http://twitter.com/share?url=<?php echo $soc_permalink; ?>&text=<?php the_title(); ?>"><div class="social_icon TW_icon"></div></a>
</div>