<?php get_header(); ?>

    <div class="container" class="clearfix row">

        <div id="main" class="col col-lg-4 clearfix" role="main">
                              <!-- Single button -->
            <div class="btn-group" >
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="    padding-left: 10px;
    padding-right: 5px;
    padding-top: 3px;
    padding-bottom: 3px;background-color:#fff;color:black;">
                  
                <?php 
                  if(strpos($_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], '&orderby=post_date&order=asc')) {
                      echo 'Sorted Chronologically (Old-New) <i class="fa fa-sort"> </i>';
                  } else if(strpos($_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], '&orderby=post_date&order=desc')) {
                      echo 'Sorted Chronologically (New-Old) <i class="fa fa-sort"> </i>';
                  } else if(strpos($_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], '&orderby=post_title&order=asc')) {
                      echo 'Sorted Alphabetically (A-Z) <i class="fa fa-sort"> </i>';
                  } else if(strpos($_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], '&orderby=post_title&order=desc')) {
                      echo 'Sorted Alphabetically (Z-A) <i class="fa fa-sort" ></i>';
                  } else {
                      echo 'Sorted by relevance <i class="fa fa-sort"></i> ';
                  } ?>
                 
              </button>
              <ul class="dropdown-menu">
                  <?php echo '
                <li><a href="' . get_bloginfo('url') . '?s=' . get_search_query() . '&orderby=post_title&order=asc">
                Alphabetically (A-Z)</a></li>
                <li><a href="'. get_bloginfo('url') . '?s=' . get_search_query() . '&orderby=post_title&order=desc">
                Alphabetically (Z-A)</a></li>
                <li><a href="' . get_bloginfo('url') . '?s=' . get_search_query() . '&orderby=post_date&order=desc">
                Chronologically (Newest-Oldest)</a></li>
                <li><a href="' . get_bloginfo('url') . '?s=' . get_search_query() . '&orderby=post_date&order=asc">
                Chronologically (Oldest-Newest)</a></li>
                <li><a href="' . get_bloginfo('url') . '?s=' . get_search_query(). '">
                By relevance</a></li>'
                    ?>
              </ul>
            </div>  
            <header class="sidebar-heading top-spacer">
			 <br> Popular Links:		
            </header>
            <ul style="list-style-type:none;float:left;padding:0px;">
                <li >
                    <a href="http://www.northeastern.edu/learningresearch/event/" class="popl">Upcoming Events</a>
                </li>
                <li class="top-spacer">
                    <a href="http://www.northeastern.edu/learningresearch/conferences/conference-evidence-based-teaching/overview/" class="popl">Conference</a>
                </li>
                <li class="top-spacer">
                    <a href="http://www.northeastern.edu/learningresearch/about/who-we-are/" class="popl">Meet the team</a>
                </li>
                <li class="top-spacer">
                    <a href="http://www.northeastern.edu/learningresearch/learningsciencenetwork/" class="popl">Learning Science Network</a>
                </li>

            <li>
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
                   
                    <p class="meta postDate"> <?php $data = get_permalink(); 
                                $bread = substr($data, 45);
                                $bread = substr($bread, 0, strpos($bread, "/"));
                                $bread = ucfirst(str_replace('-', ' ', $bread));
                                echo '<b>'. $bread .'</b>' ; ?>
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
								<li class="prev-link" style=" list-style-type: none;">
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