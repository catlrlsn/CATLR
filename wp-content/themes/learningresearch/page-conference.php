<?php
/*
Template Name: Conference Overview
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
					    		<header class="entry-header">
					    			<h2 class="entry-title"><b><?php the_title(); ?></b></h2>
					    			<?php
					    			if ( get_field('start_date') ) :
					    				$start_date = DateTime::createFromFormat('Ymd', get_field('start_date'));
					    			?>
					    			<h5 class="entry-meta">
					    				<b><?= $start_date->format('M d, Y'); ?></b>
					    				&bull; <?php the_field('start_time'); ?> - <?php the_field('end_time'); ?>
					    			</h5>
					    			<?php endif; ?>
					    		</header>
					    		<!-- /post-header" --> 

								<?php the_content(); ?>

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