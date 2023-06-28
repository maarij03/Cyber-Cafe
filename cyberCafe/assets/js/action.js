$(function(){
    var base_url = $('.site-url').val();

    function destroy_data(name, url) {
        var el = name;
        var id = el.attr('data-id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: base_url+url,
                    type: "post",
                    data: {delete:id},
                    success: function (dataResult) {
                        if (dataResult == '1') {
                            el.parent().parent().parent('tr').remove();
                            Swal.fire(
                                'Deleted!',
                                'Deleted Successfully.',
                                'success'
                              )
                        } else {
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
        })
    }

    $('#addComputer').validate({
        rules: {
            computer_name: {required: true},
            computer_location: {required: true},
        },
        submitHandler: function(form){
            var formdata = new FormData(form);
            $.ajax({
                url: base_url+'php_files/computer.php',
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                success: function(dataResult){
                    if(dataResult == '1'){
                        Swal.fire({
                            icon: 'success',
                            html: 'Added Successfully',
                            timer: 1500,
                            showConfirmButton: false,
                        })
                        setTimeout(function(){ window.location.href = base_url+'computer.php';}, 1500);
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

    $('#updateComputer').validate({
        rules: {
            computer_name: {required: true},
            computer_location: {required: true},
            status: {required: true},
        },
        submitHandler: function(form){
            var formdata = new FormData(form);
            $.ajax({
                url: base_url+'php_files/computer.php',
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                success: function(dataResult){
                    if(dataResult == '1'){
                        Swal.fire({
                            icon: 'success',
                            html: 'Updated Successfully',
                            timer: 1500,
                            showConfirmButton: false,
                        })
                        setTimeout(function(){ window.location.href = base_url+'computer.php';}, 1500);
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

    

    $(document).on("click", ".delete-computer", function () {
        destroy_data($(this), 'php_files/computer.php')
    });


    $('#addID_type').validate({
        rules: {
            id_name: {required: true},
            status: {required: true},
        },
        submitHandler: function(form){
            var formdata = new FormData(form);
            $.ajax({
                url: base_url+'php_files/id_types.php',
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                success: function(dataResult){
                    if(dataResult == '1'){
                        Swal.fire({
                            icon: 'success',
                            html: 'Added Successfully',
                            timer: 1500,
                            showConfirmButton: false,
                        })
                        setTimeout(function(){ window.location.href = base_url+'id_types.php';}, 1500);
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

    $('#updateID_type').validate({
        rules: {
            id_name: {required: true},
            status: {required: true},
        },
        submitHandler: function(form){
            var formdata = new FormData(form);
            $.ajax({
                url: base_url+'php_files/id_types.php',
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                success: function(dataResult){
                    if(dataResult == '1'){
                        Swal.fire({
                            icon: 'success',
                            html: 'Updated Successfully',
                            timer: 1500,
                            showConfirmButton: false,
                        })
                        setTimeout(function(){ window.location.href = base_url+'id_types.php';}, 1500);
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

    $(document).on("click", ".delete-idName", function () {
        destroy_data($(this), 'php_files/id_types.php')
    });

    $('#addUser').validate({
        rules: {
            user_name: {required: true},
            email: {required: true},
            phone: {required: true},
            address: {required: true},
            computer: {required: true},
            in_time: {required: true},
            id_type: {required: true},
            id_value: {required: true},
        },
        submitHandler: function(form){
            var formdata = new FormData(form);
            $.ajax({
                url: base_url+'php_files/users.php',
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                success: function(dataResult){
                    console.log(dataResult);
                    if(dataResult == '1'){
                        Swal.fire({
                            icon: 'success',
                            html: 'Added Successfully',
                            timer: 1500,
                            showConfirmButton: false,
                        })
                        setTimeout(function(){ window.location.href = base_url+'users.php';}, 1500);
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


    
    $('#updateUser').validate({
        rules: {
            user_name: {required: true},
            email: {required: true},
            phone: {required: true},
            address: {required: true},
            computer: {required: true},
            in_time: {required: true},
            id_type: {required: true},
            id_value: {required: true},
        },
        submitHandler: function(form){
            var formdata = new FormData(form);
            $.ajax({
                url: base_url+'php_files/users.php',
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                success: function(dataResult){
                    console.log(dataResult);
                    if(dataResult == '1'){
                        Swal.fire({
                            icon: 'success',
                            html: 'Updated Successfully',
                            timer: 1500,
                            showConfirmButton: false,
                        })
                        setTimeout(function(){ window.location.href = base_url+'users.php';}, 1500);
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

    $('select[name=search_type]').change(function(){
        var val = $(this).val();
        if(val == 'all'){
            $('.id_type').css('display','none');
            $('.id_value').css('display','none');
            $('.user_name').css('display','none');
        }else if(val == 'income'){
            $('.id_type').css('display','none');
            $('.id_value').css('display','none');
            $('.user_name').css('display','none');
        }else if(val == 'id_proof'){
            $('.id_type').css('display','block');
            $('.id_value').css('display','block');
            $('.user_name').css('display','none');
        }else if(val == 'user_name'){
            $('.id_type').css('display','none');
            $('.id_value').css('display','none');
            $('.user_name').css('display','block');
        }
    })



    var colltable = $('#reportData').DataTable({
        processing: true, //Feature control the processing indicator.
        order: [], //Initial no order.
        ajax: {
            url: base_url+"php_files/report.php",
            type: "POST",
            data: function(data){
                // Read values
                var from_date = $('input[name=from_date]').val();
                var to_date = $('input[name=to_date]').val();
                var type = $('select[name=search_type] option:selected').val();
                var id_type = $('select[name=id_type] option:selected').val();
                var id_value = $('input[name=id_value]').val();
                var user_name = $('input[name=user_name]').val();
                // Append to data
                data.from_date = from_date;
                data.to_date = to_date;
                data.type = type;
                data.id_type = id_type;
                data.id_value = id_value;
                data.user_name = user_name;
            },
        },
        columns: [
          { data: "entry_id" },
          { data: "user_details" },
          { data: "computer_name" },
          { data: "timings" },
          { data: "fees" },
        ],
        dom: 'Bfrtip',
          buttons: [
            { extend: 'print', footer: true },
            { extend: 'excelHtml5', footer: true },
            { extend: 'pdfHtml5', footer: true }
        ],
        footerCallback: function ( row, data, start, end, display ){
            var api = this.api(), data;
            var numFormat = $.fn.dataTable.render.number( ",", ".", 0, "" ).display;
            // Remove the formatting to get integer data for summation
            var intVal = function ( i )
            {
                return typeof i === "string" ?
                    i.replace(/[\$,]/g, "")*1 :
                    typeof i === "number" ?
                        i : 0;
            };
            // Total Column 4 over all pages
            total = api
                .column( 4 )
                .data()
                .reduce( function (a, b)
                {
                    return intVal(a) + intVal(b);
                }, 0 );
            // Update footer
            $( api.column( 4 ).footer() ).html
            (
                numFormat(total)
            );
        }
    });

    $("#search-form").on("submit", function(e){
        e.preventDefault();
        colltable.ajax.reload();
    });

    $('#editProfile').validate({
        rules: {
            admin_name: {required: true},
            admin_user: {required: true},
            email: {required: true},
            com_name: {required: true},
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
                            html: 'Updated Successfully',
                            timer: 1500,
                            showConfirmButton: false,
                        })
                        setTimeout(function(){ window.location.href = base_url+'my_profile.php';}, 1500);
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


    $('#changePass').validate({
        rules: {
            old_pass: {required: true},
            new_pass: {required: true},
            con_pass: {required: true,equalTo:'#password'},
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
                            html: 'Updated Successfully',
                            timer: 1500,
                            showConfirmButton: false,
                        })
                        setTimeout(function(){ window.location.href = base_url+'dashboard.php';}, 1500);
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