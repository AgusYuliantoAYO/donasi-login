<div class="container-fluid">


    <div class="card">
        <!-- <form method="post"> -->
        <h5 class="card-header">Detail Produk</h5>
        <div class="card-body">
            <?php foreach ($barang as $brg): ?>
            <!-- <form method="post" action="?php echo base_url() ?>user/tambah_keranjang/.$brg->id_produk"> -->

            <div class="row">
                <div class="col-md-4">
                    <img src="<?php echo base_url().'assets/img/produk/'.$brg->gambar ?>" class="card-img-top">
                </div>
                <div class="col-md-8">
                    <table class="table">
                        <tr>
                            <td>Nama Produk</td>
                            <td><strong><?php echo $brg->nama_produk?></strong></td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td><strong><?php echo $brg->keterangan?></strong></td>
                        </tr>
                        <!-- <tr>
                            <td>Kategori</td>
                            <td><strong>?php echo $brg->kategori_produk?></strong></td>
                        </tr> -->
                        <tr>
                            <td>Stok</td>
                            <td><strong><?php echo $brg->stok?></strong></td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td><strong>
                                    <a class="badge badge-pill badge-success mb-2">
                                        Rp. <?php echo number_format($brg->harga_jual,0,',','.') ?>
                                </strong></td>
                        </tr>


                    </table>
                    <!-- ==========TAMBAH - KURANG=============== -->
                    <!-- <div class="col-md-3">
                        <span class="qty-label">Jumlah Beli : </span>
                        <div class="product-qty">
                            <div class="input-group" style="padding-top:10px">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-main btn-number btn-primary"
                                        v-on:click="minusAdd()" data-action="minus">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </span>
                                <input type="text" id="quantity" name="quantity"
                                    class="form-control input-number text-center" v-model="qty" value="1" v-numeric
                                    :min="1" :max="50">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-main btn-number btn-primary"
                                        v-on:click="plusAdd" data-action="plus">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </span> 
                            </div>
                        </div>
                    </div> -->
                    <!-- =================================== -->















                    <form action="<?= base_url('user/tambah_keranjang/'.$brg->id_produk); ?>" method="post">
                        <div class="row mt-3">
                            <!-- <div class="w-100"></div> -->
                            <div class="input-group col-4 d-flex mb-3">
                                <span class="input-group-btn mr-2">
                                    <button type="button" class="quantity-left-minus btn btn-primary"
                                        data-type="minusAdd" data-field="" data-action="minus">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </span>
                                <input type="text" id="quantity" name="quantity"
                                    class="form-control input-number text-center" value="1" min="1" max="100"></input>
                                <span class="input-group-btn ml-2">
                                    <button type="button" class="quantity-right-plus btn btn-primary"
                                        data-type="plusAdd" data-field="" data-action="plus">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </span>
                            </div>

                            <?php
                            $stok=$brg->stok;
                            if($stok<=0)
                            { ?>
                            <small class="text-danger"><b>Habis !!!</b></small>
                            <?php 
                            }else{
                            ?>
                            <?php echo anchor('User/tambah_keranjang/'.$brg->id_produk,  '<button type="submit" class="btn btn-success"> <i class="fas fa-cart-arrow-down"></i>
                        </button>')?>
                            <?php 
                    }
                     ?>


                    </form>

                    <!-- ?php echo anchor('User/tambah_keranjang/'.$brg->id_produk,' <input class="btn btn-primary" type="submit" name="submit"></input>')?> -->

                </div>
                <!-- </form> -->

                <!-- <button type="submit"  class="btn btn-primary" action=" ?php anchor('User/tambah_keranjang/'.$brg->id_produk">Tambah ke Keranjang</button> -->


                </form>
                <?php echo anchor('User/belanja/','<div class="btn btn-sm btn-danger">kembali</div>')?>
            </div>

        </div>
        <?php endforeach; ?>
    </div>
    <!-- ========================================== -->




    <!-- ?php
$cartItem = $shoppingCart->getMemberCartItem($member_id);
if (! empty($cartItem)) {
    $item_quantity = 0;
    $item_price = 0;
    if (! empty($cartItem)) {
        foreach ($cartItem as $item) {
            $item_quantity = $item_quantity + $item["quantity"];
            $item_price = $item_price + ($item["price"] * $item["quantity"]);
        }
    }
}
?>
    <div id="shopping-cart">
        <div class="txt-heading">
            <div class="txt-heading-label">Shopping Cart</div>

            <a id="btnEmpty" href="index.php?action=empty"><img src="empty-cart.png" alt="empty-cart" title="Empty Cart"
                    class="float-right" /></a>
            <div class="cart-status">
                <div>Total Quantity: ?php echo $item_quantity; ?></div>
                <div>Total Price: <php echo $item_price; ></div>
            </div>
        </div>
        <php
if (! empty($cartItem)) {
    >
        <div class="shopping-cart-table">
            <div class="cart-item-container header">
                <div class="cart-info title">Title</div>
                <div class="cart-info">Quantity</div>
                <div class="cart-info price">Price</div>
            </div>
            <php
    foreach ($cartItem as $item) {
        >
            <div class="cart-item-container">
                <div class="cart-info title">
                    <php echo $item["name"]; >
                </div>

                <div class="cart-info quantity">
                    <div class="btn-increment-decrement" onClick="decrement_quantity(<php echo $item["cart_id"]; >)">-
                    </div><input class="input-quantity" id="input-quantity-<php echo $item["cart_id"]; >"
                        value="<php echo $item["quantity"]; >">
                    <div class="btn-increment-decrement" onClick="increment_quantity(<php echo $item["cart_id"]; >)">+
                    </div>
                </div>

                <div class="cart-info price">
                    <php echo "$".$item["price"]; >
                </div>


                <div class="cart-info action">
                    <a href="index.phpaction=remove&id=<php echo $item["cart_id"]; >" class="btnRemoveAction"><img
                            src="icon-delete.png" alt="icon-delete" title="Remove Item" /></a>
                </div>
            </div>
            <php
    }
    >
        </div>
        <php
}
>
    </div>
    <php require_once "product-list.php"; ?>
 -->





    <!-- ============================= -->
</div>
</div>