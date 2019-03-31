
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
$("div.alert").delay(3000).slideUp();

function xacnhanxoa (msg) {
	if (window.confirm(msg)) {
		return true;
	}
	return false;
}
$(document).ready(function() {
	$("#addimagedetail").click(function(){
		$("#insert").append('<div class="form-group"><input type="file" name="feditimage[]"></div>');
	});
});

$(document).ready(function() {
	$("a#del_img_demo").on('click',function(){
		var url="http://localhost:8080/www/du-an/admin/product/delimg/";
		var _token=$("form[name='frmeditproduct']").find("input[name='_token']").val();
		var idhinh=$(this).parent().find("img").attr("idhinh");
		var img=$(this).parent().find("img").attr("src");
		var rid=$(this).parent().find("img").attr("id");
		$.ajax({
			url: url + idhinh,
			type: 'GET',
			cache:false,
			data: {"_token":_token,"idhinh":idhinh,"urlhinh":img},
			success: function(data){
				if (data=="oke") {
					$("#"+rid).remove();
				}
				else{
					alert("lỗi ajax...!");
				}
			}
		});	
	});
});

