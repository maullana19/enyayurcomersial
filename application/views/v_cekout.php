<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 mt-3">
                <div class="invoice p-3 elevation-2 mb-3">
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-file-invoice"></i> Enyayur. Invoice
                                <small class="float-right">Date : <?= date('d / m / Y') ?></small>
                            </h4>
                        </div>
                    </div>
                    <div class="row invoice-info">
                        <div class="col-sm-8 invoice-col">
                            From
                            <address>
                                <strong>Cv. Enyayur Makmur Indonesia</strong><br>
                                Jl.Cengkareng Barat<br>
                                Dekat Kampus<br>
                                Universitas Bina Sarana Informatika<br>
                                Telepon : 08222xxxxx
                            </address>
                        </div>
                        <div class="col-sm-4 invoice-col">
                            <b>Invoice #007612</b><br>
                            <br>
                            <b>Order ID:</b> 4F3S8J<br>
                            <b>Tanggal Pembayaran:</b> 2/22/2021<br>
                            <b>Account-No:</b> 968-34567
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Qty</th>
                                        <th>Harga</th>
                                        <th>Sayuran</th>
                                        <th>Total Harga</th>
                                        <th>Berat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $total_berat = 0;
                                    foreach ($this->cart->contents() as $items) {
                                        $barang = $this->m_home->detail_barang($items['id']);
                                        $berat = $items['qty'] * $barang->berat;
                                        $total_berat = $total_berat + $berat;
                                    ?>
                                        <tr>
                                            <td><?php echo $items['qty']; ?></td>
                                            <td style="text-align:left">Rp. <?php echo  number_format($items['price']); ?>/kg</td>
                                            <td><?php echo $items['name']; ?></td>
                                            <td style="text-align:right">Rp. <?php echo  number_format($items['subtotal']); ?></td>
                                            <td class="text-center"><?= $berat ?>/gr</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php
                    echo form_open('belanja/cekout');
                    $no_order = date('Ymd') . strtoupper(random_string('alnum', 8));
                    ?>
                    <div class="row">
                        <div class="col-sm-8 invoice-col">
                            Dikirim Ke :
                            <div class="row">
                                <?php
                                echo validation_errors('<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-info"></i>', '</h5> </div>');
                                ?>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <select name="provinsi" class="form-control"></select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kota / Kabupaten</label>
                                        <select name="kota" class="form-control">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Ekspedisi</label>
                                        <select name="ekspedisi" class="form-control">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Paket</label>
                                        <select name="paket" class="form-control">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input name="alamat" class="form-control" placeholder="Alamat Tujuan" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Kode Pos</label>
                                        <input name="kode_pos" class="form-control" placeholder="Kode POS">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Penerima</label>
                                        <input name="nama_penerima" class="form-control" placeholder="Nama Penerima" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>No. Telpon</label>
                                        <input name="hp_penerima" class="form-control" placeholder="No. Handphone" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 bg-light mb-2">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <th style="width:50%">Grand Total :</th>
                                        <td>Rp. <?php echo number_format($this->cart->total(), 0); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Berat :</th>
                                        <td><?= $total_berat ?>/gr</td>
                                    </tr>
                                    <tr>
                                        <th>Ongkir :</th>
                                        <td><label id="ongkir"></label></td>
                                    </tr>
                                    <tr>
                                        <th>Total Bayar :</th>
                                        <td id="total_bayar"></td>
                                    </tr>
                                    <tr>
                                        <th>ThermalBag Tambahan = 30000 :</th>
                                        <td id="thermalbag"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Save Transaksi Hidden  -->
                    <input name="no_order" value="<?= $no_order ?>" hidden>
                    <input name="estimasi" hidden>
                    <input name="ongkir" hidden>
                    <input name="berat" value="<?= $total_berat ?>" hidden>
                    <input name="grand_total" value="<?= $this->cart->total() ?>" hidden>
                    <input name="total_bayar" hidden>
                    <!-- End Save Transaksi -->

                    <!-- Save Rincian Transaksi -->
                    <?php
                    $i = 1;
                    foreach ($this->cart->contents() as $items) {
                        echo form_hidden('qty' . $i++, $items['qty']);
                    }
                    ?>
                    <div class="row no-print bg-light">
                        <div class="col-12">
                            <a href="<?= base_url('belanja') ?>" class="btn btn-flat btn-outline-primary">Kembali</a>
                            <button type="submit" class="btn btn-flat btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                Proses Cekout
                            </button>
                        </div>
                    </div>
                    <?php echo form_close() ?>
                </div>

            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "<?= base_url('rajaongkir/provinsi') ?>",
            success: function(hasil_provinsi) {
                // console.log(hasil_provinsi);
                $('select[name=provinsi]').html(hasil_provinsi);
            }
        });

        $('select[name=provinsi]').on('change', function() {
            var id_provinsi_terpilih = $("option:selected", this).attr('id_provinsi');
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/kota') ?>",
                data: "id_provinsi=" + id_provinsi_terpilih,
                success: function(hasil_kota) {
                    $('select[name=kota]').html(hasil_kota);
                }
            });
        });

        $('select[name=kota]').on('change', function() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/ekspedisi') ?>",
                success: function(hasil_ekspedisi) {
                    $('select[name=ekspedisi]').html(hasil_ekspedisi);
                }
            });
        });

        $('select[name=ekspedisi]').on('change', function() {
            // Dapat Ekspedisi Terpilih
            var ekspedisi_terpilih = $('select[name=ekspedisi]').val()
            // Mendapatkan Kota Tujuan Terpilih
            var id_kota_tujuan_terpilih = $("option:selected", "select[name=kota]").attr('id_kota');
            // Ongkos Kirim
            var total_berat = <?= $total_berat ?>;
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/paket') ?>",
                data: 'ekspedisi=' + ekspedisi_terpilih + '&id_kota=' + id_kota_tujuan_terpilih + '&berat=' + total_berat,
                success: function(hasil_paket) {
                    $('select[name=paket]').html(hasil_paket);
                }
            });
        });

        $("select[name=paket]").on("change", function() {
            var dataongkir = "Rp. " + $("option:selected", this).attr('ongkir');
            $("#ongkir").html(dataongkir)
            // Menghitung Total Bayar
            var ongkir = $("option:selected", this).attr('ongkir');
            var total_bayar = parseInt(ongkir) + parseInt(<?= $this->cart->total() ?>);
            var thermalbag = 30000 + total_bayar;
            $('#total_bayar').html("Rp. " + total_bayar);
            $('#thermalbag').html("Rp." + thermalbag)

            // Estimasi & Ongkir
            var estimasi = $("option:selected", this).attr('estimasi');
            $("input[name=estimasi]").val(estimasi);
            $("input[name=ongkir]").val(dataongkir);
            $("input[name=total_bayar]").val(total_bayar);
        });


    });
</script>