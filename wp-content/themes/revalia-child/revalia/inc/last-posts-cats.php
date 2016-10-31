<?php
function revalia_last_posts_cats($numberOfPosts = 5 , $cats = 1)
{
    global $post;
    $orig_post = $post;

    $lastPosts = get_posts(
        $args = array(
            'numberposts'       => $numberOfPosts,
            'category'          => $cats
        )
    );
?>
<div class="widget-last_categorie">
	<ul>
		<?php
		get_posts('category='.$cats.'&numberposts='.$numberOfPosts);
		foreach($lastPosts as $post): setup_postdata($post);
		?>
			<li>
				<div class="img_last_categorie">
					<a href="<?php the_permalink(); ?>"><?php echo the_post_thumbnail( 'revalia-last-category' ); ?></a>
				</div>
				<div class="con_last_categorie">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<span><?php the_time('F jS, Y'); ?></span>
				</div>
			</li>
		<?php
		endforeach;
		$post = $orig_post;
		?>
	</ul>
</div>

<?php

}
