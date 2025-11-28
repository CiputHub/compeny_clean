<?php
include '../../app.php';
include './show.php';


$storages = "../../storages/servics/";
        if(!empty($service->image) && file_exists($storages . $service->image)){
            unlink($storages . $service->image);
     }
//hapus data
     $qDelete = "DELETE FROM services WHERE id = '$service->id'";
     //mengirim pesan jke querydelete tolong dong di hapus
     $result = mysqli_query($connect, $qDelete) or die (mysqli_error($connect));

     //cek apakah data berhasil di hapus atau tidak
     if ($result){//kirim ke database

        //kalau berhasil kembali ke halamn index
        echo "
        <script>alert('Data Berhasil dihapus'); window.location.href = '../../pages/service/index.php';
        </script>
        ";
        //kalau gagal kembali ke halaman create
        }else{
            echo"
            <script>alert(Data Gagal dihapus); window.location.href = '../../pages/service/create.php';
            </script>
            ";

    }


?>
