<?php
//membuat koneksi ke database mysql
$koneksi=mysqli_connect('localhost','root','','pwlgenap2019-akademik');

//$koneksi=mysqli_connect('192.168.10.253','a122106604','polke001','a122106604'); di udinus
//$koneksi=mysqli_connect('localhost','root','','pwlgenap2019-akademik'); dilaptop

function enkripsiurl($id){
    $enc = base64_encode(rand() * strtotime(date("H:i:s"))."-".$id);
    return $enc;
}
function dekripsiurl($string){
    $kode = base64_decode($string);
    $id = explode("-", $kode);
    if(isset($id[1])){
        return $id[1];
    } else {
        echo "<script>
                alert('NPP yang Diinput Sudah Ada')
                javascript:history.go(-1)
        
            </script>";
    }
    
}
