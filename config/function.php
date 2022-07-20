<?php

//persiapan function untuk upload file/foto
function upload()
{
    //deklarasi variabel kebutuhan
    $namafile   = $_FILES['file']['name'];
    $ukuranfile = $_FILES['file']['size'];
    $error      = $_FILES['file']['error'];
    $tmpname    = $_FILES['file']['tmp_name'];


    //cek apakah yang di upload file atau gambar
    $eksfilevalid = ['jpg', 'jpeg', 'png', 'pdf'];
    $eksfile      = explode('.', $namafile);
    $eksfile      = strtolower(end($eksfile));
    if(!in_array($eksfile, $eksfilevalid)){
        echo "<script> alert('Yang Anda Upload Bukan Gambar/File PDF..!')</script>";
        return false;
    }
    
    //jika ukuran file terlalu besar
    if($ukuranfile > 1000000){
        echo "<script> alert('Ukuran File Terlalu Besar..!')</script>";
        return false;
    }

    //jika file lolos pengecekan maka akan di upload
    //generate nama file baru

    $namafilebaru   = uniqid();
    $namafilebaru  .= '.';
    $namafilebaru  .= $eksfile;

    move_uploaded_file($tmpname, 'file/' .$namafilebaru);
    return $namafilebaru;



}
?>