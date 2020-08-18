
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">AUS VINTAGE CLOTHING</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Top Navigation: Left Menu -->
        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="index.php"><i class="fa fa-home fa-fw"></i> Website</a></li>
        </ul>

        <!-- Top Navigation: Right Menu -->
        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown navbar-inverse">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                    <!-- Notifications generated via php -->
                </ul>
            </li>




            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i><?php
                            if($_SESSION['admin-username']){
                              echo $_SESSION['admin-username'];
                            }else {
                              echo "Anonymous";
                            }



                    ?> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="php/logout-admin.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- Sidebar -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">

                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                        </div>
                    </li>
                    <!-- Dashboard -->
                    <li>
                        <a href="admin.php" class="<?php if ($selected == 'dashboard') echo 'active'; ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>



                    <!-- Staff Management -->
                    <li>
                        <a href="#"><i class="fa fa-user fa-fw"></i> Staff Management<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="staff_register.php">Register</a>
                            </li>
                            <li>
                                <a href="staff_manage.php">Manage</a>
                            </li>

                        </ul>
                    </li>

                    <!-- Inventory Management -->
                    <li>
                        <a href="#" class="<?php if ($selected == 'inventory') echo 'active'; ?>"><i class="fa fa-shopping-cart fa-fw"></i> Inventory Management<span class="fa arrow"></span></a>
                          <!--<a href="#" class="<?php //if ($selected == 'inventory') echo 'active'; ?>"><i class="fa fa-shopping-cart fa-fw"></i> Inventory Management<span class="fa arrow"></span></a>-->
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="add_product.php">Add Product</a>
                            </li>
                            <li>
                                <a href="manage_product.php">Manage Product</a>
                            </li>

                        </ul>
                    </li>

                    <!-- Transaction -->
                    <li>
                        <a href="view_orders.php" class="<?php if ($selected == 'order') echo 'active'; ?>"><i class="fa fa-dollar fa-fw"></i> Orders</a>

                    </li>





                </ul>

            </div>
        </div>
    </nav>



    <script>
        function select_branch($branch_name){

            document.cookie = "branch_selected" + "=" + $branch_name ;
            location.reload();

        }
    </script>
