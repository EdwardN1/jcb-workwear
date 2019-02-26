<?php
/**
 * The template for displaying search form
 */
 ?>



<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
        <span class="toppad-1 height-45 inline-block"><input type="search" placeholder="<?php echo esc_attr_x( 'Search...', 'jointswp' ) ?>" class="searchbox" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'jointswp' ) ?>"></span>
        <!--<span><img class="searchbtn" src="<?php /*echo get_template_directory_uri(); */?>/assets/images/search.png"></span>-->

	<span style="margin-left: -4px;"><input type="image" class="searchbtn inline-block" value="<?php echo esc_attr_x( 'Search', 'jointswp' ) ?>" src="<?php echo get_template_directory_uri(); ?>/assets/images/search.png" /></span>
</form>