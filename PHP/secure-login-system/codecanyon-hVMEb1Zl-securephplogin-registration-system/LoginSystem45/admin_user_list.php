<?php include_once('inc/admin_header.php'); ?>

<body>

<div id="wrapper">

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
                            User list
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-hover" id="dataTable1">
                                <thead>
                                <tr>
                                    <th>UserName</th>
                                    <th>Activation Status</th>
                                    <th>Source</th>
                                    <th>Role</th>
                                    <th>Edit</th>
                                </thead>

                                <?php
                                $pg = 10; //users per page
                                $query = "SELECT username FROM " . $table_name . " UNION ALL SELECT username FROM " . $table_name_social;
                                $result = mysqli_query($con, $query) or die('error');
                                $num_rows = mysqli_num_rows($result);

                                // echo $num_rows;
                                // check if user exist already
                                // $query="select * from ".$table_name;

                                if (isset($_GET["page"])) {
                                    $page = htmlspecialchars($_GET["page"], ENT_COMPAT);
                                } else {
                                    $page = 1;
                                };
                                $start_from = ($page - 1) * $pg;

                                // $query = "SELECT username,email, case when activ_status='0' then 'Not Activated' when activ_status='1' then 'activated' end as activ_status,  'email' as source FROM " . $table_name . " UNION ALL SELECT username,email,  'activated', source FROM " . $table_name_social." order by username desc  LIMIT ".$start_from.", ".$pg;

                                $query = "SELECT username, case when activ_status='0' then 'Not Activated' when activ_status='1' then 'activated' when activ_status='2' then 'reset' end as activ_status,  'email' as source FROM " . $table_name . " UNION ALL SELECT username,  'activated', source FROM " . $table_name_social . " order by username";
                                $query = "select u.username,u.email,'email' as source,case when u.activ_status='0' then 'Not Activated' when u.activ_status='1' then 'activated' when u.activ_status='2' then 'reset' end as 'activ_status', ur.role_description from " . $table_name . " as u ," . $table_name_role . " as ur where u.role=ur.role_id";
                                $query = $query . " union select us.username,us.email,us.source,'activated' as activ_status,ur.role_description from " . $table_name_social . " as us ," . $table_name_role . " as ur where us.role=ur.role_id";

                                // $query="select username, case when activ_status='0' then 'Not Activated' when activ_status='1' then 'activated' when activ_status='2' then 'reset' end as activ_status,  'email' as source FROM " . $table_name ." where activ_status ='2' order by username desc";
                               // echo $query;

                                $result = mysqli_query($con, $query) or die('error');
                                $count = ($pg * ($page - 1)) + 1;

                                if (mysqli_num_rows($result)) //if exist then check for password

                                {
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<tr ondblclick=\"window.document.location='admin_user_info.php?rq=" . $row['username'] . "';\"";
                                        if ($row['activ_status'] == "Not Activated") {
                                            echo " class=\"danger\">";
                                        }

                                        if ($row['activ_status'] == "activated") {
                                            echo " class=\"success\">";
                                        }

                                        if ($row['activ_status'] == "reset") {
                                            echo " class=\"info\">";
                                        }

                                        echo "<td>" . $row['username'] . "</td>";
                                        echo "<td>" . $row['activ_status'] . "</td>";
                                        echo "<td> <span ";
                                        if ($row['source'] == 'Twitter') {
                                            echo "class=\"label label-info\"";
                                        } elseif ($row['source'] == 'facebook') {
                                            echo "class=\"label label-primary\"";
                                        } elseif ($row['source'] == 'Google') {
                                            echo "class=\"label label-danger\"";
                                        } else {
                                            echo "class=\"label label-default\"";
                                        }

                                        echo ">" . $row['source'] . " </span></td>";
                                        echo "<td>" . $row['role_description'] . "</td><td><a href=\"admin_user_info.php?rq=" . $row['username'] . "\" class=\"btn btn-sm btn-primary btn-sign-in\" data-loading-text=\"Loading...\">Edit</a></td></tr>";
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
    });
</script>

</body>

</html>
