<section class="featured__section section">
      <h2>NỔI BẬT</h2>
      <div class="gender__toggle">
        <?php foreach ($menu as $item) : 
          if($item == $menu[0]) {?> 
            <button class="active" data-id="<?php echo $item['idDM'];?>"><?php echo $item['tenDM'];?></button>
          <?php } else {?>
            <button data-id="<?php echo $item['idDM'];?>"><?php echo $item['tenDM'];?></button>
        <?php } endforeach; ?>
      </div>
      <div class="featured__list active"> 
            <?php foreach ($featuredProducts as $product) : ?> 
              <div class="product">
                <div class="thumbnail">
                    <a href="?act=product&handle=detail&id=<?php echo $product['idSP']; ?>" style="background-image:url(./assets/img/products/<?php echo $product['linkAnh']; ?>)"></a>
                </div>
                <div class="detail">
                    <div class="info">
                        <h6 class="name"><?php echo $product['tenSP']; ?></h6>
                        <div class="price">                                
                            <p><?php echo number_format($product['donGia'], 0, ',', ',')?> ₫</p>
                        </div>   
                        <p class="color">+<?php echo $product['slMau'] ?> màu</p>                             
                    </div>
                </div>
            </div>
          <?php endforeach;?>
        </div>
    </section>