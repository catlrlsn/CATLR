<?php get_header(); ?>


	<div class="container" id="primary" role="main">
		<div class="row">

			<?php if( $_GET['register'] == '') : ?>

			    <div class="col-sm-7">
	
					<?php get_template_part( 'inc/entry' ); ?>
	
			    </div><!-- /col-sm-7 -->
	
			    <div class="col-sm-4 col-sm-offset-1">
				    
				
                    <?php if (strtotime(get_field('end_date')) < get_the_date()) {
                            get_template_part( 'inc/rsvp-form');}
                          else {
                              get_sidebar('events');
                          }
                    
                    ?>
	
			    
			    </div><!-- /col-sm-4 -->
			    
			<?php elseif ( $_GET['register'] == 'success' ): ?>

			    <div class="col-sm-8 col-sm-offset-3">
				    <h1 class="entry-title">Thanks for your RSVP</h1>
				    <br>
				    <p>Thank you for registering for <?php the_title(); ?>. We look forward to seeing you on <?php echo DateTime::createFromFormat('Ymd', get_field('start_date'))->format('F d, Y'); ?> at <?php echo get_field('start_time') ?>. </p>
				    
					<?php get_template_part( 'inc/addcalendar' ); ?>
					<p>
					If you need to change or cancel your registration, or if you have any questions or comments, please email us at <a href="mailto:learningresearch@neu.edu">learningresearch@neu.edu</a>.</p>
					<a href="http://www.northeastern.edu/learningresearch/event/" >More Upcoming Events</a>
	
			    </div><!-- /col-sm-7 -->			    
			
			<?php elseif ( $_GET['register'] == 'interested' ): ?>
			
			 <div class="col-sm-8 col-sm-offset-3">
				    <h1 class="entry-title">Thanks for your interest</h1>
				    <br>
				    <p>Thank you for your interest in <?php the_title(); ?>. We'll consider this information in scheduling events in the future.
				    
				   If you’re interested in the Center convening a similar event, customized for your department, program, or college, please email us at <a href="mailto:learningresearch@neu.edu">learningresearch@neu.edu</a>. </p>
				    
					
					<a href="http://www.northeastern.edu/learningresearch/event/" >More Upcoming Events</a>
	
			    </div><!-- /col-sm-7 -->			    
			
			
			
			<?php endif; ?>
			
			

		</div>
	</div><!-- /container -->


<?php get_footer(); ?>

