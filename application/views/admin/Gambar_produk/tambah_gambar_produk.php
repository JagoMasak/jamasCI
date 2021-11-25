<div class="box box-primary">
  <div class="box-header">
        <h3 class="box-title">Tambah Data kategori</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <form class="form-horizontal" method="post" action="<?php echo base_url();?>/admin/gambar_produk/simpan" enctype="multipart/form-data">
      <div class="box-body">
                  </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Produk</label>
                  <div class="col-sm-10">
                    <?php
                    echo "
                    <select name='id_produk' id='id_produk' class='form-control'>
                     <option value=''>----Pilih Nama Produk----</option>";
                      foreach ($produk->result() as $row_kategori) {  
                      echo "<option value='".$row_kategori->id_produk."'>".$row_kategori->nama."</option>";
                      }
                      echo"
                    </select>";
                    ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Path</label>

                  <div class="col-sm-10">
                    <input type="file" name="path" class="form-control" id="inputEmail3" multiple>
                  </div>
                </div>
                 
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/admin/gambar_produk" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
                <button type="submit" class="btn btn-info btn-sm">Simpan</button>
              </div>
              <!-- /.box-footer -->
    </form>
  </div>
</div>