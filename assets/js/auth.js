$('#login').click(function(){
    //get the value of email and password
    var email = $('input[name=email]').val();
    var pass = $('input[name=pass]').val();
    $('.error').html('');
    //check if email and password are empty
    if(email == '' || pass == ''){
        //if empty show error
        $('.error').html('<div class="alert alert-danger">Please fill all the fields</div>');
    }else{
        //if not empty send ajax request
        $.ajax({
            url: '/authorize/login',
            type: 'POST',
            data: {email:email,pass:pass},
            success: function(data){
                //if success redirect to dashboard
                if(data == 'success'){
                    window.location.href = '/dashboard';
                }else{
                    //if not show error
                    $('.error').html('<div class="alert alert-danger">'+data+'</div>');
                }
            }
        });
    }
});