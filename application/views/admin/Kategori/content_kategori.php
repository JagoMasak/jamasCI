<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Database kategori &nbsp;&nbsp;<a href="<?php echo base_url()."admin/Kategori/tambah/"?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</a></h3>
    </div>
    <!-- Main content -->

    <div class="box">
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; foreach ($data as $row) { ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $row['nama_kategori'];?></td>

                            <td>
                                <a href="<?php echo base_url()."admin/kategori/update/".$row['id_kategori']; ?>" class="btn btn-success btn-sm">Edit</a>
                                <a href="<?php echo base_url()."admin/kategori/hapus/".$row['id_kategori']; ?>" class="btn btn-danger btn-sm" onclick="javascript:return confirm('Anda yakin ingin hapus?')">Delete</a>
                            </td>
                        </tr>
                    <?php $no++; } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>