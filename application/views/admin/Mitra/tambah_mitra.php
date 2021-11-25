<div class="box box-primary">
  <div class="box-header">
    <h3 class="box-title">Tambah Data mitra</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>/admin/mitra/simpan">
      <div class="box-body">
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Nama Mitra</label>

        <div class="col-sm-10">
          <input type="text" name="nama" class="form-control" id="inputEmail3" placeholder="Nama Mitra">
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
          <input type="text" name="email" class="form-control" id="inputEmail3" placeholder="Email">
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
        <div class="col-sm-10">
          <input type="text" name="alamat" class="form-control" id="inputEmail3" placeholder="Alamat">
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Telepon</label>
        <div class="col-sm-10">
          <input type="text" name="telepon" class="form-control" id="inputEmail3" placeholder="Telepon">
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">No. KTP</label>
        <div class="col-sm-10">
          <input type="text" name="ktp" class="form-control" id="inputEmail3" placeholder="KTP">
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
        <div class="col-sm-10">
          <select name='status' id='status' class='form-control'>
            <option selected disabled>----Pilih Status----</option>
            <option value='Aktif'>Aktif</option>
            <option value='Tidak Aktif'>Tidak Aktif</option>
          </select>
        </div>
      </div>

      <input type="hidden" name="created_at" class="form-control" value="<?php echo date('y-m-d\TH:i:s'); ?>">
      <input type="hidden" name="updated_at" class="form-control" value="<?php echo date('y-m-d\TH:i:s'); ?>">


      <!-- /.box-body -->
      <div class="box-footer">
        <a href="<?php echo base_url(); ?>index.php/admin/mitra" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
        <button type="submit" class="btn btn-info btn-sm">Simpan</button>
      </div>
      <!-- /.box-footer -->
    </form>
  </div>
</div>