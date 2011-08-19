<?php 
function from_date($date){
        $data = explode("-", $date);
        $bulan = array(
            " ** ",
            "Januari",
            "Februari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Agustus",
            "September",
            "Oktober",
            "November",
            "Desember"
        );
        return $data[2] . " " . $bulan[intval($data[1])] . " " . $data[0];
    }

    function to_date($string){
        $data = explode(" ", $string);
        $bulan = array(
            "Januari"   => "01",
            "Februari"  => "02",
            "Maret"     => "03",
            "April"     => "04",
            "Mei"       => "05",
            "Juni"      => "06",
            "Juli"      => "07",
            "Agustus"   => "08",
            "September" => "09",
            "Oktober"   => "10",
            "November"  => "11",
            "Desember"  => "12"
        );
        return $data[2] . "-" . $bulan[$data[1]] . "-" . $data[0];
    }
