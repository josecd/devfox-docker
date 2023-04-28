<?php
	// Getting data of the  Facts in Digits box
	global $cmt_global_iconbox_element_values;
	if( is_array($cmt_global_iconbox_element_values) ) :
?>

<div class="cymolthemes-iconbox cymolthemes-iconbox-<?php echo esc_attr($boxstyle); ?> <?php echo esc_attr($mainclass); ?> cymolthemes-iconcolor-<?php echo esc_attr($icon_color_html); ?> cmt-icontype-<?php echo esc_attr($icon_type_class); ?>">
<div class="cymolthemes-iconbox-inner">
		<div class="cmt-iconbox-wrapper">
			<div class="cmt-top">
				<div class="cmt-icon-one">
					<?php echo cymolthemes_wp_kses( $icon_html ); ?>
				</div>
				<div class="cmt-heading">
				<?php echo cymolthemes_wp_kses($heading_html); ?>
				</div>
			</div>
			<div class="cymolthemes-overlay">
				<div class="cymolthemes-box-desc"> 
					<?php echo cymolthemes_wp_kses($subheading_html); ?>
					<?php echo cymolthemes_wp_kses($content_html); ?>
				</div>
				
			</div>
			</div>	
					
					
		</div>
					
		
	
</div>
<?php
	endif;
	$cmt_global_iconbox_element_values = '';
?>