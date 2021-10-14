<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

	public function __construct(){
		parent:: __construct();

		$this->load->library('session');
		if($this->session->userdata('level') != 'admin'){
			$this->session->sess_destroy();
			redirect('app/login');
		}
	}

	public function index()
	{
		$data['data'] = $this->Crud->query("SELECT `tb_data`.* , `tb_akun`.`nama`  FROM `tb_data`,`tb_akun` WHERE `tb_data`.`id_petugas`=`tb_akun`.`id` ORDER BY `id` DESC")->result_array();
		$this->load->view('header');
		$this->load->view('footer');
		$this->load->view('tabel',$data);
	}

	public function exportToExcel(){
		$data = $this->Crud->query("SELECT `tb_data`.* , `tb_akun`.`nama`  FROM `tb_data`,`tb_akun` WHERE `tb_data`.`id_petugas`=`tb_akun`.`id` ORDER BY `id` DESC")->result_array();

		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$object = new PHPExcel();

		$object->getProperties()->setCreator("Admin PLN");
		$object->getProperties()->setLastModifiedBy("Admin PLN");
		$object->getProperties()->setTitle("Daftar PLN");

		$object->setActiveSheetIndex(0);
		$max = count($data)+3;
		$object->getActiveSheet()->getStyle('A1:AC3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
		$object->getActiveSheet()->getStyle('A1:AC'.$max)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$object->getActiveSheet()->getStyle('A1:AC3')->getFont()->setBold(true);
		$object->getActiveSheet()->getStyle('A1:AC3')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$ar1=['A'=>'NO','B'=>'NO.BA',
			'C'=>'HARI/TANGGAL','D'=>'IDPEL',
			'E'=>'NAMA','F'=>'ALAMAT',
			'G'=>'TARIF/DAYA','Z'=>'PETUGAS',
			'AA'=>'FOTO SEBELUM', 'AB'=>'FOTO SETELAH','AC'=>'KERERANGAN'];
		foreach($ar1 as $key=>$value){
			if($key=='AA' || $key=='AB'){
				$object->getActiveSheet()->getColumnDimension("AA")->setWidth(17);
				$object->getActiveSheet()->getColumnDimension("AB")->setWidth(17);
			}else{
				$object->getActiveSheet()->getColumnDimension($key)->setAutoSize(true);
			}
			$object->getActiveSheet()->mergeCells("{$key}1:{$key}3");
			$object->getActiveSheet()->setCellValue("{$key}1", $value);
		}
		$ar2=['H1:P1' => 'Sebelum', 'H2:N2'=>'kWh Meter Lama','O2:P2'=>'MCB Lama',
			'Q1:Y1' => 'Setelah', 'Q2:W2'=>'kWh Meter Baru','X2:Y2'=>'MCB Baru'];
		foreach($ar2 as $key=>$value){
			$object->getActiveSheet()->mergeCells($key);
			$key = substr($key, 0, 2);
			$object->getActiveSheet()->setCellValue($key, $value);
		}
		$ar3=['H'=>'Type','I'=>'No','J'=>'Teg','K'=>'Arus','L'=>'Class','M'=>'Tahun','N'=>'Stand','O'=>'Kapasitas','P'=>'Merk',
			'Q'=>'Type','R'=>'No','S'=>'Teg','T'=>'Arus','U'=>'Class','V'=>'Tahun','W'=>'Stand','X'=>'Kapasitas','Y'=>'Merk'];
		foreach($ar3 as $key=>$value){
			$object->getActiveSheet()->setCellValue("{$key}3", $value);
		}

		$baris=4;
		$no=1;
		foreach($data as $dt){
			$object->getActiveSheet()->setCellValue('A'.$baris, $no);
			$object->getActiveSheet()->setCellValue('B'.$baris, $dt['no_ba']);
			$object->getActiveSheet()->setCellValue('C'.$baris, $dt['hari_tgl']);
			$object->getActiveSheet()->setCellValue('D'.$baris, $dt['id_pel']);
			$object->getActiveSheet()->setCellValue('E'.$baris, $dt['nama_pel']);
			$object->getActiveSheet()->setCellValue('F'.$baris, $dt['alamat']);
			$object->getActiveSheet()->setCellValue('G'.$baris, $dt['tarif']);
			$object->getActiveSheet()->setCellValue('H'.$baris, $dt['type_kwh_lama']);
			$object->getActiveSheet()->setCellValue('I'.$baris, $dt['no_kwh_lama']);
			$object->getActiveSheet()->setCellValue('J'.$baris, $dt['teg_kwh_lama']);
			$object->getActiveSheet()->setCellValue('K'.$baris, $dt['arus_kwh_lama']);
			$object->getActiveSheet()->setCellValue('L'.$baris, $dt['class_kwh_lama']);
			$object->getActiveSheet()->setCellValue('M'.$baris, $dt['thn_kwh_lama']);
			$object->getActiveSheet()->setCellValue('N'.$baris, $dt['stand_kwh_lama']);
			$object->getActiveSheet()->setCellValue('O'.$baris, $dt['kap_mcb_lama']);
			$object->getActiveSheet()->setCellValue('P'.$baris, $dt['merk_mcb_lama']);
			$object->getActiveSheet()->setCellValue('Q'.$baris, $dt['type_kwh_baru']);
			$object->getActiveSheet()->setCellValue('R'.$baris, $dt['no_kwh_baru']);
			$object->getActiveSheet()->setCellValue('S'.$baris, $dt['teg_kwh_baru']);
			$object->getActiveSheet()->setCellValue('T'.$baris, $dt['arus_kwh_baru']);
			$object->getActiveSheet()->setCellValue('U'.$baris, $dt['class_kwh_baru']);
			$object->getActiveSheet()->setCellValue('V'.$baris, $dt['total_kwh_baru']);
			$object->getActiveSheet()->setCellValue('W'.$baris, $dt['kvarh_kwh_baru']);
			$object->getActiveSheet()->setCellValue('X'.$baris, $dt['kap_mcb_baru']);
			$object->getActiveSheet()->setCellValue('Y'.$baris, $dt['merk_mcb_baru']);
			$object->getActiveSheet()->setCellValue('Z'.$baris, $dt['nama']);
			// $object->getActiveSheet()->setCellValue('AA'.$baris, $dt['foto']);
			$object->getActiveSheet()->setCellValue('AC'.$baris, $dt['keterangan']);

			// gambar
			$object->getActiveSheet()->getRowDimension($baris)->setRowHeight(120);
			$objDrawing = new PHPExcel_Worksheet_Drawing();
			$signature = $_SERVER['DOCUMENT_ROOT'].'/www/ganti-meter-api/assets/photo/'.$dt['foto'];
			$objDrawing->setPath($signature);
			$objDrawing->setResizeProportional(true);
			$objDrawing->setCoordinates('AA'.$baris);
			$objDrawing->setWorksheet($object->getActiveSheet());

			$objDrawing1 = new PHPExcel_Worksheet_Drawing();
			$signature1 = $_SERVER['DOCUMENT_ROOT'].'/www/ganti-meter-api/assets/photo/'.$dt['foto_setelah'];
			$objDrawing1->setPath($signature1);
			$objDrawing1->setResizeProportional(true);
			$objDrawing1->setCoordinates('AB'.$baris);
			$objDrawing1->setWorksheet($object->getActiveSheet());
			$baris++;
			$no++;
		}

		$filename="Data PLN-".time().".xlsx";
		$object->getActiveSheet()->setTitle("Data PLN");

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');

		$writer = PHPExcel_IOFactory::createwriter($object, 'Excel2007');
		$writer->save('php://output');

		exit;
	}
}
