<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Elden_Ring_Wiki
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="headerbanner">
		
		<?php
		if ( is_singular() ) :
			the_title( '<h1><u>', '</u></h1>' );
		else :
			the_title( '<h2><u><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></u></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				elden_ring_wiki_posted_on();
				elden_ring_wiki_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</div><!-- .entry-header -->

	<?php elden_ring_wiki_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'elden-ring-wiki' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'elden-ring-wiki' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php elden_ring_wiki_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
