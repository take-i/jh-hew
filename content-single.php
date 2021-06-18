<?php
/**
 * @package JankHack-Hew
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-wrapper">

		<?php if ( has_post_thumbnail() ) : ?>

		<?php endif; ?>

		<header class="entry-header">
			<?php jhhew_entry_format(); ?>

			<div class="entry-meta">
				<?php jhhew_posted_on(); ?>
			</div><!-- .entry-meta -->

			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'jhhew' ) ); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'jhhew' ),
					'after'  => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
			?>
		</div><!-- .entry-content -->

		<?php jhhew_footer_meta(); ?>
	</div><!-- .entry-wrapper -->
</article><!-- #post-## -->
