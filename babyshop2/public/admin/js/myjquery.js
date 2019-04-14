function showRegisterForm() {            
    $('.loginBox').fadeOut('fast', function () {                
    $('.registerBox').fadeIn('fast');                
    $('.login-footer').fadeOut('fast', function () {                    
    $('.register-footer').fadeIn('fast');                
    });                
    $('.modal-title').html('Đăng ký');            
    });            
    $('.error').removeClass('alert alert-danger').html('');        
	}        
	
    function showLoginForm() {            
    $('.registerBox').fadeOut('fast', function () {                
    $('.loginBox').fadeIn('fast');                
    $('.register-footer').fadeOut('fast', function () {                    
    $('.login-footer').fadeIn('fast');                
    });                
    $('.modal-title').html('Đăng nhập');            
    });            
    $('.error').removeClass('alert alert-danger').html('');        
    }

window.onload = function(){

		var inputs = document.forms['register'].getElementsByTagName('input');
		var run_onchange = false;
		function valid(){
			var errors = false; 
			var reg_mail = /^[A-Za-z0-9]+([_\.\-]?[A-Za-z0-9])*@[A-Za-z0-9]+([\.\-]?[A-Za-z0-9]+)*(\.[A-Za-z]+)+$/;
			for(var i=0; i<inputs.length; i++){
				var value = inputs[i].value;
				var id = inputs[i].getAttribute('id');
				
				
				var span = document.createElement('span');
				
				var p = inputs[i].parentNode;
				if(p.lastChild.nodeName == 'SPAN') {p.removeChild(p.lastChild);}
				
				
				if(value == ''){
					span.innerHTML ='Information is required.';
				}else{
				
					if(id == 'email'){
						if(reg_mail.test(value) == false){ span.innerHTML ='Please enter a valid email address. (for example: abc@gmail.com)';}
						var email =value;
					}
					if(id == 'confirm_email' && value != email){span.innerHTML ='Your email addresses do not match.';}
					
					if(id == 'password'){
						if(value.length <6){span.innerHTML ='Your password must contain at least 6 characters.';}
						var pass =value;
					}
					
					if(id == 'confirm_pass' && value != pass){span.innerHTML ='Your password does not match.';}
					
					if(id == 'phone' && isNaN(value) == true){span.innerHTML ='The phone numbers must be numeric.';}
				}
				
				
				if(span.innerHTML != ''){
					inputs[i].parentNode.appendChild(span);
					errors = true;
					run_onchange = true;
					inputs[i].style.border = '1px solid #c6807b';
					inputs[i].style.background = '#fffcf9';
				}
			}
			
			if(errors == false){alert('Successful');}
			return !errors;
		}
		
		
		var register = document.getElementById('submit');
		register.onclick = function(){
			return valid();
		}
		
	
			for(var i=0; i<inputs.length; i++){
				var id = inputs[i].getAttribute('id');
				inputs[i].onchange = function(){
					if(run_onchange == true){
						this.style.border = '1px solid #999';
						this.style.background = '#fff';
						valid();
					}
				}
			}
}