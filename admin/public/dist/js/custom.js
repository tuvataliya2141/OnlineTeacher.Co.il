$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //  alert(BASE_URL);
    // alert();


    //-----------Category Table------------------
    $('#laravel_category_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: BASE_URL + '/category',
            type: 'GET',
        },
        columns: [
            { data: 'id', name: 'id' },
            // {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
            { data: 'name', name: 'name' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false },
        ],
        order: [
            [0, 'desc']
        ]
    });
    //-----------/.. Category Table-------------------



    //-----------Banner Table------------------
    $('#laravel_banner_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: BASE_URL + '/banner',
            type: 'GET',
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'title', name: 'title' },
            { data: 'subtitle', name: 'subtitle' },
            // { data: 'images', name: 'images' },
            { data: 'link', name: 'link' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false },
        ],
        order: [
            [0, 'desc']
        ]
    });
    //-----------/.. Banner Table-------------------



    //-----------Work Table------------------
    $('#laravel_work_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: BASE_URL + '/work',
            type: 'GET',
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'title', name: 'title' },
            // { data: 'subtitle', name: 'subtitle' },
            // { data: 'images', name: 'images' },
            // { data: 'link', name: 'link' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false },
        ],
        order: [
            [0, 'desc']
        ]
    });
    //-----------/.. Work Table-------------------

     //-----------subject Table------------------
  $('#laravel_subject_datatable').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: BASE_URL + '/subject',
        type: 'GET',
    },
    columns: [
        { data: 'id', name: 'id' },
        { data: 'name', name: 'name' },
        { data: 'percentage', name: 'percentage' },
    

        { data: 'status', name: 'status' },
        { data: 'created_at', name: 'created_at' },
        { data: 'action', name: 'action', orderable: false },
    ],
    order: [
        [0, 'desc']
    ]
});
//-----------/.. subject Table-------------------


    //----------Plan  Table------------------
    $('#laravel_plan_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: BASE_URL + '/plan',
            type: 'GET',
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'price', name: 'price' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false },
        ],
        order: [
            [0, 'desc']
        ]
    });
    //-----------/.. Plan Table-------------------


    //----------Plan  Table------------------
    $('#laravel_service_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: BASE_URL + '/service',
            type: 'GET',
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'title', name: 'title' },
            { data: 'description', name: 'description' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false },
        ],
        order: [
            [0, 'desc']
        ]
    });
    //-----------/.. Plan Table-------------------





























    //-----------Slider Table------------------
    $('#laravel_slider_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: BASE_URL + '/slider',
            type: 'GET',
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'title', name: 'title' },
            { data: 'subtitle', name: 'subtitle' },
            // { data: 'images', name: 'images' },
            { data: 'link', name: 'link' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false },
        ],
        order: [
            [0, 'desc']
        ]
    });
    //-----------/.. Slider Table-------------------

    //-----------Product Table------------------
    $('#laravel_product_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: BASE_URL + '/product',
            type: 'GET',
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'price', name: 'price' },
            // { data: 'images', name: 'images' },
            // { data: 'description', name: 'description' },            

            { data: 'category_name', name: 'category_name' },
            { data: 'sub_category', name: 'sub_category' },
            { data: 'slug', name: 'slug' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false },
        ],
        order: [
            [0, 'desc']
        ]
    });
    //-----------/.. Product Table-------------------

    //-----------Order Table------------------
    $('#laravel_orders_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: BASE_URL + '/orders',
            type: 'GET',
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'customer_name', name: 'customer_name' },
            { data: 'sub_total', name: 'sub_total' },
            { data: 'discount', name: 'discount' },
            { data: 'shipping_cost', name: 'shipping_cost' },

            { data: 'grand_total', name: 'grand_total' },
            { data: 'order_date', name: 'order_date' },
            { data: 'status', name: 'status' },
            // { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false },
        ],
        order: [
            [0, 'desc']
        ]
    });
    //-----------/.. Order Table-------------------


    //-----------Subscibers  Table------------------
    $('#laravel_subscribers_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: BASE_URL + '/subscribers',
            type: 'GET',
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'email', name: 'email' },
            { data: 'created_at', name: 'created_at' },
            { data: 'Response', name: 'Response', orderable: false },
            { data: 'action', name: 'action', orderable: false },
        ]
    });
    //-----------/.. Subscibers  Table -------------------


    //-----------Contact US  Table------------------
    $('#laravel_contacts_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: BASE_URL + '/contact-us',
            type: 'GET',
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            // { data: 'contact_no', name: 'contact_no' },
            // { data: 'subject', name: 'subject' },
            { data: 'message', name: 'message' },


            { data: 'created_at', name: 'created_at' },
            // { data: 'Response', name: 'Response', orderable: false },
            { data: 'action', name: 'action', orderable: false },
        ],
        order: [
            [0, 'desc']
        ]
    });
    //-----------/.. Contact US  Table -------------------

    //-----------Coupons Table------------------
    $('#laravel_coupon_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: BASE_URL + '/coupons',
            type: 'GET',
        },
        columns: [
            { data: 'id', name: 'id' },
            // {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
            { data: 'code', name: 'code' },
            { data: 'type', name: 'type' },
            { data: 'value', name: 'value' },
            { data: 'min_amount', name: 'min_amount' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false },
        ],
        order: [
            [0, 'desc']
        ]
    });
    //-----------/.. Coupons Table-------------------


    //-----------Users Table------------------
    $('#laravel_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: BASE_URL + '/users',
            type: 'GET',
        },
        columns: [
            { data: 'id', name: 'id' },
            // {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
            { data: 'fullname', name: 'fullname' },
            { data: 'email', name: 'email' },
            { data: 'contact_no', name: 'contact_no' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false },
        ],
        order: [
            [0, 'desc']
        ]
    });
    //-----------/.. Users Table-------------------

});

