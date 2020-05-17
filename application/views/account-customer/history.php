<section class="new_arrivals_area section-padding-80 clearfix">
    <div class="breadcumb_area bg-img" style="background-image: url(shop-assets/img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h3><?php echo strtoupper($judul); ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <table class="table table-bordered dataTables">
            <?php
                $thead = ["no", "pesanan", "tanggal", "total", "status", "aksi"];
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
                            <?php 
                                if ($data['status'] == 'Belum Dikirim') : 
                                    echo "Menunggu approval pihak Arumi cake";
                                elseif ($data['status'] == 'Diproduksi') : 
                                    echo "Sedang Diproduksi";
                                else : 
                                        echo $data['status'];
                                endif; 
                            ?>
                        </td>
                        <td align="center">
                            <?php if ($data['status'] == 'Belum Bayar') : ?>
                                <button type="button" class="btn btn-xs btn-success" onclick="window.location.href='<?= site_url('bayar/pay/'.$data['id_pesanan']); ?>'">
                                    <i class="fa fa-credit-card" aria-hidden="true"></i> 
                                </button>
                            <?php elseif ($data['status'] == 'Menunggu') : ?>
                                <button type="button" class="btn btn-xs btn-info" disabled>
                                    <i class="fa fa-spinner" aria-hidden="true"></i> 
                                </button>
                            <?php else : ?>
                                <button type="button" class="btn btn-xs btn-info" onclick="window.location.href='<?= site_url('riwayat/invoice/'.$data['id_pesanan']); ?>'">
                                    <i class="fa fa-info" aria-hidden="true"></i> 
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