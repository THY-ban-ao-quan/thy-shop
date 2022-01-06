<section class="new-products__slide section">
      <h2>MỚI NHẤT</h2>
      <div class="gender__toggle">
        <?php foreach ($menu as $item) : 
          if($item == $menu[0]) {?> 
            <button class="active" data-id="<?php echo $item['idDM'];?>"><?php echo $item['tenDM'];?></button>
          <?php } else {?>
            <button data-id="<?php echo $item['idDM'];?>"><?php echo $item['tenDM'];?></button>
        <?php } endforeach; ?>
      </div>
      <div class="glide">
          <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
                <?php foreach ($newProducts as $product) : ?> 
                    <li class="glide__slide">
                        <div class="product">
                            <div class="thumbnail">
                                <a href="/" style="background-image:url(./assets/img/products/<?php echo $product['linkAnh']; ?>)"></a>
                            </div>
                            <div class="detail">
                                <div class="info">
                                    <h6 class="name"><?php echo $product['tenSP']; ?></h6>
                                    <div class="price">                                
                                        <p><?php echo number_format($product['donGia'], 0, ',', ',')?> ₫</p>
                                    </div>                                
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endforeach;?>
            </ul>
          </div>
        </div>
    </section>