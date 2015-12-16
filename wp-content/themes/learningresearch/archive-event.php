<?php get_header(); ?>


	<div class="container" id="primary" role="main">
		<div class="row">

		    <div class="col-sm-12">
	    		<header class="entry-header">
					<h1 class="entry-title">Upcoming Events</h1>
				</header>
				
				<?php if( get_field('wysiwyg_events_description', 'options') ): ?>
					<div class="alert alert-info" style="padding: 15px 10px 0;">
						<?php the_field('wysiwyg_events_description', 'options'); ?>
					</div>
				<?php endif; ?>

				<br>

                <table class="table table-striped table-hover dataTable dataTable-tools">
                    <col width="20%">
                    <col width="10%">
                    <col width="10%">
                    <col width="10%">
                    <col width="10%">
                    <col width="10%">
                    <col width="40%">
                    <thead>
                        <tr>
                            <!-- <th>Title</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Category</th>
                            <th>Audience</th>
                            <th class="dataTable-nosort">Description</th>
                            -->
                            <th>Title</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Audience</th>
                            <th>Theme</th>
                            <th>Format</th>
                            <th class="dataTable-nosort">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $args = array(
                            'post_type'=> 'event',
                            'posts_per_page' => -1,
                            'order' => 'ASC',
                            'orderby' => 'meta_value',
                            'meta_key' => 'start_date',
                            'meta_query' => array(
                                array(
                                    'key' => 'start_date',
                                    'value' => date('Ymd'),
                                    'compare' => '>='
                                )
                            )
                        );
                        query_posts($args);
                        while ( have_posts() ) : 
                            the_post(); 
                            $start_date = DateTime::createFromFormat('Ymd', get_field('start_date'));
                            $end_date = DateTime::createFromFormat('Ymd', get_field('end_date'));
                            $start_time = get_field('start_time');
                            $end_time = get_field('end_time');
                    ?>
                        <tr>
                            <td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
                            <td><?= $start_date->format('n/j/Y'); ?></td>
                            <td><?= ( $end_time ? $start_time .' - '. $end_time : $start_time ); ?> </td>
                            <td><?= get_taxonomy_list('audience', false); ?></td>
                            <td><?= get_taxonomy_list('theme',false); ?></td>
                            <td><?= get_taxonomy_list('category', false); ?></td>
                            <td><?php the_excerpt(); ?></td>
                        </tr>

                        <!--<?php //the_excerpt(); ?>
                        <article class="summary">
                            <header class="entry-header">
                                <h2 class="entry-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <h5 class="entry-meta">
                                    <?= $start_date->format('M j, Y'); ?>&nbsp;&nbsp;&bull;&nbsp;
                                    <?php 
                                        if ( $end_time ) {
                                            echo $start_time. ' - ' .$end_time;
                                        } else {
                                            echo $start_time;
                                        }
                                    ?>
                                </h5>
                            </header>
                            <div class="entry-content">
                                <?php the_excerpt(); ?>
                                <p><a class="btn btn-default btn-small" href="<?php the_permalink(); ?>">Read More &raquo;</a></p>
                            </div>
                        </article>
                        -->
                    <?php endwhile; ?>
                    </tbody>
                </table>
		    </div><!-- /col-sm-9 -->

		</div>
	</div><!-- /container -->


<?php get_footer(); ?>