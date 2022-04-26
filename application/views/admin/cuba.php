<?php foreach ($produk as $dpr) : ?>
                    
                    <form method="post" action="<?= base_url().'admin/update'?>">
                        <div class="for-group">
                            <label > Nama Produk </label>
                            <input type="text"  name="nama_produk" class="form-control" value="<?= $dpr->nama_produk?>">
                        </div>
                        <div class="for-group">
                        <label > Kategori </label>
                            <select name="kategori_produk" id="kategori_produk" class="form-control">
                                <option value="">Pilih Kategori</option>
                                <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k['id']; ?>"><?= $k['kategori']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <!-- <div class="for-group">
                            <label > Kategori </label>
                            <input type="text"  name="Kategori_produk" class="form-control" value="?= $dpr->kategori_produk?>">
                        </div> -->
                        <div class="for-group">
                            <label > Harga Beli </label>
                            <input type="text"  name="harga_beli" class="form-control" value="<?= $dpr->harga_beli?>">
                        </div>
                        <div class="for-group">
                            <label > Harga Jual </label>
                            <input type="text"  name="harga_jual" class="form-control" value="<?= $dpr->harga_jual?>">
                        </div>
                        <div class="for-group">
                            <label > Stok </label>
                            <input type="text"  name="stok" class="form-control" value="<?= $dpr->stok?>">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm"> Simpan </button>
                    
                    </form>
                    <?php endforeach;?>
 