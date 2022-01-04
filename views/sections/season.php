<section class="season__slide section">
      <h2>MÙA NÀY MẶC GÌ?</h2>
      <div class="gender__toggle">
        <?php foreach ($menu as $item) : 
          if($item == $menu[0]) {?> 
            <button class="active"><?php echo $item['tenDM'];?></button>
          <?php } else {?>
            <button><?php echo $item['tenDM'];?></button>
        <?php } endforeach; ?>
      </div>
      <div class="glide">
          <div class="glide__arrows" data-glide-el="controls">
            <button class="glide__arrow glide__arrow--cleft" data-glide-dir="<">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path
                    d="M17.172,24a1,1,0,0,1-.707-.293L8.293,15.535a5,5,0,0,1,0-7.07L16.465.293a1,1,0,0,1,1.414,1.414L9.707,9.879a3,3,0,0,0,0,4.242l8.172,8.172A1,1,0,0,1,17.172,24Z"
                ></path>
                </svg>
            </button>
            <button class="glide__arrow glide__arrow--cright" data-glide-dir=">">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path
                    d="M7,24a1,1,0,0,1-.707-1.707l8.172-8.172a3,3,0,0,0,0-4.242L6.293,1.707A1,1,0,0,1,7.707.293l8.172,8.172a5.005,5.005,0,0,1,0,7.07L7.707,23.707A1,1,0,0,1,7,24Z"
                ></path>
                </svg>
            </button>
            </div>
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