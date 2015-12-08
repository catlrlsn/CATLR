<?php
/*
Template Name: Page Overview
*/
?>

<?php get_header(); ?>


	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php 
		$i = 0;
		if(get_field('overview')): 
		while(has_sub_field('overview')):
			$class = ($i % 2 == 0 ? '' : 'section-alt'); 
	?>

	    <section id="section-<?= ($i+1); ?>" class="section <?= $class; ?>" role="main">
			<div class="container">
				<div class="row">
					<article class="hentry">
						<?php if ($class == 'section-alt') : ?>
						<div class="col-lg-6">
							<figure class="entry-figure">
								<img src="<?php the_sub_field('image'); ?>">
							</figure>
						</div>
						<?php endif; ?>
						<div class="col-lg-6">
							<header class="entry-header">
								<h1><?php the_sub_field('title'); ?></h1>
							</header>
							<div class="entry-content">
								<?php the_sub_field('content'); ?>
							</div>
						</div>
						<?php if ($class !== 'section-alt') : ?>
						<div class="col-lg-6">
							<figure class="entry-figure">
								<img src="<?php the_sub_field('image'); ?>">
							</figure>
						</div>
						<?php endif; ?>
					</article>
				</div>
			</div>
	    </section>

	<?php $i++; endwhile; ?>
	<?php endif; ?>


	<?php endwhile; endif; ?>


<?php get_footer(); ?>