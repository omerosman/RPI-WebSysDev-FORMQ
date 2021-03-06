<?php
if (isset($_SESSION['name'])) {
    if ($_SESSION['name'] != "") {
        $user_name = $_SESSION['name'];
    } else {
        $user_name = 'guest';
    }
} else {
    $user_name = 'guest';
}

?>

<nav id = "admin_nav" class = "navbar navbar-inverse navbar-fixed-top" data-spy="affix">
    <div class = "container-fluid">
        <div class = "navbar-header">
            <a class = "navbar-brand" id = "header" href = "index.php">Form Q</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="font-family: 'Oswald'">
            <ul class = "nav navbar-nav navbar-right">
                <?php if (strlen($user_name) > 0) {
                    echo '<li><a><span class = "glyphicon glyphicon-user"></span>Welcome, '.$user_name.'</a></li>';
                    if ($user_role == 1 || $user_role == 2) {
                        echo '<li><a href = "search.php"><span class = "glyphicon glyphicon-search">Search</span></a></li>';
                        echo '<li><a href = "profile.php"><span>Profile</span></a></li>';
                        echo '<li><a href = "user_dashboard.php"><span>Dashboard</span></a></li>';
                        if ($user_role == 1) {
                            echo '<li><a href = "admin_dashboard.php"><span>Admin Dashboard<!--  ONLY ADMINS --></span></a></li>';
                        }
                        echo '<li><a href = "api/logout.php"><span class = "glyphicon glyphicon-log-out"></span>Logout</a></li>';
                    }
                }
                $uri = $_SERVER["PHP_SELF"] ;
                $page_user_or_admin = substr($uri,strrpos($uri, '/')+1,-14);
                if ($page_user_or_admin == "admin") {
                    if ($user_role != 1) {
                        header("Location: user_dashboard.php");
                    }
                }
                if ($page_user_or_admin == "user") {
                    // if ($user_role == 1) {
                    //     echo '<li><a href = "admin_dashboard.php"><span>Admin Dashboard<!--  ONLY ADMINS --></span></a></li>';
                    // } elseif ($user_role == 2) {
                    //     echo '<li><a href = "search.php"><span class = "glyphicon glyphicon-search">Search</span></a></li>';
                    // }
                // echo '<li><a href = "user_dashboard.php"><span>User Dashboard</span></a></li>';
//                  echo '<li><a href = "search.php"><span class = "glyphicon glyphicon-search">Search</span></a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