//------------- Work Status Change ----------------
function changeWork_Status(id) {
    // alert(id);
    $.ajax({
        url: BASE_URL + '/work_status',
        type: 'POST',
        data: { 'id': id },
        success: function(response) {
            if (response.status == "0") {
                //alert(response.data.first_name);
                var table = $('#laravel_work_datatable').DataTable();
                table.ajax.reload();
            } else {
                alert(response.message);
            }
        }
    });
}
//-----------/.. Work Status Change ----------------


//------------- status Status Change ----------------
function changesubject_Status(id) {
    // alert(id);
    $.ajax({
        url: BASE_URL + '/subject_status',
        type: 'POST',
        data: { 'id': id },
        success: function(response) {
            if (response.status == "0") {
                //alert(response.data.first_name);
                var table = $('#laravel_subject_datatable').DataTable();
                table.ajax.reload();
            } else {
                alert(response.message);
            }
        }
    });
}
//-----------/.. status Status Change ----------------

//------------- Work Status Change ----------------
function changeservice_Status(id) {
    // alert(id);
    $.ajax({
        url: BASE_URL + '/service_status',
        type: 'POST',
        data: { 'id': id },
        success: function(response) {
            if (response.status == "0") {
                //alert(response.data.first_name);
                var table = $('#laravel_service_datatable').DataTable();
                table.ajax.reload();
            } else {
                alert(response.message);
            }
        }
    });
}
//-----------/.. Work Status Change ----------------




//------------- Product Status Change ----------------
function changeProduct_Status(id) {
    $.ajax({
        url: BASE_URL + '/product_status',
        type: 'POST',
        data: { 'id': id },
        success: function(response) {
            if (response.status == "0") {
                //alert(response.data.first_name);
                var table = $('#laravel_product_datatable').DataTable();
                table.ajax.reload();
            } else {
                alert(response.message);
            }
        }
    });
}
//-----------/.. Product Status Change ----------------

//------------- Banner Status Change ----------------
function changeBanner_Status(id) {
    // alert(id);
    $.ajax({
        url: BASE_URL + '/banner_status',
        type: 'POST',
        data: { 'id': id },
        success: function(response) {
            if (response.status == "0") {
                //alert(response.data.first_name);
                var table = $('#laravel_banner_datatable').DataTable();
                table.ajax.reload();
            } else {
                alert(response.message);
            }
        }
    });
}
//-----------/.. Banner Status Change ----------------

