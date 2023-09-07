<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_add_sales_monitor extends CI_Migration
{
	public function __construct()
	{
		parent::__construct();
	}

	public function up()
	{
		execute_script(APPPATH . 'migrations/sqlscripts/3.3.1_add_sales_monitor_management.sql');
	}

	public function down()
	{

	}
}
?>
