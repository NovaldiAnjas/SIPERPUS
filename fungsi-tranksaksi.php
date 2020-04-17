<?php

include '../koneksi.php';

// function ambilbuku($id){
//     global $koneksi;

//     $sql = "SELECT * FROM buku";
//     $res = mysqli_query($koneksi,$sql);

//     $data_buku = array();

//     while ($data = mysqli_fetch_assoc($res)){
//         $data_buku[] = $data;
//     }
//     return $data_buku;
// }

// function ambilanggota($id){
//     global $koneksi;
//     $sql = "SELECT * FROM anggota";
//     $res = mysqli_query($koneksi,$sql);

//     $data_anggota = array();

//     while ($data = mysqli_fetch_assoc($res)){
//         $data_anggota[] = $data
//     }
//     return $data_anggota;
// }

function ambilpeminjaman($id_pinjam){
    global $koneksi;
    $sql = "SELECT * FROM peminjaman INNER JOIN anggota
            ON peminjaman.id_anggota = anggota.id_anggota
            INNER JOIN buku ON peminjaman.id_buku = buku.id_buku
            WHERE id_pinjam = $id_pinjam";

    $res = mysqli_query($koneksi,$sql);
    $data = mysqli_fetch_assoc($res);
    
    return $data;
}

function ambilstok($id_buku){
    global $koneksi;
    $sql = "SELECT stok FROM buku WHERE id_buku = $id_buku";
    $res = mysqli_query($koneksi,$sql);

    $data = mysqli_fetch_assoc($res);

    return $data['stok'];
}

function cekpinjam($id_anggota){
    global $koneksi;
    $sql = "SELECT * FROM peminjaman WHERE id_anggota = $id_anggota AND status='dipinjam'";
    $res = mysqli_query($koneksi,$sql);

    $pinjam = mysqli_affected_rows($koneksi);

    if($pinjam == 0){
        return true;
    }else{
        return false;
    }
}

function updatestok($id_buku,$stok_update){
    global $koneksi;
    $sql = "UPDATE buku SET stok = $stok_update WHERE id_buku = $id_buku";
    $res = mysqli_query($koneksi,$sql);
}

function hitungdenda($id_pinjam,$tgl_kembali){
    global $koneksi;
    $denda = 0;

    $sql = "SELECT tgl_jatuh_tempo FROM peminjaman WHERE id_pinjam = $id_pinjam";
    $res = mysqli_query($koneksi,$sql);
    $data = mysqli_fetch_assoc($res);
    $tgl_jatuh_tempo = $data['tgl_jatuh_tempo'];

    $hari_denda = (strtotime($tgl_kembali) - strtotime($tgl_jatuh_tempo))/60/60/24;

    if($hari_denda > 0){
        $denda = $hari_denda*1000;
    }
    return $denda;
}

?>