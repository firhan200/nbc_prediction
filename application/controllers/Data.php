<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
	public function index($id = 0){
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Crud');
		$this->load->library('pagination');

		$total = $this->Crud->totalData('tb_data');
		$config['total_rows'] = $total;
		$config['base_url'] = base_url().'data/index';
	 	$config['per_page'] = '50';
	 	$config['full_tag_open'] = '<div class="pagination">';
	 	$config['full_tag_close'] = '</div>';

		$this->pagination->initialize($config); 
		$data['halaman'] = $this->pagination->create_links();
		$data['query'] = $this->Crud->readPaging('tb_data', null, 'id_data', 'DESC', $config['per_page'], $id);

		$this->load->view('data_page', $data);
	}

	public function nbcPrediction(){
		//get input data
		$jenis_makanan = $this->input->get('jenis');
		$daerah = $this->input->get('daerah');
		$harga = $this->input->get('harga');
		$jam_buka = $this->input->get('jambuka');

		//processing
		$laris = 0;
		$tidak_laris = 0;
		$total_data = 0;
		$data['Ya']['jenis_makanan']['Burjo'] = 0;
		$data['Ya']['jenis_makanan']['Bakso'] = 0;
		$data['Ya']['jenis_makanan']['Kebab'] = 0;
		$data['Ya']['jenis_makanan']['Penyetan'] = 0;
		$data['Ya']['jenis_makanan']['Steak'] = 0;
		$data['Ya']['jenis_makanan']['Sushi'] = 0;
		$data['Ya']['jenis_makanan']['Warung Padang'] = 0;
		$data['Ya']['jenis_makanan']['Warung Tegal'] = 0;
		$data['Ya']['daerah']['Banjarsari'] = 0;
		$data['Ya']['daerah']['Bulusan'] = 0;
		$data['Ya']['daerah']['Banyumanik'] = 0;
		$data['Ya']['daerah']['Ngesrep'] = 0;
		$data['Ya']['daerah']['Timoho'] = 0;
		$data['Ya']['daerah']['Tirto Agung'] = 0;
		$data['Ya']['harga']['1'] = 0;
		$data['Ya']['harga']['2'] = 0;
		$data['Ya']['harga']['3'] = 0;
		$data['Ya']['jam_buka']['1'] = 0;
		$data['Ya']['jam_buka']['2'] = 0;
		$data['Ya']['jam_buka']['3'] = 0;
		$data['Tidak']['jenis_makanan']['Burjo'] = 0;
		$data['Tidak']['jenis_makanan']['Bakso'] = 0;
		$data['Tidak']['jenis_makanan']['Kebab'] = 0;
		$data['Tidak']['jenis_makanan']['Penyetan'] = 0;
		$data['Tidak']['jenis_makanan']['Steak'] = 0;
		$data['Tidak']['jenis_makanan']['Sushi'] = 0;
		$data['Tidak']['jenis_makanan']['Warung Padang'] = 0;
		$data['Tidak']['jenis_makanan']['Warung Tegal'] = 0;
		$data['Tidak']['daerah']['Banjarsari'] = 0;
		$data['Tidak']['daerah']['Bulusan'] = 0;
		$data['Tidak']['daerah']['Banyumanik'] = 0;
		$data['Tidak']['daerah']['Ngesrep'] = 0;
		$data['Tidak']['daerah']['Timoho'] = 0;
		$data['Tidak']['daerah']['Tirto Agung'] = 0;
		$data['Tidak']['harga']['1'] = 0;
		$data['Tidak']['harga']['2'] = 0;
		$data['Tidak']['harga']['3'] = 0;
		$data['Tidak']['jam_buka']['1'] = 0;
		$data['Tidak']['jam_buka']['2'] = 0;
		$data['Tidak']['jam_buka']['3'] = 0;
		$this->load->model('Crud');
		$query = $this->Crud->read('tb_data', null, null, null);
		foreach($query as $result){
			if($result->laris == 'Ya'){
				//cek makanan
				if($result->jenis_makanan=='Burjo'){
					$data['Ya']['jenis_makanan']['Burjo']++;
				}elseif($result->jenis_makanan=='Bakso'){
					$data['Ya']['jenis_makanan']['Bakso']++;
				}elseif($result->jenis_makanan=='Kebab'){
					$data['Ya']['jenis_makanan']['Kebab']++;
				}elseif($result->jenis_makanan=='Penyetan'){
					$data['Ya']['jenis_makanan']['Penyetan']++;
				}elseif($result->jenis_makanan=='Steak'){
					$data['Ya']['jenis_makanan']['Steak']++;
				}elseif($result->jenis_makanan=='Sushi'){
					$data['Ya']['jenis_makanan']['Sushi']++;
				}elseif($result->jenis_makanan=='Warung Padang'){
					$data['Ya']['jenis_makanan']['Warung Padang']++;
				}elseif($result->jenis_makanan=='Warung Tegal'){
					$data['Ya']['jenis_makanan']['Warung Tegal']++;
				}	
				//cek daerah
				if($result->daerah=='Banjarsari'){
					$data['Ya']['daerah']['Banjarsari']++;
				}elseif($result->daerah=='Bulusan'){
					$data['Ya']['daerah']['Bulusan']++;
				}elseif($result->daerah=='Banyumanik'){
					$data['Ya']['daerah']['Banyumanik']++;
				}elseif($result->daerah=='Ngesrep'){
					$data['Ya']['daerah']['Ngesrep']++;
				}elseif($result->daerah=='Timoho'){
					$data['Ya']['daerah']['Timoho']++;
				}elseif($result->daerah=='Tirto Agung'){
					$data['Ya']['daerah']['Tirto Agung']++;
				}	
				//cek harga
				if($result->harga==1){
					$data['Ya']['harga']['1']++;
				}elseif($result->harga==2){
					$data['Ya']['harga']['2']++;
				}elseif($result->harga==3){
					$data['Ya']['harga']['3']++;
				}
				//cek jam
				if($result->jam_buka==1){
					$data['Ya']['jam_buka']['1']++;
				}elseif($result->jam_buka==2){
					$data['Ya']['jam_buka']['2']++;
				}elseif($result->jam_buka==3){
					$data['Ya']['jam_buka']['3']++;
				}
				//total laris
				$laris++;				
			}else{
				//cek makanan
				if($result->jenis_makanan=='Burjo'){
					$data['Tidak']['jenis_makanan']['Burjo']++;
				}elseif($result->jenis_makanan=='Bakso'){
					$data['Tidak']['jenis_makanan']['Bakso']++;
				}elseif($result->jenis_makanan=='Kebab'){
					$data['Tidak']['jenis_makanan']['Kebab']++;
				}elseif($result->jenis_makanan=='Penyetan'){
					$data['Tidak']['jenis_makanan']['Penyetan']++;
				}elseif($result->jenis_makanan=='Steak'){
					$data['Tidak']['jenis_makanan']['Steak']++;
				}elseif($result->jenis_makanan=='Sushi'){
					$data['Tidak']['jenis_makanan']['Sushi']++;
				}elseif($result->jenis_makanan=='Warung Padang'){
					$data['Tidak']['jenis_makanan']['Warung Padang']++;
				}elseif($result->jenis_makanan=='Warung Tegal'){
					$data['Tidak']['jenis_makanan']['Warung Tegal']++;
				}	
				//cek daerah
				if($result->daerah=='Banjarsari'){
					$data['Tidak']['daerah']['Banjarsari']++;
				}elseif($result->daerah=='Bulusan'){
					$data['Tidak']['daerah']['Bulusan']++;
				}elseif($result->daerah=='Banyumanik'){
					$data['Tidak']['daerah']['Banyumanik']++;
				}elseif($result->daerah=='Ngesrep'){
					$data['Tidak']['daerah']['Ngesrep']++;
				}elseif($result->daerah=='Timoho'){
					$data['Tidak']['daerah']['Timoho']++;
				}elseif($result->daerah=='Tirto Agung'){
					$data['Tidak']['daerah']['Tirto Agung']++;
				}	
				//cek harga
				if($result->harga==1){
					$data['Tidak']['harga']['1']++;
				}elseif($result->harga==2){
					$data['Tidak']['harga']['2']++;
				}elseif($result->harga==3){
					$data['Tidak']['harga']['3']++;
				}
				//cek jam
				if($result->jam_buka==1){
					$data['Tidak']['jam_buka']['1']++;
				}elseif($result->jam_buka==2){
					$data['Tidak']['jam_buka']['2']++;
				}elseif($result->jam_buka==3){
					$data['Tidak']['jam_buka']['3']++;
				}
				//total tidak laris
				$tidak_laris++;
			}
			$total_data++;
		}

		$kalkulasiLaris = ($data['Ya']['jenis_makanan'][$jenis_makanan]/$laris) *
			($data['Ya']['daerah'][$daerah]/$laris) *
			($data['Ya']['harga'][$harga]/$laris) *
			($data['Ya']['jam_buka'][$jam_buka]/$laris) *
			($laris/$total_data);
		$kalkulasiTidakLaris = ($data['Tidak']['jenis_makanan'][$jenis_makanan]/$tidak_laris) *
			($data['Tidak']['daerah'][$daerah]/$tidak_laris) *
			($data['Tidak']['harga'][$harga]/$tidak_laris) *
			($data['Tidak']['jam_buka'][$jam_buka]/$tidak_laris) *
			($tidak_laris/$total_data);
		$jumlahLaris = $data['Ya']['jenis_makanan'][$jenis_makanan] +
			$data['Ya']['daerah'][$daerah] +
			$data['Ya']['harga'][$harga] +
			$data['Ya']['jam_buka'][$jam_buka];
		$jumlahTidakLaris = $data['Tidak']['jenis_makanan'][$jenis_makanan] +
			$data['Tidak']['harga'][$harga] +
			$data['Tidak']['daerah'][$daerah] +
			$data['Tidak']['jam_buka'][$jam_buka];
		$data['persenLaris'] = $kalkulasiLaris;
		$data['persenTidakLaris'] = $kalkulasiTidakLaris;
		if($kalkulasiLaris > $kalkulasiTidakLaris){
			$data['hasilKelarisan'] = 1;
		}elseif($kalkulasiLaris < $kalkulasiTidakLaris){
			$data['hasilKelarisan'] = 0;
		}else{
			$data['hasilKelarisan'] = 2;
		}
		header("Content-Type: application/json");
		echo json_encode($data);
	}

	public function insert(){
		$this->load->model('Crud');
		$jenis_makanan = $this->input->get('jenis');
		$daerah = $this->input->get('daerah');
		$harga = $this->input->get('harga');
		$jam_buka = $this->input->get('jambuka');
		$laris = $this->input->get('laris');

		$dataInsert = array('jenis_makanan'=>$jenis_makanan, 'daerah'=>$daerah, 'harga'=>$harga, 'jam_buka'=>$jam_buka, 'laris'=>$laris);
		$insert = $this->Crud->create('tb_data', $dataInsert);
		if($insert){
			return 1;
		}else{
			return 0;
		}
	}

	public function display($id){
		$this->load->model('Crud');
		$query = $this->Crud->read('tb_data', array('id_data'=>$id), null, null);
		foreach($query as $result){
			$data['jenis_makanan'] = $result->jenis_makanan;
			$data['daerah'] = $result->daerah;
			$data['harga'] = $result->harga;
			$data['jam_buka'] = $result->jam_buka;
			$data['laris'] = $result->laris;
		}
		header("Content-Type: application/json");
		echo json_encode($data);
	}

	public function edit($id){
		$this->load->model('Crud');
		$jenis_makanan = $this->input->get('jenis');
		$daerah = $this->input->get('daerah');
		$harga = $this->input->get('harga');
		$jam_buka = $this->input->get('jambuka');
		$laris = $this->input->get('laris');

		$dataUpdate = array('jenis_makanan'=>$jenis_makanan, 'daerah'=>$daerah, 'harga'=>$harga, 'jam_buka'=>$jam_buka, 'laris'=>$laris);
		$update = $this->Crud->update(array('id_data'=>$id), 'tb_data', $dataUpdate);
		if($update){
			return 1;
		}else{
			return 0;
		}
	}

	public function remove($id){
		$this->load->model('Crud');
		$delete = $this->Crud->delete(array('id_data'=>$id), 'tb_data');
		if($delete){
			return 1;
		}else{
			return 0;
		}
	}
}
