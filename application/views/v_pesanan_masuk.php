<div class="col-sm-12 pb-5">
    <div class="card container card-dark card-outline">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-comment-dollar"></i>
                Waktu Adalah Uang
            </h3>
        </div>
        <div class="card-body bg-light">
            <h4 class="text-success"><i class="fas fa-thumbtack"></i> Orderan Masuk</h4>
            <div class="row">
                <div class="col-5 col-sm-3">
                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active text-dark" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Proses Pembayaran</a>
                        <a class="nav-link text-dark" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Proses Packing</a>
                        <a class="nav-link text-dark" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">Pesanan Dikirim</a>
                        <a class="nav-link text-dark" id="vert-tabs-settings-tab" data-toggle="pill" href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">Selesai</a>
                    </div>
                </div>
                <div class="col-7 bg-white col-sm-9">
                    <div class="tab-content" id="vert-tabs-tabContent">
                        <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr class="bg-dark">
                                        <th>No.Order</th>
                                        <th>Tanggal Order</th>
                                        <th>Expedisi</th>
                                        <th>Total Bayar</th>
                                        <th>PROSES</th>
                                    </tr>
                                    <?php foreach ($pesanan as $key => $value) { ?>
                                        <tbody>
                                            <td><?= $value->no_order ?></td>
                                            <td><?= $value->tgl_order ?></td>
                                            <td style="text-transform: uppercase;" class="text-bold"><?= $value->ekspedisi ?></td>
                                            <td class="text-bold">
                                                Rp. <?= number_format($value->total_bayar, 0) ?><br>
                                                <?php if ($value->status_bayar == 0) { ?>
                                                    <span class="badge badge-danger">Belum Bayar</span>
                                                <?php } else { ?>
                                                    <span class="badge badge-success mb-2">Sudah Bayar</span><br>
                                                    <span class="badge badge-primary">Menunggu Verifikasi</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($value->status_bayar == 1) { ?>
                                                    <button class="btn btn-flat btn-outline-success btn-xs" data-toggle="modal" data-target="#cek<?= $value->id_transaksi ?>">Lihat Pembayaran</button>
                                                    <a href="<?= base_url('admin/proses/' . $value->id_transaksi) ?>" class="btn btn-flat btn-xs btn-danger">Proses</a>
                                                <?php } ?>
                                            </td>
                                        </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                            <div class="table-responsive">
                                <table class="table table-border">
                                    <tr class="bg-dark">
                                        <th>No.Order</th>
                                        <th>Tanggal Order</th>
                                        <th>Expedisi</th>
                                        <th>Total Bayar</th>
                                        <th>PROSES</th>
                                    </tr>
                                    <?php foreach ($pesanan_diproses as $key => $value) { ?>
                                        <tbody>
                                            <td><?= $value->no_order ?></td>
                                            <td><?= $value->tgl_order ?></td>
                                            <td style="text-transform: uppercase;" class="text-bold"><?= $value->ekspedisi ?></td>
                                            <td class="text-bold">
                                                Rp. <?= number_format($value->total_bayar, 0) ?><br>
                                                <span class="badge badge-success"><i class="fas fa-box-open"></i> Proses Packing</span><br>
                                            </td>
                                            <td>
                                                <?php if ($value->status_bayar == 1) { ?>
                                                    <button class="btn btn-flat btn-sm btn-danger" data-toggle="modal" data-target="#kirim<?= $value->id_transaksi ?>"><i class="fas fa-shipping-fast"></i> Kirim</button>
                                                <?php } ?>
                                            </td>
                                        </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
                            <div class="table-responsive">
                                <table class="table table-border">
                                    <tr class="bg-dark">
                                        <th>No.Order</th>
                                        <th>Tanggal Order</th>
                                        <th>Expedisi</th>
                                        <th>Total Bayar</th>
                                        <th>No Resi</th>
                                    </tr>
                                    <?php foreach ($pesanan_dikirim as $key => $value) { ?>
                                        <tbody>
                                            <td><?= $value->no_order ?></td>
                                            <td><?= $value->tgl_order ?></td>
                                            <td style="text-transform: uppercase;" class="text-bold"><?= $value->ekspedisi ?></td>
                                            <td class="text-bold">
                                                Rp. <?= number_format($value->total_bayar, 0) ?><br>
                                                <span class="badge badge-success"><i class="fas fa-shipping-fast"></i> Sedang Dikirim</span><br>
                                            </td>
                                            <td>
                                                <?= $value->no_resi ?>
                                            </td>
                                        </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="vert-tabs-settings" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
                            <div class="table-responsive">
                                <table class="table table-border">
                                    <tr class="bg-dark">
                                        <th>No.Order</th>
                                        <th>Tanggal Order</th>
                                        <th>Expedisi</th>
                                        <th>Total Bayar</th>
                                        <th>No Resi</th>
                                    </tr>
                                    <?php foreach ($pesanan_selesai as $key => $value) { ?>
                                        <tbody>
                                            <td><?= $value->no_order ?></td>
                                            <td><?= $value->tgl_order ?></td>
                                            <td style="text-transform: uppercase;" class="text-bold"><?= $value->ekspedisi ?></td>
                                            <td class="text-bold">
                                                Rp. <?= number_format($value->total_bayar, 0) ?><br>
                                                <span class="badge badge-success"><i class="fas fa-shipping-fast"></i>Selesai</span><br>
                                            </td>
                                            <td>
                                                <?= $value->no_resi ?>
                                            </td>
                                        </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Lihat Pembyaran -->
<?php foreach ($pesanan as $key => $value) { ?>
    <div class="modal fade" id="cek<?= $value->id_transaksi ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $value->no_order ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th>Nama Bank</th>
                            <th>:</th>
                            <td class="text-success"><?= $value->nama_bank ?></td>
                        </tr>
                        <tr>
                            <th>Atas Nama</th>
                            <th>:</th>
                            <td class="text-success"><?= $value->atas_nama ?></td>
                        </tr>
                        <tr>
                            <th>No. Rekening</th>
                            <th>:</th>
                            <td class="text-success"><?= $value->no_rek ?></td>
                        </tr>
                        <tr>
                            <th>Total Pembayaran</th>
                            <th>:</th>
                            <td class="text-success">Rp. <?= number_format($value->total_bayar, 0) ?></td>
                        </tr>
                    </table>
                    <img src="<?= base_url('assets/img/bukti_bayar/' . $value->bukti_bayar) ?>" class="img-fluid pad">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Pengiriman -->
<?php foreach ($pesanan_diproses as $key => $value) { ?>
    <div class="modal fade" id="kirim<?= $value->id_transaksi ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $value->no_order ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('admin/kirim/' . $value->id_transaksi) ?>
                    <table class="table">
                        <tr>
                            <th>Nama Customer</th>
                            <th>:</th>
                            <th><?= $value->atas_nama ?></th>
                        </tr>
                        <tr>
                            <th>Ekspedisi</th>
                            <th>:</th>
                            <th class=""><?= $value->ekspedisi ?></th>
                        </tr>
                        <tr>
                            <th>Paket</th>
                            <th>:</th>
                            <th><?= $value->paket ?></th>
                        </tr>
                        <tr>
                            <th>Total Pembayaran Customer</th>
                            <th>:</th>
                            <th>Rp. <?= number_format($value->total_bayar, 0) ?></th>
                        </tr>
                        <tr>
                            <th>No Resi</th>
                            <th>:</th>
                            <th><input name="no_resi" class="form-control" placeholder="no resi" required></th>
                        </tr>
                        <br>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Kirim</button>
                        </div>
                    </table>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>