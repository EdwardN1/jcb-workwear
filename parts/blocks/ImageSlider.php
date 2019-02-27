<?php if ( have_rows( 'slides' ) ) : ?>

	<?php $slides_to_show = get_field( 'slides_to_show' ); ?>

	<?php $slides_to_scroll = get_field( 'slides_to_scroll' ); ?>

	<?php $infinite_scroll = 'false'; ?>
	<?php if ( $infinite_scroll = get_field( 'infinite_scroll' ) == 1 ) {
		$infinite_scroll = 'true';
	} ?>

	<?php $autoplay = 'false'; ?>
	<?php if ( get_field( 'autoplay' ) == 1 ) {
		$autoplay = 'true';
	} ?>

	<?php $autoplay_speed_ms = get_field( 'autoplay_speed_ms' ); ?>

	<?php $transition_speed = get_field( 'transition_speed' ); ?>

	<?php $fade_transition = 'false'; ?>
	<?php if ( get_field( 'fade_transition' ) == 1 ) {
		$fade_transition = 'true';
	} ?>

    <div data-slick-slider
         data-slick='{"slidesToShow":<?php echo $slides_to_show; ?>, "slidesToScroll":<?php echo $slides_to_scroll; ?>, "infinite":<?php echo $infinite_scroll; ?>, "autoplay": <?php echo $autoplay; ?>, "autoplaySpeed": <?php echo $autoplay_speed_ms; ?>, "speed": <?php echo $transition_speed; ?>, "fade": <?php echo $fade_transition; ?>}'>
		<?php while ( have_rows( 'slides' ) ) : the_row(); ?>
			<?php $image = get_sub_field( 'image' ); ?>
			<?php $imageURL = $image['sizes']['large']; ?>
			<?php
			$slidestyle = '';
			if ( $image ) {
				$slidestyle = ' style="background-image:url(' . $imageURL . '); background-repeat: no-repeat; background-size: cover;"';
			}
			?>
			<?php if ( get_sub_field( 'add_link' ) == 1 ) {
				$link = get_sub_field( 'link' );
				echo '<a href="' . $link . '">';
			} ?>
            <div class="slider-container"<?php echo $slidestyle; ?>>
				<?php $description = get_sub_field( 'description' ); ?>
                <div class="slide-description">
                    <div class="slide-shader white"> <?php echo $description; ?></div>
                </div>
            </div>
			<?php if ( get_sub_field( 'add_link' ) == 1 ) {
				echo '</a>';
			} ?>
		<?php endwhile; ?>
    </div>
<?php else : ?>
	<?php // no rows found ?>
<?php endif; ?>