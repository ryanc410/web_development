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
                <div class="admin_rec col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Role details
                        </div>
                        <div class="panel-body">

                            <?php


                            $id = mysqli_real_escape_string($con, $_GET["id"]);
                            $id = htmlspecialchars($id, ENT_COMPAT);
                            $action = mysqli_real_escape_string($con, $_GET["action"]);
                            $action = htmlspecialchars($action, ENT_COMPAT);
                            if (!empty($id)) {


                                $query = "select role_id,role_description from " . $table_name_role . " where role_id='$id'";
                                $result = mysqli_query($con, $query) or die('error');

                                if (mysqli_num_rows($result)) {
                                    $row = mysqli_fetch_array($result);
                                    $this_user_role = $row['role_description'];
                                    ?>

                                    <form id="user_info" method="post">
                                        <div class="form-group">

                                            <div class="form-group">
                                                <label for="exampleInputsource">Role ID</label>
                                                <input type="text" id="role_id" name="role_id" placeholder="role id"
                                                       class="form-control" value="<?php echo $row['role_id']; ?>"
                                                       readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputsource">Description</label>
                                                <input type="text" id="role_description" name="role_description"
                                                       placeholder="role description" class="form-control"
                                                       value="<?php echo $row['role_description']; ?>">
                                            </div>

                                            <?php
                                            if ($action == "delete") {
                                                echo "<input type=\"hidden\" id=\"action\" name=\"action\" value=\"delete\"/>";
                                                echo "<button type=\"submit\" class=\"btn btn-md btn-danger btn-sign-in\" data-loading-text=\"Loading...\">Delete</button>	";
                                            } else {
                                                echo "<input type=\"hidden\" id=\"action\" name=\"action\" value=\"save\"/>";
                                                echo "<button type=\"submit\" class=\"btn btn-md btn-primary btn-sign-in\" data-loading-text=\"Loading...\">Save</button>";
                                            }
                                            ?>

                                    </form>
                                    <br/>
                                    <div class="messagebox">
                                        <div id="alert-message" class="alert-info"></div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>


                        </div>
                    </div>

                </div>
            </div>
        </div>
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

<!-- DataTables JavaScript -->
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTable1').DataTable({
            responsive: true
        });

        $("#user_info").submit(function () {
            var data1 = $('#user_info').serialize();
            $.ajax({
                type: "POST",
                url: "admin_role_save.php",
                data: data1,
                success: function (msg) {
                    console.log(msg);
                    $('.messagebox').hide();
                    $('#alert-message').html(msg);
                    $('.messagebox').slideDown('slow');
                }
            });

            return false;
        });

    });
</script>

</body>

</html>