//------------- Slider Status Change ----------------
function changeSlider_Status(id) {
    // alert(id);
    $.ajax({
        url: BASE_URL + '/slider_status',
        type: 'POST',
        data: { 'id': id },
        success: function(response) {
            if (response.status == "0") {
                //alert(response.data.first_name);
                var table = $('#laravel_slider_datatable').DataTable();
                table.ajax.reload();
            } else {
                alert(response.message);
            }
        }
    });
}
//-----------/.. Slider Status Change ----------------

//------------- Order Status Change ----------------
function changeOrder_Status() {
    var status = $('#order_status').val();

    var order_id = $('#order_id').val();


    $.ajax({
        url: BASE_URL + '/change-orderStatus',
        type: 'POST',
        data: {
            order_id: order_id,
            status: status,
        },

        success: function(response) {
            if (response.success == true) {
                $('#orderstatusModal').modal('hide');
                var table = $('#laravel_orders_datatable').DataTable();
                table.ajax.reload();

            } else {
                alert("Please Select Status !!");
                // swal("Warning",response.message,"warning")
            }
        }
    });
}
//-----------/.. Order Status Change ----------------

//------------- Coupen Status Change ----------------
function changeCoupon_Status(id) {
    // alert(id);
    $.ajax({
        url: BASE_URL + '/coupon_status',
        type: 'POST',
        data: { 'id': id },
        success: function(response) {
            if (response.status == "0") {
                //alert(response.data.first_name);
                var table = $('#laravel_coupon_datatable').DataTable();
                table.ajax.reload();
            } else {
                alert(response.message);
            }
        }
    });
}
//-----------/.. Coupen Status Change ----------------

//------------- User Status Change ----------------
function changeUser_Status(id) {
    // alert(id);
    $.ajax({
        url: BASE_URL + '/user_status',
        type: 'POST',
        data: { 'id': id },
        success: function(response) {
            if (response.status == "0") {
                //alert(response.data.first_name);
                var table = $('#laravel_datatable').DataTable();
                table.ajax.reload();
            } else {
                alert(response.message);
            }
        }
    });
}
//-----------/.. User Status Change ----------------

//------------- Work Status Change ----------------
function changeWork_Status(id) {
    // alert(id);
    $.ajax({
        url: BASE_URL + '/work_status',
        type: 'POST',
        data: { 'id': id },
        success: function(response) {
            if (response.status == "0") {
                //alert(response.data.first_name);
                var table = $('#laravel_work_datatable').DataTable();
                table.ajax.reload();
            } else {
                alert(response.message);
            }
        }
    });
}
//-----------/.. Work Status Change ----------------



//------------- Delete Banner Function ----------------
function deleteBanner(id) {
    swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Banner Data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: BASE_URL + '/delete-Banner',
                    type: 'POST',
                    data: { 'id': id },
                    success: function(response) {
                        if (response.status == "0") {
                            swal("Done!", "It was succesfully Banner Data deleted!", "success");
                            var table = $('#laravel_banner_datatable').DataTable();
                            table.ajax.reload();

                        } else {
                            alert(response.message);
                        }
                    }
                });
            } else {
                swal("Your Data is safe!");
            }
        });
}
//-----------/.. Delete Banner Function ----------------



//------------- Delete Work Function ----------------
function deleteWork(id) {
    swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Work Data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: BASE_URL + '/delete-Work',
                    type: 'POST',
                    data: { 'id': id },
                    success: function(response) {
                        if (response.status == "0") {
                            swal("Done!", "It was succesfully Work Data deleted!", "success");
                            var table = $('#laravel_work_datatable').DataTable();
                            table.ajax.reload();

                        } else {
                            alert(response.message);
                        }
                    }
                });
            } else {
                swal("Your Data is safe!");
            }
        });
}
//-----------/.. Delete Work Function ----------------



//------------- Delete subject Function ----------------
function deletesubject(id) {
    swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this subject Data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: BASE_URL + '/delete-subject',
                    type: 'POST',
                    data: { 'id': id },
                    success: function(response) {
                        if (response.status == "0") {
                            swal("Done!", "It was succesfully subject Data deleted!", "success");
                            var table = $('#laravel_subject_datatable').DataTable();
                            table.ajax.reload();

                        } else {
                            alert(response.message);
                        }
                    }
                });
            } else {
                swal("Your Data is safe!");
            }
        });
}
//-----------/.. Delete subject Function ----------------

















