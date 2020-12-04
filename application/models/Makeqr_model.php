<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Makeqr_model extends CI_Model {
    function __construct()
    {
		parent::__construct();
		$this->load->library('ciqrcode');
    }
	
	function random_strings($length_of_string){ 
  
		$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; //abcdefghijklmnopqrstuvwxyz
		return substr(str_shuffle($str_result),0, $length_of_string); 
	}
//save data function setelah qrcode di generate
	public function save($data){
		$data = array_replace($data,
			array_fill_keys(
				array_keys($data, ""),
				NULL
			)
		);
		if(isset($data['quantity']) && count([$data['quantity']])>0){
			for($i=1;$i<=$data['quantity'];$i++){
				$r = $this->random_strings(6);
				
				$this->load->library('ciqrcode');
 
				$config['cacheable']    = true;
				$config['cachedir']     = './Assets/';
				$config['errorlog']     = './Assets/';
				$config['imagedir']     = './Assets/assets/images/';
				$config['quality']      = true;
				$config['size']         = '1024';
				$config['black']        = array(224,255,255);
				$config['white']        = array(70,130,180);
				$this->ciqrcode->initialize($config);
		 
				$image_name=$r.'.png'; //buat name dari qr code sesuai dengan random string
		 
				$params['data'] = $r; //data yang akan di jadikan QR CODE
				$params['level'] = 'H'; //H=High
				$params['size'] = 1024;
				$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder Assets/assets/images/
				$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
				
				$img = file_get_contents(FCPATH.$config['imagedir'].$image_name, "r");
				
				
				$base64 = 'data:image/png;base64,'.base64_encode($img);
				
				$data_insert = [];
				$data_insert['id_vessel'] = $data['id_vessel'];
				$data_insert['id_port'] = $data['id_port'];
				$data_insert['key'] = $r;
				$data_insert['qr'] = $base64; //error1
				$this->db->insert('qr_vessel', $data_insert); //error2
				
				$vessel = $this->db->query('select * from vessel where id_vessel='.$data['id_vessel'])->row_array();
				
				//tampilan hasil qr code yg tergenerate
				echo "<br><br><br><table class='table table-striped m-table'>
<tbody>
	<tr>
	  <td width='30%' style='background-color:black'>
		<img src=".$base64.">
	  </td>
	  <td width='70%' style='vertical-align:top'>
		Vessel Name : ".$vessel['vessel_name']."<br>
		Vessel Company : ".$vessel['company']."<br>
		Fishing Gear : ".$vessel['fishing_gear']."<br>
	  </td>

	</tr>
	<tr>
	  <td align='center'>
		".$r."
	  </td>
	  <td align='center'></td>
	  
	</tr>
</body>
</table>";
			}

			$notif['x'] = 'ok';
		}else{
			$notif['x'] = 'error';
			die('error');
		}
		
		return;
		
	}
}
?>