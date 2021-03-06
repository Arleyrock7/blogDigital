<?php global $revalia_codepage;
revalia_set_post_views($post->ID);
$views = revalia_get_post_views(get_the_ID());
$cat = get_queried_object();
$cat_id = $cat->term_id;

//Post Style
$revalia_layoutsidbar = esc_attr($revalia_codepage['layout_sidebar']);
$sidebar_onoff = get_term_meta( $cat_id, 'revalia_category_sidebar_onoff', true );
$category_sidebar_on_off = $sidebar_onoff ? $sidebar_onoff : get_option('revalia_category_sidebar_onoff', 'style1');


if ($revalia_layoutsidbar == 'fullwidth' || $category_sidebar_on_off == 'style2'){ $class_masonry_full = 'col-md-4'; ?>
	<div class="col-sm-6 col-xs-12 masonry-item <?php echo ($class_masonry_full);?>">
	<?php } else { ?>
	<div class="col-sm-6 col-xs-12 masonry-item">
	<?php	} ?>
	<article itemscope itemtype="http://schema.org/Article" <?php post_class('post post-layout-masonry masonry-post'); ?> role="article">
		<figure class="post-image">
			<?php if ( has_post_thumbnail() ) { ?>
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
				<?php the_post_thumbnail('full', array('itemprop'=>'image')); ?>
			</a>
			<?php } ?>
			<div class="post-cat">
				<?php revalia_category_name_color(); ?>
			</div><!-- post-cat -->
		</figure>
		<div class="post-content">
			<div class="post-details">
				<div class="post-share">
					<?php revalia_social_share(); ?>
				</div><!-- post-shear -->
			</div><!-- post-inwrap -->
			<div class="post-title">
				<?php the_title('<h2 class="entry-title" itemprop="name headline"><a href="'.get_permalink().'" title="'.the_title_attribute("echo=0").'">', '</a></h2>'); ?>
			</div><!-- post-title -->
			<div class="post-excerpt">
				<p><?php echo revalia_string_limit_words(get_the_excerpt(), 25);?>&hellip;</p>
			</div> <!-- post-entry -->
			<div class="post-meta-box">
				<ul class="post-meta no-sep">
					<li class="post-date"><?php revalia_post_comments_count(); ?></li>
					<li class="post-date"><i class="icon icon-Time"></i><?php the_time( get_option('date_format') ); ?></li>
					<li class="post-date"><i class="icon icon-Eye"></i><?php echo ($views); ?> <?php echo esc_html__('Views', 'revalia'); ?></li>
				</ul>
			</div><!-- post-meta -->
			<div class="Read-More text-center">
				<a href="<?php the_permalink(); ?>" class="button post-more"><?php esc_html_e('Continue Reading', 'revalia'); ?></a>
			</div>
		</div><!-- post-content -->
	</article>
</div>
