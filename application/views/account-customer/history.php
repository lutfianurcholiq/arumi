<section class="new_arrivals_area section-padding-80 clearfix">
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h3><?php echo $judul; ?></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table table-bordered dataTables">
            <?php
                $thead = ["no", "pesanan", "tanggal", "total", "status", "invoice"];
                $this->libs->thead($thead);
            ?>
            <tbody>
                <?php $no = 0; foreach ($hasil as $data) : $no++; ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['kode_pesanan']. "-". jumlahAngka($data['id_pesanan']); ?></td>
                        <td><?php echo shortdate_indo($data['tanggal']); ?></td>
                        <td align="right"><?php echo rp($data['total']); ?></td>
                        <td>
                            <?php if ($data['status'] == 'Belum Dikirim') : ?>
                                Menunggu acc pihak Arumi cake
                            <?php elseif ($data['status'] == 'Sudah Dibeli') : ?>
                                <button type="button" class="btn btn-default" >
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                </button>
                            <?php endif; ?>
                        </td>
                        <td align="center">
                            <button type="button" class="btn btn-xs btn-info" onclick="window.location.href='<?= site_url('riwayat/invoice/'.$data['id_pesanan']); ?>'">
                                <i class="fa fa-info" aria-hidden="true"></i> 
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</section>
<!-- ##### New Arrivals Area End ##### -->