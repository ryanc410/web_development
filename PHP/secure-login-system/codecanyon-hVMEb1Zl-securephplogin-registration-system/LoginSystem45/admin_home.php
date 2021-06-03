<?php include_once('inc/admin_header.php'); ?>

<body>

<?php

$selectall = "select id from " . $table_name . " union all select id from " . $table_name_social;
$result = mysqli_query($con, $selectall);
$totalcount = mysqli_num_rows($result);

$selecttwitter = "select * from " . $table_name_social . " where source='twitter'";
$result = mysqli_query($con, $selecttwitter);
$twittercount = mysqli_num_rows($result);

$selectfb = "select * from " . $table_name_social . " where source='facebook'";
$result = mysqli_query($con, $selectfb);
$fbcount = mysqli_num_rows($result);

$selectgoogle = "select * from " . $table_name_social . " where source='google'";
$result = mysqli_query($con, $selectgoogle);
$googlecount = mysqli_num_rows($result);

$selectemail = "select * from " . $table_name;
$result = mysqli_query($con, $selectemail);
$emailcount = mysqli_num_rows($result);

$selectactive = "select id from " . $table_name . " where activ_status='1' union all select id from " . $table_name_social;
$result = mysqli_query($con, $selectactive);
$activecount = mysqli_num_rows($result);

$selectinactive = "select id from " . $table_name . " where activ_status='0'";
$result = mysqli_query($con, $selectinactive);
$inactivecount = mysqli_num_rows($result);

?>

<div id="wrapper">

    <!-- Navigation -->

    <?php include_once('inc/admin_nav.php'); ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-3 col-md-6  col-xs-9">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-envelope fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php if ($emailcount > 0) echo $emailcount; else echo 0; ?></div>
                                <div>Email Users</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6  col-xs-9">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-facebook fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php if ($fbcount > 0) echo $fbcount; else echo 0; ?></div>
                                <div>Facebook Users</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-xs-9">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-twitter fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php if ($twittercount > 0) echo $twittercount; else echo 0; ?></div>
                                <div>Twitter users</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6  col-xs-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-google fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php if ($googlecount > 0) echo $googlecount; else echo 0; ?></div>
                                <div>Google+ users</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i> Stats

                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div id="morris-area-chart"></div>
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

</body>

</html>
