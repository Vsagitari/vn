<?php 
//mendeskripsikan kolom dari nomor tujuandan isi pesan untuk file index.php
if(isset($_POST['kirim']))
{
	$notujuan = $_POST['notujuan'];
	$isipesan = $_POST['isipesan'];

	//memberikan hak akses ke layanan web service sms gateway, menggunakan data API yang sudah dibuat pada situs
	$userkey = 'kj09z2';
	$passkey = 'yfue7qpgqe';
//mendeskripsikan function proses pengiriman sms 
function KirimSMS ($notujuan,$isipesan,$userkey,$passkey){
	$isi=urlencode($isipesan);
	$hp=str_replace('+62', '0', $notujuan);
	$hp=str_replace(' ', '', $hp);
	$hp=str_replace('.', '', $hp);
	$hp=str_replace(',', '', $hp);
	$ho=trim($hp);
	$url="https://reguler.zenziva.net/apps/smsapi.php?userkey=$userkey&passkey=$passkey&nohp=$hp&pesan=$isi";
	$data=file_get_contents($url);
	if(eregi('success', $data)){
		$hasil='1';
	}else{
		$hasil='0';
	}
	return $hasil;
	}
//memanggil function kirimSMS
$kirim=KirimSMS($notujuan,$isipesan,$userkey,$passkey);
//memberi kondisi setelah function dijalankan
if($kirim=='1'){
	echo "<script language='javascript'>window.alert('Absen berhasi !!!');
			window.location.href='index.php';</script>";

	}else{
	echo "<script language='javascript'>window.alert('Absen gatot !!!');
			window.location.href='index.php';</script>";
	}
}
?>