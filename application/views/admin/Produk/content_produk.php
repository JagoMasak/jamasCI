<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Database produk &nbsp;&nbsp;<a href="<?php echo base_url()."admin/Produk/tambah/"?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data produk</a></h3>
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
                                <th>Penjual</th>
                                <th>Nama Produk</th>
                                <th>Deskripsi</th>
                                <th>Kategori</th>
                                <th>Jenis</th>
                                <th>Gambar</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no = 1; foreach ($data as $row) { ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row['nama_mitra']; ?></td>
                                <td><?= $row['nama_produk'];?></td>
                                <td><?= $row['deskripsi'];?></td>
                                <td><?= $row['nama_kategori']; ?></td>
                                <td><?= $row['jenis'];?></td>
                                <td>
                                    <?php $gambar = $this->Produk_model->getgambarproduk($row['id_produk']); foreach($gambar as $pic) : ?>
                                        <a href="<?= base_url().'assets/img/'.$pic['path'] ?>" target="_blank">
                                            <?= $pic['path']; ?>
                                        </a><br>
                                    <?php endforeach; ?>
                                </td>
                                <td><?= "Rp " . number_format($row['harga'],2,',','.');?></td>

                                <td>
                                    <a href="<?php echo base_url()."admin/Produk/update/".$row['id_produk']; ?>" class="btn btn-success btn-sm">Edit</a>
                                    <a href="<?php echo base_url()."admin/Produk/hapus/".$row['id_produk']; ?>" class="btn btn-danger btn-sm" onclick="javascript:return confirm('Anda yakin ingin hapus?')">Delete</a>
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