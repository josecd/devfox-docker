<?php if ( function_exists('max_mega_menu_is_enabled') && max_mega_menu_is_enabled('cymolthemes-main-menu') ) : ?>

	<!-- Max Mega Menu is enabled so we are not showing our toggle menu -->
	
<?php else: ?>

<button id="menu-toggle" class="menu-toggle">
	<span class="cmt-hide"><?php esc_attr_e( 'Toggle menu', 'devfox' ); ?></span><i class="cmt-devfox-icon-bars"></i>
</button>

<?php endif; ?>

<?php if ( has_nav_menu( 'cymolthemes-main-menu' ) ) : ?>
<?php wp_nav_menu( array( 'theme_location' => 'cymolthemes-main-menu', 'menu_class' => 'nav-menu', 'container_class' => 'nav-menu' ) ); ?>
<?php endif; ?>
