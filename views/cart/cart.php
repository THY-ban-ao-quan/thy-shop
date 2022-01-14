<?php
    // session_start();
    // if(isset( $_SESSION['giohang'] ) == false)
    // {
    //     $_SESSION['giohang'] = array();
    //     $item = array('idKH' => 1, 'idSM' => 2);
    //     $_SESSION['giohang'][] = $item;
    // }
    require_once('../../controllers/CartController.php');
    $controller_obj = new CartController();
    $controller_obj->chon_tatca(0);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>cart</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../../assets/css/stylecart.css">
        <?php
            require_once("../../assets/js/actioncart.php");
        ?>
    </head>
    <body>
        <div id="main">
            <div class="cart-page-header-wrapper container-wrapper">
                <div class="container">
                    <div style="display: flex; align-items: center;">
                        <div class="cart-page-header">
                            <a class="cart-page-logo" href="../../">
                                <div class="cart-page-logo__page-name">THY   |  Giỏ hàng</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Nội dung -->
            <div class="container">
                <!-- Danh sách giỏ hàng -->
                <div role="main" class="_1nft6V" style="margin-bottom: 0px;">
                    <div class="_1nrPtQ">
                        <div class="_1zPSKE">
                            <label class="stardust-checkbox">
                                <!-- <input class="stardust-checkbox__input" type="checkbox">
                                <div class="stardust-checkbox__box">
                                    
                                </div>
                                <input class="stardust-checkbox__box" type="checkbox"> -->
                            </label>
                        </div>
                        <div class="_27GGo9">Sản phẩm</div>
                        <div class="_3hJbyz">Đơn giá</div>
                        <div class="_155Uu2">Số lượng</div>
                        <div class="_10ZkNr">Số tiền</div>
                        <div class="_1coJFb">Thao tác</div>
                    </div>
                    <div class="aCSbhb">
                        <div class="_2qN5oG" id="cart_table">
                            
                            <!-- &quot;https://...&quot; -->
                            <?php
                                require_once('../../controllers/CartController.php');
                                $controller_obj = new CartController();
                                // Dùng id người đăng nhập
                                $result = $controller_obj->list_cart(10);
                                while($row=mysqli_fetch_array($result)) { 
                                    $idKH = $row['idKH'];
                                    $idSM = $row['idSM'];
                                    $id = $idKH.'.'.$idSM;
                                    ?>
                                    <div class="_1-iN2J" id="<?php echo "ngang".$id;?>">

                                    </div>
                                    <div class="_216OLk"  id="<?php echo "dong".$id;?>">
                                        <div class="_1GcTXp">
                                            <div class="uUhc_B">
                                                <label class="stardust-checkbox">
                                                    <input class="stardust-checkbox__box" type="checkbox" name='chon[]' id="<?php echo "check".$id;?>" onchange="chonSP(<?php echo $id;?>);">
                                                </label>
                                            </div>
                                            <div class="_2pPbjQ">
                                                <div class="YxpsCR">
                                                    <a title="<?php echo $row['tenSP'];?>" href="#">
                                                        <div class="_3SWf-5" style="background-image: url('../../assets/img/products/<?php echo $row['linkAnh'];?>');"></div>
                                                        
                                                    </a>
                                                    <div class="_3OrWGt">
                                                        <a class="_2fQT1K" title="<?php echo $row['tenSP'];?>" href="#"><?php echo $row['tenSP'];?></a>
                                                        <div class="xN6cOD">
                                                            
                                                        </div>
                                                        <div class="_2o95Vf" ></div>
                                                        <div class="_931iK8"><span></span></div></div></div></div><div class="_30hIFE">
                                                            <div class="_3b-8ro"><div class="ns42ir" role="button" tabindex="0">
                                                                <div class="aXmvTj">Phân loại hàng:
                                                                    <!-- <button class="_2Ipt-j"></button> -->
                                                                </div>
                                                                <div class="GU_XoN"><?php echo $row['size'].", ".$row['mau']?></div>
                                                            </div>
                                                            <div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="Ra8lP2">
                                                        <div>
                                                            <span id="<?php echo "dongia".$id;?>" class="_1CXksa">₫<?php echo $row['donGia'];?></span>
                                                        </div>
                                                    </div>
                                                    <div class="_2ZUrV7">
                                                        <div class="eLoUcd shopee-input-quantity">
                                                            <button class="_2sBbZC" onclick="updateSoLuong(<?php echo $row['idKH'].', '.$row['idSM'].', -1, '.$row['donGia'];?>);">
                                                                <svg enable-background="new 0 0 10 10" viewBox="0 0 10 10" x="0" y="0" class="shopee-svg-icon ">
                                                                    <polygon points="4.5 4.5 3.5 4.5 0 4.5 0 5.5 3.5 5.5 4.5 5.5 10 5.5 10 4.5">

                                                                    </polygon>
                                                                </svg>
                                                            </button>
                                                            <input id="<?php echo $id;?>" class="_2sBbZC k-s4Da" type="text" role="spinbutton" aria-valuenow="<?php echo $row['soLuong'];?>" value="<?php echo $row['soLuong'];?>">
                                                            <button class="_2sBbZC" onclick="updateSoLuong(<?php echo $row['idKH'].', '.$row['idSM'].', 1, '.$row['donGia'];?>);">
                                                                <svg enable-background="new 0 0 10 10" viewBox="0 0 10 10" x="0" y="0" class="shopee-svg-icon icon-plus-sign">
                                                                    <polygon points="10 4.5 5.5 4.5 5.5 0 4.5 0 4.5 4.5 0 4.5 0 5.5 4.5 5.5 4.5 10 5.5 10 5.5 5.5 10 5.5"></polygon>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="dn3H7Y">
                                                        <span id="<?php echo "sotien".$id;?>">₫<?php echo $row['donGia']*$row['soLuong'];?></span>
                                                    </div>
                                                    <div class="_2y8iJi _2qPRqW">
                                                        <button class="RCd1Gx" id="<?php echo "xoa".$id;?>" onclick="xoaSP(<?php echo $row['idKH'].', '.$row['idSM'];?>);">Xóa</button>
                                                        <!-- <div class="_1-rOD0">
                                                            <button class="shopee-button-no-outline NJSFiA">
                                                                <span class="_16a080">Tìm sản phẩm tương tự</span>
                                                                <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon _27CqwY icon-down-arrow-filled">
                                                                    <path d="m6.5 12.9-6-7.9s-1.4-1.5.5-1.5h13s1.8 0 .6 1.5l-6 7.9c-.1 0-.9 1.3-2.1 0z">

                                                                    </path>
                                                                </svg>
                                                            </button>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                <?php ?>
                            <?php } ?>  
                            <div class="_1-iN2J"></div>
                            <!-- <div class="_216OLk"></div> -->
                        </div>
                    </div>
                </div>
                
                <!-- Tổng tiền -->
                <div class="_2jol0L _3GVi82">
                    <div class="_1ri0rT _2amAdj"></div>
                    <div class="W2HjBQ zzOmij">
                        <div class="_1E2dyV">
                            <label class="stardust-checkbox">
                                <input class="stardust-checkbox__box" type="checkbox" id="checktatca" onclick="chontatca();">
                            </label>
                        </div>
                        <button class="_28e55C clear-btn-style">Chọn tất cả</button>
                        <button class="clear-btn-style j9RJQY" onclick="xoaNhieu();">Xóa</button>
                        <!-- <div class="">
                            <button class="clear-btn-style j9RJQY">Bỏ sản phẩm không hoạt động</button>
                        </div> -->
                        
                        <div class="_2ntEgZ"></div>
                        <div class="_2BT_es">
                            <div class="_3BPMNN">
                                <div class="_2LMWss">
                                    <div class="_10A7e2" id="sosanpham" value="0">Tổng thanh toán (0 Sản phẩm):</div>
                                    <div class="nBHs8H" id="thanhtien" value="0">₫0</div>
                                </div>
                            </div>
                            <div class="_1TwgPm"></div>
                        </div>
                        <a class="shopee-button-solid shopee-button-solid--primary" onclick="muahang();">
                            Mua hàng
                        </a>
                    </div>
                </div>
                <!-- end tổng tiền -->
            </div>
        
        </div>
    </body>
</html>