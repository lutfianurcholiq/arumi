<?php foreach ($detail as $data) : ?>
	<div class="bs-component">
		<div class="modal" id="hapus<?php echo $data['id']; ?>">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title text-danger">Hapus</h5>
					</div>
					<div class="modal-body">
						Hapus <?php echo "<b>".$data['namaBarang']."</b> "; ?>dari tabel ? <br><br>
			            <div class="text-right">
			              <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-close"></i>Tidak</button>
			              &nbsp;&nbsp;
			              <a href="<?php echo site_url('pembelian/hapusPembelian/'.$beli['id'].'/'.$data['id']); ?>" class="btn btn-sm btn-outline-primary"><i class="fa fa-fw fa-lg fa-check"></i>Ya</a>
			            </div>
			        </div>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>