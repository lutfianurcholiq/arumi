<div class="sparkline13-graph">
    <div class="datatable-dashv1-list custom-datatable-overright">
        <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="false" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>No Hp</th>
                    <th>Alamat</th>
                    <th>Status</th>
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
                            <td>" . $data['namaId'] . "-" . jumlahAngka($data['id']) . "</td>
                            <td>" . $data['namaPelanggan'] . "</td>
                            <td>" . $data['noHp'] . "</td>
                            <td>" . $data['alamat'] . "</td>";
                ?>
                    <td>
                        <?php if ($data['status'] == 'Aktif') : ?>
                            <button class="pd-setting">Aktif</button>
                        <?php else : ?>
                            <button class="ps-setting">Non Aktif</button>
                        <?php endif; ?>
                    </td>
                    <td>
                        <button class="pd-setting-ed " onclick="window.location.href='<?= site_url('pelanggan/formUbah/'.$data["id"]); ?>'">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>