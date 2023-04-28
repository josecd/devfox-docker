<article class="cymolthemes-box cymolthemes-box-team cymolthemes-teambox-styletwo">
	<div class="cymolthemes-post-item">
		<div class="cymolthemes-content-inner">
				<div class="cymolthemes-team-image-box">
					<?php echo cymolthemes_wp_kses(cymolthemes_featured_image('cymolthemes-img-team-member')); ?>
					
				</div>					
			<div class="cymolthemes-box-content">
				<div class="cymolthemes-box-content-inner">					
					<div class="cymolthemes-team-position"><?php echo cymolthemes_get_meta( 'cymolthemes_team_member_details', 'cmt_team_info' , 'team_details_line_position' ); ?></div>
					<?php echo cymolthemes_box_title(); ?>										
					<div class="cymolthemes-teambox-readmore">
						<?php echo cymolthemes_servicebox_readmore_text(); ?>
					</div>
				</div>
				<div class="tm-member-social">
					<div class="cymolthemes-team-icon">
						<a><i class="cmt-devfox-icon-plus"></i></a>	
					</div>
					<div class="cymolthemes-box-social-links"><?php echo cymolthemes_box_team_social_links(); ?></div>
				</div>
			</div>
		</div>
	</div>
</article>
 
 
 