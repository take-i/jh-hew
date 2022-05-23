<?php
/**
 * 縦書きの投稿フォーマット
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

			<?php else : ?>
				<?php the_title( '<h1 class="entry-title"><a href=" ' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">

		<div class="article-tate">
                <h2 id="progress">只今、縦書きでレンダリング中です。フォントなどダウンロードしています...</h2>
                <div id="result-vertical"></div>

<pre id="src-text" style="display:none">
<?php the_post_thumbnail('full'); ?>
<h3><?php the_title(); ?></h3>
<?php the_content(); ?>
</pre>


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
