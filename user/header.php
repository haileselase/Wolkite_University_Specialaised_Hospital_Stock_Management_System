<!DOCTYPE html>
<html lang="en">
<head>
    <title>WKU Specialised Hospital Stock Management System</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="css/fullcalendar.css"/>
    <link rel="stylesheet" href="css/matrix-style.css"/>
    <link rel="stylesheet" href="css/matrix-media.css"/>
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/jquery.gritter.css"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>


<div id="header">

    <h2 style="color: white;position: absolute">
        <a href="dashboard.html" style="color:white; margin-left: 30px; margin-top: 40px">STOCK</a>
    </h2>
</div>



<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li class="dropdown" id="profile-messages">
            <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i
                    class="icon icon-user"></i> <span class="text">Welcome User</span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
                <li class="divider"></li>
                <li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
            </ul>
        </li>


    </ul>
</div>

<!--sidebar-menu-->
<div id="sidebar">
    <ul>
        <li >
            <a href="dashboard.php"><i class="icon icon-home"></i><span>Dashboard</span></a>
        </li>
        <li class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span>Manage Stock</span> <span
                        class="label label-important">3</span></a>
            <ul>
                <li ><a href="add_stock.php"><i class="icon icon-plus"></i>  Add Stock</a></li>
                <li><a href="search_stock.php"><i class="icon icon-search"></i> Search Stock</a></li>
                <li><a href="update_stock.php"><i class="icon icon-upload"></i> Update Stock</a></li>
            </ul>
        </li>
        <li >
            <a href="request_stock.php"><i class="icon icon-credit-card"></i><span>Request Stock</span></a>
        </li>
        <li >
            <a href="approve_request.php"><i class="icon icon-medkit"></i><span>Approve Request</span></a>
        </li>

        <li class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span>Report</span> <span
                        class="label label-important">3</span></a>
            <ul>
                <li><a href="stock_report.php" ><i class="icon icon-umbrella"></i>Stock Report </a></li>
                <li><a href="inventory_report.php" ><i class="icon icon-inbox"></i>Inventory Report</a></li>
                <li><a href="expired_date.php"><i class="icon icon-move"></i>Expired Report</a></li>
            </ul>
        </li>

    </ul>
</div>
<!--sidebar-menu-->
<div id="search">


    <a href="view_notification.php" /><input type="image" name="notification" src="../image/notification.png" style="border: double;" height="30" width="50"/ >
    <a href="logout.php" style="color:white"><i class="icon icon-share-alt"></i><span>LogOut</span></a>

</div>