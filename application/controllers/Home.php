<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once("Secure_Controller.php");

class Home extends Secure_Controller 
{
	public function __construct()
	{
		parent::__construct(NULL, NULL, 'home');
	}

	public function index()
	{
		$data =[];
		$this->load->view('home/home2',$data);
	}

	function _chart_line_summary_sales($start_date, $end_date, $sale_type, $location_id = 'all')
	{
		$inputs = array('start_date' => $start_date, 'end_date' => $end_date, 'sale_type' => $sale_type, 'location_id' => $location_id);
		// cek($inputs);die();
		$this->load->model('reports/Summary_sales');
		$model = $this->Summary_sales;

		$report_data = $model->getData($inputs);
		$summary = $this->xss_clean($model->getSummaryData($inputs));
		// cek($report_data);
		// cek($summary);

		$labels = array();
		$series = array();
		foreach($report_data as $row)
		{
			$row = $this->xss_clean($row);

			$date = to_date(strtotime($row['sale_date']));
			$labels[] = $date;
			$series[] = array('meta' => $date, 'value' => $row['total']);
		}
		// cek($labels);
		// cek($series);
		// die();

		$data = array(
			'title' => 'Grafik Penjualan Bulan Ini ('.$start_date.' sd '.$end_date.')',
			'subtitle' => $this->_get_subtitle_report(array('start_date' => $start_date, 'end_date' => $end_date)),
			'chart_type' => 'reports/graphs/line',
			'labels_1' => $labels,
			'series_data_1' => $series,
			'summary_data_1' => $summary,
			'yaxis_title' => $this->lang->line('reports_revenue'),
			'xaxis_title' => $this->lang->line('reports_date'),
			'show_currency' => TRUE
		);

		return $data;
		
	}

	//	Returns subtitle for the reports
	private function _get_subtitle_report($inputs)
	{
		$subtitle = '';

		if(empty($this->config->item('date_or_time_format')))
		{
			$subtitle .= date($this->config->item('dateformat'), strtotime($inputs['start_date'])) . ' - ' .date($this->config->item('dateformat'), strtotime($inputs['end_date']));
		}
		else
		{
			$subtitle .= date($this->config->item('dateformat').' '.$this->config->item('timeformat'), strtotime(rawurldecode($inputs['start_date']))) . ' - ' . date($this->config->item('dateformat').' '.$this->config->item('timeformat'), strtotime(rawurldecode($inputs['end_date'])));
		}

		return $subtitle;
	}

	public function logout()
	{
		$this->Employee->logout();
	}

	/*
	Load "change employee password" form
	*/
	public function change_password($employee_id = -1)
	{
		$person_info = $this->Employee->get_info($employee_id);
		foreach(get_object_vars($person_info) as $property => $value)
		{
			$person_info->$property = $this->xss_clean($value);
		}
		$data['person_info'] = $person_info;

		$this->load->view('home/form_change_password', $data);
	}

	/*
	Change employee password
	*/
	public function save($employee_id = -1)
	{
		if($this->input->post('current_password') != '' && $employee_id != -1)
		{
			if($this->Employee->check_password($this->input->post('username'), $this->input->post('current_password')))
			{
				$employee_data = array(
					'username' => $this->input->post('username'),
					'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					'hash_version' => 2
				);

				if($this->Employee->change_password($employee_data, $employee_id))
				{
					echo json_encode(array('success' => TRUE, 'message' => $this->lang->line('employees_successful_change_password'), 'id' => $employee_id));
				}
				else//failure
				{
					echo json_encode(array('success' => FALSE, 'message' => $this->lang->line('employees_unsuccessful_change_password'), 'id' => -1));
				}
			}
			else
			{
				echo json_encode(array('success' => FALSE, 'message' => $this->lang->line('employees_current_password_invalid'), 'id' => -1));
			}
		}
		else
		{
			echo json_encode(array('success' => FALSE, 'message' => $this->lang->line('employees_current_password_invalid'), 'id' => -1));
		}
	}

