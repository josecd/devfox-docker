<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Devfox
 * @since Devfox 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		
		<h2 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				printf( esc_attr_x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'devfox' ), get_the_title() );
			} else {
				printf(
					_nx(
						'%1$s Reply to &ldquo;%2$s&rdquo;',
						'%1$s Replies to &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'devfox'
					),
					number_format_i18n( $comments_number ),
					get_the_title()
				);
			}
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 100,
					'callback'    => 'cymolthemes_comment_row_template',
				) );
			?>
		</ol><!-- .comment-list -->

		<?php devfox_comment_nav(); ?>

	<?php endif;  ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_attr_e( 'Comments are closed.', 'devfox' ); ?></p>
	<?php endif; ?>
	
	<?php
	
	// To use the variables present in the above code in a custom callback function, you must first set these variables within your callback using:
	$commenter = wp_get_current_commenter();
	
	$req = get_option( 'require_name_email' );
	
	
	$aria_req  = ( $req ? " aria-required='true'" : '' );
	if( !isset($required_text) ){ $required_text = ''; }
		
	// Comment form args
	$args = array();
	
	$args['comment_field'] = '<p class="comment-form-comment"><label class="cmt-hide" for="comment">' . esc_attr_x( 'Comment', 'noun', 'devfox' ) .
    '</label><textarea id="comment" placeholder="' . esc_attr_x('Comment', 'noun', 'devfox') . '" name="comment" cols="45" rows="8" aria-required="true">' .
    '</textarea></p>';
	
	$args['comment_notes_before'] = '<p class="comment-notes">' .
    esc_attr__( 'Your email address will not be published.' , 'devfox' ) . ' ' . ( $req ? $required_text : '' ) .
    '</p>';
	
	$args['comment_notes_after'] = '<p class="form-allowed-tags cmt-hide">' .
    sprintf(
		esc_attr__( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'devfox' ),
		' <code>' . allowed_tags() . '</code>'
    ) . '</p>';
	
	// Submit button class
	$args['class_submit'] = 'submit cmt-vc_general cmt-vc_btn3 cmt-vc_btn3-size-md cmt-vc_btn3-shape-square cmt-vc_btn3-style-flat cmt-vc_btn3-color-black';
	
	
	$args['fields'] = array(

	  'author' =>
		'<p class="comment-form-author"><label class="cmt-hide" for="author">' . esc_attr__( 'Name', 'devfox' ) . '</label> ' .
		( $req ? '<span class="required cmt-hide">*</span>' : '' ) .
		'<input id="author" placeholder="' . esc_attr__('Name','devfox') . ( $req ? ' (required)' : '' ) . '" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
		'" size="30"' . $aria_req . ' /></p>',

	  'email' =>
		'<p class="comment-form-email"><label class="cmt-hide" for="email">' . esc_attr__( 'Email', 'devfox' ) . '</label> ' .
		( $req ? '<span class="required cmt-hide">*</span>' : '' ) .
		'<input id="email" placeholder="' . esc_attr__('Email','devfox') . ( $req ? ' (required)' : '' ) . '" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
		'" size="30"' . $aria_req . ' /></p>',

	  'url' =>
		'<p class="comment-form-url"><label class="cmt-hide" for="url">' . esc_attr__( 'Website', 'devfox' ) . '</label>' .
		'<input id="url" placeholder="' . esc_attr__('Website','devfox') . '" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
		'" size="30" /></p>',
	);
	
	comment_form($args); ?>

</div><!-- .comments-area -->
