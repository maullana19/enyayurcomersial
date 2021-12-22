<div class="row p-2 m-0">
    <div class="card container card-success card-outline">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-edit"></i>
                Vertical Tabs Examples
            </h3>
        </div>
        <div class="card-body">
            <h4>Left Sided</h4>
            <div class="row">
                <div class="col-5 col-sm-3">
                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Proses Pembayaran</a>
                        <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Proses Packing</a>
                        <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">Pesanan Dikirim</a>
                        <a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">Selesai</a>
                    </div>
                </div>
                <div class="col-7 col-sm-9">
                    <div class="tab-content" id="vert-tabs-tabContent">
                        <!-- Pesanan Belum Bayar -->
                        <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                            <div class="table-responsive">
                                <table class="table table-border">
                                    <tr>
                                        <th>No.Order</th>
                                        <th>Tanggal Order</th>
                                        <th>Expedisi</th>
                                        <th>Total Bayar</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php foreach ($belum_bayar as $key => $value) { ?>
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
                                                <?php if ($value->status_bayar == 0) { ?>
                                                    <a href="<?= base_url('pesanan_saya/bayar/' . $value->id_transaksi) ?>" class="btn btn-xs btn-success">Bayar</a>
                                                <?php } ?>
                                            </td>
                                        </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                        <!-- Pesanan Diverifikasi Oleh Admin -->
                        <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                            <div class="table-responsive">
                                <table class="table table-border">
                                    <tr>
                                        <th>No.Order</th>
                                        <th>Tanggal Order</th>
                                        <th>Expedisi</th>
                                        <th>Total Bayar</th>
                                    </tr>
                                    <?php foreach ($diproses as $key => $value) { ?>
                                        <tbody>
                                            <td><?= $value->no_order ?></td>
                                            <td><?= $value->tgl_order ?></td>
                                            <td style="text-transform: uppercase;" class="text-bold"><?= $value->ekspedisi ?></td>
                                            <td class="text-bold">
                                                Rp. <?= number_format($value->total_bayar, 0) ?><br>
                                                <span class="badge badge-success mb-2">Sudah Diverifikasi</span><br>
                                                <span class="badge badge-primary">Sedang Dikemas</span>
                                            </td>
                                        </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                        <!-- Pesanan Dikirim -->
                        <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
                            <div class="table-responsive">
                                <table class="table table-border">
                                    <tr>
                                        <th>No.Order</th>
                                        <th>Tanggal Order</th>
                                        <th>Expedisi</th>
                                        <th>Total Bayar</th>
                                        <th>No Resi</th>
                                    </tr>
                                    <?php foreach ($dikirim as $key => $value) { ?>
                                        <tbody>
                                            <td><?= $value->no_order ?></td>
                                            <td><?= $value->tgl_order ?></td>
                                            <td style="text-transform: uppercase;" class="text-bold"><?= $value->ekspedisi ?></td>
                                            <td class="text-bold">
                                                Rp. <?= number_format($value->total_bayar, 0) ?><br>
                                                <span class="badge badge-primary">Sedang Dikirim</span>
                                            </td>
                                            <td>
                                                <?= $value->no_resi ?><br>
                                                <button class="btn btn-warning mt-2 btn-flat btn-xs" data-toggle="modal" data-target="#diterima<?= $value->id_transaksi ?>">Diterima</button>
                                            </td>

                                        </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="vert-tabs-settings" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
                            <div class="table-responsive">
                                <table class="table table-border">
                                    <tr>
                                        <th>No.Order</th>
                                        <th>Tanggal Order</th>
                                        <th>Expedisi</th>
                                        <th>Total Bayar</th>
                                        <th>No Resi</th>
                                    </tr>
                                    <?php foreach ($selesai as $key => $value) { ?>
                                        <tbody>
                                            <td><?= $value->no_order ?></td>
                                            <td><?= $value->tgl_order ?></td>
                                            <td style="text-transform: uppercase;" class="text-bold"><?= $value->ekspedisi ?></td>
                                            <td class="text-bold">
                                                Rp. <?= number_format($value->total_bayar, 0) ?><br>
                                            </td>
                                            <td>
                                                <?= $value->no_resi ?>
                                                <span class="badge badge-success">Selesai</span>
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

<!-- Modal Diterima -->
<?php foreach ($dikirim as $key => $value) { ?>
    <div class="modal fade" id="diterima<?= $value->id_transaksi ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $value->no_order ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Pesanan Mu Terima?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <a href="<?= base_url('pesanan_saya/diterima/' . $value->id_transaksi) ?>" class="btn btn-primary">Ya Sudah Dterima</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>