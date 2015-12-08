<div class="mod-dark">
    <header>
        <h2><a href="<?php echo home_url(); ?>/event/">Events</a></h2>
    </header>

    <?php
        $args = array(
            'post_type'=> 'event',
            'posts_per_page' => 4,
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
        <article class="summary">
            <header class="entry-header">
                <h3 class="entry-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
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
            <!--
            <div class="entry-content">
                <?php the_excerpt(); ?>
                <p><a href="#" class="btn btn-small btn-default">RSVP</a></p>
            </div>
            -->
        </article>
    <?php endwhile; ?>

</div>
