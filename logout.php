<?php
session_start();
//hapus sesion yang sudah di save
unset($_SESSION['id_user']);
unset($_SESSION['username']);

session_destroy();
echo "<script>
                      alert('Anda Telah eluar Dari Halaman Administrator..!');
                      document.location='index.php';
                    </script>";


?>