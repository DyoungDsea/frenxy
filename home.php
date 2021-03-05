

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
                                $post = runQuery("SELECT * FROM dpost WHERE dstatus='active' ORDER BY RAND() LIMIT 5");

                                if($post->num_rows>0){
                                    while($posts = fetchAssoc($post)):
                                
                                ?>
                                <div class="position-relative post-thumb">
                                    <div class="thumb-overlay img-hover-slide position-relative" style="background-image: url(assets/imgs/news/news-4.jpg)">
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
                                                <span class="post-on">20 minutes ago</span>
                                                <span class="hit-count has-dot">23k Views</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php endwhile; } ?>

                                <!-- <div class="position-relative post-thumb">
                                    <div class="thumb-overlay img-hover-slide position-relative" style="background-image: url(assets/imgs/news/news-6.jpg)">
                                        <a class="img-link" href="single.html"></a>
                                        <span class="top-left-icon bg-danger"><i class="elegant-icon icon_image"></i></span>
                                        <div class="post-content-overlay text-white ml-30 mr-30 pb-30">
                                            <div class="entry-meta meta-0 font-small mb-20">
                                                <a href="category.html"><span class="post-cat text-info text-uppercase">Lifestyle</span></a>
                                            </div>
                                            <h3 class="post-title font-weight-900 mb-20">
                                                <a class="text-white" href="single.html">This genius photo experiment shows we are all just sheeple in the consumer matrix</a>
                                            </h3>
                                            <div class="entry-meta meta-1 font-small text-white mt-10 pr-5 pl-5">
                                                <span class="post-on">26 August 2020</span>
                                                <span class="hit-count has-dot">18k Views</span>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                    </div>
                    <article class="col-lg-4 col-md-6 mb-30 wow fadeInUp animated" data-wow-delay="0.2s">
                        <div class="post-card-1 border-radius-10 hover-up">
                            <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url(assets/imgs/news/news-1.jpg)">
                                <a class="img-link" href="single.html"></a>
                                <span class="top-right-icon bg-success"><i class="elegant-icon icon_camera_alt"></i></span>
                                <ul class="social-share">
                                    <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                    <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                    <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                    <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                                </ul>
                            </div>
                            <div class="post-content p-30">
                                <div class="entry-meta meta-0 font-small mb-10">
                                    <a href="category.html"><span class="post-cat text-info">Travel</span></a>
                                    <a href="category.html"><span class="post-cat text-success">Food</span></a>
                                </div>
                                <div class="d-flex post-card-content">
                                    <h5 class="post-title mb-20 font-weight-900">
                                        <a href="single.html">Want fluffy Japanese pancakes but can’t fly to Tokyo?</a>
                                    </h5>
                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                        <span class="post-on">27 August</span>
                                        <span class="time-reading has-dot">12 mins read</span>
                                        <span class="post-by has-dot">23k views</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="col-lg-4 col-md-6 mb-30 wow fadeInUp animated">
                        <div class="post-card-1 border-radius-10 hover-up">
                            <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url(assets/imgs/news/news-7.jpg)">
                                <a class="img-link" href="single.html"></a>
                                <ul class="social-share">
                                    <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                    <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                    <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                    <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                                </ul>
                            </div>
                            <div class="post-content p-30">
                                <div class="entry-meta meta-0 font-small mb-10">
                                    <a href="category.html"><span class="post-cat text-warning">Fashion</span></a>
                                </div>
                                <div class="d-flex post-card-content">
                                    <h5 class="post-title mb-20 font-weight-900">
                                        <a href="single.html">Put Yourself in Your Customers Shoes</a>
                                    </h5>
                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                        <span class="post-on">17 July</span>
                                        <span class="time-reading has-dot">8 mins read</span>
                                        <span class="post-by has-dot">12k views</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="col-lg-4 col-md-6 mb-30 wow fadeInUp animated" data-wow-delay="0.2s">
                        <div class="post-card-1 border-radius-10 hover-up">
                            <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url(assets/imgs/news/news-9.jpg)">
                                <a class="img-link" href="single.html"></a>
                                <ul class="social-share">
                                    <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                    <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                    <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                    <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                                </ul>
                            </div>
                            <div class="post-content p-30">
                                <div class="entry-meta meta-0 font-small mb-10">
                                    <a href="category.html"><span class="post-cat text-danger">Travel</span></a>
                                </div>
                                <div class="d-flex post-card-content">
                                    <h5 class="post-title mb-20 font-weight-900">
                                        <a href="single.html">Life and Death in the Empire of the Tiger</a>
                                    </h5>
                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                        <span class="post-on">7 August</span>
                                        <span class="time-reading has-dot">15 mins read</span>
                                        <span class="post-by has-dot">500 views</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="col-lg-4 col-md-6 mb-30 wow fadeInUp animated" data-wow-delay="0.4s">
                        <div class="post-card-1 border-radius-10 hover-up">
                            <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url(assets/imgs/news/news-11.jpg)">
                                <a class="img-link" href="single.html"></a>
                                <span class="top-right-icon bg-info"><i class="elegant-icon icon_headphones"></i></span>
                                <ul class="social-share">
                                    <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                    <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                    <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                    <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                                </ul>
                            </div>
                            <div class="post-content p-30">
                                <div class="entry-meta meta-0 font-small mb-10">
                                    <a href="category.html"><span class="post-cat text-success">Lifestyle</span></a>
                                </div>
                                <div class="d-flex post-card-content">
                                    <h5 class="post-title mb-20 font-weight-900">
                                        <a href="single.html">When Two Wheels Are Better Than Four</a>
                                    </h5>
                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                        <span class="post-on">15 Jun</span>
                                        <span class="time-reading has-dot">9 mins read</span>
                                        <span class="post-by has-dot">1.2k views</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>

                    <article class="col-lg-4 col-md-6 mb-30 wow fadeInUp animated">
                        <div class="post-card-1 border-radius-10 hover-up">
                            <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url(assets/imgs/news/news-7.jpg)">
                                <a class="img-link" href="single.html"></a>
                                <ul class="social-share">
                                    <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                    <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                    <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                    <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                                </ul>
                            </div>
                            <div class="post-content p-30">
                                <div class="entry-meta meta-0 font-small mb-10">
                                    <a href="category.html"><span class="post-cat text-warning">Fashion</span></a>
                                </div>
                                <div class="d-flex post-card-content">
                                    <h5 class="post-title mb-20 font-weight-900">
                                        <a href="single.html">Put Yourself in Your Customers Shoes</a>
                                    </h5>
                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                        <span class="post-on">17 July</span>
                                        <span class="time-reading has-dot">8 mins read</span>
                                        <span class="post-by has-dot">12k views</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="col-lg-4 col-md-6 mb-30 wow fadeInUp animated" data-wow-delay="0.2s">
                        <div class="post-card-1 border-radius-10 hover-up">
                            <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url(assets/imgs/news/news-9.jpg)">
                                <a class="img-link" href="single.html"></a>
                                <ul class="social-share">
                                    <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                    <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                    <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                    <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                                </ul>
                            </div>
                            <div class="post-content p-30">
                                <div class="entry-meta meta-0 font-small mb-10">
                                    <a href="category.html"><span class="post-cat text-danger">Travel</span></a>
                                </div>
                                <div class="d-flex post-card-content">
                                    <h5 class="post-title mb-20 font-weight-900">
                                        <a href="single.html">Life and Death in the Empire of the Tiger</a>
                                    </h5>
                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                        <span class="post-on">7 August</span>
                                        <span class="time-reading has-dot">15 mins read</span>
                                        <span class="post-by has-dot">500 views</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="col-lg-4 col-md-6 mb-30 wow fadeInUp animated" data-wow-delay="0.4s">
                        <div class="post-card-1 border-radius-10 hover-up">
                            <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url(assets/imgs/news/news-11.jpg)">
                                <a class="img-link" href="single.html"></a>
                                <span class="top-right-icon bg-info"><i class="elegant-icon icon_headphones"></i></span>
                                <ul class="social-share">
                                    <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                    <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                    <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                    <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                                </ul>
                            </div>
                            <div class="post-content p-30">
                                <div class="entry-meta meta-0 font-small mb-10">
                                    <a href="category.html"><span class="post-cat text-success">Lifestyle</span></a>
                                </div>
                                <div class="d-flex post-card-content">
                                    <h5 class="post-title mb-20 font-weight-900">
                                        <a href="single.html">When Two Wheels Are Better Than Four</a>
                                    </h5>
                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                        <span class="post-on">15 Jun</span>
                                        <span class="time-reading has-dot">9 mins read</span>
                                        <span class="post-by has-dot">1.2k views</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>

                </div>
            </div>
        </div>


        <section class="pt-50 pb-50">
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


        </section>



        <div class="bg-grey pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        

                        <div class="post-module-3">
                            <div class="widget-header-1 position-relative mb-30">
                                <h5 class="mt-5 mb-30">Latest posts</h5>
                            </div>
                            <div class="loop-list loop-list-style-1">
                                <article class="hover-up-2 transition-normal wow fadeInUp animated">
                                    <div class="row mb-40 list-style-2">
                                        <div class="col-md-4">
                                            <div class="post-thumb position-relative border-radius-5">
                                                <div class="img-hover-slide border-radius-5 position-relative" style="background-image: url(assets/imgs/news/news-13.jpg)">
                                                    <a class="img-link" href="single.html"></a>
                                                </div>
                                                <ul class="social-share">
                                                    <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                                    <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                                    <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                                    <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-8 align-self-center">
                                            <div class="post-content">
                                                <div class="entry-meta meta-0 font-small mb-10">
                                                    <a href="category.html"><span class="post-cat text-primary">Food</span></a>
                                                </div>
                                                <h5 class="post-title font-weight-900 mb-20">
                                                    <a href="single.html">Helpful Tips for Working from Home as a Freelancer</a>
                                                    <span class="post-format-icon"><i class="elegant-icon icon_star_alt"></i></span>
                                                </h5>
                                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                    <span class="post-on">7 August</span>
                                                    <span class="time-reading has-dot">11 mins read</span>
                                                    <span class="post-by has-dot">3k views</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="hover-up-2 transition-normal wow fadeInUp animated">
                                    <div class="row mb-40 list-style-2">
                                        <div class="col-md-4">
                                            <div class="post-thumb position-relative border-radius-5">
                                                <div class="img-hover-slide border-radius-5 position-relative" style="background-image: url(assets/imgs/news/news-4.jpg)">
                                                    <a class="img-link" href="single.html"></a>
                                                </div>
                                                <ul class="social-share">
                                                    <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                                    <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                                    <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                                    <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-8 align-self-center">
                                            <div class="post-content">
                                                <div class="entry-meta meta-0 font-small mb-10">
                                                    <a href="category.html"><span class="post-cat text-success">Cooking</span></a>
                                                </div>
                                                <h5 class="post-title font-weight-900 mb-20">
                                                    <a href="single.html">10 Easy Ways to Be Environmentally Conscious At Home</a>
                                                </h5>
                                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                    <span class="post-on">27 Sep</span>
                                                    <span class="time-reading has-dot">10 mins read</span>
                                                    <span class="post-by has-dot">22k views</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="hover-up-2 transition-normal wow fadeInUp animated">
                                    <div class="row mb-40 list-style-2">
                                        <div class="col-md-4">
                                            <div class="post-thumb position-relative border-radius-5">
                                                <div class="img-hover-slide border-radius-5 position-relative" style="background-image: url(assets/imgs/news/news-2.jpg)">
                                                    <a class="img-link" href="single.html"></a>
                                                </div>
                                                <ul class="social-share">
                                                    <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                                    <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                                    <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                                    <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-8 align-self-center">
                                            <div class="post-content">
                                                <div class="entry-meta meta-0 font-small mb-10">
                                                    <a href="category.html"><span class="post-cat text-warning">Cooking</span></a>
                                                </div>
                                                <h5 class="post-title font-weight-900 mb-20">
                                                    <a href="single.html">My Favorite Comfies to Lounge in At Home</a>
                                                </h5>
                                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                    <span class="post-on">7 August</span>
                                                    <span class="time-reading has-dot">9 mins read</span>
                                                    <span class="post-by has-dot">12k views</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="hover-up-2 transition-normal wow fadeInUp animated">
                                    <div class="row mb-40 list-style-2">
                                        <div class="col-md-4">
                                            <div class="post-thumb position-relative border-radius-5">
                                                <div class="img-hover-slide border-radius-5 position-relative" style="background-image: url(assets/imgs/news/news-3.jpg)">
                                                    <a class="img-link" href="single.html"></a>
                                                </div>
                                                <ul class="social-share">
                                                    <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                                    <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                                    <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                                    <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-8 align-self-center">
                                            <div class="post-content">
                                                <div class="entry-meta meta-0 font-small mb-10">
                                                    <a href="category.html"><span class="post-cat text-danger">Travel</span></a>
                                                </div>
                                                <h5 class="post-title font-weight-900 mb-20">
                                                    <a href="single.html">How to Give Your Space a Parisian-Inspired Makeover</a>
                                                </h5>
                                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                    <span class="post-on">27 August</span>
                                                    <span class="time-reading has-dot">12 mins read</span>
                                                    <span class="post-by has-dot">23k views</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                        <div class="pagination-area mb-30 wow fadeInUp animated">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item"><a class="page-link" href="#"><i class="elegant-icon arrow_left"></i></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                                    <li class="page-item"><a class="page-link" href="#">04</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i class="elegant-icon arrow_right"></i></a></li>
                                </ul>
                            </nav>
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