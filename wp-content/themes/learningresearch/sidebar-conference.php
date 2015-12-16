<?php 
    if ( is_page() ) : 
    
        $parent_id  = get_top_parent_id($post);
        $registration = get_field('registration', $parent_id);
        $registration_link = get_field('registration_link', $parent_id);

?>

<style type="text/css">
    .btn {width:100%;margin:0 0 10px;display:block;position:relative;color:#fff!important;text-decoration:none;}
    .entry-sidebar-simple>ul ul ul a { font-size: 11px; }
</style>

<aside id="sidebar-page" role="sidebar">
	<div class="entry-sidebar-simple" style="margin-top:0;">
           <!-- CHANGE HERE CRISTIAN -->
            <div class="well">
                <h4 class="text-center"><b>Register to Attend</b></h4>
                <div id="wufoo-q1yiz2sc1bs1fv8">
                    <a href="https://provostweb.wufoo.com/forms/q1yiz2sc1bs1fv8">Online Form</a>.
                </div>
            </div>
            
        <?php /*
            <script type="text/javascript">
                var q1yiz2sc1bs1fv8;(function(d, t) {
                var s = d.createElement(t), options = {
                'userName':'provostweb',
                'formHash':'q1yiz2sc1bs1fv8',
                'autoResize':true,
                'height':'auto',
                'async':true,
                'host':'wufoo.com',
                'header':'hide',
                'ssl':true};
                s.src = ('https:' == d.location.protocol ? 'https://' : 'http://') + 'www.wufoo.com/scripts/embed/form.js';
                s.onload = s.onreadystatechange = function() {
                var rs = this.readyState; if (rs) if (rs != 'complete') if (rs != 'loaded') return;
                try { q1yiz2sc1bs1fv8 = new WufooForm();q1yiz2sc1bs1fv8.initialize(options);q1yiz2sc1bs1fv8.display(); } catch (e) {}};
                var scr = d.getElementsByTagName(t)[0], par = scr.parentNode; par.insertBefore(s, scr);
                })(document, 'script');
            </script>
            <script type="text/javascript" src="https://addthisevent.com/libs/ate-latest.min.js"></script>
            <script type="text/javascript">
                addthisevent.settings({
                    mouse       : false,
                    css         : false,
                    ical        : {show:true, text:"iCal Calendar"},
                    outlook     : {show:true, text:"Outlook Calendar"},
                    google      : {show:true, text:"Google Calendar"},
                    yahoo       : {show:false, text:""},
                    hotmail     : {show:false, text:""}
                });
            </script>
            <a href="http://www.northeastern.edu/learningresearch" title="Add to Calendar" class="addthisevent btn btn-lg btn-primary">
                <b>Add to Calendar</b>
                <span class="arrow">&nbsp;</span>
                <span class="_start">05-05-2015 08:30:00</span>
                <span class="_end">05-05-2015 18:00:00</span>
                <span class="_zonecode">15</span>
                <span class="_summary">Conference for Advancing Evidence-Based Teaching</span>
                <span class="_description">This conference will highlight Northeastern’s own faculty who approach their teaching with a spirit of inquiry and the desire to share what they learn with their colleagues.<br>Join us for a day of workshops, presentations and discussion sponsored by the Center for Advancing Teaching and Learning Through Research.</span>
                <span class="_location">Raytheon Amphitheater</span>
                <span class="_organizer">Center for Advancing Teaching and Learning Through Research</span>
                <span class="_organizer_email">caet@neu.edu</span>
                <span class="_all_day_event">false</span>
                <span class="_date_format">DD/MM/YYYY</span>
            </a>
            <a href="<?= get_permalink(1772); ?>" title="Submit a Proposal" class="btn btn-danger btn-lg"><b>Call for Proposals</b><br><small>Deadline: 2/9/15</small></a>
        */ ?>
       
        <?php if ($registration) : ?>
        <div>
            <a href="<?= $registration_link; ?>" title="Register" class="btn btn-danger btn-lg"><b>Register Now</b></a>
        </div>
        <?php endif; ?>

		<ul>
            <!-- <li><?= get_subnavigation('title'); ?></li> -->
			<?= get_subnavigation('subnavigation', 'conferences'); ?>
		</ul>
	</div>
</aside><!-- /sidebar -->
<!-- /#sidebar -->

<?php endif; ?>