<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gin and Tonic
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-header__title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-header__meta">
			<span class="entry-header__meta__author">by <em><?php the_author_posts_link(); ?></em></span>
			<span class="entry-header__meta__date">on <?php echo get_the_time(get_option('date_format')) ?></span>
			<?php if ( is_sticky() ) : ?>
			<span class="entry-header__meta__sticky"><i class="fa fa-star"></i></span> 
			<?php endif; ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php /* If has featured image & image isn't wide enough, use bg image. Else use featured image. Else insert divider */ ?>
	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-featured' ); ?>
	<?php if ( $image[1] < '750' && has_post_thumbnail() ) { ?>
	<div class="entry-header__featured entry-header__featured-bg" style="background: url('<?php echo $image[0]; ?>')"></div>
	<?php } elseif ( has_post_thumbnail() ) { ?>

	<div class="entry-header__featured">
			<a class="entry-header__featured__img" href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'post-featured' ); ?>
			</a>
	</div> <!--./entry-featured-->
	<?php } else { ?>
	<hr class="entry-header__divider">
	<?php } ?>

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'gnt' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gnt' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<span class="tags pull-left"><?php printf( '<span class="">' . __( 'in %1$s&nbsp;&nbsp;', 'bonestheme' ) . '</span>', get_the_category_list(', ') ); ?> <?php the_tags( '<span class="tags-title">' . __( '<i class="fa fa-tags"></i>', 'bonestheme' ) . '</span> ', ', ', '' ); ?></span>
		<span class="commentnum pull-right"><a href="<?php comments_link(); ?>"><?php comments_number( '<i class="fa fa-comment"></i> 0', '<i class="fa fa-comment"></i> 1', '<i class="fa fa-comment"></i> %' ); ?></a></span>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
