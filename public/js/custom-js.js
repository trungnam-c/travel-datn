$(document).ready(()=>{

    $(".image-preview").on("click",".delete-js-btn",(function(){
        var btn = $(this);
        var id= $(btn).attr("id-data");
        var node = $(btn).parent().parent();
        var image = $("#images");
        var images = image.val().split(','); 
        images[id]="";
        var imgs = images.join(",");
        $(node).remove();
        image.val(imgs);
    }));
//   $(".start").click(()=>{
//     var html =  '<div class="col-md-2 mt-2" >'+
//     '<div class="img-div-pre">'+
//         '<div class="nano-div"></div>'+
//         '<div class="delete-js-btn" id-data="3" id="delete-js-btn"><i class="bi bi-trash3"></i></div>'+
//         '<img src="https://cdn.vntrip.vn/cam-nang/wp-content/uploads/2017/08/hoi-an-quang-nam-vntrip.jpg" width="100%" height="100%" alt="">'+
//     '</div>'+
// '</div> ';
// $(".image-preview").append(html);
//   });

});
