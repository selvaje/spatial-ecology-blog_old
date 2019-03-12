<h2><?php _e( 'Update log', 'companion-auto-update' ); ?></h2>

<?php
if( isset( $_GET['filter'] ) ) {
	$filter = $_GET['filter'];
} else {
	$filter = 'all';
}
?>

<ul class="subsubsub">
	<li><a <?php if( $filter == 'all' ) { echo "class='current'"; } ?> href='<?php echo admin_url( 'tools.php?page=cau-settings&tab=log&cau_page=log&filter=all' ); ?>'><?php _e( 'View full changelog', 'companion-auto-update' ); ?></a></li> |
	<li><a <?php if( $filter == 'plugins' ) { echo "class='current'"; } ?> href='<?php echo admin_url( 'tools.php?page=cau-settings&tab=log&cau_page=log&filter=plugins' ); ?>'><?php _e( 'Plugins', 'companion-auto-update' ); ?></a></li> |
	<li><a <?php if( $filter == 'themes' ) { echo "class='current'"; } ?> href='<?php echo admin_url( 'tools.php?page=cau-settings&tab=log&cau_page=log&filter=themes' ); ?>'><?php _e( 'Themes', 'companion-auto-update' ); ?></a></li>
</ul>

<div class='cau_spacing'></div>

<?php cau_fetch_log( 'all', 'table' ); ?>