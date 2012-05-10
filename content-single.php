<?php
/**
 * @package Portforwardpodcast
 * @since Portforwardpodcast 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("span9"); ?>>
	<header class="entry-header row">
		<div class="entry-meta span1 sprite calendar">
			<?php portforwardpodcast_posted_on(); ?>
		</div><!-- .entry-meta -->
		<h2 class="entry-title span7"><?php the_title(); ?></h2>
		<div class="admin-controls span1">
			<?php edit_post_link( __( 'Edit', 'portforwardpodcast' ), '<span class="edit-link">', '</span>' ); ?>
		<div>
	</header><!-- .entry-header -->

	<div class="entry-content row">
		<div class="span9">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'portforwardpodcast' ), 'after' => '</div>' ) ); ?>
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-meta row">
		
			
		<div class="span1">
			<?php if ( !post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link sprite numcomments"><span class="commentcountertext"><?php echo get_comments_number(); ?></span></span>
			<?php endif; ?>
		</div>
		<div class="span8">
			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'portforwardpodcast' ) );
				if ( $tags_list ) :
			?>
			<span class="sprite tags"></span>
			<span class="tag-links">
				<?php printf( __( ' %1$s', 'portforwardpodcast' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		</div>
		
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
