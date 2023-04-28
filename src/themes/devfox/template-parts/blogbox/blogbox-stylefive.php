<article class="cymolthemes-box cymolthemes-box-blog cymolthemes-blogbox-stylefive cymolthemes-blogbox-format-<?php echo get_post_format() ?> <?php echo cymolthemes_sanitize_html_classes(cymolthemes_post_class()); ?>">

	<div class="post-item">
		<div class="cymolthemes-box-content">
			<div class="col-md-6 cymolthemes-box-img-left">
				<div class="cmt-featured-outer-wrapper cmt-post-featured-outer-wrapper">
					<?php echo cymolthemes_get_featured_media( '', 'cymolthemes-img-blog-left' ); // Featured content ?>	
				</div>
			</div>
			<div class="cymolthemes-box-content col-md-6">
				<div class="cymolthemes-box-content-inner">
					<div class="entry-header">
						<?php echo devfox_entry_meta(); ?>								
						<?php echo cymolthemes_box_title(); ?>	
						<div class="cymolthemes-description">
						<?php echo cymolthemes_blogbox_description(); ?>
						</div>
					</div>
				</div>	
					<div class="cymolthemes-blogbox-readmore">
						<a href="#"><?php echo cymolthemes_blogbox_readmore_text(); ?></a>
					</div>
			</div>
		</div>
	</div>
</article>
