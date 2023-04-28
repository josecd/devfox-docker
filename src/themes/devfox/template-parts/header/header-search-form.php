<?php
global $devfox_theme_options;

$search_input = ( !empty($devfox_theme_options['search_input']) ) ? esc_attr($devfox_theme_options['search_input']) :  esc_attr_x("WRITE SEARCH WORD...", 'Search placeholder word', 'devfox');
?>

<div class="cymolthemes-header-searchform-wrapper k_flying_searchform_wrapper">
	<div class="container">
		<div class="row">
			<form method="get" id="flying_searchform" action="<?php echo esc_url( home_url() ); ?>" >
				<div class="w-search-form-h">
					<div class="w-search-form-row">
						<div class="w-search-input">
							<input type="text" class="field searchform-s" name="s" id="searchval" placeholder="<?php echo esc_attr($search_input); ?>" value="<?php echo get_search_query() ?>">
							<button class="header-search" type="submit"><i class="cmt-devfox-icon-search-1"></i></button>
						</div>
					</div>
				</div>
			</form>
			<div class="cmt-sboxicon-close">
				<i class="cmt-devfox-icon-close"></i>
			</div>
		</div>
	</div>
</div>
