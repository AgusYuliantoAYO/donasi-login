<?php
/**
 * Helpher untuk mencetak tanggal dalam format bahasa indonesia
 *
 * @package CodeIgniter
 * @category Helpers
 * @author Ardianta Pargo (ardianta_pargo@yhaoo.co.id)
 * @link https://gist.github.com/ardianta/ba0934a0ee88315359d30095c7e442de
 * @version 1.0
 */

/**
 * Fungsi untuk merubah bulan bahasa inggris menjadi bahasa indonesia
 * @param int nomer bulan, Date('m')
 * @return string nama bulan dalam bahasa indonesia
 */
if (!function_exists('bulan')) {
    function bulan(){
        $bulan = Date('m');
        switch ($bulan) {
            case 1:
                $bulan = "Januari";
                break;
            case 2:
                $bulan = "Februari";
                break;
            case 3:
                $bulan = "Maret";
                break;
            case 4:
                $bulan = "April";
                break;
            case 5:
                $bulan = "Mei";
                break;
            case 6:
                $bulan = "Juni";
                break;
            case 7:
                $bulan = "Juli";
                break;
            case 8:
                $bulan = "Agustus";
                break;
            case 9:
                $bulan = "September";
                break;
            case 10:
                $bulan = "Oktober";
                break;
            case 11:
                $bulan = "November";
                break;
            case 12:
                $bulan = "Desember";
                break;

            default:
                $bulan = Date('F');
                break;
        }
        return $bulan;
    }
}

/**
 * Fungsi untuk membuat tanggal dalam format bahasa indonesia
 * @param void
 * @return string format tanggal sekarang (contoh: 22 Desember 2016)
 */
if (!function_exists('tanggal')) {
    function tanggal() {
        $tanggal = Date('d') . " " .bulan(). " ".Date('Y');
        return $tanggal;
    }
} 


if (!function_exists('bln')) {
    function bln(){
        $bln = (int)Date('m')-0;
        switch ($bln) {
            case 1:
                $bln = "Januari";
                break;
            case 2:
                $bln = "Februari";
                break;
            case 3:
                $bln = "Maret";
                break;
            case 4:
                $bln = "April";
                break;
            case 5:
                $bln = "Mei";
                break;
            case 6:
                $bln = "Juni";
                break;
            case 7:
                $bln = "Juli";
                break;
            case 8:
                $bln = "Agustus";
                break;
            case 9:
                $bln = "September";
                break;
            case 10:
                $bln = "Oktober";
                break;
            case 11:
                $bln = "November";
                break;
            case 12:
                $bln = "Desember";
                break;

            default:
                $bln = Date('F');
                break;
        }
        return $bln;
    }
} 

if (!function_exists('blnLalu')) {
    function blnLalu(){
        $blnLalu = (int)Date('m')-1;
        switch ($blnLalu) {
            case 1:
                $blnLalu = "1";
                break;
            case 2:
                $blnLalu = "2";
                break;
            case 3:
                $blnLalu = "3";
                break;
            case 4:
                $blnLalu = "4";
                break;
            case 5:
                $blnLalu = "5";
                break;
            case 6:
                $blnLalu = "6";
                break;
            case 7:
                $blnLalu = "7";
                break;
            case 8:
                $blnLalu = "8";
                break;
            case 9:
                $blnLalu = "9";
                break;
            case 10:
                $blnLalu = "10";
                break;
            case 11:
                $blnLalu = "11";
                break;
            case 12:
                $blnLalu = "12";
                break;

            default:
                $blnLalu = Date('F');
                break;
        }
        return $blnLalu;
    }
} 