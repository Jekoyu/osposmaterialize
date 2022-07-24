<?php

class Migrate extends CI_Controller
{

        public function index()
        {
                $this->load->library('migration');

                if ($this->migration->current() === FALSE)
                {
                        show_error($this->migration->error_string());
                }else{
                	// cek('migrasi table berhasil...');
                	$current_version = $this->migration->version('20200926100001');
                	cek($current_version);
                }

                // cek($this->db->last_query());
        }

}