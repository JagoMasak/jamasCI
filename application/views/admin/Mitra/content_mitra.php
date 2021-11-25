 <div class="box box-primary">
  <div class="box-header">
        <h3 class="box-title">Database Mitra &nbsp;&nbsp;<a href="<?php echo base_url()."admin/mitra/tambah/"?>"
        class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</a></h3>
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
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                  <th>ktp</th>
                  <th>status</th>
                  <th>Created_at</th>
                  <th>updated_at</th>
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
                  <td><?php echo $row->nama;?></td>
                  <td><?php echo $row->email;?></td>
                  <td><?php echo $row->alamat;?></td>
                  <td><?php echo $row->telepon;?></td>
                  <td><?php echo $row->ktp;?></td>
                  <td><?php echo $row->status;?></td>
                  <td><?php echo $row->created_at;?></td>
                  <td><?php echo $row->updated_at;?></td>
                  <td>
            <a href="<?php echo base_url()."admin/mitra/update/".$row->id; ?>" class="btn btn-success btn-sm">Edit</a>
                  <a href="<?php echo base_url()."admin/mitra/hapus/".$row->id; ?>" class="btn btn-danger btn-sm" onclick="javascript:return confirm('Anda yakin ingin hapus?')">Delete</a>
          </td>
          </tr>
          <?php
      $no++;
      }
      ?>
              </table>
            </div>