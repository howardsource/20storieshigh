<?php
/*
Plugin Name: ACF Tab Source
Plugin URI:  http://sourcecreative.co.uk
Description: Merge ACF Tabs from different groups (Source Version)
Author: Howard Marsden
Version: 2.0
Author URI: http://sourcecreative.co.uk

How it works:
Small JavaScript is placed at the end of the document
and run instatntly without waiting for loaded DOM,
so changes are done before ACF starts manipulating
with postboxes.

The script merges all postboxes containing "tab field"
to the first one and removes left empty wrappers.
*/


add_action('admin_footer', function() {

	$screen = get_current_screen();
	
	if ( $screen->base == 'post' || preg_match('/acf-options/', $screen->base)) {
		echo '
		<!-- ACF Merge Tabs -->
		<script>		

			var $boxes = jQuery(".postbox .acf-field-tab").parent(".inside");

			if ( $boxes.length > 1 ) {

			    var $firstBox = $boxes.first();

			    $boxes.not($firstBox).each(function(){
				    jQuery(this).children().appendTo($firstBox);
				    jQuery(this).parent(".postbox").remove();				    
			    });
				
			}
			
		</script>';
	}
	
});


?>
