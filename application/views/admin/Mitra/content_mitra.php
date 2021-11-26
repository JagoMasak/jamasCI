<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Database Mitra &nbsp;&nbsp;<a href="<?php echo base_url()."admin/Mitra/tambah/"?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data Mitra</a></h3>
        </div>
        <!-- Main content -->

        <div class="box">
            <div class="box-header"></div>
            <!-- /.box-header -->
            
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>KTP</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no = 1; foreach ($data as $row) { ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row['nama_mitra']; ?></td>
                                    <td><?= $row['email'];?></td>
                                    <td><?= $row['alamat'];?></td>
                                    <td><?= $row['telepon']; ?></td>
                                    <td><?= $row['ktp'];?></td>
                                    <td><?= $row['status'];?></td>

                                    <td>
                                        <a href="<?php echo base_url()."admin/Mitra/update/".$row['id_mitra']; ?>" class="btn btn-success btn-sm">Edit</a>
                                        <a href="<?php echo base_url()."admin/Mitra/hapus/".$row['id_mitra']; ?>" class="btn btn-danger btn-sm" onclick="javascript:return confirm('Anda yakin ingin hapus?')">Delete</a>
                                    </td>
                                </tr>
                            <?php $no++; } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>