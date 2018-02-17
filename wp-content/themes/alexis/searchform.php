<?php
/**
 * The template for displaying Search form
 *
 * @package Alexis
 * @since 1.0
 */
?>
<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ) ?>">
	<input type="search" name="s" id="s" class="search" value="<?php _e('type & press ENTER', 'alexis'); ?>" onfocus="if (this.value == '<?php _e('type & press ENTER', 'alexis'); ?>') { this.value = '';}" onblur="if (this.value == '') { this.value = '<?php _e('type & press ENTER', 'alexis'); ?>';}" autocomplete="off">
</form>