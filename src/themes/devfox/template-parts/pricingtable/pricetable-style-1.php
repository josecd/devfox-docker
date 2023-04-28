<div class="cmt-pricetable-column-inner cmt-currency-before">

	<?php echo cymolthemes_wp_kses($featured); ?>
	
	<div class="cymolthemes-ptable-main">
	<?php echo cymolthemes_wp_kses( $icon ); 	?>
	<?php echo cymolthemes_wp_kses($heading); ?>
	<?php echo cymolthemes_wp_kses($description); ?>
		<div class="cmt-ptablebox-price-w">
			<?php echo cymolthemes_wp_kses($price); ?>
			<?php echo cymolthemes_wp_kses($frequency); ?>
		</div>
	</div>
	
	
	<div class="cmt-ptablebox-features">
		<ul class="cmt-feature-lines"><?php echo cymolthemes_wp_kses($lines_html); ?></ul>
	</div>	
	<?php echo cymolthemes_wp_kses($button); ?>

</div>