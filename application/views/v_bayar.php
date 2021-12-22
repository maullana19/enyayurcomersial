<div class="row mt-3 m-0">
    <div class="col-sm-6">
        <div class="card card-gray">
            <div class="card-header">
                <h3 class="card-title">No Rekening Toko</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Silahkan Transfer Dibawah ini Sebesar :</label>
                    <h4>Rp. <?= number_format($pesanan->total_bayar, 0)  ?>,-</h4>
                    <br>
                    <table class="table">
                        <tr>
                            <th>Bank</th>
                            <th>No Rekening</th>
                            <th>A/N</th>
                        </tr>
                        <?php foreach ($rekening as $key => $value) { ?>
                            <tr>
                                <td><?= $value->nama_bank ?></td>
                                <td><?= $value->no_rek ?></td>
                                <td><?= $value->atas_nama ?></td>
                            </tr>
                        <?php } ?>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card card-gray">
            <div class="card-header">
                <h3 class="card-title">Upload Bukti Bayar</h3>
            </div>
            <?php echo form_open_multipart('pesanan_saya/bayar/' . $pesanan->id_transaksi); ?>
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Atas Nama</label>
                    <input name="atas_nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Bank</label>
                    <input name="nama_bank" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">No Rekening</label>
                    <input name="no_rek" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Bukti Bayar</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input name="bukti_bayar" type="file" class="form-control p-1" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="<?= base_url('pesanan_saya') ?>" class="btn btn-warning">Kembali</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <?php form_close() ?>
        </div>
    </div>
</div>