<?php include_once('inc/admin_header.php'); ?>


<body>


<div id="wrapper">

    <!-- Navigation -->
    <?php include_once('inc/admin_nav.php'); ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="row">
            <div class="col-lg-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i> Add User

                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <!-- Page content -->
                        <div id="page-content-wrapper">

                            <!-- Keep all page content within the page-content inset div! -->
                            <div class="page-content inset">

                                <form id="register_form" method="post">


                                    <div class="line"></div>
                                    <div class="form-group">
                                        <input type="text" id="inputEmail" class="form-control" name="email"
                                               placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="inputuserid" class="form-control" name="username"
                                               placeholder="Username">
                                    </div>

                                    <button type="submit"
                                            class="btn btn-lg btn-primary btn-sign-in" data-loading-text="Loading...">
                                        Add
                                    </button>
                                    <div class="messagebox" style="padding:10px;">
                                        <div id="alert-message"></div>
                                    </div>
                                </form>
                                <div class="row">

                                    <div class="admin_rec" style="display:none;">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>

            </div>
            <!-- /.col-lg-8 -->


        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.js"></script>

<script src="js/jquery.validate.js"></script>
<!-- Custom Theme JavaScript -->
<script src="js/sb-admin-2.js"></script>


<script>
    $(document).ready(function () {

        jQuery.validator.addMethod("noSpace", function (value, element) {
            return value.indexOf(" ") < 0 && value != "";
        }, "Spaces are not allowed");
		
		  jQuery.validator.addMethod("noSplchars", function (value, element) {
			  var pattern = /^[a-zA-Z0-9]+$/;
            return pattern.test(value)  && value != "";
        }, "Special characters are not allowed");
		
        $("#register_form").validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,
            rules: {
                email: {
                    required: true,
                    email: true
                },
                username: {
                    required: true,
                    noSpace: true,
					noSplchars: true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                retype_password: {
                    required: true,
                    equalTo: "#inputPassword"
                },
            },
            messages: {
                email: {
                    required: "Enter your email address",
                    email: "Enter valid email address"
                },
                username: {
                    required: "Enter Username",

                },
                password: {
                    required: "Enter your password",
                    minlength: "Password must be minimum 6 characters"
                },
                retype_password: {
                    required: "Enter confirm password",
                    equalTo: "Passwords must match"
                },
            },


            errorPlacement: function (error, element) {
                error.hide();
                $('.messagebox').hide();
                error.appendTo($('#alert-message'));
                $('.messagebox').slideDown('slow');


            },
            highlight: function (element, errorClass, validClass) {
                $(element).parents('.form-group').addClass('has-error');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents('.form-group').removeClass('has-error');
                $(element).parents('.form-group').addClass('has-success');
            }
        });

        $("#register_form").submit(function () {


            if ($("#register_form").valid()) {
                var data1 = $('#register_form').serialize();
                $.ajax({
                    type: "POST",
                    url: "admin_add_process.php",
                    data: data1,
                    success: function (msg) {
                        console.log(msg);
                        $('.messagebox').hide();
                        $('#alert-message').html(msg);
                        $('.messagebox').slideDown('slow');
                    }
                });
            }
            return false;
        });
    });
</script>

</body>

</html>
