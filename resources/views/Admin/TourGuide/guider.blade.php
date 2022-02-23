<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hướng dẫn viên</title>
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
            <th>Gender</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Status</th>
            <th>Custom</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $r)
        <tr>
            <td>{{$r['id']}}</td>
            <td>{{$r['tenhdv']}}</td>
            <td>{{$r['phai'] == 1 ? "Nam" : "Nữ"}}</td>
            <td>{{$r['diachi']}}</td>
            <td>{{$r['sdt']}}</td>
            <td>{{$r['anhien'] == 1 ? "Hiện" : "Ẩn"}}</td>
            <td>
                <a href="/guider/delete/{{$r['id']}}" onclick="return confirm('Xóa hả??')">Xóa</a>
             /
                <a href="/guider/edit/{{$r['id']}}">Sửa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    <a href="/guider/add" class="btn">Add</a>
</body>
</html>
