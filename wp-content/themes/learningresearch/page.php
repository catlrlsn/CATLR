<?php get_header(); ?>


	<div class="container" id="primary" role="main">
		<div class="row">

		    <div class="col-sm-3">

		    	<?php get_sidebar(); ?>

		    </div><!-- /col-sm-3 -->

		    <div class="col-sm-9 resp">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		    	<article <?php post_class('hentry'); ?> id="entry-<?php the_ID(); ?>" role="article">
                    <?php if (has_post_thumbnail()) : ?>
                    <figure class="entry-hero">
                        <?php the_post_thumbnail( 'Full' ); ?>
                    </figure>
                    <?php endif; ?>

		    		<header class="entry-header">
		    			<h1 class="entry-title"><?php the_title(); ?></h1>
		    			<?php if ( get_field('subtitle') ) : ?><h5 class="entry-meta"><?php the_field('subtitle'); ?></h5><?php endif; ?>
		    		</header><!-- /post-header" -->
		    		<!-- /#post-id -->

		    		<section class="entry-content clearfix">
						<?php the_content(); ?>
					</section>
		    		
					<?php edit_post_link('edit', '<footer class="entry-footer"><p>', '</p></footer>'); ?>
				</article><!-- /post -->

				<?php endwhile; endif; ?>

		    </div><!-- /col-sm-9 -->

		</div>
	</div><!-- /container -->
<?php echo(wpb_set_post_views(get_the_ID())); ?>

<?php get_footer(); ?>