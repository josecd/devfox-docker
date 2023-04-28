<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Devfox
 * @since Devfox 1.0
 */

get_header(); ?>
	
	<div id="primary" class="content-area <?php echo cymolthemes_sanitize_html_classes(cymolthemes_sidebar_class('content-area')); ?>">
		<main id="main" class="site-main">
		
		
		<?php if( cymolthemes_get_option('blog_view') == 'box' ) : ?>
			<div class="row multi-column-row">
		<?php endif; ?>
		

		<?php if ( have_posts() ) : ?>

			<?php
			
			// Global column view
			$box               = 'blog';
			$global_view       = cymolthemes_get_option('blog_view');  // classic or box
			$global_box_column = cymolthemes_get_option('blogbox_column');  // one, two, three etc
			$global_box_view   = cymolthemes_get_option('blogbox_view');  // top-image, left-image etc
			
			if( get_post_type()=='cmt_portfolio' ){
				$box               = 'portfolio';
				$global_view       = 'box';
				$global_box_column = cymolthemes_get_option('pfcat_column');  // one, two, three etc
				$global_box_view   = cymolthemes_get_option('pfcat_view');  // top-image, left-image etc
				
			} elseif( get_post_type()=='cmt_team_member' ){
				$box               = 'team';
				$global_view       = 'box';
				$global_box_column = cymolthemes_get_option('teamcat_column');  // one, two, three etc
				$global_box_view   = cymolthemes_get_option('teamcat_view');  // top-image, left-image etc
				
			}
			
			if( $global_view == 'box' ){
				echo '<div class="row multi-columns-row cymolthemes-boxes-row-wrapper">';
			}
			
				// Start the Loop.
				while ( have_posts() ) : the_post();
					
					
					if( $global_view == 'box' ){
						echo cymolthemes_column_div( 'start', $global_box_column );
							echo get_template_part( 'template-parts/' . $box . 'box/' . $box . 'box', $global_box_view );
						echo cymolthemes_column_div( 'end', $global_box_column );
					}
					else if($global_view == 'classic') {
						echo get_template_part('template-parts/blogbox/blogbox','classic');
					}
					else {
						get_template_part( 'template-parts/content', 'post' );
					}
					
				// End the loop.
				endwhile;
				
			
			if( $global_view == 'box' ){
				echo '</div>';
			}
			?>
			
		<?php
		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		
		
		<?php if( cymolthemes_get_option('blog_view') == 'box' ) : ?>
			</div><!-- .row -->
		<?php endif; ?>
		
		
		<?php
		// Previous/next page navigation.
		echo cymolthemes_pagination();
		?>
		
		
		</main><!-- .site-main -->
	</div><!-- .content-area -->
	
	
	<?php
	// Left Sidebar
	cymolthemes_get_left_sidebar();

	// Right Sidebar
	cymolthemes_get_right_sidebar();
	?>
	

<?php get_footer(); ?>

