

function ckeditor (name) {
     var editor = CKEDITOR.replace(name ,{
          uicolor : '#9AB8F3',
          language :'vi',
filebrowserBrowseUrl : baseURL +'/public/admin/js/ckfinder/ckfinder.html',
 
filebrowserImageBrowseUrl : baseURL +'/public/admin/js/ckfinder/ckfinder.html?type=Images',
 
filebrowserFlashBrowseUrl : baseURL +'/public/admin/js/ckfinder/ckfinder.html?type=Flash',
 
filebrowserUploadUrl : baseURL +'/public/admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
 
filebrowserImageUploadUrl : baseURL +'/public/admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
 
filebrowserFlashUploadUrl : baseURL +'/public/admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',


     });
}