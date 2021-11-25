<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Update Data produk</h3>
        </div>

        <div class="box-body">
            <?php foreach($produk as $b){ ?>
                <form class="form-horizontal" method="post" action="<?= base_url();?>admin/Produk/edit" enctype="multipart/form-data">
                    <div class="box-body">
                        <input type="hidden" name="id_produk" value="<?= $b['id_produk'] ?>">
                        <input type="hidden" name="updated_at" value="<?php echo date('y-m-d\TH:i:s'); ?>">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Penjual</label>

                            <div class="col-sm-10">
                                <select name='penjual' class='form-control'>
                                    <option disabled>----Pilih Penjual----</option>
                                    <?php foreach($mitra as $m) : ?>
                                        <option value='<?= $m['id_mitra'] ?>' <?php if($b['id_mitra'] == $m['id_mitra']) { echo 'selected'; } ?>><?= $m['nama_mitra']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama produk</label>

                            <div class="col-sm-10">
                                <input type="text" name="nama" class="form-control" value="<?= $b['nama_produk'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Deskripsi</label>

                            <div class="col-sm-10">
                                <textarea name="deskripsi" class="form-control" placeholder="Deskripsi"><?= $b['deskripsi'] ?></textarea> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Kategori</label>
                            <div class="col-sm-10">
                                <select name='id_kategori' class='form-control'>
                                    <option selected disabled>----Pilih Kategori----</option>
                                    <?php foreach($kategori as $k) : ?>
                                        <option value='<?= $k['id_kategori'] ?>' <?php if($b['id_kategori'] == $k['id_kategori']) { echo 'selected'; } ?>><?= $k['nama_kategori']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jenis</label>
                            <div class="col-sm-10">
                                <select name='jenis' class='form-control'>
                                    <option disabled>----Pilih Jenis----</option>
                                    <option value='Paket Siap Saji' <?php if($b['jenis'] == 'Paket Siap Saji') { echo 'selected'; } ?>>Paket Siap Saji</option>
                                    <option value='Paket Siap Masak' <?php if($b['jenis'] == 'Paket Siap Masak') { echo 'selected'; } ?>>Paket Siap Masak</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Harga</label>

                            <div class="col-sm-10">
                                <input type="text" name="harga" class="form-control" value="<?= $b['harga'] ?>">
                            </div>
                        </div>

                        <div class="box-footer">
                            <a href="<?= base_url();?>admin/Produk" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
                            <button type="submit" class="btn btn-info btn-sm">Simpan</button>
                        </div>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</section>