$(document).ready(function(){

  			var edit_id;
        var currentemail;
  			$(document).on('click', '#edit',function() {

  				edit_id = $(this).data('id');

  				$('.formfield').show();
  				$('.container').hide();

  				var firstname = $('.disp_firstname').text();
  				var lastname = $('.disp_lastname').text();
  				var phone = $('.disp_phone').text();
  				var email = $('.disp_email').text();
  				var address = $('.disp_address').text();
  				var password = $('.disp_password').text();

          currentemail = email;

  				$('.firstname').val(firstname);
  				$('.lastname').val(lastname);
  				$('.phone').val(phone);
  				$('.email').val(email);
  				$('.address').val(address);
  				$('.password').val(password);

  			});

  			$(document).on('click', '#cancel',function() {

  				$('.formfield').hide();
  				$('.container').show();

  			});

        $(document).on('click', '#logout',function() {

          window.location = 'index.php';

        });

  			$(document).on('click', '#update',function() {

  				var firstname = $(".firstname").val();
  				var lastname = $(".lastname").val();
  				var phone = $(".phone").val();
  				var email = $(".email").val();
          var cemail = $(".cemail").val();
  				var address = $(".address").val();
  				var password = $(".password").val();
  				var cpassword = $(".cpassword").val();

          $.post("emailcheck.php", { email: $(".email").val(), id: edit_id }, function(data){
            if(data == '0'){

                    //  var checkemail = "<?= $user['email']; ?>";
                if( (cemail === email) && (cemail != '') ) {
              //  if( checkemail !== email ) {
                  if(password == cpassword) {
                    $.ajax({

                      url : "employeeserver.php",
                      type : "POST",
                      data : {
                        'update' : 1,
                        'id' : edit_id,
                        'firstname' : firstname,
                        'lastname' : lastname,
                        'phone' : phone,
                        'email' : email,
                        'address' : address,
                        'password' : password,
                        'cpassword' : cpassword
                      },
                      success:function(data){
                        $('.container').html(data);
                        $('.container').show();
                        $('.formfield').hide();
                      }
                    });
                  }
                  else
                  {
                    alert("Passwords do not match.");
                  }
              //  }
              //  else
              //  {
              //    alert("Email already exists.");
              //  }
              }
              else
              {
                alert("Confirm email address.");
              }

        


            }
            else if(data == '1'){
              alert("Email already exists.");
            }
          });

        });

});