<?php get_header(); ?>


    <section class="container" id="primary" role="main">
		<div class="row">
			<div class="col-lg-8">

		    	<article class="post" id="post-404" role="404">
		    		<header class="post-header">
		    			<h5 class="post-meta">404 Error</h5>
		    			<h1 class="post-title">Page Not Found</h1>
		    		</header><!-- /post-header" -->
		    		<!-- /#post-id -->

		    		<section class="post-content">

						<p><?php _e("The article you were looking for was not found, but maybe try looking again!", "bonestheme"); ?></p>
						<p><?php get_search_form(); ?></p>

					</section>
				</article><!-- /post -->

			</div>
		</div>
	</section>
	<!-- /#primary -->


<?php get_footer(); ?>
