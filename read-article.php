<?php include 'head.php'; ?>

<body>
    <div class="scroll-progress primary-bg"></div>
   
   
<?php include 'aside-right.php'; ?>
<?php include 'header.php'; ?>
<?php include 'search.php'; ?>
<?php 
    $pid = $conn->real_escape_string($_GET['post']);
    $post = runQuery("SELECT * FROM dpost WHERE pid='$pid'");

    if($post->num_rows>0){
        $posts = fetchAssoc($post);
    
    ?>
    <!-- Start Main content -->
    <main class="bg-grey pt-50 pb-50">
        <div class="pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="single-content2">
                            <div class="entry-header entry-header-style-1 mb-50">
                                <h1 class="entry-title mb-30 font-weight-900"> <?php echo $posts['dtitle'] ?> </h1>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="entry-meta align-items-center meta-2 font-small color-muted">
                                            <p class="mb-5">
                                                By <a href="#author"><span class="author-name font-weight-bold"><?php echo $posts['dname'] ?></span></a>
                                            </p>
                                            <span class="mr-10"> <?php echo date("d M Y", strtotime($posts['ddate'])) ?> </span>
                                            <?php echo totalPostViews($posts['pid']) ?>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!--end single header-->
                            <figure class="image mb-30 m-auto text-center border-radius-10">
                                <img class="border-radius-10" src="cover/<?php echo $posts['dimg'] ?>.jpg" alt="post-title">
                            </figure>
                            <!--figure-->
                            <article class="entry-wraper mb-50">
                               
                                <div class="entry-main-content dropcap wow fadeIn animated">
                                <?php echo $posts['ddesc'] ?>
                                   
                                </div>

                                
                                
                                <!--related posts-->
                                <div class="related-posts">
                                    <div class="post-module-3">
                                        <div class="widget-header-2 position-relative mb-30">
                                            <h5 class="mt-5 mb-30">Related posts</h5>
                                        </div>
                                        <div class="loop-list loop-list-style-1">
                                            
                                        <?php 
                                        $lat = runQuery("SELECT * FROM dpost WHERE pid !='$pid' AND dtype !='feature' AND dstatus='active' ORDER BY RAND() LIMIT 5");
                                        if($lat->num_rows>0){
                                            while($lats=fetchAssoc($lat)){
                                        ?>
                                            <article class="hover-up-2 transition-normal wow fadeInUp animated">
                                                <div class="row mb-40 list-style-2">
                                                    <div class="col-md-4">
                                                        <div class="post-thumb position-relative border-radius-5">
                                                            <div class="img-hover-slide border-radius-5 position-relative" style="background-image: url(cover/<?php echo $lats['dimg'] ?>.jpg)">
                                                                <a class="img-link" href="read-article?post=<?php echo $lats['pid'] ?>"></a>
                                                            </div>                                               
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 align-self-center">
                                                        <div class="post-content">
                                                            <div class="entry-meta meta-0 font-small mb-10">
                                                                <a href="read-article?post=<?php echo $lats['pid'] ?>"><span class="post-cat text-primary"><?php echo $lats['dcategory'] ?></span></a>
                                                            </div>
                                                            <h5 class="post-title font-weight-900 mb-20">
                                                                <a href="read-article?post=<?php echo $lats['pid'] ?>"><?php echo limitText($lats['dtitle'],10) ?></a>
                                                                <span class="post-format-icon"><i class="elegant-icon icon_star_alt"></i></span>
                                                            </h5>
                                                            <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                            <span class="post-on"><?php echo date("d M", strtotime($lats['ddate'])) ?></span>
                                                            <?php echo totalPostViews($lats['pid']) ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>

                                            <?php } } ?>
                                           
                                           
                                        </div>
                                    </div>
                                </div>
                                <!--More posts-->
                                
                                
                               
                               
                            </article>
                        </div>
                    </div>
                    <div class="col-lg-4 primary-sidebar sticky-sidebar">
                        <div class="widget-area">
                            <div class="sidebar-widget widget-about mb-50 pt-30 pr-30 pb-30 pl-30 bg-white border-radius-5 has-border  wow fadeInUp animated">
                                <img class="about-author-img mb-25" src="assets/imgs/authors/author.jpg" alt="">
                                <h5 class="mb-20">Hello, I'm Steven</h5>
                                <p class="font-medium text-muted">Hi, I’m Stenven, a Florida native, who left my career in corporate wealth management six years ago to embark on a summer of soul searching that would change the course of my life forever.</p>
                                <strong>Follow me: </strong>
                                <ul class="header-social-network d-inline-block list-inline color-white mb-20">
                                    <li class="list-inline-item"><a class="fb" href="#" target="_blank" title="Facebook"><i class="elegant-icon social_facebook"></i></a></li>
                                    <li class="list-inline-item"><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                    <li class="list-inline-item"><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                                </ul>
                            </div>
                            <div class="sidebar-widget widget-latest-posts mb-50 wow fadeInUp animated">
                                <div class="widget-header-1 position-relative mb-30">
                                    <h5 class="mt-5 mb-30">Most popular</h5>
                                </div>
                                <div class="post-block-list post-module-1">
                                    <ul class="list-post">
                                        <li class="mb-30 wow fadeInUp animated">
                                            <div class="d-flex bg-white has-border p-25 hover-up transition-normal border-radius-5">
                                                <div class="post-content media-body">
                                                    <h6 class="post-title mb-15 text-limit-2-row font-medium"><a href="single.html">Spending Some Quality Time with Kids? It’s Possible</a></h6>
                                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                        <span class="post-on">05 August</span>
                                                        <span class="post-by has-dot">150 views</span>
                                                    </div>
                                                </div>
                                                <div class="post-thumb post-thumb-80 d-flex ml-15 border-radius-5 img-hover-scale overflow-hidden">
                                                    <a class="color-white" href="single.html">
                                                        <img src="assets/imgs/news/thumb-6.jpg" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mb-30 wow fadeInUp animated">
                                            <div class="d-flex bg-white has-border p-25 hover-up transition-normal border-radius-5">
                                                <div class="post-content media-body">
                                                    <h6 class="post-title mb-15 text-limit-2-row font-medium"><a href="single.html">Relationship Podcasts are Having “That” Talk</a></h6>
                                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                        <span class="post-on">12 August</span>
                                                        <span class="post-by has-dot">6k views</span>
                                                    </div>
                                                </div>
                                                <div class="post-thumb post-thumb-80 d-flex ml-15 border-radius-5 img-hover-scale overflow-hidden">
                                                    <a class="color-white" href="single.html">
                                                        <img src="assets/imgs/news/thumb-7.jpg" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mb-30 wow fadeInUp animated">
                                            <div class="d-flex bg-white has-border p-25 hover-up transition-normal border-radius-5">
                                                <div class="post-content media-body">
                                                    <h6 class="post-title mb-15 text-limit-2-row font-medium"><a href="single.html">Here’s How to Get the Best Sleep at Night</a></h6>
                                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                        <span class="post-on">15 August</span>
                                                        <span class="post-by has-dot">16k views</span>
                                                    </div>
                                                </div>
                                                <div class="post-thumb post-thumb-80 d-flex ml-15 border-radius-5 img-hover-scale overflow-hidden">
                                                    <a class="color-white" href="single.html">
                                                        <img src="assets/imgs/news/thumb-2.jpg" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class=" wow fadeInUp animated">
                                            <div class="d-flex bg-white has-border p-25 hover-up transition-normal border-radius-5">
                                                <div class="post-content media-body">
                                                    <h6 class="post-title mb-15 text-limit-2-row font-medium"><a href="single.html">America’s Governors Get Tested for a Virus That Is Testing Them</a></h6>
                                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                        <span class="post-on">12 August</span>
                                                        <span class="post-by has-dot">3k views</span>
                                                    </div>
                                                </div>
                                                <div class="post-thumb post-thumb-80 d-flex ml-15 border-radius-5 img-hover-scale overflow-hidden">
                                                    <a class="color-white" href="single.html">
                                                        <img src="assets/imgs/news/thumb-3.jpg" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-widget widget-latest-posts mb-50 wow fadeInUp animated">
                                <div class="widget-header-1 position-relative mb-30">
                                    <h5 class="mt-5 mb-30">Last comments</h5>
                                </div>
                                <div class="post-block-list post-module-2">
                                    <ul class="list-post">
                                        <li class="mb-30 wow fadeInUp animated">
                                            <div class="d-flex bg-white has-border p-25 hover-up transition-normal border-radius-5">
                                                <div class="post-thumb post-thumb-64 d-flex mr-15 border-radius-5 img-hover-scale overflow-hidden">
                                                    <a class="color-white" href="single.html">
                                                        <img src="assets/imgs/authors/author-2.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-content media-body">
                                                    <p class="mb-10"><a href="author.html"><strong>David</strong></a>
                                                        <span class="ml-15 font-small text-muted has-dot">16 Jan 2020</span>
                                                    </p>
                                                    <p class="text-muted font-small">A writer is someone for whom writing is more difficult than...</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mb-30 wow fadeInUp animated">
                                            <div class="d-flex bg-white has-border p-25 hover-up transition-normal border-radius-5">
                                                <div class="post-thumb post-thumb-64 d-flex mr-15 border-radius-5 img-hover-scale overflow-hidden">
                                                    <a class="color-white" href="single.html">
                                                        <img src="assets/imgs/authors/author-3.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-content media-body">
                                                    <p class="mb-10"><a href="author.html"><strong>Kokawa</strong></a>
                                                        <span class="ml-15 font-small text-muted has-dot">12 Feb 2020</span>
                                                    </p>
                                                    <p class="text-muted font-small">Striking pewter studded epaulettes silver zips</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="wow fadeInUp animated">
                                            <div class="d-flex bg-white has-border p-25 hover-up transition-normal border-radius-5">
                                                <div class="post-thumb post-thumb-64 d-flex mr-15 border-radius-5 img-hover-scale overflow-hidden">
                                                    <a class="color-white" href="single.html">
                                                        <img src="assets/imgs/news/thumb-1.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-content media-body">
                                                    <p class="mb-10"><a href="author.html"><strong>Tsukasi</strong></a>
                                                        <span class="ml-15 font-small text-muted has-dot">18 May 2020</span>
                                                    </p>
                                                    <p class="text-muted font-small">Workwear bow detailing a slingback buckle strap</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-widget widget_instagram wow fadeInUp animated">
                                <div class="widget-header-1 position-relative mb-30">
                                    <h5 class="mt-5 mb-30">Instagram</h5>
                                </div>
                                <div class="instagram-gellay">
                                    <ul class="insta-feed">
                                        <li>
                                            <a href="assets/imgs/thumbnail-3.jpg" class="play-video" data-animate="zoomIn" data-duration="1.5s" data-delay="0.1s"><img class="border-radius-5" src="assets/imgs/news/thumb-1.jpg" alt=""></a>
                                        </li>
                                        <li>
                                            <a href="assets/imgs/thumbnail-4.jpg" class="play-video" data-animate="zoomIn" data-duration="1.5s" data-delay="0.1s"><img class="border-radius-5" src="assets/imgs/news/thumb-2.jpg" alt=""></a>
                                        </li>
                                        <li>
                                            <a href="assets/imgs/thumbnail-5.jpg" class="play-video" data-animate="zoomIn" data-duration="1.5s" data-delay="0.1s"><img class="border-radius-5" src="assets/imgs/news/thumb-3.jpg" alt=""></a>
                                        </li>
                                        <li>
                                            <a href="assets/imgs/thumbnail-3.jpg" class="play-video" data-animate="zoomIn" data-duration="1.5s" data-delay="0.1s"><img class="border-radius-5" src="assets/imgs/news/thumb-4.jpg" alt=""></a>
                                        </li>
                                        <li>
                                            <a href="assets/imgs/thumbnail-4.jpg" class="play-video" data-animate="zoomIn" data-duration="1.5s" data-delay="0.1s"><img class="border-radius-5" src="assets/imgs/news/thumb-5.jpg" alt=""></a>
                                        </li>
                                        <li>
                                            <a href="assets/imgs/thumbnail-5.jpg" class="play-video" data-animate="zoomIn" data-duration="1.5s" data-delay="0.1s"><img class="border-radius-5" src="assets/imgs/news/thumb-6.jpg" alt=""></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php } ?>
    <!-- End Main content -->
    <?php include 'footer.php' ?>
    <?php include 'script.php' ?>
</body>

</html>