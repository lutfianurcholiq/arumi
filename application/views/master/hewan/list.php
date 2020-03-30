<div class="sparkline13-graph">
    <div class="datatable-dashv1-list custom-datatable-overright">
        <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="false" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Keterangan</th>
                    <th>Pilihan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                foreach ($hasil as $data) :
                    $no++;
                    echo "<tr>
                            <td>$no</td>
                            <td>" . $data['kodeHewan'] . "-" . jumlahAngka($data['noHewan']) . "</td>
                            <td>" . $data['namaHewan'] . "</td>
                            <td>" . $data['jenis'] . "</td>
                            <td>" . $data['keterangan'] . "</td>";
                ?>
                    <td>
                        <a href="#form-modal" data-id="<?php echo $data['noHewan']; ?>" data-toggle="modal" class="btn btn-default btn-form-ubah"><i class="fa fa-pencil"></i></a>
                        <input type="hidden" class="namaHewan-value" value="<?php echo $data['namaHewan']; ?>">
                        <input type="hidden" class="jenis-value" value="<?php echo $data['jenis']; ?>">
                        <input type="hidden" class="keterangan-value" value="<?php echo $data['keterangan']; ?>">
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>