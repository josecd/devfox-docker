<?php
global $devfox_theme_options;

$search_input = ( !empty($devfox_theme_options['search_input']) ) ? esc_attr($devfox_theme_options['search_input']) :  esc_attr_x("WRITE SEARCH WORD...", 'Search placeholder word', 'devfox');

$searchform_title = ( isset($devfox_theme_options['searchform_title']) ) ? esc_attr($devfox_theme_options['searchform_title']) :  esc_attr_x("Hi, How Can We Help You?", 'Search form title word', 'devfox');

if( !empty($searchform_title) ){
	$searchform_title = '<div class="cmt-sboxform-title">' . $searchform_title . '</div>';
}

if( !empty( $devfox_theme_options['header_search'] ) && $devfox_theme_options['header_search'] == true ){

?>
<div class="cmt-search-overlay">
	<div class="cmt-search-outer">
		<?php echo cymolthemes_wp_kses($searchform_title); ?>
		<form method="get" class="cmt-site-searchform" action="<?php echo esc_url( home_url() ); ?>">
			<input type="search" class="field searchform-s" name="s" placeholder="<?php echo esc_attr($search_input); ?>" />
			<button type="submit"><span class="cmt-devfox-icon-search"></span></button>
		</form>
	</div>
</div>
<?php } ?>