<?php if (!defined('BASEPATH')) { exit('No direct script access allowed'); }

class General extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}

	function save_data($tabel, $data = null, $column = null, $id = null){
		if (is_array($tabel)) {
			if (!empty($tabel['where'])) {
				$this->db->where($tabel['where']);
				return $this->db->update($tabel['tabel'],$tabel['data']);
			} else {
				$this->db->insert($tabel['tabel'],$tabel['data']);
				return $this->db->insert_id();
			}
		} else {
			if (!empty($id)) {
				$this->db->where($column,$id);
				return $this->db->update($tabel,$data);
			} else {
				$this->db->insert($tabel,$data);
				return $this->db->insert_id();	
			}    	
		}
	}

	
	function delete_data($tabel, $column = null, $id = null) {
		if (is_array($tabel)) {
			foreach($tabel['where'] as $w => $an) {
				if (is_null($an)) $this->db->where($w,null,false);
				else $this->db->where($w,$an);
			}
			return $this->db->delete($tabel['tabel']);
		} else {
			if (!empty($column)) { 
				if (is_array($column)) $this->db->where($column);
				else $this->db->where($column,$id);
			}
			return $this->db->delete($tabel);
		}
	}
	

	function datagrabs($param) {
		#13-03-23 fix group by when count has defined!
		$this->db->simple_query('SET SESSION group_concat_max_len=9999999');

		if (!empty($param['count'])) {

			if (!empty($param['search']) && !empty(array_values($param['search'])[0])) {

				if (!empty($param['select'])) {
					$this->db->select($param['select'],false);
				}else{
					$this->db->select('*',false);
				}

			}else{
				$this->db->select($param['count'],false);
			}

		}elseif(!empty($param['select'])) {
			$this->db->select($param['select'],false);
		}


		if (is_array($param['tabel'])) {    
			$n = 1;
			foreach($param['tabel'] as $tab => $on) {

				if ($n > 1) {
					if (is_array($on)) $this->db->join($tab,$on[0],$on[1]);
					else $this->db->join($tab,$on);
				} else { $this->db->from($tab); }
				$n+=1;
			}
		} else {
			$this->db->from($param['tabel']);
		}

		if (!empty($param['where'])) {
			foreach($param['where'] as $w => $an) {
			#ini bikin error kalo empty jadi di ganti null
				if (is_null($an)){
					$this->db->where($w,null,false);
				}else {
					$this->db->where($w,$an);
				}
			}
		}
		

		if (!empty($param['order_by'])) $this->db->order_by($param['order_by']);
		if (!empty($param['order'])) $this->db->order_by($param['order']);
		#$this->output->enable_profiler(TRUE);

		if (!empty($param['search']) && !empty(array_values($param['search'])[0])) {

			if (!empty($param['group_by'])) $this->db->group_by($param['group_by']);
			if (!empty($param['group'])) $this->db->group_by($param['group']);

			$q= $this->db->_compile_select(); 
			$this->db->_reset_select();
			if (!empty($param['count'])) {
				$this->db->select($param['count']." from ($q) t",false);
			}else{
				if(!empty($param['declare'])) $this->db->select("*,".$param['declare']." from ($q) t",false);	
				else $this->db->select("* from ($q) t",false);	

				if (!empty($param['order_by']) && !strpos($param['order_by'],'.')) $this->db->order_by($param['order_by']);
				if (!empty($param['order']) && !strpos($param['order'],'.')) $this->db->order_by($param['order']);
			}

			foreach($param['search'] as $sc => $vl) {
				if(is_array($vl)){
					
					$like_str = '';
					foreach ($vl as $ssc => $svl) {
						if($ssc == 0) $like_str .= $svl;
						else $like_str .= '|'.$svl;
					}
					if(!empty($like_str)) $this->db->where('(t.'.$sc.' REGEXP "'.$like_str.'")',null);
				} else {$this->db->or_like('t.'.$sc,$vl);}
			}
		}elseif(!empty($param['count'])){
			
			if(!empty($param['group_by']) || !empty($param['group'])){
				if (!empty($param['group_by'])) $this->db->group_by($param['group_by']);
				if (!empty($param['group'])) $this->db->group_by($param['group']);

				$q= $this->db->_compile_select(); 
				$this->db->_reset_select();
				$this->db->select($param['count']." from ($q) t",false);
			}
		}else{
			if (!empty($param['group_by'])) $this->db->group_by($param['group_by']);
			if (!empty($param['group'])) $this->db->group_by($param['group']);
		}





		if (!empty($param['limit'])){
			if(!empty($param['offset'])){
				$this->db->limit($param['limit'],$param['offset']);
			}else{
				$this->db->limit($param['limit']);
			}
		}
		
		return $this->db->get();
	}
	
	function data_query($sql=null){
		return $this->db->query($sql);	
	}
	
	function combo_box($param) {

		$data_combo =$this->datagrabs($param);
		$combo = [];
		if(@$param['pilih']!="-") $combo = array('' => !empty($param['pilih'])?$param['pilih']:'-- Pilih --');
//		$combo = array('' => !empty($param['pilih'])?$param['pilih']:'-- Pilih --');
		foreach($data_combo->result() as $row) {
			$valueb = array();
			if(is_array($param['val'])){
				foreach($param['val'] as $v) { 
					if (is_array($v)) {
						if ($v[0] == "(") $valueb[] = "(".$row->$v[1].")";
					} else {
						$valueb[] = $row->$v; 
					}
				}
			}else {
				$valueb[] = $row->{$param['val']};
			}
			

			$keyb = array();
			if (is_array($param['key'])) {
				foreach($param['key'] as $k) { $keyb[] = (strlen($row->$k) > 100)?substr($row->$k,0,100).' ...':$row->$k; }
			}
			$keyv = is_array($param['key']) ? implode("|",$keyb) : $row->{$param['key']};

			$combo[$keyv] = implode(" ",$valueb);
		} return $combo;  
		
	}

	function check_tab($tab) {
		
		return $this->db->table_exists($tab);

	}


}
