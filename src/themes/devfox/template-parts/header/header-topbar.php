<?php if( cymolthemes_topbar_show() ) : ?>

<div class="cmt-topbar-wrapper <?php echo cymolthemes_sanitize_html_classes(cymolthemes_topbar_classes()); ?>">
	<div class="cymolthemes-topbar-inner">
		<div class="<?php echo cymolthemes_sanitize_html_classes(cymolthemes_topbar_container_class()); ?>">
			<?php echo cymolthemes_wp_kses( cymolthemes_topbar_content(), 'topbar' ); ?>
		</div>
	<?php 
	$topbar_content = '';
			// Floating bar icon
	if( cymolthemes_fbar_show()==true){
		$topbar_content .= '
		<span class="cymolthemes-fbar-btn ' . cymolthemes_sanitize_html_classes(cymolthemes_fbar_btn_classes()) . '">
			<a href="#" class="cymolthemes-fbar-btn-link">
				' . cymolthemes_fbar_open_icon() . '
				' . cymolthemes_fbar_close_icon() . '
				<span class="cmt-hide">' . esc_attr__('Open', 'devfox') . '</span>
			</a>
		</span>';
		
		echo cymolthemes_wp_kses($topbar_content);
	} ?>
	</div>
</div>

<?php endif;  // cymolthemes_topbar_show() ?>
