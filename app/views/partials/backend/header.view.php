<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title><?php echo $title; ?></title>
    <link rel="apple-touch-icon" href="/public/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="/public/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/public/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/public/app-assets/vendors/css/ui/prism.min.css">

    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/public/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/public/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/public/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="/public/app-assets/css/components.css">
    <!--    <link rel="stylesheet" type="text/css" href="/public/app-assets/css/themes/dark-layout.css">-->
    <!--    <link rel="stylesheet" type="text/css" href="/public/app-assets/css/themes/semi-dark-layout.css">-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/public/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <!-- BEGIN: Page CSS-->
    <!--    <link rel="stylesheet" type="text/css" href="/public/app-assets/css/core/menu/menu-types/vertical-menu.css">-->
    <!--    <link rel="stylesheet" type="text/css" href="/public/app-assets/css/core/colors/palette-gradient.css">-->
    <!--    <link rel="stylesheet" type="text/css" href="/public/app-assets/css/plugins/file-uploaders/dropzone.css">-->
    <!--    <link rel="stylesheet" type="text/css" href="/public/app-assets/css/pages/data-list-view.css">-->
    <!-- END: Page CSS-->

    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/public/assets/css/style.css">
    <!-- END: Custom CSS-->







</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky fixed-footer  " data-open="click"
    data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                    class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                        class="ficon feather icon-menu"></i></a></li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right">

                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i
                                    class="ficon feather icon-maximize"></i></a></li>

                        <!-- <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-bell"></i><span class="badge badge-pill badge-primary badge-up">5</span></a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <div class="dropdown-header m-0 p-2">
                                    <h3 class="white">5 New</h3><span class="grey darken-2">App Notifications</span>
                                </div>
                            </li>
                            <li class="scrollable-container media-list"> -->
                        <!-- a(href='javascript:void(0)').d-flex.justify-content-between-->
                        <!--   .d-flex.align-items-start-->
                        <!--       i.feather.icon-plus-square-->
                        <!--       .mx-1-->
                        <!--         .font-medium.block.notification-title New Message-->
                        <!--         small Are your going to meet me tonight?-->
                        <!-- small 62 Days ago<a class="d-flex justify-content-between" href="javascript:void(0)">
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left"><i class="feather icon-plus-square font-medium-5 primary"></i></div>
                                        <div class="media-body">
                                            <h6 class="primary media-heading">You have new order!</h6><small class="notification-text"> Are your going to meet me tonight?</small>
                                        </div><small>
                                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">9 hours ago</time></small>
                                    </div> -->
                        <!-- </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left"><i class="feather icon-download-cloud font-medium-5 success"></i></div>
                                        <div class="media-body">
                                            <h6 class="success media-heading red darken-1">99% Server load</h6><small class="notification-text">You got new order of goods.</small>
                                        </div><small>
                                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">5 hour ago</time></small>
                                    </div>
                                </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left"><i class="feather icon-alert-triangle font-medium-5 danger"></i></div>
                                        <div class="media-body">
                                            <h6 class="danger media-heading yellow darken-3">Warning notifixation</h6><small class="notification-text">Server have 99% CPU usage.</small>
                                        </div><small>
                                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Today</time></small>
                                    </div>
                                </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left"><i class="feather icon-check-circle font-medium-5 info"></i></div>
                                        <div class="media-body">
                                            <h6 class="info media-heading">Complete the task</h6><small class="notification-text">Cake sesame snaps cupcake</small>
                                        </div><small>
                                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last week</time></small>
                                    </div>
                                </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left"><i class="feather icon-file font-medium-5 warning"></i></div>
                                        <div class="media-body">
                                            <h6 class="warning media-heading">Generate monthly report</h6><small class="notification-text">Chocolate cake oat cake tiramisu marzipan</small>
                                        </div><small>
                                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last month</time></small>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="javascript:void(0)">Read all notifications</a></li>
                        </ul>
                    </li> -->
                        <li class="dropdown dropdown-user nav-item"><a
                                class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none"><span
                                        class="user-name text-bold-600"><?php echo $_SESSION['name'];?></span><span
                                        class="user-status">Available</span></div><span>
                                        <?php if($_SESSION['avatar'] == ''): ?>
                                    <img class="img-fluid"
                                        src="/public/imgs/avataaars.png"
                                        alt="img placeholder" style="height:40px;width:40px;border-radius:50%;">
                                <?php else: ?>
                                    <img class="img-fluid"
                                        src="/public/imgs/<?php echo $_SESSION['avatar']; ?>"
                                        alt="img placeholder" style="height:40px;width:40px;border-radius:50%;">
                                <?php endif; ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="/profile"><i
                                        class="feather icon-user"></i> Edit Profile</a>

                                <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i
                                        class="feather icon-power"></i>
                                    <form action="/logout" method="post">
                                        <input type="hidden" name="logout" value="logout">
                                        <button type="submit"
                                            style="border:none;background-color: transparent;color:black;button:hover:color:white;button:hover:#7468F0;">LOGOUT</button>
                                    </form>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="#">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0"></h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                            class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i
                            class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block primary"
                            data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item <?php if(is('/dashboard')): ?><?php echo 'active'; ?><?php elseif(is('/officer/dashboard')):?><?php echo 'active'; ?><?php elseif(is('/farmer/dashboard')):?><?php echo 'active'; ?><?php endif;?>">
                    <a href="<?php if(isOfficer()):?><?php echo '/officer/dashboard'; ?><?php elseif(isAdmin()):?><?php echo '/dashboard'; ?><?php elseif(isFarmer()):?><?php echo '/farmer/dashboard'; ?><?php endif;?>"><i
                            class="feather icon-home"></i>
                        <span class="menu-title" data-i18n="Dashboard">DASHBOARD</span>
                        <!-- <span class="badge badge badge-warning badge-pill float-right">2</span> -->
                    </a>
                </li>
                <?php if(isAdmin()): ?>
                <li class=" nav-item <?php echo (is('/users')) ? 'active' : '' ; ?>"><a href="/users"><i
                            class="feather icon-users"></i>
                        <span class="menu-title" data-i18n="Users">USERS</span>
                        <!-- <span class="badge badge badge-warning badge-pill float-right">2</span> -->
                    </a>
                </li>
                <?php endif; ?>
                <?php if(isAdmin() || isOfficer()): ?>
                <li class=" nav-item <?php echo (is('/reports')) ? 'active' : '' ; ?>"><a href="/reports"><i
                            class="feather icon-book-open"></i>
                        <span class="menu-title" data-i18n="Reports">REPORTS</span>
                        <!-- <span class="badge badge badge-warning badge-pill float-right">2</span> -->
                    </a>
                </li>
                <?php endif; ?>
                <?php if(isAdmin() || isOfficer()):?>
                <li class=" nav-item <?php echo (is('/announcements')) ? 'active' : '' ; ?>"><a href="/announcements"><i
                            class="feather icon-volume-1"></i>
                        <span class="menu-title" data-i18n="Reports">ANNOUNCEMENTS</span>
                        <!-- <span class="badge badge badge-warning badge-pill float-right">2</span> -->
                    </a>
                </li>
                <?php endif; ?>
                <li class=" nav-item <?php echo (is('/profile')) ? 'active' : '' ; ?>"><a href="/profile"><i
                            class="feather icon-user-check"></i>
                        <span class="menu-title" data-i18n="Reports">PROFILE</span>
                        <!-- <span class="badge badge badge-warning badge-pill float-right">2</span> -->
                    </a>
                </li>
                <li class="nav-item">
                    <form action="/logout" method="post" class="pr-2">
                        <input type="hidden" name="logout" value="logout">
                        <button type="submit" class="btn "><i class="pr-2 feather icon-power"></i><span class="menu-title" data-i18n="Reports">LOGOUT</span></button>
                    </form>
                </li>
                <!-- <li class=" nav-item"><a href="#"><i class="feather icon-zap"></i><span class="menu-title" data-i18n="Starter kit">Starter kit</span></a>
                <ul class="menu-content">
                    <li><a href="sk-layout-2-columns.html"><i></i><span class="menu-item" data-i18n="2 columns">2 columns</span></a>
                    </li>
                    <li><a href="sk-layout-fixed-navbar.html"><i></i><span class="menu-item" data-i18n="Fixed navbar">Fixed navbar</span></a>
                    </li>
                    <li><a href="sk-layout-floating-navbar.html"><i></i><span class="menu-item" data-i18n="Floating navbar">Floating navbar</span></a>
                    </li>
                    <li class="active"><a href="sk-layout-fixed.html"><i></i><span class="menu-item" data-i18n="Fixed layout">Fixed layout</span></a>
                    </li>
                </ul>
            </li> -->
                <!-- <li class=" nav-item"><a href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/documentation"><i class="feather icon-folder"></i><span class="menu-title" data-i18n="Documentation">Documentation</span></a>
            </li>
            <li class=" nav-item"><a href="https://pixinvent.ticksy.com/"><i class="feather icon-life-buoy"></i><span class="menu-title" data-i18n="Raise Support">Raise Support</span></a>
            </li> -->
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->