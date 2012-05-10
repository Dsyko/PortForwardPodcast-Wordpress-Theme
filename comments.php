<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to portforwardpodcast_comment() which is
 * located in the functions.php file.
 *
 * @package Portforwardpodcast
 * @since Portforwardpodcast 1.0
 */
?>

<?php
	/*
	 * If the current post is protected by a password and
	 * the visitor has not yet entered the password we will
	 * return early without loading the comments.
	 */
	if ( post_password_required() )
		return;
?>

	<div id="comments" class="comments-area span9">
	
	<?php // You can start editing here -- including this comment! ok... if you insist you have been edited, happy? ?>

	<?php if ( have_comments() ) : ?>
		
		<ul class="commentlist span9">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use portforwardpodcast_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define portforwardpodcast_comment() and that will be used instead.
				 * See portforwardpodcast_comment() in functions.php for more. <--- that is a blatant LIE the _comment() function is in template-tags.php
				 */
				wp_list_comments( array( 'callback' => 'portforwardpodcast_comment' ) );
			?>
		</ul>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav role="navigation" id="comment-nav-below" class="site-navigation comment-navigation span9">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'portforwardpodcast' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'portforwardpodcast' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'portforwardpodcast' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are no comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'portforwardpodcast' ); ?></p>
	<?php endif; ?>
	<div class="row">
	<div class="span9">
		<div class="span1">
			<span class='sprite mouth'></span>
		</div>
		<div class="span7 comment-reply-form">
			<?php comment_form(); ?>
		</div>
	</div>
	</div>
</div><!-- #comments .comments-area -->
