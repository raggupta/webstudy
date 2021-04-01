    <header id="header" class="header-size-sm" data-sticky-shrink="false">
        <div class="container">
            <div class="header-row">

                <nav class="navbar navbar-expand-lg p-0 m-0 w-100">
                    <div id="logo">
                        <a href="<?php echo WEB_DOMAIN_NAME; ?>" class="standard-logo">
                            <img src="dist/img/output-onlinepngtools.png" alt="<?php echo WEB_HEADER_NAME; ?>">
                        </a>
                        <a href="<?php echo WEB_DOMAIN_NAME; ?>" class="retina-logo">
                            <img src="dist/img/output-onlinepngtools.png" alt="<?php echo WEB_HEADER_NAME; ?>">
                        </a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-line-menu"></span>
                    </button>
                    <div class="collapse navbar-collapse align-items-end" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="<?= WEB_DOMAIN_NAME; ?>">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="instructor" class="nav-link">Instructors</a>
                            </li>
                            <li class="nav-item">
                                <a href="events" class="nav-link">Events</a>
                            </li>
                            <li class="nav-item">
                                <a href="about" class="nav-link">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="contact-us" class="nav-link">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </nav>

            </div>
        </div>

        <div id="header-wrap" class="bg-light">
            <div class="container">
                <div class="header-row flex-row-reverse flex-lg-row justify-content-between">

                    <div class="header-misc">


                        <div class="header-buttons mr-3">

                            <?php
                            if (isset($_COOKIE['sid'])) { ?>
                                <a href="logout" class="button button-rounded button-border button-small m-0">Logout</a>
                            <?php    } else { ?>

                                <a href="signin" class="button button-rounded button-border button-small m-0">Log In</a>
                                <a href="signup" class="button button-rounded button-small m-0 ml-2">Sign Up</a>
                            <?php
                            }
                            ?>


                        </div>

                        <!-- Top Search -->
                        <div id="top-search" class="header-misc-icon">
                            <a href="#" id="top-search-trigger"><i class="icon-line-search"></i><i class="icon-line-cross"></i></a>
                        </div>
                        <!-- #top-search end -->



                    </div>

                    <div id="primary-menu-trigger">
                        <svg class="svg-trigger" viewBox="0 0 100 100">
                            <path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path>
                            <path d="m 30,50 h 40"></path>
                            <path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path>
                        </svg>
                    </div>

                    <!-- Primary Navigation -->
                    <nav class="primary-menu with-arrows">

                        <ul class="menu-container">
                            <li class="menu-item"><a class="menu-link" href="#" class="pl-0">
                                    <div><i class="icon-line-grid"></i>All Categories</div>
                                </a>
                                <ul class="sub-menu-container">
                                    <?php
                                    $sql = "Select * from category ";
                                    $row = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($row) > 0) {
                                        while ($res = mysqli_fetch_assoc($row)) {

                                    ?>
                                            <li class="menu-item"><a class="menu-link" href="master/<?php echo $res['slug']; ?>">
                                                    <div>
                                                        <?php echo $res['name']; ?></div>
                                                </a>
                                            </li>
                                    <?php }
                                    } ?>
                                </ul>
                            </li>
                        </ul>

                    </nav>
                    <!-- #primary-menu end -->

                    <form class="top-search-form" action="search.html" method="get">
                        <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter.." autocomplete="off">
                    </form>

                </div>
            </div>
        </div>
        <div class="header-wrap-clone"></div>
    </header>