<?php
$guiders = DB::table("huongdanvien")->select("*")->where("id", "=",$idGuider)->get();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa hướng dẫn viên</title>
    <style>
        form {
            line-height: 250%;
        }

        input {
            padding: 8px 12px;
        }
    </style>
</head>
<body>
<form action="/guider/edit/{{$idGuider}}" method="post">
    @csrf()
        <input type="text" name="guiderName" placeholder="Tên hướng dẫn viên..." value="{{$guiders[0]->tenhdv}}"/>
        <div>
            <label for="men">Nam</label>
            <input type="radio" id="men" name="guiderGender" value="1">
            <label for="girl">Nữ</label>
            <input type="radio" id="girl" name="guiderGender" value="0">
        </div>
        <input type="text" name="guiderAddress" placeholder="Địa chỉ thường trú/tạm trú..." value="{{$guiders[0]->diachi}}"> <br/>
        <input type="number" name="guiderPhone" placeholder="Số điện thoại hướng dẫn viên..." value="{{$guiders[0]->sdt}}">
        <div>
            <label for="hide">Ẩn</label>
            <input type="radio" id="hide" name="guiderStatus" value="0">
            <label for="show">Hiện</label>
            <input type="radio" id="show" name="guiderStatus" value="1">
        </div>
        <input type="submit" value="Insert">
    </form>
</body>
</html>
