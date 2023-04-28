<article class="cymolthemes-box cymolthemes-box-testimonial cymolthemes-testimonialbox-stylethree">
	<div class="cymolthemes-post-item">
		<div class="cymolthemes-box-content">
			<div class="cymolthemes-box-author">				
				<div class="cymolthemes-box-quote"><i class="cmt-devfox-icon-quote-1"> </i></div>
				<div class="cymolthemes-box-desc">
					<div class="cymolthemes-ratting-star"><?php echo cymolthemes_star_ratting(); ?></div>
					<blockquote class="cymolthemes-testimonial-text"><?php echo cymolthemes_wp_kses( strip_tags( get_the_content('') ) ); ?></blockquote>
					<div class="cymolthemes-box-title"><?php echo cymolthemes_testimonial_title(); ?>
						 
					</div>
				</div>		
			</div>
		</div>
	</div>
</article>