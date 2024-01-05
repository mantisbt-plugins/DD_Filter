<?php
# authenticate
auth_reauthenticate();
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );

# Read results
form_security_validate( 'plugin_dd_filter_config_update' );
$f_dd_filter	= gpc_get_bool( 'dd_filter', ON );
$f_dd_daysfrom		= gpc_get_int( 'dd_daysfrom', 7 );
$f_dd_daysto		= gpc_get_int( 'dd_daysto', 7 );

# update results
plugin_config_set( 'dd_filter', $f_dd_filter );
plugin_config_set( 'dd_daysfrom', $f_dd_daysfrom );
plugin_config_set( 'dd_daysto', $f_dd_daysto );

form_security_purge( 'plugin_dd_filter_config_update' );

# redirect
print_header_redirect( plugin_page( 'config', true ) );