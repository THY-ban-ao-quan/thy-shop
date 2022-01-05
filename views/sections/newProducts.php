<section class="new-products__slide section">
      <h2>MỚI NHẤT</h2>
      <div class="gender__toggle">
        <?php foreach ($menu as $item) : 
          if($item == $menu[0]) {?> 
            <button class="active"><?php echo $item['tenDM'];?></button>
          <?php } else {?>
            <button><?php echo $item['tenDM'];?></button>
        <?php } endforeach; ?>
      </div>
      <div class="glide">
          <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
                <li class="glide__slide">
                    <div class="product">
                        <div class="thumbnail">
                            <a href="/" style="background-image:url(https://cdn.ssstutter.com/products/nCRHI1bpbr1ZIsxG/122021/1638787138146.jpeg)"></a>
                        </div>
                        <div class="detail">
                            <div class="info">
                                <h6 class="name">textured plaid jacket</h6>
                                <div class="price">                                
                                    <p>799.000 ₫</p>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </li>
                <li class="glide__slide">
                    <div class="product">
                        <div class="thumbnail">
                            <a href="/" style="background-image:url(https://cdn.ssstutter.com/products/nCRHI1bpbr1ZIsxG/112021/1638241386336.jpeg"></a>
                        </div>
                        <div class="detail">
                            <div class="info">
                                <h6 class="name">textured plaid jacket</h6>
                                <div class="price">                                
                                    <p>799.000 ₫</p>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </li>
                <li class="glide__slide">
                    <div class="product">
                        <div class="thumbnail">
                            <a href="/" style="background-image:url(https://cdn.ssstutter.com/products/nCRHI1bpbr1ZIsxG/122021/1639840246849.jpeg)"></a>
                        </div>
                        <div class="detail">
                            <div class="info">
                                <h6 class="name">textured plaid jacket</h6>
                                <div class="price">                                
                                    <p>799.000 ₫</p>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
          </div>
        </div>
    </section>