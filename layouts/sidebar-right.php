<?php
if ( richconsulting_has_footer_customise('sidebar') ) {
	do_action('richconsulting_sidebar');
} else {
	if ( is_active_sidebar('sidebar-2')){
		echo '<div class="blog-left-sidebar">';
		dynamic_sidebar('sidebar-2');
		echo '</div>';
	}
}
?>

