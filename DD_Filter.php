<?php
class DD_FilterPlugin extends MantisPlugin {
 
	function register() {
		$this->name			= 'DD_Filter';
		$this->description	= 'Enable DueDate filtering';
		$this->version		= '1.05';
		$this->requires		= array('MantisCore'       => '2.0.0',);
		$this->author		= 'Cas Nuy';
		$this->contact		= 'Cas-at-nuy.info';
		$this->url			= 'http://www.nuy.info';
		$this->page 		= 'config';
	}

	function config() {
		return array(
			'dd_filter' => ON,
			'dd_daysfrom' => 7,
			'dd_daysto' => 7,
			);
	}

	function init() { 
		plugin_event_hook('EVENT_REPORT_BUG', 'LoadDD1'); 
		plugin_event_hook('EVENT_UPDATE_BUG', 'LoadDD2'); 
		// we need an event in the my_view_page
		event_declare('EVENT_MYVIEW');
		//Show issues with duedate in the coming days
		plugin_event_hook( 'EVENT_MYVIEW', 'duedate_myview' );
	}

	function LoadDD1($p_event, $thisissue){
		$filter		= plugin_config_get( 'dd_filter'  );
		if ( $filter ) {
			# get ID of custom field to update
			$t_id = custom_field_get_id_from_name('DueDate');
			# take the due date of issue
			$t_duedate = $thisissue->due_date;
			$t_bugid= $thisissue->id;
			# update custom field
			$ok = custom_field_set_value( $t_id, $t_bugid, $t_duedate, FALSE );
		}
	}
	
	function LoadDD2($p_event, $t_existing_bug, $t_updated_bug ){
		$filter		= plugin_config_get( 'dd_filter'  );
		if ( $filter ) {
			$p_bugdata= $t_updated_bug;
			# get ID of custom field to update
			$t_id = custom_field_get_id_from_name('DueDate');
			# take the due date of BUG_DATA
			$t_duedate = $p_bugdata->due_date;
			$t_bugid = $p_bugdata->id;
			# update custom field
			$ok = custom_field_set_value( $t_id, $t_bugid, $t_duedate, FALSE );
		}
	}
	
	function duedate_myview() {
 		 include 'plugins/DD_Filter/pages/myview_duedate.php';
	}
}