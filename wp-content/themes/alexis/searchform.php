<?php
/**
 * The template for displaying Search form
 *
 * @package Alexis
 * @since 2.0
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ) ?>">
	<input type="search" name="s" id="s" class="search" placeholder="TYPE & PRESS ENTER" onfocus="this.placeholder=''" onblur="this.placeholder='TYPE & PRESS ENTER'" />
	<i class="fa fa-search fa inline"></i>
</form>