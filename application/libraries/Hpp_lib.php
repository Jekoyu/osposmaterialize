<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Curl Class
 *
 * Work with remote servers via cURL much easier than using the native PHP bindings.
 *
 * @package        	CodeIgniter
 * @subpackage    	Libraries
 * @category    	Libraries
 * @author        	Philip Sturgeon
 * @license         http://philsturgeon.co.uk/code/dbad-license
 * @link			http://philsturgeon.co.uk/code/codeigniter-curl
 */
class Hpp_lib {

	protected $_ci;                 // CodeIgniter instance
	protected $response = '';       // Contains the cURL response for debug
	protected $session;             // Contains the cURL handler for a session
	protected $url;                 // URL of the session
	protected $options = array();   // Populates curl_setopt_array
	protected $headers = array();   // Populates extra HTTP headers
	public $error_code;             // Error code returned as an int
	public $error_string;           // Error message returned as a string
	public $info;                   // Returned after request (elapsed time, etc)

	function __construct($url = '')
	{
		$this->_ci = & get_instance();
		$this->_init_db();
	}

	function _init_db(){

		$this->_ci->load->dbforge();
		$tabel = array(
			'items' => array(
				array('unit_price_percent', 'decimal', 15.2, TRUE),
				array('unit_price_ck', 'int', 1, TRUE,NULL,0),
			),
		);
		// cek($tabel);die();

		$total = 0;
		$done = 0;
		$column = 0;
		$donec = 0;

		foreach($tabel as $tab => $c_tab) {
			$total +=1;
			if (!$this->_ci->db->table_exists($tab)) {
				
				$fields = array();
				$ex_fields = array();
				foreach($c_tab as $col => $c_col) {
					
					if (in_array($c_col[1],array('timestamp','decimal'))) $ex_fields[] = $c_col;
					else {
					
					$fields[$c_col[0]] = array(
							'type' => $c_col[1],
							'null' => @$c_col[3]);
					if (!empty($c_col[4])) {
						$fields[$c_col[0]]['auto_increment'] = TRUE;
						$key = $c_col[0];
					}
					if (!empty($c_col[2])) $fields[$c_col[0]]['constraint'] = str_replace('.',',',$c_col[2]);
					if (!empty($c_col[5])) $fields[$c_col[0]]['default'] = $c_col[5];
					if (!empty($c_col[5])) $fields[$c_col[0]]['default_string'] = false;
					}
				}
				$this->_ci->dbforge->add_field($fields);
				$this->_ci->dbforge->add_key($key, TRUE);

				$this->_ci->dbforge->create_table($tab);
				
				foreach($ex_fields as $c) {
					$this->_ci->db->query('ALTER TABLE ospos_'.$tab.' ADD `'.$c[0].'` '.$c[1].(!empty($c[2])?'('.str_replace('.',',',$c[2]).')':null).' '.(!empty($c[5])?' DEFAULT '.$c[5]:null));
					
				}				
				
			} else {
			
				$done+=1;
				$ex_fields = array();
				foreach($c_tab as $col => $c_col) {
					$column += 1;
					if (!$this->_ci->db->field_exists($c_col[0], $tab)) {
						if (in_array($c_col[1],array('timestamp','decimal'))) {
							// cek($c_col);

							$qry = 'ALTER TABLE ospos_'.$tab.' ADD `'.$c_col[0].'` '.$c_col[1];
							if(!empty($c_col[2])) $qry .= ' ('.str_replace('.',',',$c_col[2]).')';
							if(!empty($c_col[5])) $qry .= ' DEFAULT '.$c_col[5];

							$this->_ci->db->query($qry);
							// die();
						} else {
							
						$fields = array(
							$c_col[0] => array(
								'type' => $c_col[1],
								'null' => @$c_col[3]));
						if (!empty($c_col[2])) $fields[$c_col[0]]['constraint'] = $c_col[2];
						if (!empty($c_col[4])) $fields[$c_col[0]]['auto_increment'] = TRUE;
						if (!empty($c_col[5])) $fields[$c_col[0]]['default'] = $c_col[5];						
						if (!empty($c_col[5])) $fields[$c_col[0]]['default_string'] = false;						
						
						$this->_ci->dbforge->add_column($tab, $fields);
						
						}
					

					} else {

						// modifying:
						// 
						if (in_array($c_col[1],array('timestamp','decimal'))) {
							// cek($c_col);

							$qry = 'ALTER TABLE ospos_'.$tab.' CHANGE `'.$c_col[0].'` `'.$c_col[0].'` '.$c_col[1];
							if(!empty($c_col[2])) $qry .= ' ('.str_replace('.',',',$c_col[2]).')';
							if(!empty($c_col[5])) $qry .= ' DEFAULT '.$c_col[5];

							$this->_ci->db->query($qry);
							// die();
						}else{
							$fields = array(
							        $c_col[0] => array(
							                'name' => $c_col[0],
							                'type' => $c_col[1],
							                'null' => @$c_col[3],
							        ),
							);

							if (!empty($c_col[2])) $fields[$c_col[0]]['constraint'] = $c_col[2];
							if (!empty($c_col[4])) $fields[$c_col[0]]['auto_increment'] = TRUE;
							if (!empty($c_col[5])) $fields[$c_col[0]]['default'] = $c_col[5];						
							if (!empty($c_col[5])) $fields[$c_col[0]]['default_string'] = false;

							$this->_ci->dbforge->modify_column($tab, $fields);
						}
						

						$donec += 1;
					}
				}
				
			
			}
		}
		// print_r($this->_ci->db->last_query());die();
	}


}

/* End of file Curl.php */
/* Location: ./application/libraries/Curl.php */