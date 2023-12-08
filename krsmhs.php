<?php

require "fungsi.php";
$nim = $_GET['nim'];
$sql = "SELECT * FROM mhs a JOIN krs b ON (a.nim=b.nim) JOIN kultawar c ON (b.id_jadwal=c.idkultawar) JOIN matkul d ON (c.idmatkul = d.id) WHERE b.nim='" . $nim . "'";

//untuk ambil data mahasiswa
$mhs = search('mhs', "nim = '" . $nim . "'");
$rsmhs = mysqli_fetch_object($mhs);

$rs = mysqli_query($koneksi, $sql);

$html = '<h3>KRS Mahasiswa</h3>';
$html .= '<p>NIM : ' . $rsmhs->nim;
$html .= '<p>Nama : ' . $rsmhs->nama;
$html .= '<table>
            <tr>
                <td>No</td>
                <td>Kode Mata Kuliah</td>
                <td>Nama Mata Kuliah</td>
                <td>SKS</td>
                <td>Jadwal</td>
                <td>Dosen Pengampu</td>
            </tr>';
$i = 1;
$totalsks = 0;
while ($data = mysqli_fetch_object($rs)) {
    $totalsks += $data->sks;
    $html .= '
            <tr>
                <td>' . $i . '</td>
                <td>' . $data->idmatkul . '</td>
                <td>' . $data->namamatkul . '</td>
                <td>' . $data->sks . '</td>
                <td>' . $data->hari . ' ' . $data->jamkul . '</td>
                <td>' . $data->npp . '</td>
            </tr>';
    $i++;
}
$html .= '</table>';
// echo $html;

// php 8 keatas
// generatepdf(html: $html, filename: 'krs_mhs_' . $nim);

// php 8 kebawah
generatepdf('A4', 'Portrait', $html, 'krs_mhs_' . $nim);
