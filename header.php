<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section
 *
 */
?>

<!doctype html>

<html class="no-js" <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8">

    <!-- Force IE to use the latest rendering engine available -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta class="foundation-mq">

    <!-- If Site Icon isn't set in customizer -->
	<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
        <!-- Icons & Favicons -->
        <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
        <link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png"
              rel="apple-touch-icon"/>
	<?php } ?>

    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div class="off-canvas-wrapper">

    <!-- Load off-canvas container. Feel free to remove if not using. -->
	<?php get_template_part( 'parts/content', 'offcanvas' ); ?>

    <div class="off-canvas-content" data-off-canvas-content>

        <header class="header" role="banner">
            <div class="show-for-medium">
				<?php get_template_part( 'parts/header', 'large' ); ?>
            </div>
            <!-- This navs will be applied to the topbar, above all content
				 To see additional nav styles, visit the /parts directory -->
			<?php get_template_part( 'parts/nav', 'offcanvas-topbar' ); ?>

            <div id="top-message-banner" class="orange-background text-center heebo ExtraBold fontsize-22 caps black toppad-3"><?php the_field('top_banner_message','option');?></div>
            <div id="stay-updated-form" class="reveal black-background white" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
               <?php gravity_form(1, true, false, false, '', true, 12);?>
                <button class="close-button" data-close aria-label="Close modal" type="button">

                    <span aria-hidden="true">&times;</span>

                </button>
            </div>

        </header> <!-- end .header -->