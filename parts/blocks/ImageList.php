<?php $heading = get_field('heading'); ?>
<div class="image-list">
    <?php if ($heading != ''): ?>
        <div class="list-heading"><h5 class="orange caps"><?php echo $heading; ?></h5></div>
    <?php endif; ?>
    <?php if (have_rows('images')) : ?>
        <div class="grid-x">
            <?php while (have_rows('images')) : the_row(); ?>
                <?php $add_link = get_sub_field('add_link'); ?>
                <?php $link = get_sub_field('link'); ?>
                <?php $image = get_sub_field('image'); ?>
                <?php $imageURL = $image['url']; ?>
                <?php $imageALT = $image['alt']; ?>
                <?php $description = get_sub_field('description'); ?>
                <div class="cell large-2 medium-4 small-6">
                    <div class="image" style="background-image: url(<?php echo $imageURL; ?>)"></div>
                    <div class="description"><?php echo $description; ?></div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</div>
