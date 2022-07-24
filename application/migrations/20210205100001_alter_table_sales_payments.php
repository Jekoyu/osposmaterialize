<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_alter_table_sales_payments extends CI_Migration
{
	public function __construct()
	{
		parent::__construct();
	}

	public function up()
	{
		execute_script(APPPATH . 'migrations/sqlscripts/3.3.1_alter_table_sales_payments.sql');
	}

	public function down()
	{

	}
}
?>