//------------- Delete Slider Function ----------------
function deleteSlider(id) {
    swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Slider Data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: BASE_URL + '/delete-Slider',
                    type: 'POST',
                    data: { 'id': id },
                    success: function(response) {
                        if (response.status == "0") {
                            swal("Done!", "It was succesfully Slider Data deleted!", "success");
                            var table = $('#laravel_slider_datatable').DataTable();
                            table.ajax.reload();

                        } else {
                            alert(response.message);
                        }
                    }
                });
            } else {
                swal("Your Data is safe!");
            }
        });
}
//-----------/.. Delete Slider Function ----------------

//------------- Delete Slider Function ----------------
function deleteProduct(id) {
    swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Product Data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: BASE_URL + '/delete-Product',
                    type: 'POST',
                    data: { 'id': id },
                    success: function(response) {
                        if (response.status == "0") {
                            swal("Done!", "It was succesfully Product Data deleted!", "success");
                            var table = $('#laravel_product_datatable').DataTable();
                            table.ajax.reload();

                        } else {
                            alert(response.message);
                        }
                    }
                });
            } else {
                swal("Your Data is safe!");
            }
        });
}
//-----------/.. Delete Product Function ----------------



//------------- Delete Work Function ----------------
function deleteWork(id) {
    swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Work Data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: BASE_URL + '/delete-Work',
                    type: 'POST',
                    data: { 'id': id },
                    success: function(response) {
                        if (response.status == "0") {
                            swal("Done!", "It was succesfully Work Data deleted!", "success");
                            var table = $('#laravel_work_datatable').DataTable();
                            table.ajax.reload();

                        } else {
                            alert(response.message);
                        }
                    }
                });
            } else {
                swal("Your Data is safe!");
            }
        });
}
//-----------/.. Delete Work Function ----------------

//------------- Delete service Function ----------------
function deleteservice(id) {
    swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this service Data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: BASE_URL + '/delete-service',
                    type: 'POST',
                    data: { 'id': id },
                    success: function(response) {
                        if (response.status == "0") {
                            swal("Done!", "It was succesfully service Data deleted!", "success");
                            var table = $('#laravel_service_datatable').DataTable();
                            table.ajax.reload();

                        } else {
                            alert(response.message);
                        }
                    }
                });
            } else {
                swal("Your Data is safe!");
            }
        });
}
//-----------/.. Delete service Function ----------------







//------------- Delete Order Function ----------------
function deleteOrder(id) {
    swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Order Data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: BASE_URL + '/delete-order',
                    type: 'POST',
                    data: { 'id': id },
                    success: function(response) {
                        if (response.status == "0") {
                            swal("Done!", "It was succesfully Order Data deleted!", "success");
                            var table = $('#laravel_orders_datatable').DataTable();
                            table.ajax.reload();

                        } else {
                            alert(response.message);
                        }
                    }
                });
            } else {
                swal("Your Data is safe!");
            }
        });
}
//-----------/.. Delete Product Function ----------------


//------------- Delete Contact Us  Function ----------------
function deleteContact(id) {
    swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Contact Data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: BASE_URL + '/delete-contactus',
                    type: 'POST',
                    data: { 'id': id },
                    success: function(response) {
                        if (response.status == "0") {
                            swal("Done!", "It was succesfully ContactData deleted!", "success");
                            var table = $('#laravel_contacts_datatable').DataTable();
                            table.ajax.reload();

                        } else {
                            alert(response.message);
                        }
                    }
                });
            } else {
                swal("Your Data is safe!");
            }
        });
}
//-----------/.. Delete contact us  Function ----------------

//------------- Delete Subscribers  Function ----------------
function deleteSubscriber(id) {
    swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Subscriber Data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: BASE_URL + '/delete-subscribers',
                    type: 'POST',
                    data: { 'id': id },
                    success: function(response) {
                        if (response.status == "0") {
                            swal("Done!", "It was succesfully Subscriber Data deleted!", "success");
                            var table = $('#laravel_subscribers_datatable').DataTable();
                            table.ajax.reload();

                        } else {
                            alert(response.message);
                        }
                    }
                });
            } else {
                swal("Your Data is safe!");
            }
        });
}
//-----------/.. Delete Subscribers  Function ----------------

