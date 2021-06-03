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
                            User details
                        </div>
                        <div class="panel-body">

                            <?php


                            $usr = mysqli_real_escape_string($con, $_GET["rq"]);
                            $usr = htmlspecialchars($usr, ENT_COMPAT);
                            if (!empty($usr)) {


                                //query database to check activation code
                                //$query="select username,email,'email' as source,case when activ_status='0' then 'Not Activated' when activ_status='1' then 'activated' when activ_status='2' then 'reset' end as activ_status from ".$table_name." where username='$usr' union select username,email,source,'activated' as activ_status from ".$table_name_social." where username='$usr'";
                                //$query="select username,email,'email' as source,case when activ_status='0' then 'Not Activated' when activ_status='1' then 'activated' when activ_status='2' then 'reset' end as activ_status from ".$table_name." where username='$usr' union select username,email,source,'activated' as activ_status from ".$table_name_social." where username='$usr'";
                                $query = "select u.username,u.email,'email' as source,case when u.activ_status='0' then 'Not Activated' when u.activ_status='1' then 'Activated' when u.activ_status='2' then 'reset' end as 'activ_status', ur.role_description from " . $table_name . " as u ," . $table_name_role . " as ur where u.username='$usr' and u.role=ur.role_id";
                                $query = $query . " union select us.username,us.email,us.source,'Activated' as activ_status,ur.role_description from " . $table_name_social . " as us ," . $table_name_role . " as ur where us.role=ur.role_id and us.username='$usr'";
                                $result = mysqli_query($con, $query) or die('error');

                                if (mysqli_num_rows($result)) {
                                    $row = mysqli_fetch_array($result);
                                    $this_user_role = $row['role_description'];
                                    ?>

                                    <form id="user_info" method="post">
                                        <div class="form-group">
                                            <label for="exampleInputUsername">Username</label>
                                            <input type="text" id="username" class="form-control" name="username"
                                                   placeholder="Username" value="<?php echo $row['username']; ?>"
                                                   readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail">Email address</label>
                                            <input type="text" id="email" name="email" placeholder="Email"
                                                   class="form-control" value="<?php echo $row['email']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputsource">Source</label>
                                            <input type="text" id="source" name="source" placeholder="Source"
                                                   class="form-control" value="<?php echo $row['source']; ?>" readonly>
                                        </div>
                                        <?php
                                        if ($row['source'] == 'email') {
                                            ?>

                                            <div class="form-group">
                                                <label for="exampleInputactiv">Status</label>
                                                <!--<input type="text" id="status" name="status" placeholder="status" class="form-control" value=<?php echo $row['activ_status']; ?>	>-->
                                                <select class="form-control" name="status" id="status">
                                                    <option value="0" <?php if ($row['activ_status'] == "Not Activated") echo "selected"; ?>>
                                                        Not Activated
                                                    </option>
                                                    <option value="1" <?php if ($row['activ_status'] == "Activated") echo "selected"; ?>>
                                                        Activated
                                                    </option>
                                                </select>

                                            </div>
                                            <?php
                                        }
                                        ?>
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
                                                        if ($row["role_description"] == $this_user_role) {
                                                            echo "selected";
                                                        }
                                                        echo ">"
                                                            . $row["role_description"] . "</option>";
                                                    }
                                                }
                                                ?>


                                            </select>


                                        </div>

                                        <button type="submit"
                                                class="btn btn-md btn-primary btn-sign-in"
                                                data-loading-text="Loading...">Save
                                        </button>

                                    </form>
                                    <br/>
                                    <div class="messagebox">
                                        <div id="alert-message"></div>
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
                url: "admin_user_save.php",
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
