<?php get_header(); ?>


    <section class="container" id="primary" role="main">
		<div class="row">
			<div class="col-lg-8">

		    	<article class="post" id="post-404">
		    		<header class="post-header">
		    			<h5 class="post-meta">Search Results</h5>

						<?php if (is_category()) { ?>
							<h1 class="archive-title">
								<span><?php _e("Posts Categorized:", "bonestheme"); ?></span> <?php single_cat_title(); ?>
							</h1>

						<?php } elseif (is_tag()) { ?>
							<h1 class="archive-title">
								<span><?php _e("Posts Tagged:", "bonestheme"); ?></span> <?php single_tag_title(); ?>
							</h1>

						<?php } elseif (is_author()) {
							global $post;
							$author_id = $post->post_author;
						?>
							<h1 class="archive-title">

								<span><?php _e("Posts By:", "bonestheme"); ?></span> <?php the_author_meta('display_name', $author_id); ?>

							</h1>
						<?php } elseif (is_day()) { ?>
							<h1 class="archive-title">
								<span><?php _e("Daily Archives:", "bonestheme"); ?></span> <?php the_time('l, F j, Y'); ?>
							</h1>

						<?php } elseif (is_month()) { ?>
								<h1 class="archive-title">
									<span><?php _e("Monthly Archives:", "bonestheme"); ?></span> <?php the_time('F Y'); ?>
								</h1>

						<?php } elseif (is_year()) { ?>
								<h1 class="archive-title">
									<span><?php _e("Yearly Archives:", "bonestheme"); ?></span> <?php the_time('Y'); ?>
								</h1>
						<?php } ?>

		    		</header><!-- /post-header -->
				</article><!-- /post -->

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article <?php post_class('post'); ?> id="post-<?php the_ID(); ?>" role="article">
		    		<header class="post-header">
		    			<h2 class="post-title">
		    				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		    			</h2>
		    		</header><!-- /post-header -->

					<section class="post-content">

						<?php the_excerpt('<span class="read-more">' . __('Read more &raquo;', 'bonestheme') . '</span>'); ?>

					</section><!-- /post-content -->

					<?php edit_post_link('edit', '<footer class="post-footer"><p>', '</p></footer>'); ?>
				</article> <!-- /post -->

				<?php endwhile; ?>

					<?php if (function_exists('bones_page_navi')) : ?>

							<?php bones_page_navi(); ?>

					<?php else : ?>
						<nav class="wp-prev-next">
							<ul class="clearfix">
								<li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "bonestheme")) ?></li>
								<li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "bonestheme")) ?></li>
							</ul>
						</nav>
					<?php endif; ?>

				<?php else : ?>

					<article <?php post_class('post'); ?> id="post-<?php the_ID(); ?>" role="article">
			    		<header class="post-header">
			    			<h1 class="post-title">
			    				<?php _e("Sorry, No Results.", "bonestheme"); ?>
			    			</h1>
			    		</header><!-- /post-header -->

						<section class="post-content">

							<p><?php _e("Try your search again.", "bonestheme"); ?></p>

						</section><!-- /post-content -->

						<?php edit_post_link('edit', '<footer class="post-footer"><p>', '</p></footer>'); ?>
					</article> <!-- /post -->

				<?php endif; ?>

			</div>
		</div>
	</section>
	<!-- /#primary -->


<?php get_footer(); ?>