<section class="content">
 <div class="box box-primary">
  <div class="box-header">
        <h3 class="box-title">Database produk &nbsp;&nbsp;<a href="<?php echo base_url()."admin/produk/tambah/"?>"
        class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data produk</a></h3>
    </div>
 <!-- Main content -->
   
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Penjual</th>
                  <th>Nama Produk</th>
                  <th>Deskpripsi</th>
                  <th>jenis</th>
                  <th>harga</th>
                  <th>created at</th>
                  <th>updated at</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               <?php 
               $no = 1;
              foreach ($data->result() as $row) {
              ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row->penjual;?></td>
                  <td><?php echo $row->nama_produk;?></td>
                  <td><?php echo $row->deskripsi;?></td>
                  <td><?php echo $row->jenis;?></td>
                  <td><?php echo $row->harga;?></td>

                  <td><?php echo $row->created_at;?></td>
                  <td><?php echo $row->updated_at;?></td>
                  <td>
                  <a href="<?php echo base_url()."admin/produk/update/".$row->id; ?>" class="btn btn-success btn-sm">Edit</a>
                  <a href="<?php echo base_url()."admin/produk/hapus/".$row->id; ?>" class="btn btn-danger btn-sm">Delete</a>
          </td>
          </tr>
          <?php
      $no++;
      }
      ?>
              </table>
            </div>
</section>


