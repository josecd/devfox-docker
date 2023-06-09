<div id="site-header" class="site-header <?php echo cymolthemes_sanitize_html_classes(cymolthemes_header_class()); ?>">
		<div class="site-header-main cmt-section-wrapper">
		
		<div class="cmt-sboxheader-top-wrapper <?php echo cymolthemes_sanitize_html_classes(cymolthemes_header_container_class()); ?>">
			<div class="site-branding">
				<?php echo cymolthemes_site_logo(); ?>
			</div><!-- .site-branding -->
			<div class="cmt-sboxtop-info-con">
				<?php cymolthemes_infostack_header_content(); ?>				
			</div>
		</div><!-- .cmt-sboxheader-top-wrapper -->
		
		<div id="cmt-stickable-wrapper" class="cmt-stickable-wrapper cmt-bgcolor-<?php echo cymolthemes_get_option('header_bg_color'); ?>" style="height:<?php echo cymolthemes_header_menuarea_height(); ?>px">
			<div id="site-header-menu" class="site-header-menu">
				<div class="site-header-menu-inner <?php echo sanitize_html_class(cymolthemes_sticky_header_class()); ?> ">
					<div class="<?php echo cymolthemes_sanitize_html_classes(cymolthemes_header_container_class()); ?> ">
						<div class="site-header-menu-middle">
							<div>
								<nav id="site-navigation" class="main-navigation" aria-label="Primary Menu" data-sticky-height="<?php echo esc_attr(cymolthemes_get_option('header_height_sticky')); ?>">		                        
									<?php get_template_part('template-parts/header/header','menu'); ?>
									<div class="kw-phone">
										<?php echo cymolthemes_wp_kses( cymolthemes_header_links(), 'header_links' ); ?>
										<div class="tcmt-sboxcustombutton">
											<?php echo cymolthemes_wp_kses( do_shortcode( cymolthemes_get_option('infostack_phone_text') ) ); ?>
										</div>
									</div>
									
								</nav><!-- .main-navigation -->
								
							</div>
						</div>
				</div>				
			</div><!-- .site-header-menu -->
		</div>		
		<?php cymolthemes_one_page_site_js(); ?>	
		</div>		
	</div><!-- .site-header-main -->
</div>

