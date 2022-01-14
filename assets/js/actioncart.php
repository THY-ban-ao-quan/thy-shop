<script>
    function updateSoLuong(idKH, idSM, soLuong, dongia){
        var sl=document.getElementById(idKH+"."+idSM);
        var dg=document.getElementById("dongia"+idKH+"."+idSM);
        var st=document.getElementById("sotien"+idKH+"."+idSM);
        var ch=document.getElementById("check"+idKH+"."+idSM);
        var tt=document.getElementById("thanhtien");

        var sluong = Number(sl.value) + soLuong;
        if(sluong <= 0){
            xoaSP(idKH, idSM);
            return;
        }
        sl.value = sluong;
        var sotiencu = Number(st.getAttribute('value'));
        var sotienmoi = dongia * Number(sl.value);
        st.textContent = numeral(sotienmoi).format("0,0") + ' ₫';;
        st.setAttribute('value', sotienmoi);
        if(ch.checked){
            var thanhtien = Number(tt.getAttribute('value'));
            thanhtien = thanhtien - sotiencu + sotienmoi;
            
            tt.innerHTML = numeral(thanhtien).format("0,0") + ' ₫';
            tt.setAttribute('value', thanhtien);
        }

        xml=new XMLHttpRequest();
        url="update.php?idkh="+idKH+"&idsm="+idSM+"&soluong="+soLuong;
        xml.open("GET", url, "false");
        xml.send();
    }
    function chontatca(){
        ctc=document.getElementById('checktatca');
        ssp = document.getElementById('sosanpham');
        var tt=document.getElementById("thanhtien");
        var thanhtien = 0;
        var sosanpham = 0;
        xml=new XMLHttpRequest();
        if (ctc.checked){
            // Lấy danh sách checkbox
            var checkboxes = document.getElementsByName('chon[]');

            // Lặp và thiết lập checked
            for (var i = 0; i < checkboxes.length; i++){
                checkboxes[i].checked = true;
                var idsotien = checkboxes[i].id.replace('check', '');
                
                var st=document.getElementById("sotien"+idsotien);
                thanhtien = thanhtien + Number(st.getAttribute('value'));
                sosanpham++;
            }
            url="chontatca.php?chon=1";
        }
        else{
            // Lấy danh sách checkbox
            var checkboxes = document.getElementsByName('chon[]');

            // Lặp và thiết lập checked
            for (var i = 0; i < checkboxes.length; i++){
                checkboxes[i].checked = false;
            }
            url="chontatca.php?chon=0";
        }
        ssp.innerHTML = "Tổng thanh toán (" + sosanpham +" Sản phẩm):";
        ssp.setAttribute('value', sosanpham);
        tt.innerHTML = numeral(thanhtien).format("0,0") + ' ₫';
        tt.setAttribute('value', thanhtien);
        xml.open("GET", url, "false");
        xml.send();
    }
    function chonSP(id){
        var ch=document.getElementById("check"+id);
        var st=document.getElementById("sotien"+id);
        var ssp=document.getElementById('sosanpham');
        var tt=document.getElementById("thanhtien");

        var ma = String(id).split('.');
        idKH = ma[0];
        idSM = ma[1];

        var sotien = Number(st.getAttribute('value'));
        var thanhtien = Number(tt.getAttribute('value'));
        var sosanpham = Number(ssp.getAttribute('value'));
        xml=new XMLHttpRequest();
        if(ch.checked){
            thanhtien = thanhtien + sotien;
            sosanpham++;
            url="chonsp.php?idkh="+idKH+"&idsm="+idSM+"&chon=1";
        }
        else{
            thanhtien = thanhtien - sotien;
            sosanpham--;
            url="chonsp.php?idkh="+idKH+"&idsm="+idSM+"&chon=0";
        }
        xml.open("GET", url, "false");
        xml.send();

        ssp.setAttribute('value', sosanpham);
        tt.setAttribute('value', thanhtien);
        ssp.innerHTML = "Tổng thanh toán (" + sosanpham +" Sản phẩm):";
        tt.innerHTML = numeral(thanhtien).format("0,0")  + ' ₫';
        ctc=document.getElementById("checktatca");
        ctc.checked = false;
    }
    function xoaMot(idKH, idSM){
        var bang=document.getElementById("cart_table");
        var ngang=document.getElementById("ngang"+idKH+"."+idSM);
        var dong=document.getElementById("dong"+idKH+"."+idSM);
        var st=document.getElementById("sotien"+idKH+"."+idSM);
        var ssp=document.getElementById('sosanpham');
        var tt=document.getElementById("thanhtien");
        var ch=document.getElementById("check"+idKH+"."+idSM);

        if(ch.checked){
            var sotien = Number(st.getAttribute('value'));
            var thanhtien = Number(tt.getAttribute('value'));
            var sosanpham = Number(ssp.getAttribute('value'));
            thanhtien = Number(thanhtien) - Number(sotien);
            sosanpham--;
            ssp.setAttribute('value', sosanpham);
            ssp.innerHTML = "Tổng thanh toán (" + sosanpham +" Sản phẩm):";
            tt.innerHTML = numeral(thanhtien).format("0,0") + ' ₫';
            tt.setAttribute('value', thanhtien);
        }
        
        xml=new XMLHttpRequest();
        url="delete.php?idkh="+idKH+"&idsm="+idSM;
        xml.open("GET", url, "false");
        xml.send();
        bang.removeChild(ngang);
        bang.removeChild(dong);
    }
    function xoaSP(idKH, idSM){
        var result = confirm("Bạn có muốn xóa sản phẩm này ra khỏi giỏ hàng?");
        if (result == true) {
            xoaMot(idKH, idSM);
        }
    }
    function xoaNhieu(){
        var result = confirm("Bạn có muốn xóa các sản phẩm ra khỏi giỏ hàng này?");
        if (result == true) {
            var checkboxes = document.getElementsByName('chon[]');
            alert(checkboxes.length);
            for (var i = checkboxes.length - 1; i >= 0; i--){
                if(checkboxes[i].checked == true){
                    var id = checkboxes[i].id.replace('check', '');
                    var ma = id.split(".");
                    idKH = ma[0];
                    idSM = ma[1]; 
                    xoaMot(idKH, idSM);
                }
            }
            ctc=document.getElementById("checktatca");
            ctc.checked = false;
        }
        
    }
    function muahang(){;
        var ssp=document.getElementById('sosanpham');
        var sosanpham = Number(ssp.getAttribute('value'));
        if(sosanpham <= 0){
            alert("Bạn chưa chọn sản phẩm nào!")
        }
        else{
            window.location="../payment/payment.php";
        }
    }
</script>