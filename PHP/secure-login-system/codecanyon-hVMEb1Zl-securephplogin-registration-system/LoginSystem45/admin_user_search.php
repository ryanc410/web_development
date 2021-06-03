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
                        <i class="fa fa-bar-chart-o fa-fw"></i> Search User

                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <!-- Page content -->
                        <div id="page-content-wrapper">

                            <!-- Keep all page content within the page-content inset div! -->
                            <div class="page-content inset">
                                <form id="search_user" method="post">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Username</label>
                                        <input type="text" id="username" class="form-control" name="username"
                                               placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Email address</label>
                                        <input type="text" id="email" name="email" placeholder="Email"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputactiv">Role</label>
                                        <select class="form-control" name="role_description" id="role_description">
                                            <?php
                                            $query = "select role_id,role_description from " . $table_name_role;
                                            $result = mysqli_query($con, $query) or die('error');
                                            if (mysqli_num_rows($result)) {

                                                while ($row = $result->fetch_assoc()) {
                                                    // your code
                                                    echo "<option value=\"" . $row["role_id"] . "\" ";

                                                    echo ">"
                                                        . $row["role_description"] . "</option>";
                                                }
                                            }
                                            ?>


                                        </select>


                                    </div>


                                    <button
                                            type="submit" class="btn btn-lg btn-primary btn-sign-in"
                                            data-loading-text="Loading...">Search
                                    </button>
                                    <br/>
                                    <div class="messagebox">
                                        <div id="alert-message"></div>
                                    </div>


                                </form>

                                <div class="row">

                                    <div class="admin_rec" style="display:none;padding:10px;">

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


<!-- Custom Theme JavaScript -->
<script src="js/sb-admin-2.js"></script>


<script type="text/javascript">
    $(document).ready(function () {


        $("#search_user").submit(function () {


            var data1 = $('#search_user').serialize();
            $.ajax({
                type: "POST",
                url: "admin_search_process.php",
                data: data1,
                success: function (msg) {
                    console.log(msg);
                    $('.admin_rec').hide();
                    $('.admin_rec').html(msg);
                    $('.admin_rec').slideDown('slow');
                }
            });


            return false;


        });
    });
</script>

</body>

</html>
