<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_add_grants_report_cost_profit extends CI_Migration
{
	public function __construct()
	{
		parent::__construct();
	}

	public function up()
	{
		execute_script(APPPATH . 'migrations/sqlscripts/3.3.1_add_grants_report_cost_profit.sql');
		// $this->db->query('INSERT INTO ' . $this->db->dbprefix('permissions') . ' (permission_id) VALUES (\'reports_labarugi\')');
	}

	public function down()
	{
		$this->db->query('DELETE FROM ospos_permissions WHERE permission_id = \'reports_labarugi\'');
	}
}
?>
