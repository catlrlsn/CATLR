<?php
/*
	Template Name: Conference Interior
*/
?>

<?php get_header(); ?>


	<div class="container" id="primary" role="main">
		<div class="row">
		    <div class="col-lg-12">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		    	<article <?php post_class('hentry'); ?> id="entry-<?php the_ID(); ?>" role="article">
                    <?php get_template_part( 'inc/conference/header' ); ?>

		    		<section class="entry-content">
		    			<div class="row">
						    <div class="col-sm-3">
						    	<?php get_sidebar('conference'); ?>
						    </div><!-- /col-sm-3 -->

						    <div class="col-sm-9">

			                    <?php get_template_part( 'inc/conference/content' ); ?>

							</div>
						</div>
					</section>
		    		
					<?php edit_post_link('edit', '<footer class="entry-footer"><p>', '</p></footer>'); ?>
				</article><!-- /post -->
				<?php endwhile; endif; ?>

		    </div><!-- /col-lg-12 -->

		</div>
	</div><!-- /container -->


<?php get_footer(); ?>