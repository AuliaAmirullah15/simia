<?php 
        $komentar = $this->input->post('komentar');
        
        var_dump($komentar);die();

        $con = mysqli_connect('localhost','root','','simia');
        
        if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"simia");
        
$sql="INSERT INTO inv_komentar_laporan(id_laporan,komentar,id_user) VALUE(1,'". $komentar."',4)";
$result = mysqli_query($con,$sql);
        
mysqli_close($con); ?>
