<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
     
        function durasi_donasi($datetime, $full = false)
        {
         $today = time();
            $createdday = strtotime($datetime);
            $datediff = abs($today-$createdday);
            $difftext = "";
            $years = (int) floor($datediff / (365 * 60 * 60 * 24));
            $months = (int)floor(($datediff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            $days = (int) floor(($datediff - $years * 365 * 60 * 60 * 24 ) / (60 * 60 * 24));
            $hours = (int) floor($datediff / 3600);
            $minutes = (int)floor($datediff / 60);
            $seconds = (int) floor($datediff);
            //year checker
            // if ($difftext == "") {
            //     if ($years > 1)
            //         $difftext = $years . " tahun lagi";
            //     elseif ($years == 1)
            //         $difftext = $years . " tahun lagi";
            // }
            //month checker 
            // if ($difftext == "") {
            //     if ($months > 1)
            //         $difftext = $months . " bulan lagi";
            //     elseif ($months == 1)
            //         $difftext = $months . " bulan lagi";
            // }

     
               //hour checker

                      
                    
                   
    
     
            //month checker
            if ($difftext == "") {
                if ($days > 1)
                    $difftext = $days+1 . " hari lagi";
                elseif (1-$days <= 1)
                    $difftext = $days-1 . "";
            } 
            //hour checker
            // if ($difftext == "") {
            //     if ($hours > 1)
            //         $difftext = $hours . " jam lagi";
            //     elseif ($hours == 1)
            //         $difftext = $hours . " jam lagi";
            // }
            //minutes checker
            // if ($difftext == "") {
            //     if ($minutes > 1)
            //         $difftext = $minutes . " menit lagi";
            //     elseif ($minutes == 1)
            //         $difftext = $minutes . " menit lagi";
            // }
            //seconds checker
            // if ($difftext == "") {
            //     if ($seconds > 1)
            //         $difftext = $seconds . " detik lagi";
            //     elseif ($seconds == 1)
            //         $difftext = $seconds . " detik lagi";
            // }

            //hour checker
            // if ($difftext == "") {
            //     if ($hours < 1)
            //         $difftext =  "Campign diTutup"; 
            //     elseif ($hours < 1)
            //         $difftext = "Campign diTutup";
                   
            // }

            return $difftext;

             
            
 
        }