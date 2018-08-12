$(document).ready(function(){

  			var edit_id;
			var $edit_username;
  			$(document).on('click', '#edit',function(){
  				edit_id = $(this).data('id');
				$edit_username = $(this).parent();

  				$('.formfield').show();
  				$('.container').hide();

  				var firstname = $('.disp_firstname').text();
  				var lastname = $('.disp_lastname').text();
  				var phone = $('.disp_phone').text();
  				var username = $('.disp_username').text();
  				var address = $('.disp_address').text();
  				var password = $('.disp_password').text();

  				$('.firstname').val(firstname);
  				$('.lastname').val(lastname);
  				$('.phone').val(phone);
  				$('.username').val(username);
  				$('.address').val(address);
  				$('.password').val(password);
  			});

  			$(document).on('click', '#cancel',function(){
  				$('.formfield').hide();
  				$('.container').show();
  			});

  			$(document).on('click', '#update',function(){
  				var firstname = $(".firstname").val();
  				var lastname = $(".lastname").val();
  				var phone = $(".phone").val();
  				var username = $(".username").val();
  				var address = $(".address").val();
  				var password = $(".password").val();

		
					$.ajax({

						url : "employeeserver.php",
						type : "POST",
						data : {
							'update' : 1,
							'id' : edit_id,
							'firstname' : firstname,
							'lastname' : lastname,
							'phone' : phone,
							'username' : username,
							'address' : address,
							'password' : password,
							
						},
						success:function(data){
              $('.container').html(data);
              $('.container').show();
							$('.formfield').hide();
  						
						}
					});
				
        
        


  				
  			});
  		});