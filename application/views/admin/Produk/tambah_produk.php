<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Tambah Data Produk</h3>
    </div>

    <div class="box-body">
        <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>admin/Produk/simpan" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-sm-2 control-label">Penjual</label>

                <div class="col-sm-10">
                    <select name='penjual' class='form-control' required>
                        <option selected disabled>----Pilih Penjual----</option>
                        <?php foreach($mitra as $m) : ?>
                            <option value='<?= $m['id_mitra'] ?>'><?= $m['nama_mitra']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Nama produk</label>

                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" placeholder="Nama produk" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Deskripsi</label>

                <div class="col-sm-10">
                    <textarea name="deskripsi" class="form-control" placeholder="Deskripsi" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Kategori</label>

                <div class="col-sm-10">
                    <select name='id_kategori' class='form-control' required>
                        <option selected disabled>----Pilih Kategori----</option>
                        <?php foreach($kategori as $k) : ?>
                            <option value='<?= $k['id_kategori'] ?>'><?= $k['nama_kategori']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Jenis</label>

                <div class="col-sm-10">
                    <select name='jenis' class='form-control' required>
                        <option selected disabled>----Pilih Jenis----</option>
                        <option value='Paket Siap Saji'>Paket Siap Saji</option>
                        <option value='Paket Siap Masak'>Paket Siap Masak</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Harga</label>
                
                <div class="col-sm-10">
                    <input type="number" name="harga" class="form-control" placeholder="Harga" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Gambar Produk</label>
                
                <div class="col-sm-10">
                    <input type="file" name="gambar[]" class="form-control" placeholder="Gambar" multiple>
                </div>
            </div>

            <input type="hidden" name="created_at" class="form-control" value="<?php echo date('y-m-d\TH:i:s'); ?>">
            <input type="hidden" name="updated_at" class="form-control" value="<?php echo date('y-m-d\TH:i:s'); ?>">

            <!-- /.box-body -->
            <div class="box-footer">
                <a href="<?php echo base_url(); ?>admin/Produk" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
                <button type="submit" class="btn btn-info btn-sm">Simpan</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
</div>