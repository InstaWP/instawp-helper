<?php
/**
 * Template - Timer Content
 */

use INSTAWP_HELPERS\Utils;

$site_status        = instawp_helper()::get_site_status();
$remaining_secs_arr = instawp_get_time_left( Utils::get_args_option( 'remaining_secs', $site_status ) );
$remaining_days     = (int) Utils::get_args_option( 'days', $remaining_secs_arr, 0 );
$remaining_hours    = (int) Utils::get_args_option( 'hours', $remaining_secs_arr, 0 );
$remaining_minutes  = (int) Utils::get_args_option( 'minutes', $remaining_secs_arr, 0 );
$current_status     = Utils::get_args_option( 'current_status', $site_status );
$site_type          = Utils::get_args_option( 'type', $site_status );
$site_type_str      = esc_html__( 'This is a local site.', 'instawp-helper' );
$dashboard_button   = sprintf( '<a href="%s" target="_blank" class="button button-manage">%s</a>', esc_url( INSTAWP_HELPER_API_BASE . '/register?source=wpadmin_timer' ), esc_html__( 'Claim Site', 'instawp-helper' ) );

if ( 'user-site' == $site_type ) {
	$site_type_str    = ucwords( str_replace( '-', ' ', $site_type ) );
	$site_type_str    = sprintf( esc_html__( 'This is a %s', 'instawp-helper' ), $site_type_str );
	$dashboard_button = sprintf( '<a href="%s" target="_blank" class="button button-manage">%s</a>', INSTAWP_HELPER_API_BASE, esc_html__( 'Open Dashboard', 'instawp-helper' ) );
}

?>
<div class="timer-box">

    <div class="box-icon">
        <svg width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M19 10C19 14.9706 14.9706 19 10 19M19 10C19 5.02944 14.9706 1 10 1M19 10H1M10 19C5.02944 19 1 14.9706 1 10M10 19C11.6569 19 13 14.9706 13 10C13 5.02944 11.6569 1 10 1M10 19C8.34315 19 7 14.9706 7 10C7 5.02944 8.34315 1 10 1M1 10C1 5.02944 5.02944 1 10 1" stroke="#005E54" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>

    <div class="box-content">

        <p class="site-type temporary"><?php echo $site_type_str; ?></p>
        <p class="time-left">You have <span class="time-text"><?php printf( esc_html__( '%s days, %s hours and %s minutes.', 'instawp-helper' ), $remaining_days, $remaining_hours, $remaining_minutes ); ?></span></p>

        <div class="action-buttons">
			<?php echo $dashboard_button; ?>
        </div>
    </div>

</div>
