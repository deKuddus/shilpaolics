CKEDITOR.replace('privacy');  

function view_privacy(id) {
	if(!isNaN(id)){
		$.ajax({
			url:base_url+'privacy/view_privacy',
			method:"post",
			data:{id:id},
			success:function (response) {
				$('#append_privacy').html(response);
				$('#privacy_view').modal('show');
			}
		});
	}
}

function change_privacy_status(id,selector) {
	if(!isNaN(id)){
		$.ajax({
			url:base_url+'privacy/change_privacy_status',
			method:"post",
			data:{id:id},
			success:function (response) {
				toastr.success('status changed');
			}
		});
	}
}