<?php
/*
 *
 *  Single Portfolio - Top image
 *
 */

?>

<div class="cmt-pf-single-content-wrapper cmt-sboxpf-view-top-image">

	<?php echo cymolthemes_get_featured_media(); ?>
	
	<div class="row">
		<div class="cymolthemes-pf-single-content-area col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<?php echo cymolthemes_portfolio_description(); ?>
		</div><!-- .cymolthemes-pf-single-content-area -->
		<div class="cmt-social-bottom-wrapper col-md-12 col-lg-12">
			<div class="cmt-single-pf-footer">
				<?php
					// Portfolio Category
					$tag_value = get_the_term_list( get_the_ID(), 'cmt_portfolio_category', '', ' ', '' );
					if( !empty($tag_value) ){ ?>
						<div class="cmt-pf-single-category-w">
							<?php echo cymolthemes_wp_kses($tag_value); ?>
						</div>
				<?php } ?>
				<?php echo cymolthemes_social_share_box('portfolio'); /* Social share */ ?>
				</div>
			<div class="cmt-nextprev-bottom-nav">
				<?php echo cymolthemes_portfolio_next_prev_btn(); /* Next/Prev button */ ?>
			</div>
		</div>	
	</div>
	<?php echo cymolthemes_portfolio_related(); ?>
</div>

<?php edit_post_link( esc_attr__( 'Edit', 'devfox' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>