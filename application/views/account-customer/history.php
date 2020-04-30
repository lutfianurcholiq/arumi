<section class="new_arrivals_area section-padding-80 clearfix">
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h3>Riwayat Pesanan</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table table-bordered dataTables">
            <?php
                $thead = ["no", "pesanan", "tanggal", "total", "aksi"];
                $this->libs->thead($thead);
            ?>
            <tbody>
            <?php $no = 0; foreach ($hasil as $data) : $no++; ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['kode_pesanan']. "-". jumlahAngka($data['id_pesanan']); ?></td>
                    <td><?php echo shortdate_indo($data['tanggal']); ?></td>
                    <td align="right"><?php echo rp($data['total']); ?></td>
                    <td align="center">
                        <?php if ($data['status'] == 'Belum Dikirim') : ?>
                            <button type="button" class="btn btn-xs btn-primary" >
                                <i class="fa fa-calendar-check" aria-hidden="true"></i> Menunggu
                            </button>
                        <?php elseif ($data['status'] == 'Sudah Dibeli') : ?>
                            <button type="button" class="btn btn-default" >
                                <i class="fa fa-users" aria-hidden="true"></i>
                            </button>
                        <?php endif; ?>
                    </td>
                </tr>
          <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</section>
<!-- ##### New Arrivals Area End ##### -->