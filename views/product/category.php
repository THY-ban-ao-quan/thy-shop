<div class="categories-layout">
    <div class="categories__info">
        <h1 class="info__title">
          <?php echo isset($cateName) ? $cateName : "thời trang nam" ?>
        </h1>
        <p>
            Tất cả những sản phẩm Mới nhất nằm trong BST được mở bán Hàng Tuần sẽ được cập nhật liên tục tại đây. Chắc chắn bạn sẽ tìm thấy những sản phẩm Đẹp Nhất - Vừa Vặn Nhất - Phù Hợp nhất với phong cách của mình.
        </p>
    </div>
    <div class="categories__list">
      <ul>
          <li><a href="/c/so-mi-ao-kieu"> SƠ MI  &amp; ÁO KIỂU</a></li>
          <li><a href="/c/ao-thun"> ÁO THUN &</a></li>
          <li><a href="/c/quan"> QUẦN</a></li>
          <li><a href="/c/len-det"> LEN DỆT</a></li>
          <li><a href="/c/phu-kien"> PHỤ KIỆN</a></li>
          <li><a href="/c/ao-blazer-ao-khoac"> ÁO BLAZER &amp; ÁO KHOÁC</a></li>
          <li><a href="/c/quan-bo"> QUẦN BÒ</a></li>
      </ul>
    </div>
    <div class="categories__filter">
      <div class="filter__toggle">
        <span class="mobile-cate-toggle">
          quần short
          <svg
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            aria-hidden="true"
            role="img"
            class="iconify iconify--mdi"
            width="32"
            height="32"
            preserveAspectRatio="xMidYMid meet"
            viewBox="0 0 24 24"
          >
            <path
              d="M7.41 8.58L12 13.17l4.59-4.59L18 10l-6 6l-6-6l1.41-1.42z"
              fill="currentColor"
            ></path>
          </svg>
        </span>
        <span class="mobile-filter"
          >
          <svg
            width="24"
            viewBox="0 0 20 20"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M10.5001 9V9.5H11.0001H18.9999C19.2759 9.5 19.5001 9.72426 19.5001 9.99994C19.5001 10.2759 19.2759 10.5001 18.9999 10.5001H11.0001H10.5001V11.0001V18.9999C10.5001 19.2759 10.2759 19.5001 9.99994 19.5001C9.72426 19.5001 9.5 19.2759 9.5 18.9999V11.0001V10.5001H9H0.999939C0.724261 10.5001 0.5 10.2759 0.5 9.99994C0.5 9.7242 0.724202 9.5 0.999939 9.5H9H9.5V9V0.999939C9.5 0.724202 9.7242 0.5 9.99994 0.5C10.2759 0.5 10.5001 0.724261 10.5001 0.999939V9Z"
              fill="#333"
              stroke-width="2"
            ></path>
          </svg>
          Filter
        </span>

      </div>
      <div class="filter__list">
        <ul class="filter__list--wrapper">
          <li>
            <h4>Màu sắc
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7,24a1,1,0,0,1-.707-1.707l8.172-8.172a3,3,0,0,0,0-4.242L6.293,1.707A1,1,0,0,1,7.707.293l8.172,8.172a5.005,5.005,0,0,1,0,7.07L7.707,23.707A1,1,0,0,1,7,24Z"></path></svg>
            </h4>
            <ul class="color-list">
              <li class="color black active" data-color="đen"></li>
              <li class="color grey" data-color="xám"></li>
              <li class="color white" data-color="trắng"></li>              
              <li class="color purple" data-color="tím"></li>
              <li class="color blue" data-color="xanh biển"></li>
              <li class="color light-blue" data-color="xanh da trời"></li>
              <li class="color red" data-color="đỏ"></li>
              <li class="color orange" data-color="cam"></li>
              <li class="color yellow" data-color="vàng"></li>
              <li class="color green" data-color="xanh lá"></li>
              <li class="color brown" data-color="xám"></li>
              <li class="color pink" data-color="đen"></li>
            </ul>
          </li>
          <li>
            <h4>
              Size quần/áo
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7,24a1,1,0,0,1-.707-1.707l8.172-8.172a3,3,0,0,0,0-4.242L6.293,1.707A1,1,0,0,1,7.707.293l8.172,8.172a5.005,5.005,0,0,1,0,7.07L7.707,23.707A1,1,0,0,1,7,24Z"></path></svg>
            </h4>
            <ul class="size-list">
              <li class="size active" data-size="29">29</li>
              <li class="size" data-size="30">29</li>
              <li class="size" data-size="31">29</li>
              <li class="size" data-size="32">29</li>
              <li class="size" data-size="33">29</li>
              <li class="size" data-size="34">29</li>
              <li class="size" data-size="35">29</li>
              <li class="size" data-size="36">29</li>
            </ul>
          </li>
          <li>
            <h4>Mức giá
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7,24a1,1,0,0,1-.707-1.707l8.172-8.172a3,3,0,0,0,0-4.242L6.293,1.707A1,1,0,0,1,7.707.293l8.172,8.172a5.005,5.005,0,0,1,0,7.07L7.707,23.707A1,1,0,0,1,7,24Z"></path></svg>
            </h4>
            <p>
              <input type="text" id="amount" class="custom-amount"  readonly>
            </p>            
            <div id="slider-range" class="custom-range"></div>
          </li>
          <li>
            <h4>Sắp xếp
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7,24a1,1,0,0,1-.707-1.707l8.172-8.172a3,3,0,0,0,0-4.242L6.293,1.707A1,1,0,0,1,7.707.293l8.172,8.172a5.005,5.005,0,0,1,0,7.07L7.707,23.707A1,1,0,0,1,7,24Z"></path></svg>
            </h4>
            <ul>
              <li class="sub-item active" data-sort="desc">Giá giảm dần</li>
              <li class="sub-item" data-sort="asc">Giá tăng dần</li>
            </ul>
          </li>
        </ul>
        <div class="filter__action">
          <button data-toggle="filter">Đóng</button>
        </div>
      </div>
    </div>
    <div class="categories__products"> 
        <?php foreach ($products as $product) : ?> 
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
</div>