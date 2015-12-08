<?php if ( get_post_type() == 'event' ) : ?>

<?php
	$start_date = DateTime::createFromFormat('Ymd', get_field('start_date'));
	$end_date = DateTime::createFromFormat('Ymd', get_field('end_date'));

	$start_time = get_field('start_time');
	$end_time = get_field('end_time');
?>

<h5 class="entry-byline" style="padding-top: 10px;">
	<?= $start_date->format('F j, Y'); ?>

	<?php 
		if ( $end_time ) {
			echo 'from ' .$start_time. ' to ' .$end_time;
		} else {
			echo 'at ' .$start_time;
		}
	?>
</h5>

<?php if (get_field('location')) : ?>
<h5 class="entry-byline"><b>Location:</b> <?php the_field('location'); ?></h5>
<?php endif; ?>

<?php endif; ?>