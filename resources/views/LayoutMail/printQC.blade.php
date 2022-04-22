
{{-- {{dd($gia)}} --}}
{{-- {{count($gia[0])}} --}}
{{-- {{count($gia)}} --}}
{{-- {{print_r($loca)}} --}}



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

  <title>Document</title>
</head>
<body>
  <script type="text/javascript">   
  $(document).ready(function () {
    PrintDiv();
  }); 
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>



<div id="divToPrint" style="display:block;">
 <style>
   @import url('https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@800&display=swap');
   @import url('https://fonts.googleapis.com/css2?family=Merriweather+Sans&display=swap');
   body{
    -webkit-print-color-adjust: exact; 
   }
   .header{
     height: 500px;
     width: 100%;
     background-color:#2E7FC1;
     position: relative;
     border-bottom-left-radius:250px ;
     border-bottom-right-radius:250px ;
   }
   .logo{
     position: absolute;
     top: 0;
     width: 150px;
     height: 150px;
     background-color: white;
     border-bottom-left-radius:100px ;
     border-bottom-right-radius:100px ;
     left: calc(50% - 75px);
    padding: 10px;
   }
   .logo img{
       width: 59% !important;
       height: 73% !important;

   }
   .img{
     background-color: white;
     width: 100%;
     height: 550px;
     border-bottom-left-radius:400px ;
     border-bottom-right-radius:400px ;
     overflow: hidden;
     border-bottom: 50px solid transparent;
   }
   img{
     width: 100%;
    height: 100%;
    object-fit: cover;
    }
    .tenchuyen{
      position: absolute;
      top: 100px;
      left: 70px;
      font-family: 'Merriweather Sans', sans-serif;
      font-size: 55px;
      font-weight: bold;
      color: white;
      line-height: 0;
    }
    .tenchuyen p{
      line-height: 130px;

    }
    .tenchuyen span{
      font-size: 70px;
    }
    .tenchuyen i{
      line-height: 120px;
      font-size: 20px;
    }
    .body{
      width: 100%;
    }
    .td{
      font-family: 'Sansita Swashed', cursive;
      color: #2E7FC1;
      font-size: 35px;
      margin-top: 20px;
      margin-bottom: 20px;
    }
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
    .nd{
      font-size: 20px;
      text-align: justify;
      font-family: 'Roboto', sans-serif;
      line-height: 1.8;

    }
    .nd::first-letter {
      font-size: 30px;
      color: #2E7FC1;

    }
    .tablechuyen{
      width: 80% !important;
      margin: 0 auto;
    }
    .tablechuyen {
      font-size: 18px;
    }
    .footer{
      position: relative;
      width: 100%;
      height: 300px;
      background-image: url(../../images/wave.png);
      background-size: 100% 100%;
    background-repeat: no-repeat;
}
.ttlhb{
  position: absolute;
  bottom: 10px;
  left: 250px;
  color: white;
}
.ttlhb p{
  font-size: 20px;
  font-weight: bold;
}
.ttlhb2{
  position: absolute;
  bottom: 10px;
  right: 10px;
  color: white;
  text-align: right
}
.ttlhb2 p{
  font-size: 20px;
  font-weight: bold;
}
 </style>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 <div class="header">
    <div class="logo">
        <div style="    width: 100%;
    height: 100%;
    justify-content: center;
    align-items: center;
    display: flex;">
    <img src="../../images/icon.png" alt="">
    </div>
    </div>
    <div class="img">
      <img src={{explode(",",$loca[0]->image)[0]}} alt="">
    </div>
    <div class="tenchuyen">
        <p>{{$loca[0]->diemdi}}</p>
        <span>{{$loca[0]->diemden}}</span><br>
        <i>{{$loca[0]->time}}</i>
    </div>
  </div>
  <div class="body">
    <div class="td">Các ngày có chuyến </div>
    <table class="table tablechuyen">
      <thead>
        <tr>
          <th scope="col">Ngày</th>
          <th scope="col">Loại vé</th>
          <th scope="col">Giá vé</th>
        </tr>
      </thead>
      <tbody>
        @for ($i = 0; $i < count($gia); $i+=2)
        <tr>
          <th scope="row" rowspan="2">{{\Carbon\Carbon::parse($gia[$i]->ngaykhoihanh)->format('d/m/Y')}} - {{$gia[$i]->giokhoihanh}}</th>
          <td >Người lớn</td>
          <td>{{number_format($gia[$i]->giave)}} VND</td>
        </tr>
        <tr>
          <td >Trẻ em</td>
          <td>{{number_format($gia[$i+1]->giave)}} VND</td>
        </tr>
        @endfor
       
      </tbody>
    </table>
    <div class="td">Giới thiệu {{$loca[0]->diemden}}</div>
    <div class="nd">{{$loca[0]->mota}}</div>
    <div class="td">Lịch trình di chuyển </div>
    <div class="nd">{{$loca[0]->lichtrinh}}</div>
    <div class="td">VIETTRAVEL </div>
    <div class="nd">
        Trải qua 26 năm phát triển bền vững, Vietravel Holdings đã ghi dấu ấn của mình với thông điệp “Nâng tầm giá trị cuộc sống”. Những giá trị mà chúng tôi luôn nỗ lực hướng đến đó là: Giá trị mới mẻ, giá trị lòng tin và giá trị vượt trội.
        <br><br>
        <div class="nd">
        Trong định hướng phát triển kinh doanh đến năm 2030, Vietravel Holdings tập trung xây dựng hệ sinh thái đa dạng với 3 lĩnh vực lớn: lữ hành; vận tải - hàng không; thương mại - dịch vụ. Và từng bước trở thành tập đoàn đầu tư kinh doanh đa ngành đủ sức, đủ tầm để bước vào sân chơi khu vực. Ở bất cứ lĩnh vực nào, tập đoàn cũng chứng tỏ vai trò tiên phong, dẫn dắt sự thay đổi xu hướng người tiêu dùng.
        </div>
        <br>
        <div class="nd">
        Tầm nhìn <br>
        Đưa Vietravel trở thành một giá trị cốt lõi trong cuộc sống của người dân Việt Nam.<br>
        </div>
        <br>

        <div class="nd">
        Sứ mệnh<br>
        Người tiên phong<br>
        </div>
        <br>

        <div class="nd">

        Giá trị cốt lõi<br>
        Tính chuyên nghiệp<br>
        Cảm xúc thăng hoa<br>
        Gia tăng giá trị<br>
        </div>

    </div>

  </div>
  <div class="footer">
      <!-- <svg id="wave" style="position: absolute;top: 0;left:0;height: 100%;width: 100%;" viewBox="0 0 1440 490" version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(46, 127, 193, 1)" offset="0%"></stop><stop stop-color="rgba(32, 57, 77, 1)" offset="100%"></stop></linearGradient></defs><path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)" d="M0,98L34.3,106.2C68.6,114,137,131,206,171.5C274.3,212,343,278,411,294C480,310,549,278,617,277.7C685.7,278,754,310,823,302.2C891.4,294,960,245,1029,187.8C1097.1,131,1166,65,1234,81.7C1302.9,98,1371,196,1440,236.8C1508.6,278,1577,261,1646,277.7C1714.3,294,1783,343,1851,343C1920,343,1989,294,2057,277.7C2125.7,261,2194,278,2263,310.3C2331.4,343,2400,392,2469,343C2537.1,294,2606,147,2674,98C2742.9,49,2811,98,2880,147C2948.6,196,3017,245,3086,294C3154.3,343,3223,392,3291,392C3360,392,3429,343,3497,302.2C3565.7,261,3634,229,3703,187.8C3771.4,147,3840,98,3909,106.2C3977.1,114,4046,180,4114,220.5C4182.9,261,4251,278,4320,253.2C4388.6,229,4457,163,4526,138.8C4594.3,114,4663,131,4731,147C4800,163,4869,180,4903,187.8L4937.1,196L4937.1,490L4902.9,490C4868.6,490,4800,490,4731,490C4662.9,490,4594,490,4526,490C4457.1,490,4389,490,4320,490C4251.4,490,4183,490,4114,490C4045.7,490,3977,490,3909,490C3840,490,3771,490,3703,490C3634.3,490,3566,490,3497,490C3428.6,490,3360,490,3291,490C3222.9,490,3154,490,3086,490C3017.1,490,2949,490,2880,490C2811.4,490,2743,490,2674,490C2605.7,490,2537,490,2469,490C2400,490,2331,490,2263,490C2194.3,490,2126,490,2057,490C1988.6,490,1920,490,1851,490C1782.9,490,1714,490,1646,490C1577.1,490,1509,490,1440,490C1371.4,490,1303,490,1234,490C1165.7,490,1097,490,1029,490C960,490,891,490,823,490C754.3,490,686,490,617,490C548.6,490,480,490,411,490C342.9,490,274,490,206,490C137.1,490,69,490,34,490L0,490Z"></path><defs><linearGradient id="sw-gradient-1" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(46, 127, 193, 1)" offset="0%"></stop><stop stop-color="rgba(32, 57, 77, 1)" offset="100%"></stop></linearGradient></defs><path style="transform:translate(0, 50px); opacity:0.9" fill="url(#sw-gradient-1)" d="M0,392L34.3,351.2C68.6,310,137,229,206,220.5C274.3,212,343,278,411,310.3C480,343,549,343,617,318.5C685.7,294,754,245,823,196C891.4,147,960,98,1029,130.7C1097.1,163,1166,278,1234,310.3C1302.9,343,1371,294,1440,253.2C1508.6,212,1577,180,1646,212.3C1714.3,245,1783,343,1851,367.5C1920,392,1989,343,2057,343C2125.7,343,2194,392,2263,367.5C2331.4,343,2400,245,2469,245C2537.1,245,2606,343,2674,392C2742.9,441,2811,441,2880,392C2948.6,343,3017,245,3086,204.2C3154.3,163,3223,180,3291,212.3C3360,245,3429,294,3497,302.2C3565.7,310,3634,278,3703,228.7C3771.4,180,3840,114,3909,73.5C3977.1,33,4046,16,4114,65.3C4182.9,114,4251,229,4320,245C4388.6,261,4457,180,4526,163.3C4594.3,147,4663,196,4731,212.3C4800,229,4869,212,4903,204.2L4937.1,196L4937.1,490L4902.9,490C4868.6,490,4800,490,4731,490C4662.9,490,4594,490,4526,490C4457.1,490,4389,490,4320,490C4251.4,490,4183,490,4114,490C4045.7,490,3977,490,3909,490C3840,490,3771,490,3703,490C3634.3,490,3566,490,3497,490C3428.6,490,3360,490,3291,490C3222.9,490,3154,490,3086,490C3017.1,490,2949,490,2880,490C2811.4,490,2743,490,2674,490C2605.7,490,2537,490,2469,490C2400,490,2331,490,2263,490C2194.3,490,2126,490,2057,490C1988.6,490,1920,490,1851,490C1782.9,490,1714,490,1646,490C1577.1,490,1509,490,1440,490C1371.4,490,1303,490,1234,490C1165.7,490,1097,490,1029,490C960,490,891,490,823,490C754.3,490,686,490,617,490C548.6,490,480,490,411,490C342.9,490,274,490,206,490C137.1,490,69,490,34,490L0,490Z"></path></svg> -->
      <div style="width: 100px;height: 100px;position: absolute;bottom: 50px;left: 30px;">
        <img src="../../images/qrcode.png" alt="">
      </div>
      <div class="ttlhb">
        <p>Thông tin liên hệ :</p>
        <span><i class="bi bi-google mr-2"></i>Admin@viettravel.com</span><br>
        <span><i class="bi bi-headset mr-2"></i>0326520534 - 0775050421</span>
      </div>
      <div class="ttlhb2">
        <p>Cơ sở :</p>
        <span><strong>CS1 </strong> : 68 Hai Bà Trưng, Quận Sài Gòn, ĐÀ LẠT</span><br>
        <span><strong>CS2 </strong> : 86 Huyền Trần Hoàng Tử, Quận Ninh Bình, BÀ RỊA VŨNG TÀU</span>
      </div>
    </div>
</div>
<div>
</div>
</body>
</html>