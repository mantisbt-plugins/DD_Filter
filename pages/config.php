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

auth_reauthenticate();
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );
$t_title = 'Configure DD_Filter plugin' ;
layout_page_header( $t_title );
layout_page_begin( 'manage_overview_page.php' );
print_manage_menu();
?>

<br/>
<div class="col-md-12 col-xs-12">
<div class="space-10"></div>
<div class="form-container">

	<form action="<?php echo plugin_page( 'config_edit' ) ?>" method="post">
		<?php echo form_security_field( 'plugin_dd_filter_config_update' ) ?>

		<fieldset>
			<div class="widget-box widget-color-blue2">
				<div class="widget-header widget-header-small">
					<h4 class="widget-title lighter">
						<i class="ace-icon fa fa-exchange"></i>
						<?php echo plugin_lang_get( 'config' ); ?>
					</h4>
				</div>

				<div class="widget-main no-padding">
						<div class="table-responsive">
							<table class="table table-bordered table-condensed table-striped">
								<tr>
			</td>
			<td class="category" width="40%">
				<?php echo 'Define number of days to look backward' ; ?>
			</td>
			<td >
				<input type="text" name="dd_daysfrom" size="5" maxlength="5" value="<?php echo plugin_config_get( 'dd_daysfrom' )?>" >
			</td>
			</tr>
			<tr>
			</td>
			<td class="category" width="40%">
				<?php echo 'Define number of days to look forward' ; ?>
			</td>
			<td >
				<input type="text" name="dd_daysto" size="5" maxlength="5" value="<?php echo plugin_config_get( 'dd_daysto' )?>" >
			</td>
			</tr>
			</table>
			</div>
			</div>	
			<div class="widget-main no-padding">
				<div class="table-responsive">
					<table class="table table-bordered table-condensed table-striped">
					<tr>
					<td class="category"  width="40%">
						<?php echo 'Activate Duedate filtering' ?>
					</td>
					<td class="category">
						<label><input type="radio" name='dd_filter' value="1" <?php echo( ON == plugin_config_get( 'dd_filter' ) ) ? 'checked="checked" ' : ''?>/>
						<?php echo 'Yes'?></label>
						<label><input type="radio" name='dd_filter' value="0" <?php echo( OFF == plugin_config_get( 'dd_filter' ) )? 'checked="checked" ' : ''?>/>
						<?php echo 'No'?></label>
					</td>
					</tr>
					</table>
				</div>
			</div>	
			
			<div class="widget-toolbox padding-8 clearfix">
				<input type="submit"
					   class="btn btn-primary btn-white btn-round"
					   value="<?php echo lang_get( 'change_configuration' ) ?>"/>
			</div>
			</div>
			</div>
		</fieldset>
	</form>
</div>
</div>

<?php
layout_page_end();