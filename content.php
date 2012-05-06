<?php
/**
 * @package Portforwardpodcast
 * @since Portforwardpodcast 1.0
 * Content, as displayed on front page list of posts
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("span9"); ?>>
	<header class="entry-header row">
		<div class="entry-meta span1 sprite calendar">
			<?php portforwardpodcast_posted_on(); ?>
		</div><!-- .entry-meta -->
		<h2 class="entry-title span7"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'portforwardpodcast' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class="admin-controls span1">
			<?php edit_post_link( __( 'Edit', 'portforwardpodcast' ), '<span class="edit-link">', '</span>' ); ?>
		<div>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content row">
		<div class="span9">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'portforwardpodcast' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'portforwardpodcast' ), 'after' => '</div>' ) ); ?>
		</div>
	</div><!-- .entry-content -->
	<?php endif; ?>
	
	<footer class="entry-meta row">
	<?php if ( 'post' == get_post_type() ) : ?>
		<div class="span1">
			<?php if ( !post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link sprite numcomments"><span class="commentcountertext"><?php comments_popup_link( "0","1", "%" ); ?></span></span>
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
			
		<?php endif; // End if 'post' == get_post_type() ?>
	</footer><!-- #entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
