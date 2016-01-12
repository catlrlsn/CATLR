<table class="table table-striped table-hover dataTable dataTable-tools">
    <col width="25%">
    <col width="10%">
    <col width="15%">
    <col width="15%">
    <col width="35%">
    <thead>
        <tr>
            <th>Title</th>
            <th>Date</th>
            <th>Format</th>
            <th>Audience</th>
            <th class="dataTable-nosort">Description</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $args = array(
            'post_type'=> 'event',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'theme',
                    'field' => 'slug',
                    'terms' => basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))
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
            <td><?= get_taxonomy_list('category', false); ?></td>
            <td><?= get_taxonomy_list('audience', false); ?></td>
            <td><?php the_excerpt(); ?></td>
        </tr>

        <!--
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
    <?php endwhile; wp_reset_query(); ?>
    </tbody>
</table>
