 <!-- Start Header -->
 <header class="main-header header-style-1 font-heading">
        <div class="header-top">
            <div class="container">
                <div class="row pt-20 pb-20">
                    <div class="col-md-3 col-xs-6">
                        <a href="index.html"><img class="logo" src="assets/imgs/theme/logo.png" alt=""></a>
                    </div>
                    <div class="col-md-9 col-xs-6 text-right header-top-right ">

                        <ul class="list-inline nav-topbar d-none d-md-inline">
                            <li class="list-inline-item menu-item-has-children"><a href="#">My Account</a>
                                <ul class="sub-menu font-small">
                                <li><a href="page-login.html">Login</a></li>
                                <li><a href="page-register.html">Register</a></li>
                                    
                                    <li class="menu-item-has-children"><a href="#">Single post</a>
                                        <ul class="sub-menu font-small">
                                            <li><a href="single.html">Default</a></li>
                                            <li><a href="single-2.html">Big image</a></li>
                                            <li><a href="single-3.html">Left image</a></li>
                                            <li><a href="single-4.html">With sidebar</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            
                        </ul>
                        <span class="vertical-divider mr-20 ml-20 d-none d-md-inline"></span>
                        <button class="search-icon d-none d-md-inline"><span class="mr-15 text-muted font-small"><i class="elegant-icon icon_search mr-5"></i>Search</span></button>
                        <a href="#" class="btn btn-radius bg-primary text-white ml-15 font-small box-shadow">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-sticky">
            <div class="container align-self-center">
                <div class="mobile_menu d-lg-none d-block"></div>
                <div class="main-nav d-none d-lg-block float-left">
                    <nav>
                        <!--Desktop menu-->
                        <ul class="main-menu d-none d-lg-inline font-small">
                            <li> <a href="home">Home</a> </li>
                            
                            <?php 
                                $app = runQuery("SELECT * FROM dcategory ORDER BY dcategory ASC LIMIT 7");
                                if($app->num_rows>0){
                                    while($apps = fetchAssoc($app)):
                                        $catId = $apps['cid'];
                            ?>

                            <li class="menu-item-has-children">
                                <a href="#category"> <?php echo $apps['dcategory']; ?> </a>
                                <ul class="sub-menu text-muted font-small">
                                <?php $sub = runQuery("SELECT * FROM dsub_cat WHERE dcategory_id='$catId' ORDER BY dsub_cat ASC");
                                if($sub->num_rows>0){
                                    while($rod=fetchAssoc($sub)):?>
                                    <li><a href="#"><?php echo $rod['dsub_cat']; ?></a></li>
                                    <?php endwhile; } ?>
                                </ul>
                            </li>
                            <?php endwhile; } ?>

                            <!-- <li class="menu-item-has-children">
                                <a href="index.html"> Writers</a>
                                <ul class="sub-menu text-muted font-small">
                                    <li><a href="index.html">Home default</a></li>
                                    <li><a href="home-2.html">Homepage 2</a></li>
                                    <li><a href="home-3.html">Homepage 3</a></li>
                                </ul>
                            </li>

                            <li> <a href="posdcast">Podcast</a> </li>
                            <li> <a href="events">Events</a> </li> -->
                        </ul>

                        <!--Mobile menu-->
                        <ul id="mobile-menu" class="d-block d-lg-none text-muted">
                            <li> <a href="home">Home</a> </li>
                            

                            <li class="menu-item-has-children">
                                <a href="index.html"> Topics</a>
                                <ul class="sub-menu text-muted font-small">
                                    <li><a href="index.html">Home default</a></li>
                                    <li><a href="home-2.html">Homepage 2</a></li>
                                    <li><a href="home-3.html">Homepage 3</a></li>
                                </ul>
                            </li>

                            <li class="menu-item-has-children">
                                <a href="index.html"> Writers</a>
                                <ul class="sub-menu text-muted font-small">
                                    <li><a href="index.html">Home default</a></li>
                                    <li><a href="home-2.html">Homepage 2</a></li>
                                    <li><a href="home-3.html">Homepage 3</a></li>
                                </ul>
                            </li>

                            <li> <a href="posdcast">Podcast</a> </li>
                            <li> <a href="events">Events</a> </li>
                        </ul>
                    </nav>
                </div>
                <div class="float-right header-tools text-muted font-small">
                    <ul class="header-social-network d-inline-block list-inline mr-15">
                        <li class="list-inline-item"><a class="social-icon fb text-xs-center" target="_blank" href="#"><i class="elegant-icon social_facebook"></i></a></li>
                        <li class="list-inline-item"><a class="social-icon tw text-xs-center" target="_blank" href="#"><i class="elegant-icon social_twitter "></i></a></li>
                        <li class="list-inline-item"><a class="social-icon pt text-xs-center" target="_blank" href="#"><i class="elegant-icon social_instagram "></i></a></li>
                    </ul>
                    <!-- <div class="off-canvas-toggle-cover d-inline-block">
                        <div class="off-canvas-toggle hidden d-inline-block" id="off-canvas-toggle">
                            <span></span>
                        </div>
                    </div> -->
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </header>


    