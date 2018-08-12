$(document).ready(function(){



	//DELETE
	$(document).on('click', '.del_btn',function(){
		var id = $(this).data('id');
		var $clicked_btn = $(this);

		$.ajax({

			url : "showemployee.php",
			type : "GET",
			data : {
				'delete' : 1,
				'id' : id
			},
			success:function(response){
				$clicked_btn.parent().remove();
			}
		});
	});

	//BACK
	$(document).on('click','#back',function(){
		$('#submit').show();
		$('#update').hide();
		$('#back').hide();

		$('#firstname').val('');
		$('#lastname').val('');
	});

	//READ
	var edit_id;
	var $edit_comment;
	$(document).on('click','.edit_btn',function(){
		edit_id = $(this).data('id');
		$edit_name = $(this).parent();

		var firstname = $(this).siblings('.disp_firstname').text();
		var lastname = $(this).siblings('.disp_lastname').text();

		$('#firstname').val(firstname);
		$('#lastname').val(lastname);

		$('#submit').hide();
		$('#update').show();
		$('#back').show();
	});

	
});