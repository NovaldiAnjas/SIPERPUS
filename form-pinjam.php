<?php

include '../aset/header.php';
include '../koneksi.php';
include 'fungsi-tranksaksi.php';

$buku = mysqli_query($koneksi, "SELECT * FROM buku");
$anggota = mysqli_query($koneksi,"SELECT * FROM anggota");
$petugas = mysqli_query($koneksi,"SELECT * FROM petugas");
?>

<div class = "container">
  <div class = "row mt-4">
    <div class = "col md-8">

       <div class="card">

         <div class="card-header">
           <h3>Form Tambah Peminjaman</h3>
         </div>        

           <div class="card-body">
             <form method="post" action="proses-pinjam.php">

               <div class="form-group">
                <label for="anggota">Nama Anggota</label>
                <select name="id_anggota" class="form-control">
                 <?php
                  while($a = mysqli_fetch_assoc($anggota)):?>
                   <option value="<?= $a['id_anggota']?>"><?= $a['nama']?></option>
                  <?php endwhile;
                   ?>   
                </select>
               </div>

               <div class="form-group">
                <label for="buku">Judul Buku</label>
                <select name="id_buku" class="form-control">
                 <?php
                  while($b = mysqli_fetch_assoc($buku)):?>
                   <option value="<?= $b['id_buku']?>"><?= $b['judul']?></option>
                  <?php endwhile;
                   ?>   
                </select>
               </div>

               <div class="form-group">
                <label for="datepicker">Tanggal Pinjam</label>
                <input type="date" name="tgl_pinjam" class="form-control">
               </div>

                <div class="form-group">
                <label for="buku">Petugas</label>
                <select name="id_petugas" class="form-control">
                 <?php
                  while($p = mysqli_fetch_assoc($petugas)):?>
                   <option value="<?= $p['id_petugas']?>"><?= $p['nama_petugas']?></option>
                  <?php endwhile;
                   ?>   
                </select>
               </div>

               <div class="form-group">
                   <button type="submit" name="submit" class="btn btn-primary mr-auto">Simpan</button>
               </div>
             </form>
           </div> 
             
     </div>
   </div>
 </div>
</div>     

<?php

include '../aset/footer.php';

?>