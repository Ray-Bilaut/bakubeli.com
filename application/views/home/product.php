<!-- ISI PRODUK HOME <-->
<h4 class="text-center font-weight-bold m-4">PRODUK TERBARU</h4>

<div class="row mx-auto">
<?php foreach ($product as $pr) {?>
 <div class="card mr-2 ml-2" style="width: 16rem;"  data-target="#produk1" data-toggle="modal">
  <img src="<?=base_url('assets/upload/image/' . $pr->images)?>" class="card-img-top" alt="..." width="200" height="200">
  <div class="card-body bg-warning">
    <h5 class="card-title"><?=$pr->product_name?></h5>
    <p class="card-text"><?=$pr->slug_product?></p>
    <i class="fas fa-star text-light"></i>
    <i class="fas fa-star text-light"></i>
    <i class="fas fa-star text-light"></i>
    <i class="fas fa-star-half-alt text-light"></i>
    <i class="far fa-star text-light"></i><br>
    </div>
</div><!-- TUTUP CARD -->
<?php }?>
</div><!-- TUTUP ROW -->

<?php
include 'detail.php' //MODAL DETAIL PRODUK
?>
</div> <!-- TUTUP DARI SLIDER -->
</div> <!-- TUTUP DARI SIDEBAR-->