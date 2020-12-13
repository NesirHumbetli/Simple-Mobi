<?php $sale_list = $product->getData();?>
<section id="new-phones">
    <div class="container">
        <h4 class="font-rubik font-size-20">New Phones</h4>
        <hr>
        <div class="owl-carousel owl-theme">
            <?php foreach ($sale_list as $item) { ?>
                <div class="item py-2 bg-light">
                    <div class="product font-rale">
                        <a href="./product.php?item_id=<?=$item['item_id'];?>">
                            <img src="<?= $item['item_image'] ?? './assets/products/1.png'; ?>" alt="product1"
                                 class="img-fluid">
                        </a>
                        <div class="text-center">
                            <h6><?= $item['item_name'] ?? 'unknown'; ?></h6>
                            <div class="rating text-warning font-size-12">
                                    <span>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </span>
                            </div>
                            <div class="price py-2">
                                <span><?= $item['item_price'] ?? 0; ?></span>
                            </div>
                            <form method="post">
                                <input type="hidden" name="item_id" value="<?=$item['item_id'];?>">
                                <input type="hidden" name="user_id" value="<?=1;?>">
                                <?php
                                if(in_array($item['item_id'],$Cart->getCartId($product->getData('cart')))){
                                    echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                                }else{
                                    echo '<button type="submit" name="submit_top_sale" class="btn btn-warning font-size-12">Add to Cart</button>';
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>