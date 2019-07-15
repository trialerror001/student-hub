<div class="header navbar" style="background-color:#FF6918; width:100%;">
    <div class="header-container"> 
        <ul class="nav-left">
            <li class="dropdown">
                <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
                    <div class="peer mR-10">
                        <img class="w-2r bdrs-50p" src="" alt="">
                    </div>
                    <div class="peer">
                        <span class="fsz-sm c-white"><img src="./assets/assets/static/images/header.png" height="60.em" width="150.em"></span>
                    </div>
                </a>
            </li>
        </ul>

        <ul class="nav-right">
            <li class="dropdown">
                <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
                    <div class="peer mR-10">
                        <img class="w-2r bdrs-50p" src="" alt="">
                    </div>
                    <div class="peer">
                        <span class="fsz-sm c-white">Menu</span>
                    </div>
                </a>

                <ul class="dropdown-menu fsz-sm">

                    <?php
                    if (empty($_SESSION['level'])) {
                        ?>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                    <!--<i class="ti-power-off mR-10"></i> --> 
                                <a href="?page=HomePage"><span>Dashboard</span></a>
                            </a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                    <!--<i class="ti-power-off mR-10"></i>--> 
                                <a href="?page=Login"><span>Login</span></a>
                            </a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                    <!--<i class="ti-power-off mR-10"></i>--> 
                                <a href="?page=Register"><span>Register</span></a>
                            </a>
                        </li>
                        <?php
                    } else if ($_SESSION['level'] == 'admin') {
                        ?>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                    <!--<i class="ti-power-off mR-10"></i> --> 
                                <a href="?page=HomePage"><span>Dashboard</span></a>
                            </a>
                        </li>

                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                    <!--<i class="ti-power-off mR-10"></i> -->
                                <a href="?page=DataRequest"><span>Request</span></a>
                            </a>
                        </li>

                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                    <!--<i class="ti-power-off mR-10"></i> --> 
                                <a href="?page=DataReserved"><span>Reserved</span></a>
                            </a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                    <!--<i class="ti-power-off mR-10"></i>--> 
                                <a href="?page=FormRequest"><span>Room Booking</span></a>
                            </a>
                        </li>

                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                    <!--<i class="ti-power-off mR-10"></i> -->
                                <a href="?page=DataRuangan"><span>Ruangan</span></a>
                            </a>
                        </li>

                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                    <!--<i class="ti-power-off mR-10"></i> -->
                                <a href="?page=FormReport"><span>Report</span></a>
                            </a>
                        </li>

                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                    <!--<i class="ti-power-off mR-10"></i> -->
                                <a href="?page=DataHimpunan"><span>Himpunan</span></a>
                            </a>
                        </li>

                        <!--<li role="separator" class="divider"></li>
                        <li>
                            <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                    <!--<i class="ti-power-off mR-10"></i> 
                                <span>Grafik</span>
                            </a>
                        </li>-->
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                    <!--<i class="ti-power-off mR-10"></i> -->
                                <a href="?page=Logout"><span>Logout</span></a>
                            </a>
                        </li>
                        <?php
                    } else if ($_SESSION['level'] == 'himpunan') {
                        ?>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                    <!--<i class="ti-power-off mR-10"></i>--> 
                                <a href="?page=HomePage"><span>Dashboard</span></a>
                            </a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                    <!--<i class="ti-power-off mR-10"></i>--> 
                                <a href="?page=FormRequest"><span>Room Booking</span></a>
                            </a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                    <!--<i class="ti-power-off mR-10"></i>--> 
                                <a href="?page=DataRequest"><span>Your Request</span></a>
                            </a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                <!--<i class="ti-power-off mR-10"></i>--> 
                                <a href="?page=Logout"><span>Logout</span></a>
                            </a>
                        </li>
                        <?php
                    } else if ($_SESSION['level'] == 'kabid') {
                        ?>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                    <!--<i class="ti-power-off mR-10"></i>--> 
                                <a href="?page=HomePage"><span>Dashboard</span></a>
                            </a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                    <!--<i class="ti-power-off mR-10"></i>--> 
                                <a href="?page=DataRequest"><span>Request</span></a>
                            </a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                <!--<i class="ti-power-off mR-10"></i>--> 
                                <a href="?page=Logout"><span>Logout</span></a>
                            </a>
                        </li>
                        <?php
                    }
                    ?>

                </ul>
                </div>
                </div>