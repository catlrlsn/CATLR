//Hide Menu Item Conference
$(document).ready(function () {
    if(window.location.href.indexOf("evidence-based-teaching") > -1) {
        $('.page-item-4355').css('display','none');
    }
});
//Doesn't support Jquery
//var submitPage = document.getElementsByClassName('page-item-4355');
//submitPage.style.display = 'none';

   //Add carets on sidemenu
(function($) {
    $('.accordion > .page_item_has_children > a').after('<span class="caret"></span>');
})(jQuery);


//Make menu collapsible
(function($) {
    $('.accordion > li > .container').hide();
    $('.accordion > li > .children').hide();
    $('.current_page_item').parent().show();
    $('.caret').click(function() {
        children = $(this).next();
        if(children.css('display') == 'none'){
            $(this).css('border-top', '6px solid #CD2027');
            children.slideDown(0);
         } else {
            $(this).css('border-top', '6px solid #000000'); 
            children.slideUp(0);
         }
         return false;
    });
})(jQuery); 

(function( $, undefined ) {
	'use strict';

	// Cache variables
	var $window = $(window),
		$form = $('form#form'),
		$flexslider = $('div.flexslider'),
		$foldnav = $('nav#foldnav');

    $('select').select2();
    $('select.hide-search').select2({
        minimumResultsForSearch: Infinity
    });

	// Form submission
	$form
		.submit(function() {
			var ptrn = /^[\w](([_\.-]?[\w]+)*)@([\w]+)(([\.-]?[\w]+)*)\.([A-Za-z]{2,})$/,
                neu = /neu.edu$/,
				$email = $('#email'),
				$first_name = $('#first_name'),
				$last_name  = $('last_name');

			if ( $email.val().length < 3 || ptrn.test($email.val()) === false || neu.test($email.val()) === false ) {
                alert("Please use a value @neu.edu or husky.neu.edu");
				$email.css("border-color", "red");
				return false;
			}
			if ( $first_name.val() === '' || $last_name.val() === '' ) {
                alert("Please enter a first and last name");
				$first_name.css("border-color", "red");
				$last_name.css("border-color", "red");
				return false;
			}

			return true;
		});


	// Flexslider init
	$flexslider
		.flexslider({
			animation: "slide",
			slideshow: true,
			smoothHeight: true,
			directionNav: false
		});


	// Affix navigation
	setTimeout(function () {
		$foldnav
			.affix({
				offset: {
					top: function () { return $window.width() <= 980 ? 170 : 800; },
					bottom: 0
				}
			});
	}, 100);


} )( jQuery );




/* Default class modification */
$.extend( $.fn.dataTableExt.oStdClasses, {
	"sSortAsc": "header headerSortDown",
	"sSortDesc": "header headerSortUp",
	"sSortable": "header"
} );

/* API method to get paging information */
$.fn.dataTableExt.oApi.fnPagingInfo = function ( oSettings )
{
	return {
		"iStart":         oSettings._iDisplayStart,
		"iEnd":           oSettings.fnDisplayEnd(),
		"iLength":        oSettings._iDisplayLength,
		"iTotal":         oSettings.fnRecordsTotal(),
		"iFilteredTotal": oSettings.fnRecordsDisplay(),
		"iPage":          Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),
		"iTotalPages":    Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )
	};
}

/* Bootstrap style pagination control */
$.extend( $.fn.dataTableExt.oPagination, {
	"bootstrap": {
		"fnInit": function( oSettings, nPaging, fnDraw ) {
			var oLang = oSettings.oLanguage.oPaginate;
			var fnClickHandler = function ( e ) {
				e.preventDefault();
				if ( oSettings.oApi._fnPageChange(oSettings, e.data.action) ) {
					fnDraw( oSettings );
				}
			};

			$(nPaging).append(
				'<ul class="pagination pagination-sm">'+
					'<li class="prev disabled"><a href="#">&larr; '+oLang.sPrevious+'</a></li>'+
					'<li class="next disabled"><a href="#">'+oLang.sNext+' &rarr; </a></li>'+
				'</ul>'
			);
			var els = $('a', nPaging);
			$(els[0]).bind( 'click.DT', { action: "previous" }, fnClickHandler );
			$(els[1]).bind( 'click.DT', { action: "next" }, fnClickHandler );
		},

		"fnUpdate": function ( oSettings, fnDraw ) {
			var iListLength = 5;
			var oPaging = oSettings.oInstance.fnPagingInfo();
			var an = oSettings.aanFeatures.p;
			var i, j, sClass, iStart, iEnd, iHalf=Math.floor(iListLength/2);

			if ( oPaging.iTotalPages < iListLength) {
				iStart = 1;
				iEnd = oPaging.iTotalPages;
			}
			else if ( oPaging.iPage <= iHalf ) {
				iStart = 1;
				iEnd = iListLength;
			} else if ( oPaging.iPage >= (oPaging.iTotalPages-iHalf) ) {
				iStart = oPaging.iTotalPages - iListLength + 1;
				iEnd = oPaging.iTotalPages;
			} else {
				iStart = oPaging.iPage - iHalf + 1;
				iEnd = iStart + iListLength - 1;
			}

			for ( i=0, iLen=an.length ; i<iLen ; i++ ) {
				// Remove the middle elements
				$('li:gt(0)', an[i]).filter(':not(:last)').remove();

				// Add the new list items and their event handlers
				for ( j=iStart ; j<=iEnd ; j++ ) {
					sClass = (j==oPaging.iPage+1) ? 'class="active"' : '';
					$('<li '+sClass+'><a href="#">'+j+'</a></li>')
						.insertBefore( $('li:last', an[i])[0] )
						.bind('click', function (e) {
							e.preventDefault();
							oSettings._iDisplayStart = (parseInt($('a', this).text(),10)-1) * oPaging.iLength;
							fnDraw( oSettings );
						} );
				}

				// Add / remove disabled classes from the static elements
				if ( oPaging.iPage === 0 ) {
					$('li:first', an[i]).addClass('disabled');
				} else {
					$('li:first', an[i]).removeClass('disabled');
				}

				if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
					$('li:last', an[i]).addClass('disabled');
				} else {
					$('li:last', an[i]).removeClass('disabled');
				}
			}
		}
	}
} );

/* Table initialisation */
$(document).ready(function() {
    $(".dataTable").length > 0 && $(".dataTable").each(function() {
        var e = {
        	iDisplayLength: 25,
        	sDom: "<'row'<'col-sm-12'<'pull-left'f> <'pull-right'l>r> <'col-sm-12't><'col-sm-6'i><'col-sm-6'p>",
            sPaginationType: "bootstrap",
            aaSorting: [],
            oLanguage: {
                sSearch: "",
                sInfo: "Showing <span>_START_</span> to <span>_END_</span> of <span>_TOTAL_</span> entries",
                sLengthMenu: "<span>Show entries:</span> _MENU_"
            }
        };
        if ($(this).hasClass("dataTable-noheader")) {
            e.bFilter=!1;
            e.bLengthChange=!1
        }
        if ($(this).hasClass("dataTable-nofooter")) {
            e.bInfo=!1;
            e.bPaginate=!1
        }
        if ($(this).hasClass("dataTable-nosort")) {
            var t = $(this).data("nosort");
            t = t.split(",");
            for (var n = 0; n < t.length; n++)
                t[n] = parseInt(t[n]);
            e.aoColumnDefs = [{
                bSortable: !1,
                aTargets: t
            }
            ]
        }
        $(this).dataTable(e);
        $(".dataTables_filter input")
        	.attr("placeholder", "Search Events")
        	.addClass('form-control input-md');
    });	
} );