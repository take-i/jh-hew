<?php
/**
 * 標準の投稿フォーマット
 * 
 * @package JankHack-Hew
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-wrapper">



		<header class="entry-header">
			<?php jhhew_entry_format(); ?>

			<div class="entry-meta">
				<?php jhhew_posted_on(); ?>
			</div><!-- .entry-meta -->

			<?php if ( is_single() ) : ?>
				<div class="flex">
					<?php the_post_thumbnail('full'); ?>
				
				<h1 class="entry-title"><?php echo get_the_title(); ?></h1>
				</div>
			<?php else : ?>
				<?php the_title( '<h1 class="entry-title"><a href=" ' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
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
