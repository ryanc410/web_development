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

        <div class="page-content inset">

            <div class="row">
                <div class="admin_rec">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Roles list
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-hover" id="dataTable1">
                                <thead>
                                <tr>
                                    <th>Role ID</th>
                                    <th>Role Description</th>
                                    <th>Total users</th>
                                    <th>Action</th>
                                </thead>
                                <?php


                                //check if user exist already
                                //$query="select * from ".$table_name;


                                //$query = "SELECT username,email, case when activ_status='0' then 'Not Activated' when activ_status='1' then 'activated' end as activ_status,  'email' as source FROM " . $table_name . " UNION ALL SELECT username,email,  'activated', source FROM " . $table_name_social." order by username desc  LIMIT ".$start_from.", ".$pg;
                                //$query = "SELECT * FROM " . $table_name_role;
                                $query = "SELECT ur.role_id,ur.role_description,count(u.id)+COUNT(us.id) as cnt FROM $table_name_role ur "
                                    . "left join $table_name u on u.role=ur.role_id "
                                    . "left join $table_name_social us on us.role=ur.role_id "
                                    . "group by ur.role_id,ur.role_description";
                                //$query="select username, case when activ_status='0' then 'Not Activated' when activ_status='1' then 'activated' when activ_status='2' then 'reset' end as activ_status,  'email' as source FROM " . $table_name ." where activ_status ='2' order by username desc";
                                //echo $query;
                                $result = mysqli_query($con, $query) or die('error');


                                if (mysqli_num_rows($result)) //if exist then check for password
                                {

                                    while ($row = mysqli_fetch_array($result)) {

                                        echo "<tr>";

                                        echo "<td>" . $row['role_id'] . "</td>";
                                        echo "<td>" . $row['role_description'] . "</td>";
                                        echo "<td>" . $row['cnt'] . "</td>";
                                        echo "<td><a href=\"admin_role_info.php?id=" . $row['role_id'] . "&action=edit\" class=\"btn btn-sm btn-primary btn-sign-in\" data-loading-text=\"Loading...\">Edit</a> ";
                                        if ($row['cnt'] == 0)
                                            echo "<a href=\"admin_role_info.php?id=" . $row['role_id'] . "&action=delete\" class=\"btn btn-sm btn-danger btn-sign-in\" data-loading-text=\"Loading...\">Delete</a>";
                                        echo "</td>";
                                        echo "</tr>";

                                    }
                                    echo "</div></table>";

                                    echo "<div class=\"col-md-12 text-center\"><ul class=\"pagination pagination-lg pager\" id=\"myPager\"></ul></div>";

                                    /*$total_pages = ceil($num_rows / $pg);

                                    echo "<ul class = \"pagination pagination-lg pager\">";
                                    echo "Page : ";
                                    for ($i=1; $i<=$total_pages; $i++) {
                                    echo "  <li class=\"page_link\"><a href='admin_user_list.php?page=".$i."'>".$i."</a></li> ";
                                    };
                                    echo "</ul>";
                                    */
                                } else {
                                    die("Username Doesn't exist");
                                }

                                ?>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Add user role

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Page content -->
                            <div id="page-content-wrapper">

                                <!-- Keep all page content within the page-content inset div! -->
                                <div class="page-content inset">

                                    <form id="register_form" method="post">
                                        <div class="form-group">
                                            <input type="text" id="newrole" class="form-control" name="newrole"
                                                   placeholder="Role name">
                                        </div>

                                        <button type="submit"
                                                class="btn btn-sm btn-primary btn-sign-in"
                                                data-loading-text="Loading...">Add
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

        </div>


        <!-- /#page-wrapper -->

    </div>
    <div id="page-wrapper">


        <!-- /.row -->
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

    <!-- DataTables JavaScript -->
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.js"></script>
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
                    newrole: {
                        required: true,
					noSplchars: true,
					noSpace: true

                    }

                },
                messages: {
                    newrole: {
                        required: "Enter role description"

                    }
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
                        url: "admin_add_role_process.php",
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

