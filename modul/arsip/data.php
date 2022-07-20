<div class="card mt-3">
  <div class="card-header bg-info text-white">
    Data Pengirim Surat
  </div>
  <div class="card-body">
    <a href="?halaman=arsip_surat&hal=tambahdata" class="btn btn-success mb-3">Tambah Data</a>
  <table class="table table-borderd table-hovered table-striped"> 
      <tr>
          <th>No</th>
          <th>No Surat</th>
          <th>Tanggal Surat</th>
          <th>Tanggal Terima</th>
          <th>Prihal</th>
          <th>Departemen / Tujuan</th>
          <th>Pengirim</th>
          <th>file</th>
          <th>Aksi</th>
      </tr>
      <?php
          $tampil = mysqli_query($koneksi, "
          SELECT 
            tbl_arsip.*,
            tbl_departemen.nama_departemen,
            tebl_pengirim_surat.nama_pengirim, tebl_pengirim_surat.no_hp
          FROM
            tbl_arsip, tbl_departemen, tebl_pengirim_surat
          WHERE
            tbl_arsip.id_departemen = tbl_departemen.id_departemen
            and tbl_arsip.id_pengirim = tebl_pengirim_surat.id_pengirim_surat 
          ");
          $no = 1;
          while($data = mysqli_fetch_array($tampil)) : 

      ?>
      <tr>
          <td><?=$no++?></td>
          <td><?=$data['no_surat']?></td>
          <td><?=$data['tanggal_surat']?></td>
          <td><?=$data['tanggal_terima']?></td>
          <td><?=$data['prihal']?></td>
          <td><?=$data['nama_departemen']?></td>
          <td><?=$data['nama_pengirim']?> / <?=$data['no_hp']?></td>
          <td>
            <?php
                  //uji apakah file ada atau tidak
                  if(empty($data['file'])){
                    echo " - ";
                  }else{
            ?>
                  <a href="file/<?=$data['file']?>" target="$_blank">Lihat File</a>
                  }
                  
            <?php
            
                }
            
            ?>
          </td>   
          <td>
            <a href="?halaman=arsip_surat&hal=edit&id=<?=$data['id_arsip']?>" class="btn btn-success">Edit</a>
            <a href="?halaman=arsip_surat&hal=hapus&id=<?=$data['id_arsip']?>" class="btn btn-danger" 
            onclick="return confirm('apakah yakin ingin menghapus data ini?')">Hapus</a>
          </td>
      </tr>
    <?php endwhile; ?>
  </table>
</div>
</div>