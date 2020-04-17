<?php
include '../koneksi.php';
$id = $_GET['id_buku'];
$querdetail = mysqli_query($koneksi,"SELECT * FROM buku WHERE id_buku = $id");
$scan = mysqli_fetch_assoc($querdetail);

$idkategori = $scan['id_kategori'];

$querkategori = mysqli_query($koneksi,"SELECT kategori FROM kategori WHERE id_kategori = $idkategori ");

$scankat = mysqli_fetch_assoc($querkategori);

if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $penerbit = $_POST['penerbit'];
    $pengarang = $_POST['pengarang'];
    $ringkasan = $_POST['ringkasan'];
    $cover = $_POST['cover'];
    $stok = $_POST['stok'];
    $kategori = $_POST['kategori'];

    $query = mysqli_query($koneksi,"UPDATE buku SET judul='$judul',penerbit='$penerbit',pengarang='$pengarang',ringkasan='$ringkasan',cover='$cover',stok='$stok',id_kategori='$kategori' WHERE id_buku = $id");
 
    if($query>0){
        echo 
        "
        <script>
        alert('Data Berhasil DiUbah');
        document.location.href='http://localhost/siperpus/buku/indexbuku.php';
        </script>
        ";
    } 
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edit Data Buku</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    </head>
    <body>
        <center>
        <?php
    include'../aset/header.php';
    ?>
   <div class="container">
        <div class="row mt-4">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2><i class="fas fa-book"></i> Edit Data Buku</h2>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <table class="table">
            <tr>
                <td>Judul</td>
                <td>:</td>
                <td><input class="from_tambah"  type="text" name="judul" value="<?php echo $scan['judul']?>"></td>
            </tr>
            <tr>
                <td>Penerbit</td>
                <td>:</td>
                <td><input class="from_tambah"  type="text" name="penerbit" value="<?php echo $scan['penerbit']?>"></td>
            </tr>
            <tr>
                <td>Pengarang</td>
                <td>:</td>
                <td><input class="from_tambah"  type="text" name="pengarang" value="<?php echo $scan['pengarang']?>"></td>
            </tr>
            <tr>
                <td>Ringkasan</td>
                <td>:</td>
                <td>
                    <textarea name="ringkasan" id="" cols="30" rows="10" value="<?php echo $scan['ringkasan']?>"></textarea>
                </td>
            </tr>
            <tr>
                <td>Cover</td>
                <td>:</td>
                <td><input class="from_tambah"  type="file" name="cover" value="<?php echo $scan['cover']?>"></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td>:</td>
                <td><input class="from_tambah"  type="number" name="stok" value="<?php echo $scan['stok']?>"></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>:</td>
                <td>
                <select name="kategori" id="">
                        <option value="<?php echo $scan['id_kategori']?>"><?php echo $scankat['kategori']?></option>
                    <?php
                    $queryl = mysqli_query($koneksi,"SELECT * FROM kategori");

                    while  ($scan = mysqli_fetch_assoc($queryl)): ?>
                        <option value="<?php echo $scan['id_kategori'];?>"><?php echo $scan['kategori'];?></option>
                    <?php endwhile; ?>
                </select>
                </td>
            </tr>
            <tr>
               
                <td colspan="3"><input class="submit" type="submit" value="Update Data" name="submit" class="tombol_tambah"></td>
            </tr>
        </table>
        </form>
        </div>
</center>
    </body>
</html>