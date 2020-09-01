<?php
defined('BASEPATH') or exit('No direct script access allowed');

function rupiah($angka)
{
    $hasil_rupiah = number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}

function unRupiah($angka)
{
    $hasil_rupiah = str_replace('.', '', $angka);
    return $hasil_rupiah;
}


function convertDate($date, $param, $paramTo)
{
    $dateNow = null;
    if (!empty($date)) {
        $newDate = explode($param, $date);

        $dateNow .= $newDate[2] . $paramTo . $newDate[1] . $paramTo . $newDate[0];

    }

    return $dateNow;
}

