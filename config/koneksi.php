<?php

        //buat koneksi database

        //persiapan identitas server
        $server     =   "localhost";
        $user       =   "root";
        $pass       =   "";
        $database   =   "dbarsip";

        //koneksi database
        $koneksi = mysqli_connect ($server, $user, $pass, $database)or die(mysqli_error($koneksi));


?>