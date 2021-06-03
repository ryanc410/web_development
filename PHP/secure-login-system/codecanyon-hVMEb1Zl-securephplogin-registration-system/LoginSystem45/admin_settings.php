<?php include_once('inc/admin_header.php'); ?>
<body>
<?php
$selectall = "select * from admin_settings LIMIT 1";
$result = mysqli_query($con, $selectall);
if ($result) { //table exists
    $db_field = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);

    if ($count == 0) {  //new table not configured. copy the setting from db.php to admin_settings table
        $insert_sql = "insert into admin_settings(admin_configured,admin_logotxt,admin_email_from,admin_userid,admin_password,admin_site_url,admin_twitter_enable,admin_twitter_consumer_key,admin_twitter_consumer_secret,admin_google_enable,admin_google_client_id,admin_google_email,admin_google_clientsecret,admin_google_apikeys,admin_facebook_enable,admin_facebook_appid,admin_facebook_secret) values(1,'$logotxt','$from_address','$admin_user','$admin_password','$url',1,'" . CONSUMER_KEY . "','" . CONSUMER_SECRET . "',1,'$Clientid','$Email_address','$Client_secret','$apikeys',1,'$fbappid','$fbsecret')";
        //	echo $insert_sql;  || !$db_field['admin_configured']
        if (!mysqli_query($con, $insert_sql)) {
            die('Error: ' . mysqli_error($con));
        } else {
            $fileContent = file_get_contents('db.php');
            $txt = "\n" . "<? \$configured=TRUE; // set false to read from db.php and TRUE to read from admin_settings table ?>" . "\n";
            file_put_contents('db.php', $fileContent . $txt);
            $selectall = "select * from admin_settings LIMIT 1";
            $result = mysqli_query($con, $selectall);
            $db_field = mysqli_fetch_assoc($result);

        }
    } else {  //table exists.

    }
} else {
    echo '<a class="btn btn-danger" href="' . $url . "/install_create_tables.php" . "\">Click to create settings table</a>";
}

?>
<div id="wrapper">
    <!-- Navigation -->
    <?php include_once('inc/admin_nav.php'); ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Settings</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Basic settings
                            </div>
                            <div class="panel-body">
                                <form id="change_settings">
                                    <div class="form-group">
                                        <label>Logo Text</label>
                                        <input type="text" id="logotxt" class="form-control" name="logotxt"
                                               placeholder="Logo Text" value=<?php echo $db_field['admin_logotxt']; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label>From email address</label>
                                        <input type="text" id="admin_email_from" name="admin_email_from"
                                               placeholder="Email" class="form-control"
                                               value=<?php echo $db_field['admin_email_from']; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label>Admin user id</label>
                                        <input type="text" id="admin_userid" name="admin_userid"
                                               placeholder="Admin user id" class="form-control"
                                               value=<?php echo $db_field['admin_userid']; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label>Admin password</label>
                                        <input type="text" id="admin_password" name="admin_password"
                                               placeholder="Admin password" class="form-control"
                                               value=<?php echo $db_field['admin_password']; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label>Site URL</label>
                                        <input type="text" id="admin_site_url" name="admin_site_url"
                                               placeholder="Site URL" class="form-control"
                                               value=<?php echo $db_field['admin_site_url']; ?>>
                                    </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Facebook button settings
                            </div>
                            <div class="panel-body">
                                <fieldset>
                                    <div class="form-group">
                                        <label>Enable Facebook?</label>
                                        <select class="form-control" name="admin_facebook_enable">
                                            <option value="1" <?php if ($db_field['admin_facebook_enable']) echo "selected"; ?>>
                                                Yes
                                            </option>
                                            <option value="0" <?php if (!$db_field['admin_facebook_enable']) echo "selected"; ?>>
                                                No
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>App ID</label>
                                        <input type="text" id="admin_facebook_appid" name="admin_facebook_appid"
                                               placeholder="Facebook App ID" class="form-control"
                                               value=<?php echo $db_field['admin_facebook_appid']; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label>App secret</label>
                                        <input type="text" id="admin_facebook_secret" name="admin_facebook_secret"
                                               placeholder="Facebook  app secret" class="form-control"
                                               value=<?php echo $db_field['admin_facebook_secret']; ?>>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Twitter button settings
                            </div>
                            <div class="panel-body">
                                <fieldset>
                                    <div class="form-group">
                                        <label>Enable Twitter?</label>
                                        <select class="form-control" name="admin_twitter_enable">
                                            <option value="1" <?php if ($db_field['admin_twitter_enable']) echo "selected"; ?>>
                                                Yes
                                            </option>
                                            <option value="0" <?php if (!$db_field['admin_twitter_enable']) echo "selected"; ?>>
                                                No
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Consumer key</label>
                                        <input type="text" id="admin_twitter_consumer_key"
                                               name="admin_twitter_consumer_key" placeholder="Twitter Consumer key"
                                               class="form-control"
                                               value=<?php echo $db_field['admin_twitter_consumer_key']; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label>Consumer secret</label>
                                        <input type="text" id="admin_twitter_consumer_secret"
                                               name="admin_twitter_consumer_secret"
                                               placeholder="Twitter  Consumer secret" class="form-control"
                                               value=<?php echo $db_field['admin_twitter_consumer_secret']; ?>>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Google button settings
                            </div>
                            <div class="panel-body">
                                <fieldset>
                                    <div class="form-group">
                                        <label>Enable Google?</label>
                                        <select class="form-control" name="admin_google_enable">
                                            <option value="1" <?php if ($db_field['admin_google_enable']) echo "selected"; ?>>
                                                Yes
                                            </option>
                                            <option value="0" <?php if (!$db_field['admin_google_enable']) echo "selected"; ?>>
                                                No
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>App ID</label>
                                        <input type="text" id="admin_google_client_id" name="admin_google_client_id"
                                               placeholder="Google client ID" class="form-control"
                                               value=<?php echo $db_field['admin_google_client_id']; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label>Google Email</label>
                                        <input type="text" id="admin_google_email" name="admin_google_email"
                                               placeholder="Google Email ID" class="form-control"
                                               value=<?php echo $db_field['admin_google_email']; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label>Client secret</label>
                                        <input type="text" id="admin_google_clientsecret"
                                               name="admin_google_clientsecret" placeholder="Google client secret"
                                               class="form-control"
                                               value=<?php echo $db_field['admin_google_clientsecret']; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label>Google API keys</label>
                                        <input type="text" id="admin_google_apikeys" name="admin_google_apikeys"
                                               placeholder="Google Api key" class="form-control"
                                               value=<?php echo $db_field['admin_google_apikeys']; ?>>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-default">Save settings</button>
                <div class="messagebox">
                    <div id="alert-message"></div>
                </div>
                </form>
                <!-- /.panel -->
                <br/>
                <br/><br/>
                <!-- /.col-lg-12 -->
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
        <script>
            $(document).ready(function () {

                $("#change_settings").submit(function () {
                    var data1 = $('#change_settings').serialize();
                    $.ajax({
                        type: "POST",
                        url: "admin_settings_save.php",
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