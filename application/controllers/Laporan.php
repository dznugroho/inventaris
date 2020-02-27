<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_Laporan','m_laporan');
		$this->load->library('session');

		if($this->session->userdata('masuk') != TRUE){
			$url=base_url('login');
			redirect($url);
		}
		if($this->session->userdata('akses')!='1') redirect('dashboard');
	}

	function index(){
		$data['laporan'] = $this->m_laporan->get_accepted();
        $data['keyword'] = $this->m_laporan->get_bidang()->result();
		$this->load->view('export/laporan',$data);
    }

    function export(){
    	$data['laporan']=$this->m_laporan->caridata();
		$pilihan = $this->input->post('pilihan',TRUE);
		
		if($pilihan==1){
			$data['laporan']=$this->m_laporan->caridata();
	
        	$this->load->view('laporan/print_laporan',$data);
		
		}else{
			$data['laporan']=$this->m_laporan->caridata();
        	$this->load->view('laporan/excel_laporan',$data);
    }

 //    function cari() {
		
	// $data['laporan']=$this->m_laporan->caridata();
	// 	//jika data yang dicari tidak ada maka akan keluar informasi 
	// $pilihan = $this->input->post('pilihan',TRUE);
	// 	if($pilihan==1){
	// 		$data['laporan']=$this->m_laporan->caridata();
	
 //        $this->load->view('laporan/print_laporan',$data);
	// 	}
	// 	else{
	// 		$data['laporan']=$this->m_laporan->caridata();
	// 		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
			
	// 		// Panggil class PHPExcel nya
	// 		$excel = new PHPExcel();
	
	// 		// Settingan awal fil excel
	// 		$excel->getProperties()->setCreator('DAN')
	// 							   ->setTitle("Data Usulan Diterima")
	// 							   ->setSubject("Data Usulan Diterima")
	// 							   ->setDescription("Laporan  Data Usulan yang Diterima")
	// 							   ->setKeywords("Data Usulan");
	
	// 		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
	// 		$style_col = array(
	// 			'font' => array('bold' => true), // Set font nya jadi bold
	// 			'alignment' => array(
	// 				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
	// 				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	// 			),
	// 			'borders' => array(
	// 				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
	// 				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
	// 				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
	// 				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	// 			)
	// 		);
	
	// 		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
	// 		$style_row = array(
	// 			'alignment' => array(
	// 				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	// 			),
	// 			'borders' => array(
	// 				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
	// 				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
	// 				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
	// 				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	// 			)
	// 		);
	
	// 		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA  USULAN DAN PERUSAHAAN YANG DITERIMA");
	// 		$excel->getActiveSheet()->mergeCells('A1:V1');
	// 		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
	// 		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
	// 		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
	// 		// Buat header tabel nya pada baris ke 3
	// 		$excel->setActiveSheetIndex(0)->setCellValue('A3', "No.");
	// 		$excel->setActiveSheetIndex(0)->setCellValue('B3', "Bidang");
	// 		$excel->setActiveSheetIndex(0)->setCellValue('C3', "Subbidang");
	// 		$excel->setActiveSheetIndex(0)->setCellValue('D3', "Tahun Pengusulan");
	// 		$excel->setActiveSheetIndex(0)->setCellValue('E3', "Waktu Mulai");
	// 		$excel->setActiveSheetIndex(0)->setCellValue('F3', "Waktu Selesai");
	// 		$excel->setActiveSheetIndex(0)->setCellValue('G3', "Anggaran");
	// 		$excel->setActiveSheetIndex(0)->setCellValue('H3', "Alamat Kegiatan");
	// 		$excel->setActiveSheetIndex(0)->setCellValue('I3', "Kecamatan Kegiatan");
	// 		$excel->setActiveSheetIndex(0)->setCellValue('J3', "Desa Kegiatan");
	// 		$excel->setActiveSheetIndex(0)->setCellValue('K3', "Deskripsi");
	// 		$excel->setActiveSheetIndex(0)->setCellValue('L3', "Institusi Pengusul");
	// 		$excel->setActiveSheetIndex(0)->setCellValue('M3', "Alamat Institusi");
	// 		$excel->setActiveSheetIndex(0)->setCellValue('N3', "Kecamatan");
	// 		$excel->setActiveSheetIndex(0)->setCellValue('O3', "Desa");
	// 		$excel->setActiveSheetIndex(0)->setCellValue('P3', "Nama Pengusul");
	// 		$excel->setActiveSheetIndex(0)->setCellValue('Q3', "No_Telp Pengusul");
	// 		$excel->setActiveSheetIndex(0)->setCellValue('R3', "Perusahaan Pengambil");
	// 		$excel->setActiveSheetIndex(0)->setCellValue('S3', "Alamat");
	// 		$excel->setActiveSheetIndex(0)->setCellValue('T3', "No_Telp Perusahaan");
	// 		$excel->setActiveSheetIndex(0)->setCellValue('U3', "Email");
	// 		$excel->setActiveSheetIndex(0)->setCellValue('V3', "Dana");
	
	// 		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
	// 		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
	// 		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
	// 		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
	// 		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
	// 		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
	// 		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
	// 		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
	// 		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
	// 		$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
	// 		$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
	// 		$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
	// 		$excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
	// 		$excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
	// 		$excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
	// 		$excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
	// 		$excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
	// 		$excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);
	// 		$excel->getActiveSheet()->getStyle('R3')->applyFromArray($style_col);
	// 		$excel->getActiveSheet()->getStyle('S3')->applyFromArray($style_col);
	// 		$excel->getActiveSheet()->getStyle('T3')->applyFromArray($style_col);
	// 		$excel->getActiveSheet()->getStyle('U3')->applyFromArray($style_col);
	// 		$excel->getActiveSheet()->getStyle('V3')->applyFromArray($style_col);
	
	// 		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
			
	// 		$laporan = $this->m_laporan->caridata();
	
	// 		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
	// 		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
	// 		foreach($laporan->result_array() as $row){ // Lakukan looping pada variabel siswa
	// 			$nama_bidang=$row['nama_bidang'];
	// 			$nama_sub=$row['nama_sub'];
	// 			$tahun_pengusulan=$row['tahun_pengusulan'];
	// 			$waktu_mulai=$row['waktu_mulai'];
	// 			$waktu_selesai=$row['waktu_selesai'];
	// 			$anggaran=$row['anggaran'];
	// 			$alamat_kegiatan=$row['alamat_kegiatan'];
	// 			$nama_kecamatan=$row['nama_kecamatan'];
	// 			$desa=$row['desa'];
	// 			$deskripsi=$row['deskripsi'];
	// 			$nama_institusi=$row['nama_institusi'];
	// 			$alamat_institusi=$row['alamat_institusi'];
	// 			$nama_k=$row['nama_k'];
	// 			$nama_d=$row['nama_d'];
	// 			$nama_pengusul=$row['nama_pengusul'];
	// 			$no_telp=$row['no_telp'];
	// 			$nama_perusahaan=$row['nama_perusahaan'];
	// 			$alamat=$row['alamat'];
	// 			$no_telp_perusahaan=$row['no_telp_perusahaan'];
	// 			$email=$row['email'];
	// 			$dana=$row['dana'];
	// 			$status_perusahaan=$row['status_perusahaan'];
	
	// 			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
	// 			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $nama_bidang);
	// 			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $nama_sub);
	// 			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $tahun_pengusulan);
	// 			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $waktu_mulai);
	// 			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $waktu_selesai);
	// 			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $anggaran);
	// 			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $alamat_kegiatan);
	// 			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $nama_kecamatan);
	// 			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $desa);
	// 			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $deskripsi);
	// 			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $nama_institusi);
	// 			$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $alamat_institusi);
	// 			$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $nama_k);
	// 			$excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $nama_d);
	// 			$excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $nama_pengusul);
	// 			$excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $no_telp);
	// 			$excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $nama_perusahaan);
	// 			$excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $alamat);
	// 			$excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $no_telp_perusahaan);
	// 			$excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $email);
	// 			$excel->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $dana);
				
	// 			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
	// 			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
	// 			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
	// 			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
	// 			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
	// 			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
	// 			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
	// 			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
	// 			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
	// 			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
	// 			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
	// 			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
	// 			$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
	// 			$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
	// 			$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
	// 			$excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
	// 			$excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
	// 			$excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
	// 			$excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
	// 			$excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
	// 			$excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
	// 			$excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
	// 			$excel->getActiveSheet()->getStyle('V'.$numrow)->applyFromArray($style_row);
				
	// 			$no++; // Tambah 1 setiap kali looping
	// 			$numrow++; // Tambah 1 setiap kali looping
	// 		}
	
	// 		// Set width kolom
	// 		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
	// 		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(30); // Set width kolom B
	// 		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
	// 		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(18); // Set width kolom D
	// 		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(15); // Set width kolom E
	// 		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(15); // Set width kolom E
	// 		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(15); // Set width kolom E
	// 		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(15); // Set width kolom E
	// 		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(15); // Set width kolom E
	// 		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(15); // Set width kolom E
	// 		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(15); // Set width kolom E
	// 		$excel->getActiveSheet()->getColumnDimension('L')->setWidth(15); // Set width kolom E
	// 		$excel->getActiveSheet()->getColumnDimension('M')->setWidth(15); // Set width kolom E
	// 		$excel->getActiveSheet()->getColumnDimension('N')->setWidth(15); // Set width kolom E
	// 		$excel->getActiveSheet()->getColumnDimension('O')->setWidth(15); // Set width kolom E
	// 		$excel->getActiveSheet()->getColumnDimension('P')->setWidth(15); // Set width kolom E
	// 		$excel->getActiveSheet()->getColumnDimension('Q')->setWidth(15); // Set width kolom E
	// 		$excel->getActiveSheet()->getColumnDimension('R')->setWidth(15); // Set width kolom E
	// 		$excel->getActiveSheet()->getColumnDimension('S')->setWidth(15); // Set width kolom E
	// 		$excel->getActiveSheet()->getColumnDimension('T')->setWidth(15); // Set width kolom E
	// 		$excel->getActiveSheet()->getColumnDimension('U')->setWidth(15); // Set width kolom E
	// 		$excel->getActiveSheet()->getColumnDimension('V')->setWidth(15); // Set width kolom E
			
	// 		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
	// 		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
	
	// 		// Set orientasi kertas jadi LANDSCAPE
	// 		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
	
	// 		// Set judul file excel nya
	// 		$excel->getActiveSheet(0)->setTitle("Laporan Data Usulan");
	// 		$excel->setActiveSheetIndex(0);
	
	// 		// Proses file excel
	// 		header('Content-Type: application/vnd.ms-excel');
	// 		header('Content-Disposition: attachment; filename="Data Usulan diterima Berdasarkan Bidang.xlsx"'); // Set nama file excel nya
	// 		header('Cache-Control: max-age=0');
	
	// 		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
	// 		$write->save('php://output');

	// 	}
		  
	//    }


	// public function excel(){
	// 	$data['laporan']=$this->m_laporan->caridata();
	// 	include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
	// 	// Panggil class PHPExcel nya
	// 	$excel = new PHPExcel();

	// 	// Settingan awal fil excel
	// 	$excel->getProperties()->setCreator('DAN')
	// 						   ->setTitle("Data Usulan Diterima")
	// 						   ->setSubject("Data Usulan Diterima")
	// 						   ->setDescription("Laporan  Data Usulan yang Diterima")
	// 						   ->setKeywords("Data Usulan");

	// 	// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
	// 	$style_col = array(
	// 		'font' => array('bold' => true), // Set font nya jadi bold
	// 		'alignment' => array(
	// 			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
	// 			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	// 		),
	// 		'borders' => array(
	// 			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
	// 			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
	// 			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
	// 			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	// 		)
	// 	);

	// 	// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
	// 	$style_row = array(
	// 		'alignment' => array(
	// 			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	// 		),
	// 		'borders' => array(
	// 			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
	// 			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
	// 			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
	// 			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	// 		)
	// 	);

	// 	$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA  USULAN DAN PERUSAHAAN YANG DITERIMA");
	// 	$excel->getActiveSheet()->mergeCells('A1:V1');
	// 	$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
	// 	$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
	// 	$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
	// 	// Buat header tabel nya pada baris ke 3
	// 	$excel->setActiveSheetIndex(0)->setCellValue('A3', "No.");
	// 	$excel->setActiveSheetIndex(0)->setCellValue('B3', "Bidang");
	// 	$excel->setActiveSheetIndex(0)->setCellValue('C3', "Subbidang");
	// 	$excel->setActiveSheetIndex(0)->setCellValue('D3', "Tahun Pengusulan");
	// 	$excel->setActiveSheetIndex(0)->setCellValue('E3', "Waktu Mulai");
	// 	$excel->setActiveSheetIndex(0)->setCellValue('F3', "Waktu Selesai");
	// 	$excel->setActiveSheetIndex(0)->setCellValue('G3', "Anggaran");
	// 	$excel->setActiveSheetIndex(0)->setCellValue('H3', "Alamat Kegiatan");
	// 	$excel->setActiveSheetIndex(0)->setCellValue('I3', "Kecamatan Kegiatan");
	// 	$excel->setActiveSheetIndex(0)->setCellValue('J3', "Desa Kegiatan");
	// 	$excel->setActiveSheetIndex(0)->setCellValue('K3', "Deskripsi");
	// 	$excel->setActiveSheetIndex(0)->setCellValue('L3', "Institusi Pengusul");
	// 	$excel->setActiveSheetIndex(0)->setCellValue('M3', "Alamat Institusi");
	// 	$excel->setActiveSheetIndex(0)->setCellValue('N3', "Kecamatan");
	// 	$excel->setActiveSheetIndex(0)->setCellValue('O3', "Desa");
	// 	$excel->setActiveSheetIndex(0)->setCellValue('P3', "Nama Pengusul");
	// 	$excel->setActiveSheetIndex(0)->setCellValue('Q3', "No_Telp Pengusul");
	// 	$excel->setActiveSheetIndex(0)->setCellValue('R3', "Perusahaan Pengambil");
	// 	$excel->setActiveSheetIndex(0)->setCellValue('S3', "Alamat");
	// 	$excel->setActiveSheetIndex(0)->setCellValue('T3', "No_Telp Perusahaan");
	// 	$excel->setActiveSheetIndex(0)->setCellValue('U3', "Email");
	// 	$excel->setActiveSheetIndex(0)->setCellValue('V3', "Dana");

	// 	// Apply style header yang telah kita buat tadi ke masing-masing kolom header
	// 	$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
	// 	$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
	// 	$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
	// 	$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
	// 	$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
	// 	$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
	// 	$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
	// 	$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
	// 	$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
	// 	$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
	// 	$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
	// 	$excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
	// 	$excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
	// 	$excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
	// 	$excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
	// 	$excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
	// 	$excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);
	// 	$excel->getActiveSheet()->getStyle('R3')->applyFromArray($style_col);
	// 	$excel->getActiveSheet()->getStyle('S3')->applyFromArray($style_col);
	// 	$excel->getActiveSheet()->getStyle('T3')->applyFromArray($style_col);
	// 	$excel->getActiveSheet()->getStyle('U3')->applyFromArray($style_col);
	// 	$excel->getActiveSheet()->getStyle('V3')->applyFromArray($style_col);

	// 	// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		
	// 	$laporan = $this->m_laporan->caridata();

	// 	$no = 1; // Untuk penomoran tabel, di awal set dengan 1
	// 	$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
	// 	foreach($laporan->result_array() as $row){ // Lakukan looping pada variabel siswa
	// 		$nama_bidang=$row['nama_bidang'];
	// 		$nama_sub=$row['nama_sub'];
	// 		$tahun_pengusulan=$row['tahun_pengusulan'];
	// 		$waktu_mulai=$row['waktu_mulai'];
	// 		$waktu_selesai=$row['waktu_selesai'];
	// 		$anggaran=$row['anggaran'];
 //            $alamat_kegiatan=$row['alamat_kegiatan'];
 //            $nama_kecamatan=$row['nama_kecamatan'];
 //            $desa=$row['desa'];
 //            $deskripsi=$row['deskripsi'];
 //            $nama_institusi=$row['nama_institusi'];
 //            $alamat_institusi=$row['alamat_institusi'];
 //            $nama_k=$row['nama_k'];
 //            $nama_d=$row['nama_d'];
 //            $nama_pengusul=$row['nama_pengusul'];
 //            $no_telp=$row['no_telp'];
 //            $nama_perusahaan=$row['nama_perusahaan'];
 //            $alamat=$row['alamat'];
 //            $no_telp_perusahaan=$row['no_telp_perusahaan'];
 //            $email=$row['email'];
 //            $dana=$row['dana'];
 //            $status_perusahaan=$row['status_perusahaan'];

	// 		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
	// 		$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $nama_bidang);
	// 		$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $nama_sub);
	// 		$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $tahun_pengusulan);
	// 		$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $waktu_mulai);
	// 		$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $waktu_selesai);
	// 		$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $anggaran);
	// 		$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $alamat_kegiatan);
	// 		$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $nama_kecamatan);
	// 		$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $desa);
	// 		$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $deskripsi);
	// 		$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $nama_institusi);
	// 		$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $alamat_institusi);
	// 		$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $nama_k);
	// 		$excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $nama_d);
	// 		$excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $nama_pengusul);
	// 		$excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $no_telp);
	// 		$excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $nama_perusahaan);
	// 		$excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $alamat);
	// 		$excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $no_telp_perusahaan);
	// 		$excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $email);
	// 		$excel->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $dana);
			
	// 		// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
	// 		$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
	// 		$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
	// 		$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
	// 		$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
	// 		$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
	// 		$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
	// 		$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
	// 		$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
	// 		$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
	// 		$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
	// 		$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
	// 		$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
	// 		$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
	// 		$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
	// 		$excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
	// 		$excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
	// 		$excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
	// 		$excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
	// 		$excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
	// 		$excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
	// 		$excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
	// 		$excel->getActiveSheet()->getStyle('V'.$numrow)->applyFromArray($style_row);
			
	// 		$no++; // Tambah 1 setiap kali looping
	// 		$numrow++; // Tambah 1 setiap kali looping
	// 	}

	// 	// Set width kolom
	// 	$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
	// 	$excel->getActiveSheet()->getColumnDimension('B')->setWidth(30); // Set width kolom B
	// 	$excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
	// 	$excel->getActiveSheet()->getColumnDimension('D')->setWidth(18); // Set width kolom D
	// 	$excel->getActiveSheet()->getColumnDimension('E')->setWidth(15); // Set width kolom E
	// 	$excel->getActiveSheet()->getColumnDimension('F')->setWidth(15); // Set width kolom E
	// 	$excel->getActiveSheet()->getColumnDimension('G')->setWidth(15); // Set width kolom E
	// 	$excel->getActiveSheet()->getColumnDimension('H')->setWidth(15); // Set width kolom E
	// 	$excel->getActiveSheet()->getColumnDimension('I')->setWidth(15); // Set width kolom E
	// 	$excel->getActiveSheet()->getColumnDimension('J')->setWidth(15); // Set width kolom E
	// 	$excel->getActiveSheet()->getColumnDimension('K')->setWidth(15); // Set width kolom E
	// 	$excel->getActiveSheet()->getColumnDimension('L')->setWidth(15); // Set width kolom E
	// 	$excel->getActiveSheet()->getColumnDimension('M')->setWidth(15); // Set width kolom E
	// 	$excel->getActiveSheet()->getColumnDimension('N')->setWidth(15); // Set width kolom E
	// 	$excel->getActiveSheet()->getColumnDimension('O')->setWidth(15); // Set width kolom E
	// 	$excel->getActiveSheet()->getColumnDimension('P')->setWidth(15); // Set width kolom E
	// 	$excel->getActiveSheet()->getColumnDimension('Q')->setWidth(15); // Set width kolom E
	// 	$excel->getActiveSheet()->getColumnDimension('R')->setWidth(15); // Set width kolom E
	// 	$excel->getActiveSheet()->getColumnDimension('S')->setWidth(15); // Set width kolom E
	// 	$excel->getActiveSheet()->getColumnDimension('T')->setWidth(15); // Set width kolom E
	// 	$excel->getActiveSheet()->getColumnDimension('U')->setWidth(15); // Set width kolom E
	// 	$excel->getActiveSheet()->getColumnDimension('V')->setWidth(15); // Set width kolom E
		
	// 	// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
	// 	$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

	// 	// Set orientasi kertas jadi LANDSCAPE
	// 	$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

	// 	// Set judul file excel nya
	// 	$excel->getActiveSheet(0)->setTitle("Laporan Data Usulan");
	// 	$excel->setActiveSheetIndex(0);

	// 	// Proses file excel
	// 	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	// 	header('Content-Disposition: attachment; filename="Data Usulan diterima Berdasarkan Bidang.xlsx"'); // Set nama file excel nya
	// 	header('Cache-Control: max-age=0');

	// 	$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
	// 	$write->save('php://output');
	// }
}