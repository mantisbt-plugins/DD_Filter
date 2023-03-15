<?php
/**
 * Defcon plugin for MantisBT
 * https://github.com/mantisbt-plugins/Defcon
 *
 * Copyright (c) 2022  Cas Nuy
 *
 * This file is part of the CustomReporter plugin for MantisBT.
 *
 * CustomReporter is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

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
print_successful_redirect( plugin_page( 'config', true ) );
