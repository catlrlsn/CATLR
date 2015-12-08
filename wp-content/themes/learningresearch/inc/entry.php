<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<article <?php post_class('hentry'); ?> role="article">

	<header class="entry-header">

		<?php if ( get_post_type() == 'event' ) : ?>
		<h5 class="entry-meta"><a href="<?php echo home_url(); ?>/event/">Events</a></h5>
		<?php elseif ( is_single() ) : ?>
		<h5 class="entry-meta"><?php the_category('&nbsp;&nbsp;&gt;&nbsp;&nbsp;', 'multiple'); ?></h5>
		<?php endif; ?>

		<h1 class="entry-title"><?php the_title(); ?></h1>

		<?php if ( get_post_type() == 'post' ) : ?>
		<h5 class="entry-byline"><?php printf(__('
			<time class="updated" datetime="%1$s" pubdate>%2$s</time>
			<!-- | <span class="byline">by %3$s</span>-->
			', 'bonestheme'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), bones_get_the_author_posts_link(), get_the_category_list(', ')); ?>
		</h5>
		<?php endif; ?>

		<?php get_template_part( 'inc/event' ); ?>

	</header><!-- /entry-header" -->

	<section class="entry-content clearfix">
		
			
		<?php if (get_field('register')) : ?>
			<p><a href="<?php the_field('register'); ?>" class="btn btn-default btn-danger">Register</a></p>
		<?php endif; ?>

		<?php the_content(); ?>

		<?php edit_post_link('edit', '<p>', '</p>'); ?>

	</section><!-- /entry-content" -->

</article><!-- /hentry -->
<!-- /#entry-id -->

<?php endwhile; endif; ?>