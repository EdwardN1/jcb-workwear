<?php $heading = get_field('heading'); ?>
<?php $heading_type = get_field('heading_type'); ?>
<?php
$capitalise = ' style="text-transform:none;"';
if (get_field('capitalise') == 1) {
    $capitalise = ' style="text-transform:uppercase;"';
} ?>

<div class="social-heading">
    <<?php echo $heading_type; ?><?php echo $capitalise; ?>><?php echo $heading; ?></<?php echo $heading_type; ?>>
<div class="social">
    <a href="<?php the_field('facebook_link', 'option') ?>" target="_blank" class="social-icon"><img
                src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.png"></a>
    <a href="<?php the_field('twitter_link', 'option') ?>" target="_blank" class="social-icon"><img
                src="<?php echo get_template_directory_uri(); ?>/assets/images/twitter.png"></a>
    <a href="<?php the_field('instagram_link', 'option') ?>" target="_blank" class="social-icon"><img
                src="<?php echo get_template_directory_uri(); ?>/assets/images/Instagram.png"></a>

</div>
</div>
