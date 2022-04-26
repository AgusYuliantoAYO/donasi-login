<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
     
        function time_ago($datetime, $full = false)
        {
         $today = time();
            $createdday = strtotime($datetime);
            $datediff = abs($today-$createdday);
            $difftext = "";
            $years = floor($datediff / (365 * 60 * 60 * 24));
            $months = floor(($datediff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            $days = floor(($datediff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
            $hours = floor($datediff / 3600);
            $minutes = floor($datediff / 60);
            $seconds = floor($datediff);
            //year checker
            if ($difftext == "") {
                if ($years > 1)
                    $difftext = $years . " tahun lalu";
                elseif ($years == 1)
                    $difftext = $years . " tahun lalu";
            }
            //month checker 
            if ($difftext == "") {
                if ($months > 1)
                    $difftext = $months . " bulan lalu";
                elseif ($months == 1)
                    $difftext = $months . " bulan lalu";
            }
            //month checker
            if ($difftext == "") {
                if ($days > 1)
                    $difftext = $days . " hari lalu";
                elseif ($days == 1)
                    $difftext = $days . " hari lalu";
            } 
            //hour checker
            if ($difftext == "") {
                if ($hours > 1)
                    $difftext = $hours . " jam lalu";
                elseif ($hours == 1)
                    $difftext = $hours . " jam lalu";
            }
            // minutes checker
            if ($difftext == "") {
                if ($minutes > 1)
                    $difftext = $minutes . " menit lalu";
                elseif ($minutes == 1)
                    $difftext = $minutes . " menit lalu";
            }
            //seconds checker
            if ($difftext == "") {
                if ($seconds >= 1)
                    $difftext = "Baru Saja";
                // elseif ($seconds == 1)
                //     $difftext = $seconds . " detik lalu";
            }
            // if ($difftext == "") {
            //     if ($seconds > 1)
            //         $difftext = $seconds . " detik lalu";
            //     elseif ($seconds == 1)
            //         $difftext = $seconds . " detik lalu";
            // }
            return $difftext;
        }