<?php $sale_list = $product->getData();
shuffle($sale_list);
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['submit_top_sale'])){
        $Cart->addToCart($_POST['user_id'],$_POST['item_id']);
    }
}
?>
<section id="top-sale">
    <div class="container py-5">
        <h4 class="font-rubik font-size-20">Top Sale</h4>
        <hr>
        <div class="owl-carousel owl-theme">
            <?php foreach ($sale_list as $item) { ?>
                <div class="item py-2">
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