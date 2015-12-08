<?php
	$start_date = DateTime::createFromFormat('Ymd', get_field('start_date'));
    $end_date = DateTime::createFromFormat('Ymd', get_field('end_date'));
    
	$start_datetime = $start_date->format('d-m-Y') . " " . date("G:i", strtotime(get_field('start_time'))) . ":00";
	$end_datetime = $start_date->format('d-m-Y') . " " . date("G:i", strtotime(get_field('end_time'))) . ":00";

?>




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
            <style type="text/css">
                .btn {width:100%;margin:0 0 10px;display:block;position:relative;color:#fff!important;text-decoration:none;}
                .addthisevent-drop:active               {top:1px;}
                .addthisevent-drop .arrow               {width:15px;height:10px;position:absolute;top:50%;right:15px;margin-top:-5px;background:url(icon-arrow.png) no-repeat;}
                .addthisevent-selected                  {background-color:#2c84f4;}
                .addthisevent_dropdown                  {width:215px;position:absolute;z-index:99999;padding:6px 0px 0px 0px;background:#fff;text-align:left;display:none;margin-top:2px;margin-left:-1px;border-top:1px solid #c8c8c8;border-right:1px solid #bebebe;border-bottom:1px solid #a8a8a8;border-left:1px solid #bebebe;-webkit-box-shadow:1px 3px 6px rgba(0,0,0,0.15);-moz-box-shadow:1px 3px 6px rgba(0,0,0,0.15);box-shadow:1px 3px 6px rgba(0,0,0,0.15);}
                .addthisevent_dropdown span             {display:block;line-height:110%;background:#fff;text-decoration:none;font-size:14px;color:#6d84b4;padding:8px 10px 9px 15px;}
                .addthisevent_dropdown span:hover       {background:#f4f4f4;color:#6d84b4;text-decoration:none;font-size:14px;}
                .addthisevent span{display:none!important;}
                .addthisevent-drop ._url,.addthisevent-drop ._start,.addthisevent-drop ._end,.addthisevent-drop ._summary,.addthisevent-drop ._description,.addthisevent-drop ._location,.addthisevent-drop ._organizer,.addthisevent-drop ._organizer_email,.addthisevent-drop ._facebook_event,.addthisevent-drop ._all_day_event {display:none!important;}
                .addthisevent_dropdown .copyx           {height:21px;display:block;position:relative;cursor:default;}
                .addthisevent_dropdown .brx             {width:180px;height:1px;overflow:hidden;background:#e0e0e0;position:absolute;z-index:100;left:10px;top:9px;}
                .addthisevent_dropdown .frs             {position:absolute;top:3px;cursor:pointer;right:10px;padding-left:10px;font-style:normal;font-weight:normal;text-align:right;z-index:101;line-height:110%;background:#fff;text-decoration:none;font-size:10px;color:#cacaca;}
                .addthisevent_dropdown .frs:hover       {color:#6d84b4;}
                .addthisevent   {visibility:hidden;}
            </style>
            <div class="row">
	            <div class="col-sm-6">
            <a href="http://www.northeastern.edu/learningresearch" title="Add to Calendar" class="addthisevent btn btn-lg btn-danger">
                <b>Add to my calendar</b>
                <span class="arrow">&nbsp;</span>
                <span class="_start"><?php echo $start_datetime; ?></span>
                <span class="_end"><?php echo $end_datetime; ?></span>
                <span class="_zonecode">15</span>
                <span class="_summary"><?php the_title(); ?></span>
                <span class="_description">
                <?php the_excerpt(); ?> <br />
                <?php the_permalink(); ?>
                </span>
                <span class="_location"><?php the_field('location'); ?></span>
                <span class="_organizer"></span>
                <span class="_organizer_email"></span>
                <span class="_all_day_event">false</span>
                <span class="_date_format">DD/MM/YYYY</span>
            </a>
	            </div></div>
