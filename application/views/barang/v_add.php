<div class="col-md-12 m-0 p-3 ">
  <div class="card card-outline card-success">
    <div class="card-header">
      <h3 class="card-title">Tambahkan Sayuran yang akan dijual</h3>
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
      echo form_open_multipart('barang/add') ?>
      <div class="form-group">
        <label>Nama Barang</label>
        <input name="nama_barang" class="form-control border-success" placeholder="Nama Produk" value="<?= set_value('nama_barang') ?>" required>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label>Kategori</label>
            <select name="id_kategori" class="form-control border-success">
              <option value="">---Pilih Kategori---</option>
              <?php foreach ($kategori as $key => $value) { ?>
                <option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label>Harga</label>
            <input name="harga" class="form-control border-success" placeholder="Harga Produk" value="<?= set_value('harga') ?>" required>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label>Berat (gr)</label>
            <input name="berat" type="number" min="0" class="form-control border-success" placeholder="Berat dalam satuan gram" value="<?= set_value('berat') ?>" required>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control border-success" cols="10" rows="5" value="<?= set_value('deskripsi') ?>" placeholder="masukan text"></textarea>
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
              <button type="submit" class="btn btn-danger shadow-sm">Simpan</button>
              <a href="<?= base_url('barang') ?>" class="btn shadow-sm btn-primary">Back</a>
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