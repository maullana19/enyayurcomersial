<section class="content container p-5 m-auto border-0">
    <div class="card card-solid ">
        <div class="card-body pb-0">
            <div class="row">
                <div class="col-sm-12">
                    <?php

                    use function PHPSTORM_META\type;

                    echo form_open('belanja/update'); ?>

                    <table class="table elevation-1 table-responsive-sm table-hover" cellpadding="6" cellspacing="1" style="width:100%">

                        <tr class="bg-gray">
                            <th>Jumlah</th>
                            <th>Nama Sayuran</th>
                            <th style="text-align:right">Harga Sayuran</th>
                            <th style="text-align:right">Sub-Total</th>
                            <th class="text-center">Berat</th>
                            <th class="text-center">Action</th>
                        </tr>

                        <?php $i = 1; ?>

                        <?php
                        $total_berat = 0;
                        foreach ($this->cart->contents() as $items) {
                            $barang = $this->m_home->detail_barang($items['id']);
                            $berat = $items['qty'] * $barang->berat;
                            $total_berat = $total_berat + $berat;
                        ?>

                            <tr class="">
                                <td><?php echo form_input(array(
                                        'name' => $i . '[qty]',
                                        'value' => $items['qty'],
                                        'maxlength' => '3',
                                        'min' => 0,
                                        'size' => '5',
                                        'type' => 'number',
                                        'class' => 'form-control',
                                    )); ?></td>
                                <td><?php echo $items['name']; ?></td>
                                <td style="text-align:right">Rp. <?php echo  number_format($items['price']); ?>/kg</td>
                                <td style="text-align:right">Rp. <?php echo  number_format($items['subtotal']); ?></td>
                                <td class="text-center"><?= $berat ?>/gr</td>
                                <td class="text-center">
                                    <a href="<?= base_url('belanja/delete/' . $items['rowid']); ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>

                            <?php $i++; ?>

                        <?php } ?>

                        <tr class="">
                            <td class="text-left">
                                <h4 class="fs-5">Total Harga : Rp. <?php echo number_format($this->cart->total(), 0) ?></h4>
                                <h4>Total Berat : <?= $total_berat ?>/gr</h4>
                            </td>
                        </tr>

                    </table>

                    <button type="submit" class="btn btn-flat btn-secondary">Update</button>
                    <a href="<?= base_url('belanja/cekout') ?>" class="btn btn-flat btn-primary">Check Out</a>
                    <a href="<?= base_url('belanja/clear') ?>" class="btn btn-flat btn-danger">Delete All</a>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>