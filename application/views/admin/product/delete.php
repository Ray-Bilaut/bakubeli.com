
	<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete-<?=$prod->product_id ?>">
	<i class="fa fa-trash-o">Delete</i>
	</button>

	<div class="modal fade" id="delete-<?=$prod->product_id ?>">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
	<h4 class="modal-title">Hapus Data Produk</h4>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	<span aria-hidden="true">&times;</span>
	</button>
	</div>
	<div class="modal-body">
				 <div class="card-body">
              	  <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Peringatan!</h5>
                 Yakin Ingin Menghapus Data ini? Data yang sudah dihapus tidak dapat dikembalikan
                 </div>
	</div>
	<div class="modal-footer">
	<button type="button" class="btn btn-success" data-dismiss="modal"><li class="fa fa-times">Tutup</li></button>
	<a href="<?= base_url('admin/product/delete/'.$prod->product_id) ?>" class="btn btn-danger"><i class="fa fa-trash-o o"></i>Ya, Hapus Data Ini</a>
	</div>
	</div>
	<!-- /.modal-content -->
	</div> 
	<!-- /.modal-dialog -->
	</div>
</div>
