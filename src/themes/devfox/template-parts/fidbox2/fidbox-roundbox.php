<?php
	// Getting data of the  Facts in Digits box
	global $cmt_global_fid_element_values;
	
	// jquery circle progress bar js
	wp_enqueue_script('jquery-circle-progress');
	
	// skin color
	global $devfox_theme_options;
	$skincolor = ( !empty($devfox_theme_options['skincolor']) ) ? $devfox_theme_options['skincolor'] : '#129ce7' ;
	
	// dark color
	global $devfox_theme_options;
	$darkgrey = ( !empty($devfox_theme_options['secondarycolor']) ) ? $devfox_theme_options['secondarycolor'] : '#129ce7' ;
	
	$fillcolor = esc_attr($cmt_global_fid_element_values['circle_fill_color']);
	$emptycolor = esc_attr($cmt_global_fid_element_values['circle_empty_color']);
	
	if(!empty($fillcolor) && ($fillcolor == 'skincolor')) {
	$fillcolor	= $skincolor;
	}
	if(!empty($emptycolor) && ($emptycolor == 'skincolor')) {
		$emptycolor	= $skincolor;
	}
	
	if(!empty($fillcolor) && ($fillcolor == 'darkgrey')) {
	$fillcolor	= $darkgrey;
	}
	if(!empty($emptycolor) && ($emptycolor == 'darkgrey')) {
		$emptycolor	= $darkgrey;
	}
	
	if( is_array($cmt_global_fid_element_values) ) :
	
?>

<div class="cmt-fid inside <?php echo cymolthemes_wp_kses( $view_class ); ?>">	
	<div class="cmt-fld-contents">
		<div class="cmt-round-box"
			data-digit			= "<?php echo esc_attr( $digit ); ?>"
			data-fill			= "<?php echo esc_attr($fillcolor) ?>"
			data-before			= "<?php echo esc_html( $before_text ); ?>"
			data-before-type	= "<?php echo esc_html( $beforetextstyle ); ?>"
			data-after			= "<?php echo esc_html( $after_text ); ?>"
			data-after-type		= "<?php echo esc_html( $aftertextstyle ); ?>"
			data-size			= "145"
			data-emptyfill		= "<?php echo esc_attr($emptycolor) ?>"
			data-thickness		= "7"
			data-gradient		= ""
			>
			<div class="cmt-round-content">
				<div class="cmt-round"></div>
				<div class="cmt-round-boxcontent">
					<div class="cmt-fid-number"></div>
				</div>
			</div>
			<div class="cmt-fid-content">
				<h3 class="cmt-fid-title"><span><?php echo cymolthemes_wp_kses($title); ?><br></span></h3>
				<div class="cmt-fid-desc"><?php echo cymolthemes_wp_kses($desc); ?></div>
			</div>
		</div>
	</div><!-- .tm-fld-contents -->
</div>

<?php

	endif;
	
	// Resetting data of the Facts in Digits box
	$cmt_global_fid_element_values = '';
?>