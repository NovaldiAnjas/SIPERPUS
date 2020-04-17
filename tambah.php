<?php
include '../koneksi.php';
if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $penerbit = $_POST['penerbit'];
    $pengarang = $_POST['pengarang'];
    $ringkasan = $_POST['ringkasan'];
    $cover = $_POST['cover'];
    $stok = $_POST['stok'];
    $id_kategori = $_POST['kategori'];
            
    $query = mysqli_query($koneksi,"INSERT INTO buku VALUES ('','$judul','$penerbit','$pengarang','$ringkasan','$cover','$stok','$id_kategori')");
    if($query>0){
        echo 
        "<script>
        alert('BERHASIL MENAMBAHKAN');
        document.location.href='http://localhost/siperpus/buku/indexbuku.php';
        </script>
        ";
    } 
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tambah Data Buku</title>
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
                        <h2><i class="fas fa-book"></i> Tambah Data Buku</h2>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <table class="table">
            <tr>
                <td>Judul</td>
                <td>:</td>
                <td><input class="from_tambah"  type="text" name="judul"></td>
            </tr>
            <tr>
                <td>Penerbit</td>
                <td>:</td>
                <td><input class="from_tambah"  type="text" name="penerbit"></td>
            </tr>
            <tr>
                <td>Pengarang</td>
                <td>:</td>
                <td><input class="from_tambah"  type="text" name="pengarang"></td>
            </tr>
            <tr>
                <td>Ringkasan</td>
                <td>:</td>
                <td>
                    <textarea name="ringkasan" id="" cols="30" rows="10"></textarea>
                </td>
            </tr>
            <tr>
                <td>Cover</td>
                <td>:</td>
                <td><input class="from_tambah"  type="file" name="cover"></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td>:</td>
                <td><input class="from_tambah"  type="number" name="stok"></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>:</td>
                <td>
                <select name="kategori" id="">
                        <option value="">Pilih Level</option>
                    <?php
                    $queryl = mysqli_query($koneksi,"SELECT * FROM kategori");

                    while  ($scan = mysqli_fetch_assoc($queryl)): ?>
                        <option value="<?php echo $scan['id_kategori'];?>"><?php echo $scan['kategori'];?></option>
                    <?php endwhile; ?>
                </select>
                </td>
            </tr>
            <tr>
               
                <td colspan="3"><input class="submit" type="submit" value="Tambah Data" name="submit" class="tombol_tambah"></td>
            </tr>
        </table>
        </form>
        </div>
</center>
    </body>
</html>