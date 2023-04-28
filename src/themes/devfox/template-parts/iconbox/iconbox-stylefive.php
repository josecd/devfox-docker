<?php
	// Getting data of the  Facts in Digits box
	global $cmt_global_iconbox_element_values;
	if( is_array($cmt_global_iconbox_element_values) ) :
?>

<div class="cymolthemes-iconbox cymolthemes-iconbox-<?php echo esc_attr($boxstyle); ?><?php echo esc_attr($mainclass); ?> cymolthemes-iconcolor-<?php echo esc_attr($icon_color_html); ?>">
<div class="cymolthemes-iconbox-inner">
		<div class="cmt-iconbox-wrapper">
			
			<div class="cymolthemes-iconbox-heading">
				<?php echo cymolthemes_wp_kses($heading_html); ?>
				<?php echo cymolthemes_wp_kses($subheading_html); ?>
				<?php echo cymolthemes_wp_kses($content_html); ?>
				
			</div>	
			<div class="cmt-bottom cmt-section-wrapper">
				
				<div class="cmt-readmore cmt-section-wrapper-cell">
				<?php echo cymolthemes_wp_kses($button_html); ?>
				
				</div>
				<div class="cymolthemes-iconbox-icon cmt-section-wrapper-cell">
					<?php echo cymolthemes_wp_kses( $icon_html ); ?>
				</div>
			</div>
		</div>
	</div>	

</div>
<?php
	endif;
	$cmt_global_iconbox_element_values = '';
?>