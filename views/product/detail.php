<?php if($info == NULL) {
    require_once(__ROOT__.'\views\err_404.php');
} else {?>

<div class="detail-layout">
    <div class="gallery">
        <?php foreach ($images as $image) : ?> 
            <div
            class="gallery__picture"
            style="
                background-image: url(./assets/img/products/<?php echo $image['linkAnh'] ?>);
            "
            ></div>
        <?php endforeach; ?>
    </div>
    <div class="description">
        <h2>Mô tả</h2>
        <?php echo $info['moTa']?>
    </div>
    <div class="variation">
        <div class="variation__body">
            <div class="info">
                <h1 class="name"><?php echo $info['tenSP']?></h1>
                <h2 class="price"><?php echo number_format($info['donGia'], 0, ',', ',')?> ₫</h2>
            </div>
            <div class="color">
                <p>Chọn màu : <strong class="color__name"><?php echo $colors[0]['mau']?></strong></p>
                <ul>
                    <?php foreach ($colors as $color) : ?> 
                    <li>
                        <button 
                            class="color__variation <?php echo $color == $colors[0] ? "active" : "" ?>"
                            data-idsp="<?php echo $color['idSP'] ?>"                        
                            data-mau="<?php echo $color['mau']?>"                        
                            style="background-image:url(./assets/img/products/<?php echo $color['linkAnh'] ?>)">
                        </button>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="size">
                <p>Chọn size</p>
                <ul>
                    <?php 
                        $i = 0;
                        foreach ($sizes as $size) : 
                            if($size['soLuong'] == 0) $i++;                        
                            $active = $size == $sizes[$i] ? "active" : "";
                            $disable = $size['soLuong'] == 0 ? "disabled" : "";
                    ?> 
                    <li>
                        <button 
                            class="size__variation <?php echo $active, $disable  ?>" 
                            data-idsm="<?php echo $size['idSM'] ?>" 
                            <?php echo $disable ?>
                            ><?php echo $size['size']?>
                        </button>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <button class="add-cart">Thêm vào giỏ hàng</button>
        </div>
    </div>
</div>
<?php } ?>