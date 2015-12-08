<?php get_header(); ?>

<?php if( get_field('hero', 'options') ): ?>
<section class="container" id="hero" role="featurecontent">
    <div class="flexslider">
    	<ul class="slides">
            <?php while( have_rows('hero', 'options') ): the_row(); ?>
    		<li>
                <div class="hero">
                    <a href="<?php the_sub_field('link'); ?>">
        			     <img src="<?php the_sub_field('image'); ?>" alt="CATLR">
                         <div class="hero-content">
                            <?php the_sub_field('excerpt'); ?>
                          </div>
                     </a>
                </div>
    		</li>
            <?php endwhile; ?>
        </ul>
    </div>
</section>
<!-- /#hero -->
<?php endif; ?>


<section class="container fold" id="primary" role="main">
    <div class="row">
        <div class="col-sm-8">
            <header class="section-header">
                <h1>Learning</h1>
            </header>
            <div class="entry-content">
                <p class="lead">At the Center for Advancing Teaching and Learning Through Research (CATLR), we offer opportunities for faculty to broaden their perspectives on teaching and learning and apply strategies grounded in research to optimize learning.</p>
            </div>
            <div class="row">

                <div class="col-sm-4">
                    <a href="<?= get_permalink(555); ?>/#section-1" class="btn btn-green"><span>Evolving</span> Teaching</a>
                </div>
                <div class="col-sm-4">
                    <a href="<?= get_permalink(555); ?>/#section-2" class="btn btn-red"><span>Promoting</span> Research</a>
                </div>
                <div class="col-sm-4">
                    <a href="<?= get_permalink(555); ?>/#section-3" class="btn btn-purple"><span>Integrating</span> Technology</a>
                </div>
            </div>

            <?php get_template_part( 'inc/email' ); ?>

        </div>

        <div class="col-sm-4">

            <?php get_sidebar('events'); ?>

        </div>

    </div>
</section>
<!-- /#primary -->	

<?php get_footer(); ?>