//------------- Delete Coupon Function ----------------
function deleteCoupon(id) {
    swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Coupon Data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: BASE_URL + '/delete-coupon',
                    type: 'POST',
                    data: { 'id': id },
                    success: function(response) {
                        if (response.status == "0") {
                            swal("Done!", "It was succesfully Coupon Data deleted!", "success");
                            var table = $('#laravel_coupon_datatable').DataTable();
                            table.ajax.reload();

                        } else {
                            alert(response.message);
                        }
                    }
                });
            } else {
                swal("Your Data is safe!");
            }
        });
}
//-----------/.. Delete User Function ----------------


//------------- Delete User Function ----------------
function deleteUser(id) {
    swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this User Data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: BASE_URL + '/delete-User',
                    type: 'POST',
                    data: { 'id': id },
                    success: function(response) {
                        if (response.status == "0") {
                            swal("Done!", "It was succesfully User Data deleted!", "success");
                            var table = $('#laravel_datatable').DataTable();
                            table.ajax.reload();

                        } else {
                            alert(response.message);
                        }
                    }
                });
            } else {
                swal("Your Data is safe!");
            }
        });
}
//-----------/.. Delete User Function ----------------






function printErrorMsg(msg) {
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display', 'block');
    $(".print-success-msg").css('display', 'none');
    $.each(msg, function(key, value) {
        $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
    });
}





$('#addSlider').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url: BASE_URL + '/saveSlider',
        method: "POST",
        data: new FormData(this),
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,

        success: function(data) {
            if (data.success == true) {
                swal("Inserted!", "Your Data Added  successfully!", "success")
                    .then((value) => {
                        window.location.href = '../slider';
                        // window.location.href = BASE_URL+'/consultants';
                    });

            } else {
                if (data.error) {
                    swal("Error !", "Please Input the required field or enter Valid data", "warning")
                    printErrorMsg(data.error);

                } else {
                    swal("Inserted!", "Your Data Added  successfully!", "success")
                        .then((value) => {
                            window.location.href = '../slider';
                            // window.location.href = BASE_URL+'/consultants';
                        });

                }

            }

        }

    });
});

$('#addProduct').on('submit', function(event) {

    event.preventDefault();
    $.ajax({
        url: BASE_URL + '/saveProduct',
        method: "POST",
        data: new FormData(this),
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,

        success: function(data) {

            if (data.error) {
                swal("Error !", "Please Input the required field or enter Valid data", "warning")
                printErrorMsg(data.error);

            } else {
                swal("Success!", "Your Data inserted  successfully!", "success")
                    .then((value) => {
                        window.location.href = BASE_URL + '/product';
                    });

            }
        }

    });
});




$('#addPlan').on('submit', function(event) {

    event.preventDefault();
    $.ajax({
        url: BASE_URL + '/savePlan',
        method: "POST",
        data: new FormData(this),
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,

        success: function(data) {

            if (data.error) {
                swal("Error !", "Please Input the required field or enter Valid data", "warning")
                printErrorMsg(data.error);

            } else {
                swal("Success!", "Your Data inserted  successfully!", "success")
                    .then((value) => {
                        window.location.href = BASE_URL + '/plan';
                    });

            }
        }

    });
});


$('#updateProduct').on('submit', function(event) {

    event.preventDefault();
    $.ajax({
        url: BASE_URL + '/update-product',

        method: "POST",
        data: new FormData(this),
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,

        success: function(data) {

            if (data.error) {
                swal("Error !", "Please Input the required field or enter Valid data", "warning")
                printErrorMsg(data.error);

            } else {
                swal("Update!", "Your Data Updated  successfully!", "success")
                    .then((value) => {
                        window.location.href = BASE_URL + '/product';
                    });

            }
        }

    });
});



