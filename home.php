

<?php include 'head.php'; ?>

<body>
    <div class="scroll-progress primary-bg"></div>
   
   
<?php include 'aside-right.php'; ?>
<?php include 'header.php'; ?>
<?php include 'search.php'; ?>
   
   
    
    <main>
        <div class="featured-1" style="background:white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 align-self-center">
                    <?php 
                        $sql = runQuery("SELECT * FROM dbanner WHERE dpost='Home' AND id=1");
                        if($sql->num_rows>0){
                            $img = fetchAssoc($sql);
                     ?>
                         <a href="<?php echo $img['durl']; ?>"><img src="banner/<?php echo $img['dimg']; ?>" alt=""></a>  
                        <?php } ?>                   
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="hot-tags pt-30 pb-30 font-small align-self-center">
                <div class="widget-header-3">
                    <div class="row align-self-center">
                        <div class="col-md-4 align-self-center">
                            <h5 class="widget-title">Featured posts</h5>
                        </div>
                        <div class="col-md-8 text-md-right font-small align-self-center">
                            <p class="d-inline-block mr-5 mb-0"><i class="elegant-icon  icon_tag_alt mr-5 text-muted"></i>Hot tags:</p>
                            <ul class="list-inline d-inline-block tags">
                                <li class="list-inline-item"><a href="#"># Covid-19</a></li>
                                <li class="list-inline-item"><a href="#"># Inspiration</a></li>
                                <li class="list-inline-item"><a href="#"># Work online</a></li>
                                <li class="list-inline-item"><a href="#"># Stay home</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="loop-grid mb-30">
                <div class="row">
                    <div class="col-lg-8 mb-30">
                        <div class="carausel-post-1 hover-up border-radius-10 overflow-hidden transition-normal position-relative wow fadeInUp animated">
                            <div class="arrow-cover"></div>
                            <div class="slide-fade">
                                <?php 
                                $post = runQuery("SELECT * FROM dpost WHERE dtype='feature' AND dstatus='active' ORDER BY RAND() LIMIT 5");

                                if($post->num_rows>0){
                                    while($posts = fetchAssoc($post)):
                                
                                ?>
                                <div class="position-relative post-thumb">
                                    <div class="thumb-overlay img-hover-slide position-relative" style="background-image: url(cover/<?php echo $posts['dimg'] ?>.jpg)">
                                        <a class="img-link" href="read-article?post=<?php echo $posts['pid'] ?>"></a>
                                        <span class="top-left-icon bg-warning"><i class="elegant-icon icon_star_alt"></i></span>
                                        <div class="post-content-overlay text-white ml-30 mr-30 pb-30">
                                            <div class="entry-meta meta-0 font-small mb-20">
                                                <a href="category"><span class="post-cat text-info text-uppercase"><?php echo $posts['dcategory'] ?></span></a>
                                                <a href="category"><span class="post-cat text-success text-uppercase"><?php echo $posts['dsub_cat'] ?></span></a>
                                            </div>
                                            <h3 class="post-title font-weight-900 mb-20">
                                                <a class="text-white" href="read-article?post=<?php echo $posts['pid'] ?>"><?php echo $posts['dtitle'] ?></a>
                                            </h3>
                                            <div class="entry-meta meta-1 font-small text-white mt-10 pr-5 pl-5">
                                                <?php echo totalPostViews($posts['pid']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php endwhile; } ?>


                            </div>
                        </div>
                    </div>
                        <?php
                        $cat = runQuery("SELECT * FROM dcategory ORDER BY dcategory ASC");
                        if($cat->num_rows>0):
                            while($rowid = fetchAssoc($cat)):
                                $catid = $rowid['cid'];
                        $one = runQuery("SELECT * FROM dpost WHERE dcategory_id='$catid' AND dtype !='feature' AND dstatus='active' ORDER BY RAND() LIMIT 2");
                            if($one->num_rows>0){
                                while($ones=fetchAssoc($one)):
                        ?>
                        <article class="col-lg-4 col-md-6 mb-30 wow fadeInUp animated" data-wow-delay="0.2s">
                        <div class="post-card-1 border-radius-10 hover-up">
                            <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url(cover/<?php echo $ones['dimg'] ?>.jpg)">
                            <a class="img-link" href="read-article?post=<?php echo $ones['pid'] ?>"> </a>
                           
                            </div>
                            <div class="post-content p-30">
                                <div class="entry-meta meta-0 font-small mb-10">
                                    <a href="read-article?post=<?php echo $ones['pid'] ?>"><span class="post-cat text-info"><?php echo $ones['dcategory'] ?></span></a>
                                    <a href="read-article?post=<?php echo $ones['pid'] ?>"><span class="post-cat text-success"><?php echo $ones['dsub_cat'] ?></span></a>
                                </div>
                                <div class="d-flex post-card-content">
                                    <h5 class="post-title mb-20 font-weight-900">
                                        <a href="read-article?post=<?php echo $ones['pid'] ?>"><?php echo limitText($ones['dtitle'],10) ?></a>
                                    </h5>
                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                        <span class="post-on"><?php echo date("d M", strtotime($ones['ddate'])) ?></span>
                                        <?php echo totalPostViews($ones['pid']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                        <?php endwhile; } endwhile; endif; ?>


                </div>
            </div>
        </div>


        <!-- <section class="pt-50 pb-50">
            <div class="container" >
                <h3>NEW BOOK RELEASE FOR THE WEEK</h3>
                <div class="mhn-slide owl-carousel">
                    <div class="mhn-item">
                        <div class="mhn-inner">
                            <img src="https://source.unsplash.com/600x400/?paper">
                            <div class="mhn-img"><div class="loader-circle"><div class="loader-stroke-left"></div><div class="loader-stroke-right"></div></div></div>
                            
                        </div>
                    </div>
                    <div class="mhn-item">
                        <div class="mhn-inner">
                            <img src="https://source.unsplash.com/600x400/?fire">
                            <div class="mhn-img"><div class="loader-circle"><div class="loader-stroke-left"></div><div class="loader-stroke-right"></div></div></div>
                        
                        </div>
                    </div>
                    <div class="mhn-item">
                        <div class="mhn-inner">
                            <img src="https://source.unsplash.com/600x400/?nature">
                            <div class="mhn-img"><div class="loader-circle"><div class="loader-stroke-left"></div><div class="loader-stroke-right"></div></div></div>
                            
                        </div>
                    </div>
                    <div class="mhn-item">
                        <div class="mhn-inner">
                            <img src="https://source.unsplash.com/600x400/?video">
                            <div class="mhn-img"><div class="loader-circle"><div class="loader-stroke-left"></div><div class="loader-stroke-right"></div></div></div>
                            
                        </div>
                    </div>
                    <div class="mhn-item">
                        <div class="mhn-inner">
                            <img src="https://source.unsplash.com/600x400/?hiking">
                            <div class="mhn-img"><div class="loader-circle"><div class="loader-stroke-left"></div><div class="loader-stroke-right"></div></div></div>
                            
                        </div>
                    </div>
                    <div class="mhn-item">
                        <div class="mhn-inner">
                            <img src="https://source.unsplash.com/600x400/?future">
                            <div class="mhn-img"><div class="loader-circle"><div class="loader-stroke-left"></div><div class="loader-stroke-right"></div></div></div>
                            
                        </div>
                    </div>
                    <div class="mhn-item">
                        <div class="mhn-inner">
                            <img src="https://source.unsplash.com/600x400/?music">
                            <div class="mhn-img"><div class="loader-circle"><div class="loader-stroke-left"></div><div class="loader-stroke-right"></div></div></div>
                            
                        </div>
                    </div>
                    <div class="mhn-item">
                        <div class="mhn-inner">
                            <img src="https://source.unsplash.com/600x400/?money">
                            <div class="mhn-img"><div class="loader-circle"><div class="loader-stroke-left"></div><div class="loader-stroke-right"></div></div></div>
                            
                        </div>
                    </div>
                    <div class="mhn-item">
                        <div class="mhn-inner">
                            <img src="https://source.unsplash.com/600x400/?happiness">
                            <div class="mhn-img"><div class="loader-circle"><div class="loader-stroke-left"></div><div class="loader-stroke-right"></div></div></div>
                            
                        </div>
                    </div>
                    <div class="mhn-item">
                        <div class="mhn-inner">
                            <img src="https://source.unsplash.com/600x400/?nepal">
                            <div class="mhn-img"><div class="loader-circle"><div class="loader-stroke-left"></div><div class="loader-stroke-right"></div></div></div>
                            
                        </div>
                    </div>
                    <div class="mhn-item">
                        <div class="mhn-inner">
                            <img src="https://source.unsplash.com/600x400/?love">
                            <div class="mhn-img"><div class="loader-circle"><div class="loader-stroke-left"></div><div class="loader-stroke-right"></div></div></div>
                            
                        </div>
                    </div>
                    <div class="mhn-item">
                        <div class="mhn-inner">
                            <img src="https://source.unsplash.com/600x400/?sports">
                            <div class="mhn-img"><div class="loader-circle"><div class="loader-stroke-left"></div><div class="loader-stroke-right"></div></div></div>
                            
                        </div>
                    </div>
                </div>
            </div>


        </section> -->



        <div class="bg-grey pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        

                        <div class="post-module-3">
                            <div class="widget-header-1 position-relative mb-30">
                                <h5 class="mt-5 mb-30">Latest posts</h5>
                            </div>
                            <div class="loop-list loop-list-style-1">
                            <?php 
                            $lat = runQuery("SELECT * FROM dpost WHERE dtype !='feature' AND dstatus='active' ORDER BY RAND() ");
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
                    <div class="col-lg-4">
                        <div class="widget-area">
                            
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
    <!-- End Main content -->
    <!--site-bottom-->
    <div class="site-bottom pt-50 pb-50">
        <div class="container">
            
        <div class="mhn-slide owl-carousel">
                    <div class="mhn-item">
                        <div class="mhn-inner">
                            <img src="https://source.unsplash.com/600x400/?paper">
                            <div class="mhn-img"><div class="loader-circle"><div class="loader-stroke-left"></div><div class="loader-stroke-right"></div></div></div>
                            
                        </div>
                    </div>
                    <div class="mhn-item">
                        <div class="mhn-inner">
                            <img src="https://source.unsplash.com/600x400/?fire">
                            <div class="mhn-img"><div class="loader-circle"><div class="loader-stroke-left"></div><div class="loader-stroke-right"></div></div></div>
                        
                        </div>
                    </div>
                    <div class="mhn-item">
                        <div class="mhn-inner">
                            <img src="https://source.unsplash.com/600x400/?nature">
                            <div class="mhn-img"><div class="loader-circle"><div class="loader-stroke-left"></div><div class="loader-stroke-right"></div></div></div>
                            
                        </div>
                    </div>
                    <div class="mhn-item">
                        <div class="mhn-inner">
                            <img src="https://source.unsplash.com/600x400/?video">
                            <div class="mhn-img"><div class="loader-circle"><div class="loader-stroke-left"></div><div class="loader-stroke-right"></div></div></div>
                            
                        </div>
                    </div>
                    <div class="mhn-item">
                        <div class="mhn-inner">
                            <img src="https://source.unsplash.com/600x400/?hiking">
                            <div class="mhn-img"><div class="loader-circle"><div class="loader-stroke-left"></div><div class="loader-stroke-right"></div></div></div>
                            
                        </div>
                    </div>
                    <div class="mhn-item">
                        <div class="mhn-inner">
                            <img src="https://source.unsplash.com/600x400/?future">
                            <div class="mhn-img"><div class="loader-circle"><div class="loader-stroke-left"></div><div class="loader-stroke-right"></div></div></div>
                            
                        </div>
                    </div>
                    <div class="mhn-item">
                        <div class="mhn-inner">
                            <img src="https://source.unsplash.com/600x400/?music">
                            <div class="mhn-img"><div class="loader-circle"><div class="loader-stroke-left"></div><div class="loader-stroke-right"></div></div></div>
                            
                        </div>
                    </div>
                    <div class="mhn-item">
                        <div class="mhn-inner">
                            <img src="https://source.unsplash.com/600x400/?money">
                            <div class="mhn-img"><div class="loader-circle"><div class="loader-stroke-left"></div><div class="loader-stroke-right"></div></div></div>
                            
                        </div>
                    </div>
                    <div class="mhn-item">
                        <div class="mhn-inner">
                            <img src="https://source.unsplash.com/600x400/?happiness">
                            <div class="mhn-img"><div class="loader-circle"><div class="loader-stroke-left"></div><div class="loader-stroke-right"></div></div></div>
                            
                        </div>
                    </div>
                    <div class="mhn-item">
                        <div class="mhn-inner">
                            <img src="https://source.unsplash.com/600x400/?nepal">
                            <div class="mhn-img"><div class="loader-circle"><div class="loader-stroke-left"></div><div class="loader-stroke-right"></div></div></div>
                            
                        </div>
                    </div>
                    <div class="mhn-item">
                        <div class="mhn-inner">
                            <img src="https://source.unsplash.com/600x400/?love">
                            <div class="mhn-img"><div class="loader-circle"><div class="loader-stroke-left"></div><div class="loader-stroke-right"></div></div></div>
                            
                        </div>
                    </div>
                    <div class="mhn-item">
                        <div class="mhn-inner">
                            <img src="https://source.unsplash.com/600x400/?sports">
                            <div class="mhn-img"><div class="loader-circle"><div class="loader-stroke-left"></div><div class="loader-stroke-right"></div></div></div>
                            
                        </div>
                    </div>
                </div>


        </div>
        <!--container-->
    </div>
    <!--end site-bottom-->
   <?php include 'footer.php'; ?>
    
    <div class="dark-mark"></div>
   <?php include 'script.php'; ?>
</body>

</html>