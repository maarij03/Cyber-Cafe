$(function(){
    var base_url = $('.site-url').val();
    $('#adminLogin').validate({
        rules: {
            u_name: {required: true},
            u_pass: {required: true},
        },
        submitHandler: function(form){
            var formdata = new FormData(form);
            $.ajax({
                url: base_url+'php_files/profile.php',
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                success: function(dataResult){
                    console.log(dataResult);
                    if(dataResult == '1'){
                        Swal.fire({
                            icon: 'success',
                            html: 'Logged In Successfully',
                            timer: 1500,
                            showConfirmButton: false,
                        })
                        setTimeout(function(){ window.location.reload(); }, 1500);
                    }
                    else{
                        Swal.fire({
                            icon: 'warning',
                            html: dataResult,
                            timer: 1500,
                            showConfirmButton: false,
                        })
                    }
                }
            });
        }
    });


});