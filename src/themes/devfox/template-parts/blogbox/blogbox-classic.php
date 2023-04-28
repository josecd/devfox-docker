<article <?php cymolthemes_sanitize_html_classes( post_class( cymolthemes_blog_classic_extra_class() )); ?>>
	<div class="cmt-featured-outer-wrapper cmt-post-featured-outer-wrapper">
		<?php echo cymolthemes_get_featured_media( '', 'cymolthemes-img-blog' ); // Featured content?>
	<div class="tm-blog-post-cat">
						<?php
						$categories_list = get_the_category_list( ', ' );
						if ( !empty($categories_list) ) { ?>
							<span class="tm-meta-line cat-links"><span class="screen-reader-text tm-hide"><?php echo esc_attr_x( 'Categories', 'Used before category names.', 'devfox' ); ?> </span><?php echo cymolthemes_wp_kses($categories_list); ?></span>
						<?php } ?>
					</div>
	</div>
	<div class="cmt-blog-classic-box-content">
		<header class="entry-header">
		<?php if( !is_single() ) : ?>
		<?php if( 'quote' != get_post_format() && 'link' != get_post_format() ) : ?>	
				
		
			
		<?php endif; ?>
		<div class="cmt-entrymeta-wrapper">
			<?php echo devfox_entry_meta('blogclassic');  // blog post meta details ?>		
		</div>
<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>		
		</header><!-- .entry-header -->
		<div class="entry-content">
			<div class="cymolthemes-box-desc-text">
				<?php the_content( '' ); ?>
			</div>
			<div class="cymolthemes-blogbox-desc-footer">
				<div class="cymolthemes-blogbox-footer-readmore">
					<?php echo cymolthemes_blogbox_readmore(); ?>
				</div>
			</div>
			<div class="clear clr"></div>		
			<?php
			// pagination if any
			wp_link_pages( array(
				'before'      => '<div class="page-links">' . esc_attr__( 'Pages:', 'devfox' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) );
			?>
		</div><!-- .entry-content -->
	</div>
	<?php endif; ?>
</article>