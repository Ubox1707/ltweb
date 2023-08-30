// Hàm đổi giá
function doigia(){
    var arrGia = document.getElementsByName("gia");
    var obj = document.getElementById("muc");
    luachon = obj.value;
    for(i=0; i<arrGia.length; i++)
    {
        gia = parseFloat(arrGia[i].innerText);
        if (gia<luachon || luachon==-1)
        {
            arrGia[i].parentNode.style.display=""
        }
        else{
            arrGia[i].parentNode.style.display="none";
        }
    }
    tongthanhtien();
}
// Hàm đảo trạng thái
function click1box(i){
    var arrAm = document.getElementsByName("soluong");
    arrAm[i].disabled = !arrAm[i].disabled;

    if (arrAm[i].disabled==true){
        arrAm[i].value = 0;
        arrAm[i].parentNode.nextElementSibling.innerText="";
    }
    tongthanhtien();
}

// Hàm thành tiền
function thanhtien(obj){
    var amount = obj.value;
    var price = obj.parentNode.previousElementSibling.innerText;
    obj.parentNode.nextElementSibling.innerText = amount*price;
    tongthanhtien();
}

// Hàm tổng thành tiền
function tongthanhtien(){
    t = 0;
    var arrTongTien = document.getElementsByName("thanhtien");
    for(i=0; i<arrTongTien.length; i++){
        if (arrTongTien[i].parentNode.style.display==""){
            tien = arrTongTien[i].innerText;
            t+=Number(tien);
        }
    }
    document.getElementById("tinhtongtien").innerText=t;
}

// Đồng hồ
function startstopDH(){
    if (dh==null) dh = setInterval("tg()", 1000);
    else{
        clearInterval(dh);
        dh = null;
    }
}

var dh = null;
function tg(){
    var now = new Date();
    var h = now.getHours();
    var m = now.getMinutes();
    var s = now.getSeconds();
    document.getElementById("dongho").innerHTML=h + ":" + m + ":" + s;
}
dh = setInterval("tg()", 1000);



    