function fetch_related_products() {

    $.ajax({
        type: "POST",
        url: BASE_URL + '/related_product',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            $(".alert").hide();
            // Success
            if (response.message == 'success') {


                var related_product_list = response.data;
                var related_html = '';
                related_product_list.forEach(function(res) {
                    related_html += ` <span><option value="${res.id}">${res.name}</option></span>`;
                });
                $('#related_products').html(related_html);
            } else {

            }

        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}

// -------------------Send Mail Check, Uncheck, insert Data Code -----------------------//

$('#selectSubscriber').click(function(e) {
    var table = $(e.target).closest('table');
    $('td input[name=chkId]', table).prop('checked', this.checked);
});
$(document).on("change", "td input:checkbox", function() {
    $("#selectSubscriber").prop("checked", false);
});



function reply() {
    jQuery('.alert-danger').hide();
    $("#replyMessage").modal('show');
    $('#replyMessage').modal({
            backdrop: 'static',
            keyboard: false // to prevent closing with Esc button (if you want this too)

        })
        // $("#email_address").val(email_address);

}



//--------- subscribers reply insert in DB Table-------------
$('#sendMail').click(function(e) {
    $("#sendMail").prop("disabled", true);

    // alert($("#users_mail").val());
    // alert($("#message").val());

    jQuery('#loading').show();
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");

    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: BASE_URL + '/saveMail',
        method: 'POST',
        beforeSend: function() { $('#wait').show(); },
        complete: function() { $('#wait').hide(); },
        data: {
            message: $('#message').val(),
            user_mail: $('#users_mail').val(),
            // email_address: $('#email_address').val(),
        },
        success: function(result) {
            if (result.errors) {
                jQuery('.alert-danger').html('');

                jQuery.each(result.errors, function(key, value) {
                    jQuery('.alert-danger').show();
                    jQuery('.alert-danger').append('<li>' + value + '</li>');
                });
                $("#sendMail").prop("disabled", false);
                jQuery('#loading').hide();
                $(".se-pre-con").fadeOut("hide");
            } else {
                jQuery('.alert-danger').hide();
                jQuery('#loading').hide();
                $(".se-pre-con").fadeOut("hide");
                $('#open').hide();
                $('#replyMessage').modal('hide');
                $('#message').val('').empty();
                $('#users_mail').val('');
                var table = $('#laravel_subscribers_datatable').DataTable();
                table.ajax.reload();
                $("#sendMail").prop("disabled", false);
                // $("#selectAll").prop("checked", false);    

                swal({ title: "Subscriber!", text: "Your Mail send successfully!", type: "success" }).then(function() {
                    window.location.reload();
                });


            }
        }
    });
});
// //---------/..subscribe reply insert in DB Table-------------

$("#replySubscriber").click(function() {
    var cnt = $("td input:checkbox:checked").length;
    var params = {};
    if (cnt > 0) {
        var favorite = [];
        $.each($("input[name='chkId']:checked"), function() {
            favorite.push($(this).val());
        });

        params['subscriber_email'] = favorite.join(", ");

        $("#users_mail").val(params['subscriber_email']);
    }
});

function replymail(email) {
    jQuery('.alert-danger').hide();
    $("#contactreplyModal").modal('show');
    $('#contactreplyModal').modal({
        backdrop: 'static',
        keyboard: false // keyboard: false  // to prevent closing with Esc button (if you want this too)
    })
    $("#email").val(email);
}


// //---------/..subscribe reply insert in DB Table-------------

//--------- Contact Us  reply insert in DB Table-------------
$('#sendMailcontact').click(function(e) {
    $("#sendMailcontact").prop("disabled", true);
    jQuery('#loading').show();

    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: BASE_URL + '/ContactReplyMail',
        method: 'POST',
        data: {
            message: $('#message').val(),
            user_id: $('#user_id').val(),
            email: $('#email').val(),
        },
        success: function(result) {
            if (result.errors) {
                jQuery('.alert-danger').html('');

                jQuery.each(result.errors, function(key, value) {
                    jQuery('.alert-danger').show();
                    jQuery('.alert-danger').append('<li>' + value + '</li>');
                });
                $("#sendMailcontact").prop("disabled", false);
                jQuery('#loading').hide();
            } else {
                jQuery('.alert-danger').hide();
                jQuery('#loading').hide();
                $('#open').hide();
                $('#contactreplyModal').modal('hide');
                $('#message').val('');
                var table = $('#laravel_contacts_datatable').DataTable();
                table.ajax.reload();
                $("#sendMailcontact").prop("disabled", false);
                // swal("Suggetions!", "Your Mail send successfully!", "success");

                swal({ title: "Contacts!", text: "Your Mail send successfully!", type: "success" }).then(function() {
                    window.location.reload();
                });
            }
        }
    });
});
// //---------/..Contact Us  reply insert in DB Table-------------