	// ajax request dashboard:
	function ajax_total_card(){
		$this->load->model('general');
		$model = $this->general;
		$total_item = $model->datagrabs(['tabel'=>'ospos_items','where'=>['ifnull(deleted,0)'=>0],'select'=>'count(*) total'])->row()->total;
		$total_kategori = $model->data_query('select count(*) total from (select category from ospos_items group by category) as cat')->row()->total;
		$total_pemasok = $model->datagrabs(['tabel'=>'ospos_suppliers','where'=>['ifnull(deleted,0)'=>0],'select'=>'count(*) total'])->row()->total;
		$total_pelanggan = $model->datagrabs(['tabel'=>'ospos_customers','where'=>['ifnull(deleted,0)'=>0],'select'=>'count(*) total'])->row()->total;

		die(json_encode(['status'=>true,'results'=>['kategori'=>to_quantity_decimals($total_kategori),'item'=>to_quantity_decimals($total_item),'pemasok'=>to_quantity_decimals($total_pemasok),'pelanggan'=>to_quantity_decimals($total_pelanggan)]]));
	}

	function ajax_total_sales(){
		$total_tahun = $this->_total_sales(date('Y-01-01 00:00:00'),date('Y-12-t 23:59:59'),'complete');
		$total_bulan = $this->_total_sales(date('Y-m-01 00:00:00'),date('Y-m-t 23:59:59'),'complete');
		$total_hari = $this->_total_sales(date('Y-m-d 00:00:00'),date('Y-m-d 23:59:59'),'complete');
		// cek($total_tahun);die();
		die(json_encode(['status'=>true,'results'=>['tahun'=>to_currency($total_tahun['total']),'bulan'=>to_currency($total_bulan['total']),'hari'=>to_currency($total_hari['total'])]]));
	}

	function ajax_sales_bybulan(){
		$status = true;
		$jan = $this->_total_sales(date('Y-01-01 00:00:00'),date('Y-01-t 23:59:59'),'complete');
		$feb = $this->_total_sales(date('Y-02-01 00:00:00'),date('Y-02-t 23:59:59'),'complete');
		$mar = $this->_total_sales(date('Y-03-01 00:00:00'),date('Y-03-t 23:59:59'),'complete');
		$apr = $this->_total_sales(date('Y-04-01 00:00:00'),date('Y-04-t 23:59:59'),'complete');
		$mei = $this->_total_sales(date('Y-05-01 00:00:00'),date('Y-05-t 23:59:59'),'complete');
		$jun = $this->_total_sales(date('Y-06-01 00:00:00'),date('Y-06-t 23:59:59'),'complete');
		$jul = $this->_total_sales(date('Y-07-01 00:00:00'),date('Y-07-t 23:59:59'),'complete');
		$agu = $this->_total_sales(date('Y-08-01 00:00:00'),date('Y-08-t 23:59:59'),'complete');
		$sep = $this->_total_sales(date('Y-09-01 00:00:00'),date('Y-09-t 23:59:59'),'complete');
		$okt = $this->_total_sales(date('Y-10-01 00:00:00'),date('Y-10-t 23:59:59'),'complete');
		$nov = $this->_total_sales(date('Y-11-01 00:00:00'),date('Y-11-t 23:59:59'),'complete');
		$des = $this->_total_sales(date('Y-12-01 00:00:00'),date('Y-12-t 23:59:59'),'complete');
		// cek($feb);die();
		$res= array(
			['unit'=>'Jan', 'value'=>floatval($jan['total'])],
			['unit'=>'Feb', 'value'=>floatval($feb['total'])],
			['unit'=>'Mar', 'value'=>floatval($mar['total'])],
			['unit'=>'Apr', 'value'=>floatval($apr['total'])],
			['unit'=>'Mei', 'value'=>floatval($mei['total'])],
			['unit'=>'Jun', 'value'=>floatval($jun['total'])],
			['unit'=>'Jul', 'value'=>floatval($jul['total'])],
			['unit'=>'Agu', 'value'=>floatval($agu['total'])],
			['unit'=>'Sep', 'value'=>floatval($sep['total'])],
			['unit'=>'Okt', 'value'=>floatval($okt['total'])],
			['unit'=>'Nov', 'value'=>floatval($nov['total'])],
			['unit'=>'Des', 'value'=>floatval($des['total'])]
		);
		// cek($res);
		die(json_encode(['status'=>$status, 'results'=>$res]));
	}

	function ajax_sales_bykategori(){
		$res = $this->_summary_categories(date('Y-01-01 00:00:00'),date('Y-12-t 23:59:59'),'complete');
		$data = $res['data'];
		// cek($data);
		$results = [];
		foreach ($data as $r) {
			// cek($r['total']);
			// cek(parse_decimals2($r['total']));
			$results[] = ['unit'=>$r['category'],'value'=>parse_decimals2($r['total'])];
		}
		// cek($results);die();
		// die();
		die(json_encode(['status'=>true, 'results'=>$results]));
	}

