<section class="new_arrivals_area section-padding-80 clearfix">
    <div class="breadcumb_area bg-img" style="background-images: url(./shop-assets/img/bg-img/breadcumb.jpg) ">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h3>INVOICE</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <?php $this->load->view('account-customer/table-info') ?>
        <table class="table table-bordered dataTables">
            <?php
                $thead = ["no", "produk", "qty", "harga produk + harga rasa", "subtotal"];
                $this->libs->thead($thead);
            ?>
            <tbody>
                <?php $no = 0; $total = 0; foreach ($hasil as $data) : $no++; ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $data['nama_produk']." ".$data['rasa'] ?></td>
                        <td><?php echo $data['jumlah']. " ".$data['satuan'] ?></td>
                        <td align="right"><?php echo rp($data['harga'])." + ".rp($data['harga_rasa']) ?></td>
                        <td align="right"><?php echo rp($data['subtotal']) ?></td>
                    </tr>
                <?php $total += $data['subtotal']; endforeach; ?>
            </tbody>
            <tr>
                <td colspan="4" align="center"><b>Total</b></td>
                <td align="right"><b><?php echo rp($total) ?></b></td>
            </tr>
        </table>
    </div>

</section>
<!-- ##### New Arrivals Area End ##### -->