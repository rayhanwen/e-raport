<?php
if (!defined("BASEPATH")) exit("No direct script access allowed");


if (!function_exists('tanggal_indonesia')) {
    function tanggal_indonesia($tanggal)
    {
        $ubahtanggal = gmdate($tanggal, time() + 60 * 60 * 8);
        $pecahtanggal = explode('-', $ubahtanggal);
        $tanggal = $pecahtanggal[2];
        $bulan = bulan_panjang($pecahtanggal[1]);
        $tahun = $pecahtanggal[0];
        return $tanggal . ' ' . $bulan . ' ' . $tahun;
    }
}

if (!function_exists('bulan_panjang')) {
    function bulan_panjang($bulan)
    {
        switch ($bulan) {
            case 1:
                return 'Januari';
            case 2:
                return 'Februari';
            case 3:
                return 'Maret';
            case 4:
                return 'April';
            case 5:
                return 'Mei';
            case 6:
                return 'Juni';
            case 7:
                return 'Juli';
            case 8:
                return 'Agustus';
            case 9:
                return 'September';
            case 10:
                return 'Oktober';
            case 11:
                return 'November';
            case 12:
                return 'Desember';
        }
    }
}

if (!function_exists('tanggal_indonesia_medium')) {
    function tanggal_indonesia_medium($tanggal)
    {
        $ubahtanggal = gmdate($tanggal, time() + 60 * 60 * 80);
        $pecahtanggal = explode('-', $ubahtanggal);
        $tanggal = $pecahtanggal[2];
        $bulan = bulan_pendek($pecahtanggal[1]);
        $tahun = $pecahtanggal[0];
        return $tanggal . ' ' . $bulan . ' ' . $tahun;
    }
}

if (!function_exists('bulan_pendek')) {
    function bulan_pendek($bulan)
    {
        switch ($bulan) {
            case 1:
                return 'Jan';
            case 2:
                return 'Feb';
            case 3:
                return 'Mar';
            case 4:
                return 'Apr';
            case 5:
                return 'Mei';
            case 6:
                return 'Jun';
            case 7:
                return 'Jul';
            case 8:
                return 'Agu';
            case 9:
                return 'Sep';
            case 10:
                return 'Okt';
            case 11:
                return 'Nov';
            case 12:
                return 'Des';
        }
    }
}
