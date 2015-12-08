<style>
.conference-interior .table {
    margin-bottom: 5px;
}
.conference-interior h5 { font-weight: bold; }

.conference-interior ul {
    margin: 0;
    padding: 0;
}
.conference-interior ul li {
    margin-bottom: 10px;
    clear: both;
    display: inline-block;
}
.conference-interior ul li em { color: #7a7a7a; }
.conference-interior ul li b,
.conference-interior ul li strong {
    display: block;
    font-weight: 600;
    font-size: 14px;
}
</style>

<header class="entry-header">
    <h2 class="entry-title"><b><?php the_title(); ?></b></h2>
</header>

<?php the_content(); ?>

<div class="conference-interior">
    <?php
    $i = 0;
    if( have_rows('content_type') ):
        while ( have_rows('content_type') ) : the_row(); ?>

            <?php
            // Presentations
            if( get_row_layout() == 'presentations' ) : ?>
                <?php if( have_rows('presentation') ): ?>                
                    <?php while ( have_rows('presentation') ) : the_row(); ++$i; ?>
                        <hr>
                        <article id="presentation-<?= $i; ?>">
                            <?php if ( get_sub_field('session') ) : ?>
                            <header class="entry-header">
                                <h5 class="entry-meta">
                                    <a href="#presentation-<?= $i; ?>"><?= get_sub_field('session'); ?></a>
                                </h5>
                                <h3 style="margin-top:0;"><b><?= get_sub_field('title'); ?></b></h3>
                            </header>
                            <?php endif; ?>
                            <small>
                                <?= get_sub_field('speakers'); ?>
                                <b><i>Abstract</i></b>
                                <?= get_sub_field('abstract'); ?>
                            </small>
                        </article>
                    <?php endwhile; ?>
                <?php endif; ?>
            <?php endif; ?>

            <?php
            // Schedule
            if( get_row_layout() == 'schedule' ) : ?>
                <?php if( have_rows('schedule') ): ?>                
                    <?php while ( have_rows('schedule') ) : the_row(); ++$i; ?>
                        <article id="schedule-<?= $i; ?>">
                            <table class="table">
                                <tr>
                                    <td width="25%">
                                        <h5><b><?php the_sub_field('time'); ?></b></h5>
                                    </td>
                                    <td>
                                        <?php if ( get_sub_field('title') ) : ?>
                                        <h5><i><?= get_sub_field('title'); ?></i></h5>
                                        <?php endif; ?>
                                        <?= get_sub_field('details'); ?>
                                    </td>
                                </tr>
                            </table>
                        </article>
                    <?php endwhile; ?>
                <?php endif; ?>
            <?php endif; ?>

        <?php endwhile;
    else :
        // echo "nothing";

    endif;
    ?>
</div>