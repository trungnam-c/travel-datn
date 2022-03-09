<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto);

@font-face {
    font-family: 'bariolregular';
    src: url('https://res.cloudinary.com/dw1zug8d6/raw/upload/v1541747126/fonts/bariol/bariol_regular-webfont.eot'),
        url('https://res.cloudinary.com/dw1zug8d6/raw/upload/v1541747224/fonts/bariol/bariol_regular-webfont.woff2') format('woff2'),
        url('https://res.cloudinary.com/dw1zug8d6/raw/upload/v1541747128/fonts/bariol/bariol_regular-webfont.woff') format('woff'),
        url('https://res.cloudinary.com/dw1zug8d6/raw/upload/v1541747127/fonts/bariol/bariol_regular-webfont.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;
}

.payment-success {
    width: 410px;
    box-shadow: 0 13px 45px 0 rgba(51, 59, 69, 0.1);
    margin: auto;
    border-radius: 10px;
    text-align: center;
    position: relative;
    font-family: 'Roboto', sans-serif;
}

.payment-success .header {
    position: relative;
    height: 7px;
}

.payment-success .body {
    padding: 0 50px;
    padding-bottom: 25px;
}

.payment-success .close {
    position: absolute;
    color: #0073ff;
    font-size: 20px;
    right: 15px;
    top: 11px;
    cursor: pointer;
}

.payment-success .title {
    font-family: 'bariolregular';
    font-size: 32px;
    color: #54617a;
    font-weight: normal;
    margin-bottom: 10px;
}

.payment-success .main-img {
    width: 243px;
}

.payment-success p {
    font-size: 13px;
    color: #607d8b;
}

.payment-success .btn {
    border: none;
    border-radius: 100px;
    width: 100%;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 20px 0;
    outline: none;
    cursor: pointer;
    position: relative;
}

.payment-success .btn.btn-primary {
    background: #0073ff;
    color: #fff;
}

.payment-success .cancel {
    text-decoration: none;
    font-size: 14px;
    color: #607d8b;
}
</style>

<body>
    <div class="payment-success">
        <div class="header">
            <i class="ion-close-round close"></i>
        </div>
        <div class="body">
            <h2 class="title">Thanh toán thành công !</h2>
            <img class="main-img" src="https://res.cloudinary.com/dw1zug8d6/image/upload/v1542777688/group-3_3x.png"
                alt="">
            <p>Thanh toán kết thúc bạn có thể tắt trình duyệt này ! Chúc bạn có chuyến đi vui vẻ</p>
        </div>
    </div>
</body>

</html>