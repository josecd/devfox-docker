<?php
/*
 *
 *  Single Portfolio - Left
 *
 */

?>

<div class="cmt-pf-single-content-wrapper cmt-sboxpf-view-left-image">
	<div class="cmt-pf-single-content-wrapper-innerbox">
		
			<div class="cmt-sboxpf-detail-box row">
				<div class="cymolthemes-pf-single-featured-area col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<?php echo cymolthemes_get_featured_media(); ?>
				</div><!-- .cymolthemes-pf-single-featured-area -->	

<?php

	$excerpt = get_the_excerpt();	
	if( !empty($excerpt) ){
		$excerpt = apply_filters( 'the_content', $excerpt );
		$excerpt = str_replace( ']]>', ']]&gt;', $excerpt );
	}

?>					
				<div class="cymolthemes-pf-single-content-area col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="cymolthemes-pf-single-detail-box">
							<?php echo cymolthemes_portfolio_description_title(); ?>
						<div class="cmt-title-pf"> <?php echo cymolthemes_box_title(); ?></div>
							<?php echo cymolthemes_portfolio_detailsbox(); ?>
					</div>
				</div><!-- .cymolthemes-pf-single-content-area -->
			</div>
			<div class="cmt-pf-single-content-area">	
			
				<?php echo cymolthemes_portfolio_description(); ?>
			</div>
			<div class="cmt-social-bottom-wrapper col-md-12 col-lg-12">
				<div class="cmt-single-pf-footer">
				<?php
					// Portfolio Category
					$tag_value = get_the_term_list( get_the_ID(), 'cmt_portfolio_category','',esc_attr_x( ', ', 'Used between list items, there is a space after the comma.', 'devfox' ) );
					if( !empty($tag_value) ){ ?>
						<div class="cmt-pf-single-category-w"><span><?php echo esc_attr__( 'Tag:', 'devfox') ?></span>
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
