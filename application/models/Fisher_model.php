<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Fisher_model extends CI_Model {
    function __construct()
    {
		parent::__construct();
		$this->sess = $this->session->userdata('logged_in');
    }
    //generate id departure 
	public function departure($data){
		$data = array_replace($data,
			array_fill_keys(
				array_keys($data, ""),
				NULL
			)
		);

		$vessel = $this->db->query('select count(*) as number from departure')->row_array();
		
		$tahun = date('y');
		$depart_number = str_pad(($vessel['number'])+1,6,"0",STR_PAD_LEFT);
		$depart_number = $tahun.'062'.$depart_number.'000';

		$data_insert = array();
		$data_insert['depart_number'] = $depart_number;
		$data_insert['id_vessel'] = $this->sess['username']; 
		$data_insert['fishing_master'] = $data['fishing_master'];
		$data_insert['depart_time'] = date('Y-m-d H:i');
		//$data_insert['tz_offset'] = date('Y-m-d H:i');
		$this->db->insert('departure', $data_insert);
		$notif['id_depart'] = $this->db->insert_id();//LEARN WHATS THIS
		$notif['depart_number'] = $depart_number;
		return $notif;
		
	}
	//untuk membuat laporan penangkapan ikan
	public function hauling($data){
		$data = array_replace($data,
			array_fill_keys(
				array_keys($data, ""),
				NULL
			)
		);

		$data['fish'] = $this->db->query('select * from fish order by name_indo')->result_array();

		$data_insert = [];
		$data_insert['id_depart'] = $data['id_depart'];
		$data_insert['depart_number'] = $data['depart_number'];
		$data_insert['catch_time'] = date('Y-m-d H:i');
		$data_insert['lat'] = $data['lat'];
		$data_insert['lon'] = $data['lon'];
		$data_insert['time_start'] = time();
		$this->db->insert('catches', $data_insert);
		$data['id_catches'] = $this->db->insert_id();

		return $data;
		
	}
	//untuk menghentikan proses pemancingan (report penangkapan ikan)
	public function stop_hauling($data){
		$data = array_replace($data,
			array_fill_keys(
				array_keys($data, ""),
				NULL
			)
		);
		$notif = array();
		$data_insert = array();
		$data_insert['time_end'] = time();
		$this->db->where('id_catches', $data['id_catches']);
		$this->db->update('catches', $data_insert);

		if(isset($data['fish_id']) && count($data['fish_id'])>0){
			$this->db->where('id_depart', $data['id_depart']);
			$this->db->where('id_catches', $data['id_catches']);
			$this->db->delete('catches_fish');
			foreach($data['fish_id'] as $key=>$value){
				if($data['weight'][$key]>0){
					$data_insert = array();
					$data_insert['id_depart'] = $data['id_depart'];
					$data_insert['id_catches'] = $data['id_catches'];
					$data_insert['fish_id'] = $value;
					$data_insert['weight'] = $data['weight'][$key];
					$data_insert['quantity'] = $data['quantity'][$key];
					$this->db->insert('catches_fish', $data_insert);
				}
			}
		}
		

		return $notif;
		
	}
	//menyimpan kode qr yang di scan
	public function save_qr($data){
		$data = array_replace($data,
			array_fill_keys(
				array_keys($data, ""),
				NULL
			)
		);
		$notif = array();
		$data_insert = array();
		$data_insert['qr'] = $data['qr'];
		$this->db->where('id_catches', $data['id_catches']);
		$this->db->update('catches', $data_insert);

		return $notif;
		
	}
	//menampilkan daftar report hasil tangkapan
	public function show_catch_list($data){
		$data = array_replace($data,
			array_fill_keys(
				array_keys($data, ""),
				NULL
			)
		);

		$data['catches'] = $this->db->query('select * from catches where depart_number like"'.substr($data['depart_number'], 0, -3).'%"')->result_array();

		return $data;
		
	}
	//menginput data pada tabel catches
	public function get_departure($id_trip){

		$data['catches'] = $this->db->query('select * from catches where id_depart="'.$id_trip.'" ORDER BY id_catches DESC')->result_array();
		$data['rec'] = $this->db->query('select * from departure where id_depart="'.$id_trip.'"')->row_array();

		return $data;
		
	}
	//menginput data pada tabel departure
	public function upload_final($data){
		$data = array_replace($data,
			array_fill_keys(
				array_keys($data, ""),
				NULL
			)
		);
		$notif = array();
		$data_insert = array();
		$data_insert['flag_upload'] = 1;
		$this->db->where('id_depart', $data['id_depart']);
		$this->db->update('departure', $data_insert);

		return $notif;
		
	}
	//menyesuaikan kode qr yang telah di scan kedalam tabel catch
	public function show_qr($qr){

		$data['catches'] = $this->db->query('select a.*, c.* from catches a
		left join departure b on a.id_depart=b.id_depart
		left join vessel c on b.id_vessel=c.id_vessel
		where a.qr="'.$qr.'"')->result_array();

		return $data;
		
	}
}
?>