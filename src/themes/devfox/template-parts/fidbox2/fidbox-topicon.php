<?php
	// Getting data of the  Facts in Digits box
	global $cmt_global_fid_element_values;
	
	if( is_array($cmt_global_fid_element_values) ) :
	
?>


<div class="cmt-fid inside <?php echo cymolthemes_wp_kses( $view_class ); ?>">
		<?php echo cymolthemes_wp_kses( $lefticoncode ); ?>
	<div class="cmt-fld-contents">
		<h4 class="cmt-fid-inner">
		<?php echo cymolthemes_wp_kses( $before_text ); ?>
		<span
			class				  = "tm-number-rotate"
			data-appear-animation = "animateDigits"
			data-from             = "0"
			data-to               = "<?php echo esc_html( $digit ); ?>"
			data-interval         = "<?php echo esc_html( $interval ); ?>"
			data-before           = ""
			data-before-style     = ""
			data-after            = ""
			data-after-style      = ""
			>
				<?php echo esc_html( $digit ); ?>
		</span>
		<?php echo cymolthemes_wp_kses( $after_text ); ?>
	</h4>
	<h3 class="cmt-fid-title"><span><?php echo cymolthemes_wp_kses($title); ?><br></span></h3>
	</div><!-- .cmt-fld-contents -->
	<?php echo cymolthemes_wp_kses($righticoncode); ?>
</div>

<?php
	endif;
	
	// Resetting data of the Facts in Digits box
	$cmt_global_fid_element_values = '';
?>