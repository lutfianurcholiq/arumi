<div class="sparkline13-graph">
    <div class="datatable-dashv1-list custom-datatable-overright">
    <?php foreach($produk as $data){?>
            <h5 style="color: royalblue; text-align: right;" >Pesanan : &nbsp;<?php echo $data['nama_produk']." ".$data['rasa'];?></h5>
        <?php }?>
        <table class="table table-bordered table-hover dataTables">
            <?php
                $thead = ["no", "nama bahan", "satuan", "harga"];
                $this->libs->thead($thead);
            ?>
            <tbody>
                <?php $no = 1; foreach ($bb as $data) : ;
                $total = 0;
                $total += $data['bahan_baku'];?>
                    <tr>
                        <td style="text-align: center;"><?php echo $no++ ?></td>
                        <td><?php echo $data['nama_bahan'] ?></td>
                        <td><?php echo $data['jumlah']."&nbsp".$data['satuan']?></td>
                        <td style="text-align: right;"><?php echo rp($data['harga']) ?></td>
                        
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tr>
                <td colspan="3" style="text-align: center;"><b>Total</b></td>
                <td style="text-align: right;"><b><?php echo rp($total);?></b></td>
            </tr>
        </table>
    </div>
</div>