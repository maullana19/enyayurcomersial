<div class="col-md-12 m-0">
  <div class="card card-outline card-success">
    <div class="card-header">
      <h3 class="card-title bg-light rounded-pill">Edit Produk</h3>
    </div>
    <div class="card-body">
      <?php
      // Notifikasi Kosong
      echo validation_errors('<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-info"></i>', '</h5> </div>');
      // Notifikasi Gagal Upload
      if (isset($error_upload)) {
        echo '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-info"></i>' . $error_upload . '</h5> </div>';
      }
      ?>
      <?php echo form_open('barang/edit/' . $barang->id_barang) ?>
      <div class="form-group">
        <label>Nama Barang</label>
        <input name="nama_barang" class="form-control" placeholder="Nama Produk" value="<?= $value->nama_barang ?>">
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>Kategori</label>
            <select name="id_kategori" class="form-control">
              <option value="">---Pilih Kategori---</option>
              <?php foreach ($kategori as $key => $value) { ?>
                <option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Harga</label>
            <input name="harga" class="form-control" placeholder="Harga Produk" value="<?= $value->harga ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Berat</label>
            <input name="berat" class="form-control" placeholder="Berat Produk" value="<?= $value->berat ?>">
          </div>
        </div>
        <div class="col-sm-12">
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" cols="10" rows="5" placeholder="<?= $value->deskripsi ?>"></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label>Upload Gambar</label>
              <br>
              <input type="file" id="preview_gambar" name="gambar" class="p-0" required>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <img src="<?= base_url('assets/img/noimage.png') ?>" id="gambar_load" alt="img" width="300px">
            </div>
          </div>
          <div class="col-sm-6 ">
            <div class="form-group ">
              <button type="submit" class="btn btn-danger shadow-sm">Save</button>
              <a href="<?= base_url('barang') ?>" class="btn shadow-sm btn-light">Back</a>
            </div>
          </div>
        </div>
      </div>
      <?php echo form_close() ?>
    </div>
  </div>
</div>

<script>
  function bacaGambar(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#gambar_load').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $('#preview_gambar').change(function() {
    bacaGambar(this);
  });
</script>