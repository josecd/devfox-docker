<article class="cymolthemes-box cymolthemes-box-blog cymolthemes-blogbox-styletwo cymolthemes-blogbox-format-<?php echo get_post_format() ?> <?php echo cymolthemes_sanitize_html_classes(cymolthemes_post_class()); ?>">

	<div class="post-item">
		<div class="cymolthemes-box-content">
			<div class="col-md-6 cymolthemes-box-img-left">
				<div class="cmt-featured-outer-wrapper cmt-post-featured-outer-wrapper">
					<div class="tm-blog-post-cat">
						<?php
						$categories_list = get_the_category_list( ', ' );
						if ( !empty($categories_list) ) { ?>
							<span class="tm-meta-line cat-links"><span class="screen-reader-text tm-hide"><?php echo esc_attr_x( 'Categories', 'Used before category names.', 'devfox' ); ?> </span><?php echo cymolthemes_wp_kses($categories_list); ?></span>
						<?php } ?>
					</div>
					<?php echo cymolthemes_get_featured_media( '', 'cymolthemes-img-blog-left' ); // Featured content ?>	
				</div>
			</div>
			<div class="cymolthemes-box-content col-md-6">
				<div class="cymolthemes-box-content-inner">
					<div class="entry-header">
						<?php echo devfox_entry_meta(); ?>								
						<?php echo cymolthemes_box_title(); ?>								
					</div>
					<div class="cymolthemes-box-desc">					
						<div class="cymolthemes-box-desc-text"><?php echo cymolthemes_blogbox_description(); ?></div>	
					</div>
					
				</div>	
					<div class="cymolthemes-teambox-readmore">
						<a href="<?php echo get_permalink(); ?>"><?php echo cymolthemes_blogbox_readmore_text(); ?></a>
					</div>
			</div>
		</div>
	</div>
</article>
