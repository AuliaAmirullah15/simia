<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Undangan Rapat</title>
    
    <style>
        .container_right{
            float: right
        }
        
        .container_left{
            float: left;
        }
        
        .container {
            padding: top right bottom left;
            position: static;
            display: block;
            width: 100%;
            bottom: 0;
            left:0;
        }
    </style>
    
     <?php foreach($jadwal as $j) { 
        $nama_kegiatan = $j->nama_kegiatan;
        $waktu = $j->waktu;
        $tempat = $j->tempat;
    } ?>
    
</head>
<body>
    <?php foreach($peserta as $p) { ?>
    <div class="container">
    <h2><center>Fakultas Ilmu Komputer dan Teknologi Informasi</center></h2>
    <h3><center>Jl. Universitas No.9, Padang Bulan, Kec. Medan Baru, Kota Medan, Sumatera Utara 20222</center></h3>
    <h4><center>Telepon: 123456, Fax: 67890</center></h4>
    <hr><hr>
    </div>

    
    <div class="container">
        <div class="container_left">
            <div><p>Nomor : .....................</p></div>
            <div><p>Hal : Undangan Rapat</p></div>
        </div>
        <div class="container_right">
            <div><p><?php echo date("d-m-Y"); ?></p></div>
        </div>
    </div>
    <br><br><br><br><br><br>
    <div class="container">
        <div class="container_left">
            <div><p>Yth. Bapak <?= $p->nama_peserta ?></p></div>
        </div>
    </div>
    <br><br><br><br>
    <div class="container">
        <p>Dengan Hormat,</p>
        <p>Sehubungan dengan akan diselenggarakan <?= $nama_kegiatan ?>, kami mengharapkan kehadiran saudara/i pada:</p>
        <p>Tanggal/Jam : <?= $waktu ?></p>
        <p>Tempat : <?= $tempat ?></p>
        <p>Atas perhatian saudara/i, kami sampaikan terima kasih</p>
    </div>
    
    
    <?php } ?>
</body>
</html>