<?php
	// Getting data of the  Facts in Digits box
	global $cmt_global_fid_element_values;
	
	if( is_array($cmt_global_fid_element_values) ) :
	
?>


<div class="cmt-fid inside style10">
	<div class="cmt-fid-left tm-wrap-cell">
		<?php echo cymolthemes_wp_kses( $lefticoncode ); ?>
	</div>
	<div class="cmt-fld-contents tm-wrap-cell">	
		<h4 class="cmt-fid-inner">
		<?php echo cymolthemes_wp_kses( $before_text ); ?>
		
		<?php echo cymolthemes_wp_kses($cmt_global_fid_element_values['after_text']); ?>
	</h4>
	<h3 class="cmt-fid-title"><span><?php echo cymolthemes_wp_kses($title); ?><br></span></h3>
	</div><!-- .cmt-fld-contents -->
	<?php echo cymolthemes_wp_kses($cmt_global_fid_element_values['righticoncode'], 'fid_icon'); ?>
</div>




<?php

	endif;
	
	// Resetting data of the Facts in Digits box
	$cmt_global_fid_element_values = '';
?>