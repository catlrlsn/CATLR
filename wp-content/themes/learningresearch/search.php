<?php get_header(); ?>
    <div class="container" class="clearfix row">
        
        <div id="main" class="col col-lg-4 clearfix" role="main">
            <?php echo '<h5 class="searchSide">Order results by date 
            <a  style=" text-decoration: none;" href="' . get_bloginfo('url') . '?s=' . get_search_query() . '&orderby=post_date&order=asc">
             <i class="fa fa-caret-up dup" style="margin-left:10px;"></i>
            </a>';
            echo '
            <a  href="' . get_bloginfo('url') . '?s=' . get_search_query() . '&orderby=post_date&order=desc">
             <i class="fa fa-caret-down ddwn" style="margin-left:5px;"></i>
            </a> </h5>';?>
            <?php echo '<h5 class="searchSide">Order results alphabetically 
            <a  style=" text-decoration: none;" href="' . get_bloginfo('url') . '?s=' . get_search_query() . '&orderby=title&order=asc">
             <i class="fa fa-caret-up tup" style="margin-left:5px;"></i>
            </a>';
            echo '
            <a  href="' . get_bloginfo('url') . '?s=' . get_search_query() . '&orderby=title&order=desc">
             <i class="fa fa-caret-down tdwn" style="margin-left:5px;"></i>
            </a> </h5>';?>
            <header class="sidebar-heading top-spacer">
			 Popular Links:		
            </header>
            <ul style="list-style-type:none;float:left;padding:0px;">
                <li>
                    <a class="popl">Upcoming Events</a>
                </li>
                <li >
                    <a class="popl">Conference</a>
                </li>
                <li >
                    <a class="popl">Meet the team</a>
                </li>
                <li >
                    <a class="popl">Learning Science Network</a>
                </li>
            </ul>
        </div>
        
        
		<div id="main" class="col col-lg-8 clearfix" role="main">
				<div class="page-header" style="margin-top: 0px;">
                    <h1>
                        <span><?php _e("All search results for","wpbootstrap"); ?>:</span>
                        <?php echo esc_attr(get_search_query()); ?>
                    </h1>
                </div>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
				<header>
                    <h3>
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                           <u> <?php the_title(); ?> </u>
                        </a>
                    </h3>
                    <p class="meta postDate"> <?php echo get_the_date(); ?>
                    </p>
				</header> <!-- end article header -->
					
				<section class="post_content">
							<?php the_excerpt(); ?>
					
				</section> <!-- end article section -->
						
				<footer>
					
							
				</footer> <!-- end article footer -->
					
				</article> <!-- end article -->
					
				<?php endwhile; ?>	
					
					<?php if (function_exists('wp_bootstrap_page_navi')) { // if experimental feature is active ?>
						
						<?php wp_bootstrap_page_navi(); // use the page navi function ?>
						
					<?php } else { // if it is disabled, display regular wp prev & next links ?>
						<nav class="wp-prev-next">
							<ul class="clearfix">
								<li class="prev-link">
                                    <?php previous_posts_link() ?>
                                    <span style="float:right;"><?php next_posts_link() ?></span>
                                </li>
							</ul>
						</nav>
					<?php } ?>			
					
					<?php else : ?>
					
					<!-- this area shows up if there are no results -->
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("Not Found", "wpbootstrap"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "wpbootstrap"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    			
			</div> <!-- end #content -->

<?php get_footer(); ?>