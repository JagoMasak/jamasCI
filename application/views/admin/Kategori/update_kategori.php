<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Update Data kategori</h3>
    </div>

    <div class="box-body">
        <?php foreach($kategori as $b){ ?>
            <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/Kategori/edit">
                <div class="box-body">
                    <input type="hidden" name="id" value="<?php echo $b['id_kategori'] ?>">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nama</label>

                        <div class="col-sm-10">
                            <input type="text" name="nama" class="form-control" value="<?php echo $b['nama_kategori'] ?>">
                            <div class="text-danger">
                                <?php echo validation_errors(); ?>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="update_at" class="form-control" value="<?php echo date('y-m-d\TH:i:s'); ?>">

                    <div class="box-footer">
                        <a href="<?php echo base_url();?>index.php/admin/kategori" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
                        <button type="submit" class="btn btn-info btn-sm">Update</button>
                    </div>
                </div>
            </form>
        <?php } ?>
    </div>
</div>