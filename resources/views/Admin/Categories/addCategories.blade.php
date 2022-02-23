<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm danh mục</title>
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
<form action="/categories/add" method="post">
    @csrf()
        <input type="text" name="cateName" placeholder="Nhập tên danh mục..." value=""/> <br/>
        <input type="file" name="cateImage">
        <div>
            <label for="hide">Hide</label>
            <input type="radio" id="hide" name="cateHideShow" value="0">
            <label for="show">Show</label>
            <input type="radio" id="show" name="cateHideShow" value="1">
        </div>
        <input type="submit" value="Accept"/>
    </form>
</body>
</html>