<?php $top_image = get_field( 'top_image' ); ?>
<?php $top_imageURL = $top_image['url']; ?>
<?php $top_imageALT = $top_image['alt']; ?>
<?php $top_link = get_field( 'top_link' ); ?>

<?php $bottom_image = get_field( 'bottom_image' ); ?>
<?php $bottom_imageURL = $bottom_image['url']; ?>
<?php $bottom_imageALT = $bottom_image['alt']; ?>
<?php $bottom_link = get_field( 'bottom_link' ); ?>

<?php if ( get_field( 'custom_column' ) != 1 ): ?>
	<?php $top_image = get_field( 'stockists_image', 'option' ); ?>
	<?php $top_imageURL = $top_image['url']; ?>
	<?php $top_imageALT = $top_image['alt']; ?>
	<?php $top_link = get_field( 'stockists_link', 'option' ); ?>
	<?php $bottom_image = get_field( 'custom_workwear_image', 'option' ); ?>
	<?php $bottom_imageURL = $bottom_image['url']; ?>
	<?php $bottom_imageALT = $bottom_image['alt']; ?>
	<?php $bottom_link = get_field( 'custom_workwear_link', 'option' ); ?>
<?php endif; ?>

<?php $category_1_term = get_field( 'category_1' ); ?>
<?php if ( $category_1_term ): ?>
	<?php $category_1_ids = $category_1_term->term_id; ?>
	<?php $cat1Link = get_term_link( $category_1_ids ); ?>
	<?php $cat1Title = $category_1_term->name; ?>
	<?php $cat1thumbID = get_woocommerce_term_meta( $category_1_ids, 'thumbnail_id', true ); ?>
	<?php $cat1imageURL = wp_get_attachment_url( $cat1thumbID ); ?>
	<?php $cat1description = term_description( $category_1_ids ); ?>
<?php endif; ?>

<?php $category_2_term = get_field( 'category_2' ); ?>
<?php if ( $category_2_term ): ?>
	<?php $category_2_ids = $category_2_term->term_id; ?>
	<?php $cat2Title = $category_2_term->name; ?>
	<?php $cat2Link = get_term_link( $category_2_ids ); ?>
	<?php $cat2thumbID = get_woocommerce_term_meta( $category_2_ids, 'thumbnail_id', true ); ?>
	<?php $cat2imageURL = wp_get_attachment_url( $cat2thumbID ); ?>
	<?php $cat2description = term_description( $category_2_ids ); ?>
<?php endif; ?>

<?php $category_3_term = get_field( 'category_3' ); ?>
<?php if ( $category_3_term ): ?>
	<?php $category_3_ids = $category_3_term->term_id; ?>
	<?php $cat3Title = $category_3_term->name; ?>
	<?php $cat3Link = get_term_link( $category_3_ids ); ?>
	<?php $cat3thumbID = get_woocommerce_term_meta( $category_3_ids, 'thumbnail_id', true ); ?>
	<?php $cat3imageURL = wp_get_attachment_url( $cat3thumbID ); ?>
	<?php $cat3description = term_description( $category_3_ids ); ?>
<?php endif; ?>

<?php $remove_detail = get_field( 'remove_detail' ); ?>

<div class="detailed-categories grid-container leftpad-0 rightpad-0 toppad-20">
    <div class="grid-x">
        <div class="large-3 medium-3 small-12 cell side-bar">
            <div class="top-link">
                <a href="<?php echo $top_link; ?>">
					<?php if ( $top_image ) { ?>
                        <img src="<?php echo $top_imageURL; ?>" alt="<?php echo $top_imageALT; ?>"/>
					<?php } ?>
                </a>
            </div>
            <div class="bottom-link">
                <a href="<?php echo $bottom_link; ?>">
					<?php if ( $bottom_image ) { ?>
                        <img src="<?php echo $bottom_imageURL; ?>" alt="<?php echo $bottom_imageALT; ?>"/>
					<?php } ?>
                </a>
            </div>
        </div>

        <div class="large-9 medium-9 small-12">
            <div class="grid-x">
				<?php if ( $category_1_term ): ?>
                    <div class="large-4 medium-6 small-12 cell cat-detailed cat-start">
                        <a href="<?php echo $cat1Link; ?>">
                            <div class="top" style="background-image: url(<?php echo $cat1imageURL ?>)">
                                <span><?php echo $cat1Title; ?></span>
                            </div>
                        </a>
						<?php if ( ! $remove_detail ): ?>
                            <div class="bottom">
                                <div class="cat-description">
									<?php echo $cat1description; ?>
                                </div>
                                <div>
                                    <a class="button" href="<?php echo $cat1Link; ?>">Shop Now</a>
                                </div>
                            </div>
						<?php endif; ?>
                    </div>
				<?php endif; ?>

				<?php if ( $category_2_term ): ?>
                    <div class="large-4 medium-6 small-12 cell cat-detailed cat-middle">
                        <a href="<?php echo $cat2Link; ?>">
                            <div class="top" style="background-image: url(<?php echo $cat2imageURL ?>)">
                                <span><?php echo $cat2Title; ?></span>
                            </div>
                        </a>
						<?php if ( ! $remove_detail ): ?>
                            <div class="bottom">
                                <div class="cat-description">
									<?php echo $cat2description; ?>
                                </div>
                                <div>
                                    <a class="button" href="<?php echo $cat2Link; ?>">Shop Now</a>
                                </div>
                            </div>
						<?php endif; ?>
                    </div>
				<?php endif; ?>

				<?php if ( $category_3_term ): ?>
                    <div class="large-4 medium-6 small-12 cell cat-detailed cat-end">
                        <a href="<?php echo $cat3Link; ?>">
                            <div class="top" style="background-image: url(<?php echo $cat3imageURL ?>)">
                                <span><?php echo $cat3Title; ?></span>
                            </div>
                        </a>
						<?php if ( ! $remove_detail ): ?>
                            <div class="bottom">
                                <div class="cat-description">
									<?php echo $cat3description; ?>
                                </div>
                                <div>
                                    <a class="button" href="<?php echo $cat3Link; ?>">Shop Now</a>
                                </div>
                            </div>
						<?php endif; ?>
                    </div>
				<?php endif; ?>

				<?php $below_content = get_field( 'below_content' ); ?>
				<?php if ( $below_content ): ?>
                    <div class="below-content cell large-12 medium-12 small-12">
						<?php echo $below_content; ?>
                    </div>
				<?php endif; ?>
            </div>
        </div>


    </div>

</div>
