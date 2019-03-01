<?php
/**
 * Template part for displaying a single post
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?> role="article" itemscope
         itemtype="http://schema.org/BlogPosting">

    <header class="article-header grid-container">
        <h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
		<?php //get_template_part( 'parts/content', 'byline' ); ?>
    </header> <!-- end article header -->

    <section class="entry-content grid-container" itemprop="text">
		<?php $table = get_field( 'table' );
		if ( $table ) {
			echo '<table>';
			if ( $table['header'] ) {
				echo '<thead><tr>';
				echo '';
				foreach ( $table['header'] as $th ) {
					echo '<th class="text-center">';
					echo $th['c'];
					echo '</th>';
				}
				echo '</tr>';
				echo '</thead>';
			}

			echo '<tbody>';
			foreach ( $table['body'] as $tr ) {
				echo '<tr>';
				foreach ( $tr as $td ) {
					echo '<td class="text-center">' . $td['c'] . '</td>';
				}
				echo '</tr>';
			}
			echo '</tbody>';
			echo '</table>';
		} ?>
		<?php the_post_thumbnail( 'full' ); ?>
		<?php the_content(); ?>

    </section> <!-- end article section -->

    <footer class="article-footer">
		<?php wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jointswp' ),
			'after'  => '</div>'
		) ); ?>
        <p class="tags"><?php the_tags( '<span class="tags-title">' . __( 'Tags:', 'jointswp' ) . '</span> ', ', ', '' ); ?></p>
    </footer> <!-- end article footer -->

	<?php //comments_template(); ?>

</article> <!-- end article -->