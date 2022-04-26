<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('format_indoTgl')) {
  function format_indoTgl($date){
    date_default_timezone_set('Asia/Jakarta');
    //============= array hari dan bulan
    $Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
    // $Bulan = array("Jan.","Feb.","Mar.","Apr.","Mei","Jun.","Jul.","Agst.","Sept.","Okt.","Nov.","Des.");
    $Bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    // $Bulan = array("1","2.","3.","4","5","6","7","8","9","10","11","12");
    
    // pemisahan tahun, bulan, hari, dan waktu
    $tahun = substr($date,0,4);
    $bulan = substr($date,5,2);
    $tgl = substr($date,8,2);
    $waktu = substr($date,11,5);
    $hari = date("w",strtotime($date));
    $result = $Hari[$hari].", ".$tgl."-".$Bulan[(int)$bulan-1]."-".$tahun;
    // $result = $tgl."-".$Bulan[(int)$bulan-1]."-".$tahun;

    return $result;
  }

}