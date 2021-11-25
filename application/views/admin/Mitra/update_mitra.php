<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Update Data mitra</h3>
    </div>
    <!-- /.box-header -->

    <div class="box-body">
        <?php foreach($mitra as $b){ ?>
            <form class="form-horizontal" method="post" action="<?= base_url(); ?>admin/Mitra/edit">
                <div class="box-body">
                    <input type="hidden" name="id" value="<?= $b['id_mitra'] ?>">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nama Mitra</label>

                        <div class="col-sm-10">
                            <input type="text" name="nama" class="form-control" value="<?php echo $b['nama_mitra'] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-10">
                            <input type="text" name="email" class="form-control" value="<?php echo $b['email'] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Alamat</label>

                        <div class="col-sm-10">
                            <input type="text" name="alamat" class="form-control" value="<?php echo $b['alamat'] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Telepon</label>

                        <div class="col-sm-10">
                            <input type="text" name="telepon" class="form-control" value="<?php echo $b['telepon'] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">No.KTP</label>

                        <div class="col-sm-10">
                            <input type="text" name="ktp" class="form-control" value="<?php echo $b['ktp'] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-10">
                            <select name='status' id='status' class='form-control'>
                                <option disabled>----Pilih Status----</option>
                                <option value='Aktif' <?php if($b['status'] == 'Aktif') { echo 'selected'; } ?>>Aktif</option>
                                <option value='Tidak Aktif' <?php if($b['status'] == 'Tidak Aktif') { echo 'selected'; } ?>>Tidak Aktif</option>
                            </select>
                        </div>
                    </div>

                    <input type="hidden" name="updated_at" class="form-control" value="<?php echo date('y-m-d\TH:i:s'); ?>">

                    <div class="box-footer">
                        <a href="<?php echo base_url();?>admin/Mitra" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
                        <button type="submit" class="btn btn-info btn-sm">Update</button>
                    </div>
                </div>                
            </form>
        <?php } ?>
    </div>
</div>