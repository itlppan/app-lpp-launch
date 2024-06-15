<?php
function formatRupiahRingkas($number) {
    if ($number >= 1000000000) {
        return 'Rp.' . number_format($number / 1000000000, 1) . ' M';
    } elseif ($number >= 1000000) {
        return 'Rp.' . number_format($number / 1000000, 1) . ' Jt';
    } elseif ($number >= 1000) {
        return 'Rp.' . number_format($number / 1000, 1) . ' Rb';
    }
    return 'Rp.' . number_format($number);
}

function clean_data($data) {
    $data = trim($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}

function formatCurrency($amount) {
    return 'Rp ' . number_format($amount, 0, ',', '.');
}

function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " ". $huruf[$nilai];
    } else if ($nilai < 20) {
        $temp = penyebut($nilai - 10). " belas";
    } else if ($nilai < 100) {
        $temp = penyebut(intval($nilai / 10))." puluh". penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut(intval($nilai / 100)) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut(intval($nilai / 1000)) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut(intval($nilai / 1000000)) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut(intval($nilai / 1000000000)) . " milyar" . penyebut(fmod($nilai, 1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut(intval($nilai / 1000000000000)) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
    }     
    return $temp;
}

function terbilang($nilai) {
    if ($nilai < 0) {
        $hasil = "minus ". trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }  
    return $hasil . " rupiah"; // Tambahkan "rupiah" di akhir
}
