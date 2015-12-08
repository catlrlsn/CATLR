<?php get_header(); ?>


	<?php if(get_field('hero', 'options')): ?>
    <section class="container" id="hero" role="featurecontent">
        <div class="flexslider">
        	<ul class="slides">
        		<li>
                    <div class="hero">
                        <a href="<?= get_permalink(897); ?>">
            			     <img src="<?php echo get_template_directory_uri(); ?>/img/hero2.jpg" alt="CATLR">
                             <div class="hero-content">
                                <p><b>Meet the Center’s 2014-2015 Cohort of Faculty Scholars</b><br>Thirteen faculty from across the University investigate their own teaching through evidence-based practice</p>
                              </div
                         </a>
                    </div>
        		</li>
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

                <div class="mod">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/loop.png">
                            <!--<p class="tagline"><small><b><i>Stay up to date with us!</i></b></small></p>-->
                        </div>
                        <div class="col-lg-6">                            
                            <div class="loop-form">
                                <form id="form" enctype="multipart/form-data" method="post" novalidate action="https://provostweb.wufoo.com/forms/z7m9k1/#public">
                                    <input type="email" name="Field1" placeholder="Your Email Address" id="email">
                                    <input type="hidden" id="idstamp" name="idstamp" value="BedXuXy7/a6FHKTCsO9UBmkWcLAwjx8uZ0xSnvBnFgg=" />
                                    <? /*
                                    <input type="email" name="MERGE0" placeholder="Your Email Address" id="email">
                                    */ ?>
                                    <button type="submit" id="submit">Subscribe</button>
                                </form>
                            </div>                    
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-sm-4">

                <?php get_sidebar('events'); ?>

            </div>

        </div>
	</section>
	<!-- /#primary -->	


<?php get_footer(); ?>