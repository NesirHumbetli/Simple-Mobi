<section id="special-price">
    <div class="container">
        <h4 class="font-rubik font-size-20">Special Price</h4>
        <div id="filters" class="button-group text-right font-baloo font-size-16">
            <button class="btn is-checked" data-filter="*">All Brand</button>
    <?php
    $brandName = array_map(function($item){return $item['item_brand'];},$sale_list);
    $brand_item = array_unique($brandName);
    sort($brand_item);
    $in_cart = $Cart->getCartId($product->getData('cart'));
    array_map(function($val){printf('<button class="btn" data-filter=".%s">%s</button>',$val,$val);},$brand_item);
    ?>

        </div>
        <div class="grid">
            <?php array_map(function($item) use ($in_cart){ ?>
            <div class="grid-item border <?=$item['item_brand']??'Brand';?>">
                <div class="item py-2" style="width: 200px;">
                    <div class="product font-rale">
                        <a href="./product.php?item_id=<?=$item['item_id'];?>">
                            <img src="<?=$item['item_image']??'./assets/products/1.png';?>" alt="product1" class="img-fluid">
                        </a>
                        <div class="text-center">
                            <h6><?=$item['item_name']; ?></h6>
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
                                <span><?=$item['item_price']??0?></span>
                            </div>
                            <form method="post">
                                <input type="hidden" name="item_id" value="<?=$item['item_id'];?>">
                                <input type="hidden" name="user_id" value="<?=1;?>">
                                <?php
                                if(in_array($item['item_id'],$in_cart)){
                                    echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                                }else{
                                    echo '<button type="submit" name="submit_top_sale" class="btn btn-warning font-size-12">Add to Cart</button>';
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php },$sale_list); ?>
        </div>
    </div>
</section>