	function ajax_last_transaction(){
		$data = $this->_summary_sales(date('Y-01-01 00:00:00'),date('Y-12-t 23:59:59'),'complete', 'all', 'sale_date DESC',5);
		// cek($data);die();
		die(json_encode(['status'=>true,'results'=>$data]));
	}

	function ajax_sales_line_bybulan(){
		$data = $this->_chart_line_summary_sales(date('Y-m-01 00:00:00'),date('Y-m-t 23:59:59'),'complete');
		$results = [];
		// cek($data);
		foreach ($data['series_data_1'] as $r) {
			$results[] = ['unit'=>$r['meta'],'value'=>floatval($r['value'])];
		}
		// cek($results);die();
		// die();
		die(json_encode(['status'=>true, 'results'=>$results]));
	}

	function _total_sales($start_date, $end_date, $sale_type, $location_id = 'all')
	{
		$inputs = array('start_date' => $start_date, 'end_date' => $end_date, 'sale_type' => $sale_type, 'location_id' => $location_id);
		// cek($inputs);die();
		$this->load->model('reports/Summary_sales');
		$model = $this->Summary_sales;

		// $report_data = $model->getData($inputs);
		$summary = $this->xss_clean($model->getSummaryData($inputs));

		return $summary;
		
	}

	public function _summary_sales($start_date, $end_date, $sale_type, $location_id = 'all',$order='sale_date',$limit=20)
	{
		$inputs = array('start_date' => $start_date, 'end_date' => $end_date, 'sale_type' => $sale_type, 'location_id' => $location_id,'order'=>$order, 'limit'=>$limit);

		$this->load->model('reports/Summary_sales');
		$model = $this->Summary_sales;

		$report_data = $model->getData($inputs);
		// cek($this->db->last_query());die();
		// $summary = $this->xss_clean($model->getSummaryData($inputs));
		// cek($summary);
		// die();

		$tabular_data = array();
		foreach($report_data as $row)
		{
			$tabular_data[] = $this->xss_clean(array(
				'sale_date' => to_date(strtotime($row['sale_date'])),
				'quantity' => to_quantity_decimals($row['quantity_purchased']),
				'subtotal' => to_currency($row['subtotal']),
				'tax' => to_currency_tax($row['tax']),
				'total' => to_currency($row['total']),
				'cost' => to_currency($row['cost']),
				'profit' => to_currency($row['profit'])
			));
		}

		$data = array(
			'title' => $this->lang->line('reports_sales_summary_report'),
			'subtitle' => $this->_get_subtitle_report(array('start_date' => $start_date, 'end_date' => $end_date)),
			'headers' => $this->xss_clean($model->getDataColumns()),
			'data' => $tabular_data,
			// 'summary_data' => $summary,
			'grants_labarugi' => $this->xss_clean($this->Employee->get_employee_grants_labarugi($this->session->userdata('person_id'))) > 0

		);

		return $data;
	}

	//Summary Categories report
	public function _summary_categories($start_date, $end_date, $sale_type, $location_id = 'all')
	{
		$inputs = array('start_date' => $start_date, 'end_date' => $end_date, 'sale_type' => $sale_type, 'location_id' => $location_id);

		$this->load->model('reports/Summary_categories');
		$model = $this->Summary_categories;

		$report_data = $model->getData($inputs);
		$summary = $this->xss_clean($model->getSummaryData($inputs));

		$tabular_data = array();
		foreach($report_data as $row)
		{
			$tabular_data[] = $this->xss_clean(array(
				'category' => $row['category'],
				'quantity' => to_quantity_decimals($row['quantity_purchased']),
				'subtotal' => to_currency($row['subtotal']),
				'tax' => to_currency_tax($row['tax']),
				'total' => to_currency($row['total']),
				'cost' => to_currency($row['cost']),
				'profit' => to_currency($row['profit'])
			));
		}

		$data = array(
			'title' => $this->lang->line('reports_categories_summary_report'),
			'subtitle' => $this->_get_subtitle_report(array('start_date' => $start_date, 'end_date' => $end_date)),
			'headers' => $this->xss_clean($model->getDataColumns()),
			'data' => $tabular_data,
			'summary_data' => $summary,
			'grants_labarugi' => $this->xss_clean($this->Employee->get_employee_grants_labarugi($this->session->userdata('person_id'))) > 0

		);

		return $data;
	}
}



?>
