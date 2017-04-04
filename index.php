<?php include 'config/koneksi.php'; ?>
<!DOCTYPE html>
<head>
	<title>Admin Area</title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $site;?>frontend/logo/favicon-16x16.png">
	<link href="<?php echo $site;?>frontend/css/bootstrap.min.css" rel="stylesheet">
</head>
<style type="text/css">
    /*==CUSTOM LOGIN==*/
        .panel-body{
            height: 550px;
        }
        .blog-images{
            background-image: url(frontend/bg/shoe-cleaning-guide-cover.jpg);
            background-repeat: no-repeat;
            background-size: 100%;
        }
        .custon-mid-ico{
            position: relative;
            left: 41px;
            top: 51px;
            box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.15);
            border-radius: 100%
        }
</style>
<body class="blog-images">
    <div class="col-md-3 pull-right">
        <div class="login-panel panel panel-default" style="margin-top:30px;">
            <div class="panel-heading">
                <h3 class="panel-title" style="text-align:center;">Administrator Panels</h3>
            </div>
            <div class="panel-body">
                <form role="form" action="backend/proses_login.php" method="post">
                    <div class="form-group">
                        <input class="form-control" placeholder="Username" autocomplete="off" name="username" type="text" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Password" autocomplete="off" name="password" type="password" required>
                    </div>
                    <div class="form-group">
                        <select name="level_akses" class="form-control" autofocus required="">
                            <option value="">Level Akses</option>
                            <option value="admin">kasir</option>
                            <option value="manajer">manajer</option>
                        </select>
                    </div>
                    <!-- Change this to a button or input when using this as a form -->
                    <input type="submit" value="Login" class="btn btn-lg btn-danger btn-block">
                    <!-- <a href="adminpanel.php" class="btn btn-lg btn-success btn-block">Login</a> -->
                    <div>
                        <img src="<?php echo "frontend/logo/apple-icon-precomposed.png";?>" class="custon-mid-ico">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
