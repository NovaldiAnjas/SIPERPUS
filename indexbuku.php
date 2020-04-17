<?php
include '../koneksi.php'; 
$query = mysqli_query($koneksi,"SELECT * FROM buku");
?>
<?php
include '../aset/header.php';
 ?>
<div class="container">
  <div class="row mt-4">
    <div class="col-md">
    </div>
  </div>
</div>
<div class="card">
  <div class="card-header">
      <h2 class="card-title"><i class="fas fa-book"></i>Data Buku</h2>
  </div>
  <div class="card-body">
   <a href="tambah.php" class="btn btn-outline-success mr-3" style="width: 100%">Tambah Data</a>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Judul</th>
      <th scope="col">Penerbit</th>
      <th scope="col">Pengarang</th>
      <th scope="col">Ringkasan</th>
      <th scope="col">cover</th>
      <th scope="col">Stok</th>
      <th scope="col">ID_Kategori</th>
    </tr>
  </thead>
<?php $i=1;?>
<?php while($b = mysqli_fetch_assoc($query)): ?>
    <tr>
      <th scope="row"><?=$i?></th>
      <td><?=$b['judul']?></td>
      <td><?=$b['penerbit']?></td> 
      <td><?=$b['pengarang']?></td>
      <td><?=$b['ringkasan']?></td>
      <td><img src ="<?=$b['cover']?>" height= '80' width ='100'></td>
      <td><?=$b['stok']?></td>
      <td><?=$b['id_kategori']?></td>        
     <td> <a class="badge badge-success" href="detail.php?id_buku=<?php echo $b['id_buku']?>">Detail</a>
                    <a class="badge badge-warning" href="edit.php?id_buku=<?php echo $b['id_buku']?>">Edit</a>
                    <a class="badge badge-danger" href="hapus.php?id_buku=<?= $b['id_buku']?>"onclick = "return confirm('yakin ingin menghapus data ini??!')">hapus</a>
                    
        </td>
    </tr>
    <?php $i++;?>
  <?php endwhile; ?>
   </table>

  </div>
</div>
</div>
 <?php 
include '../aset/footer.php';
?>