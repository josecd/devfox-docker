<?php
	// Getting data of the  Facts in Digits box
	global $cmt_global_iconbox_element_values;
	if( is_array($cmt_global_iconbox_element_values) ) :
?>

<div class="cymolthemes-iconbox cymolthemes-iconbox-<?php echo esc_attr($boxstyle); ?> <?php echo esc_attr($mainclass); ?> cymolthemes-iconcolor-<?php echo esc_attr($icon_color_html); ?> cymolthemes-icon-bgcolor-<?php echo esc_attr($icon_bg_color_html); ?> cmt-iconstyle-<?php echo esc_attr($icon_shape_html); ?> cymolthemes-iconsize-<?php echo esc_attr($icon_size_html); ?>">

<div class="cymolthemes-iconbox-inner">
		<div class="cmt-iconbox-wrapper cmt-section-wrapper">
			<div class="cymolthemes-iconbox-icon cmt-section-wrapper-cell">
			<?php echo cymolthemes_wp_kses( $icon_html ); 
				?>
			</div>
			<div class="cymolthemes-iconbox-heading cmt-section-wrapper-cell">
				<?php echo cymolthemes_wp_kses($heading_html); ?>
				<?php echo cymolthemes_wp_kses($subheading_html); ?>
				
				<?php echo cymolthemes_wp_kses($button_html); ?>
			<div class="number"> </div>
			</div>	
		</div>
		<?php echo cymolthemes_wp_kses($content_html); ?>
	</div>	

</div>
<?php
	endif;
	$cmt_global_iconbox_element_values = '';
?>