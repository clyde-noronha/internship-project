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

          window.location = 'employeelogin.php';

        });

        
        $(document).on('submit', '#updateform', function(e){
          e.preventDefault();
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
              if( (cemail === email) && (cemail != '') ) {
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

      var inp = document.getElementById('firstname');
      inp.oninvalid = function(event) {
        event.target.setCustomValidity('Must contain only alphabets. Ex. John');
      }
      inp = document.getElementById('lastname');
      inp.oninvalid = function(event) {
        event.target.setCustomValidity('Must contain only alphabets. Ex. Doe');
      }
      inp = document.getElementById('phone');
      inp.oninvalid = function(event) {
        event.target.setCustomValidity('Must contain 10 digits. Ex. 9634523451');
      }
      inp = document.getElementById('email');
      inp.oninvalid = function(event) {
        event.target.setCustomValidity('Must be in the format: example@email.com. Ex. john@gmail.com');
      }
      inp = document.getElementById('password');
      inp.oninvalid = function(event) {
        event.target.setCustomValidity('Must contain at least one number, one uppercase and one lowercase letter, and at least 8 or more characters.');
      }
});