<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh mục</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        tr>td>img {
            width: 300px;
            height: 200px;
            object-fit: auto;
        }

        tr>td,
        tr>th {
            padding: 10px 20px;
            text-align: center;
        }

        .btn {
            display: block;
            text-decoration: none;
            padding: 8px 12px;
            font-weight: bold;
            background-color: grey;
            color: #fff;
            margin-top: 16px;
            text-align: center;
            border-radius: 15px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Images</th>
            <th>Hide/Show</th>
            <th>Custom</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $v)
        <tr>    
            <td>{{$v['id']}}</td>
            <td>{{$v['cate_name']}}</td>
            <td><img src="{{$v['cate_image']}}"/></td>
            <td>{{$v['cate_hideshow'] === 1 ? "Hiện" : "Ẩn"}}</td>
            <td>
                <a href="/categories/delete/{{$v['id']}}" onclick="return confirm('Xóa hả?')">Xóa</a>
             / 
                <a href="/categories/edit/{{$v['id']}}">Sửa</a>
            </td>
        </tr>
        @endforeach
        
    </tbody>
    </table>
    <a href="/categories/add" class="btn">Add</a>
</body>
</html>
