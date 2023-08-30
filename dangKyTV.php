<?php
if (isset($_POST['btndangky']) && $_POST['btndangky'] === 'nut') {
    $mssv = $_POST['mssv'];
    $email = $_POST['email'];

    // Kết nối vào cơ sở dữ liệu
    $conn = new PDO("mysql:host=localhost;dbname=users;charset=utf8", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Kiểm tra sự tồn tại của MSSV hoặc email
    $sql_check = "SELECT COUNT(*) FROM users WHERE mssv = ? OR email = ?";
    $st_check = $conn->prepare($sql_check);
    $st_check->execute([$mssv, $email]);
    $count = $st_check->fetchColumn();
    if ($count > 0) {
        echo "MSSV hoặc Email đã tồn tại, vui lòng sử dụng Email và MSSV khác!!!";
    } else {
        // Chèn dữ liệu 
        $hoten = $_POST['hoten'];
        $gioitinh = $_POST['gioitinh'];
        $sothich = $_POST['sothich'];
        $quoctich = $_POST['quoctich'];
        $ghichu = $_POST['ghichu'];

        $sql_insert = "INSERT INTO users (mssv, hoten, email, gioitinh, sothich, quoctich, ghichu) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $st_insert = $conn->prepare($sql_insert);
        $st_insert->execute([$mssv, $hoten, $email, $gioitinh, $sothich, $quoctich, $ghichu]);
        echo "Đăng ký thành công.";
    }
}
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký Thành Viên</title>
   
    <script src="js/dangKyTVM.js"></script>
</head>

<body>
    <div class="container">
        
        <form style="width: 600px" class="border border-primary border-1 rounded m-auto p-2" onsubmit="return validateForm()" id="form1" method="post">
            <h2 class="m-0 p-2 text-center">ĐĂNG KÝ THÀNH VIÊN</h2>
            <div class="mb-3">
                <label for="mssv" class="form-label">Mã sinh viên</label>
                <br>
                <input class="form-control" type="text" id="mssv" name="mssv" placeholder="Hãy điền MSSV của bạn" required>
            </div>
            <div class="mb-3">
                <label for="hoten" class="form-label">Họ tên</label>
                <br>
                <input class="form-control" type="text" id="hoten" name="hoten" placeholder="Hãy điền họ và tên của bạn" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <br>
                <input class="form-control" type="email" id="email" name="email" placeholder="Hãy nhập email của bạn. Ví dụ:caigido@gmail.com" required>
            </div>
            <div class="mb-3">
            <label class="form-label">Giới tính</label>
            <br>
            <fieldset id="fs1">
                <input type="radio" id="nam" name="gioitinh" class="form-check-input" value="Nam" required>
                <label for="nam" class="form-label">Nam</label>
                <input type="radio" id="nu" name="gioitinh" class="form-check-input" value="Nữ" required>
                <label for="nu" class="form-label">Nữ</label>
            </fieldset>
            </div>
            <div class="mb-3">
                <label for="sothich" class="form-label">Sở thích</label>
                <br>
                <fieldset id="fs2">
                <input type="checkbox" id="xemphim" name="sothich" value="Xem phim">
                    <label for="xemphim" class="form-label">Xem phim</label>
                    <input type="checkbox" id="thethao" name="sothich" value="Thể thao">
                    <label for="thethao" class="form-label">Thể thao</label>
                    <input type="checkbox" id="dulich" name="sothich" value="Du lịch">
                    <label for="dulich" class="form-label"> Du lịch</label>
                    <input type="checkbox" id="khac" name="sothich" value="Khác">
                    <label for="khac" class="form-label">Khác</label>
                </fieldset>
            </div>
            <div class="mb-3">
                <label for="quoctich" class="form-label">Quốc tịch </label>
                <br>
                <select class="form-select" aria-label="Default select example" id="quoctich" name="quoctich" required>
                    <option selected>Chọn quốc tịch của bạn</option>
                    <option value="Algeria">Algeria</option>
                    <option value="American">American</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Áo">Áo</option>
                    <option value="Bỉ">Bỉ</option>
                    <option value="Brazil">Brazil</option>
                    <option value="Cambodia">Cambodia</option>
                    <option value="Cuba">Cuba</option>
                    <option value="Việt Nam">Việt Nam</option>
                    <option value="Nhật Bản">Nhật Bản</option>
                    <option value="Hàn Quốc">Hàn Quốc</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="ghichu" class="form-label">Ghi chú</label>
                <br>
                <textarea id="ghichu" name="ghichu" maxlength="200" placeholder="Nhập không quá 200 ký tự" cols="75" rows="5"></textarea>
                <br>
            </div>
            <div class="mb-3">
                <button type="submit" onclick="validateForm()" name="btndangky" value="nut" class=" btn btn-primary"><b>Đăng ký</b></button>
            </div>
            <div class="mb-3"></div>
        </form>
    </div>
</body>
</html>