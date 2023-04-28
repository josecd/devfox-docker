<article class="cymolthemes-box cymolthemes-box-blog cymolthemes-blogbox-stylefour cymolthemes-blogbox-format-<?php echo get_post_format() ?> <?php echo cymolthemes_sanitize_html_classes(cymolthemes_post_class()); ?>">
	<div class="post-item">
		<div class="cymolthemes-box-content">		
			<div class="cmt-featured-outer-wrapper cmt-post-featured-outer-wrapper">
					<div class="tm-blog-post-cat">
						<?php
						$categories_list = get_the_category_list( ', ' );
						if ( !empty($categories_list) ) { ?>
							<span class="tm-meta-line cat-links"><span class="screen-reader-text tm-hide"><?php echo esc_attr_x( 'Categories', 'Used before category names.', 'invess' ); ?> </span><?php echo cymolthemes_wp_kses($categories_list); ?></span>
						<?php } ?>
					</div>
				<?php echo cymolthemes_get_featured_media( '', 'cymolthemes-img-blog' ); // Featured content ?>
			</div>		
			<div class="cymolthemes-box-desc">
				<div class="entry-header">
					<?php echo devfox_entry_meta(); ?>		
				    <?php echo cymolthemes_box_title(); ?>	
				</div>	
				<div class="cymolthemes-blogbox-readmore">
						<a href="<?php echo get_permalink(); ?>"><?php echo cymolthemes_blogbox_readmore_text(); ?></a>
					</div>
								
			</div>
        </div>
	</div>
</article>
