<section class="content">
<div class="box box-primary">
  <div class="box-header">
        <h3 class="box-title">Update Data produk</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <?php foreach($produk as $b){ ?>
    <form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/produk/edit" enctype="multipart/form-data">
      <div class="box-body">
      <input type="hidden" name="id_produk" value="<?php echo $b->id_produk ?>">
      <div class="form-group">
                 </div>


                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Toko Mitra</label>
                  <div class="col-sm-10">
                    <?php
                    echo "
                    <select name='id_mitra' id='id_mitra' class='form-control'>
                     <option value=''>----Pilih toko mitra----</option>";
                      foreach ($mitra->result() as $row_kategori) {  
                      echo "<option value='".$row_kategori->id_mitra."'>".$row_kategori->nama_toko."</option>";
                      }
                      echo"
                    </select>";
                    ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jenis produk</label>
                  <div class="col-sm-10">
                    <?php
                    echo "
                    <select name='id_jenis' id='id_jenis' class='form-control'>
                     <option value=''>----Pilih Jenis produk----</option>";
                      foreach ($jenis->result() as $row_kategori) {  
                      echo "<option value='".$row_kategori->id_jenis."'>".$row_kategori->jenis_produk."</option>";
                      }
                      echo"
                    </select>";
                    ?>
                  </div>
                </div>


                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama produk</label>

                  <div class="col-sm-10">
                    <input type="text" name="nama_produk" class="form-control" id="inputEmail3" value="<?php echo $b->nama_produk ?>">
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi</label>
                  <div class="col-sm-10">
                    <textarea name="deskripsi" class="form-control" id="inputEmail3" placeholder="Deskripsi"> </textarea> 
                  </div>
                </div>
               
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Gambar</label>
                  <div class="col-sm-10">
                    <input type="file" name="gambar" class="form-control" id="inputEmail3" placeholder="gambar">
                  </div>
                </div>


                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Harga</label>

                  <div class="col-sm-10">
                    <input type="text" name="harga" class="form-control" id="inputPassword3" value="<?php echo $b->harga ?>">
                  </div>
                </div>
              
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/admin/produk" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
                <button type="submit" class="btn btn-info btn-sm">Simpan</button>
              </div>

              
              <!-- /.box-footer -->
            <?php } ?>
    </form>
  </div>
</div>
</section>