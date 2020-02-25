<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div class="breadcumb_area">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12">
        <h5>Blog</h5>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
          <li class="breadcrumb-item active">Blog</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!-- Breadcumb Area -->

<!-- Blog Area -->
<section class="blog_area section_padding_100">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-7 col-lg-8">
        <?php foreach ($blogs as $key => $blog) {?>
          <!-- Single News Area -->
          <div class="single_blog_area">
            <div class="blog_post_thumb">
              <a href="<?php echo base_url('blog/view/'.$blog->slug)?>"><img src="<?php echo base_url().'/'.$blog->images; ?>" alt="blog-post-thumb"></a>
              <!-- Post Date -->
            </div>
            <div class="blog_post_content">
              <a href="single-blog.html" class="blog_title"><?php echo $blog->title; ?></a>
               <a href="#"><?php echo dateFormater($blog->created_at);?></a>
              <p><?php echo textShort($blog->content);?></p>
              <a href="<?php echo base_url('blog/view/'.$blog->slug)?>">Continue Reading <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="col-12 col-md-5 col-lg-4">
        <div class="blog_sidebar">
          <!-- Search Post -->
          <div class="widget-area search_post mb-30">
            <h6>Search Post</h6>
            <form action="#" method="get">
              <input type="search" class="form-control" placeholder="Enter Keyword...">
              <button type="submit" class="btn d-none">Submit</button>
            </form>
          </div>

          <!-- Latest Post -->
          <div class="widget-area latest_post mb-30">
            <h6>Recent Post</h6>

            <!-- Recent Post -->
            <div class="single_latest_post" id="popular_post">
      
            </div>
          </div>

          <!-- Catagory -->
          <div class="widget-area catagory_section mb-30">
            <h6>Catagory</h6>
            <ul id="category">
            </ul>
          </div>

          <!-- Achives -->
          <div class="widget-area achive_section mb-30">
            <h6>Achives</h6>
            <ul>
              <li><a href="#">September - 2019</a></li>
              <li><a href="#">Auguest - 2019</a></li>
              <li><a href="#">July - 2019</a></li>
              <li><a href="#">June - 2019</a></li>
              <li><a href="#">May - 2019</a></li>
              <li><a href="#">April - 2019</a></li>
            </ul>
          </div>

          <!-- Tages -->
          <div class="widget-area tag_section mb-30">
            <h6>Tags Cloud</h6>
            <ul id="tag">
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-lg-8">
        <!-- Shop Pagination Area -->
        <div class="shop_pagination_area mt-5">
          <nav aria-label="Page navigation">
            <ul class="pagination pagination-sm justify-content-center">
              <li class="page-item">
                <a class="page-link" href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
              </li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item"><a class="page-link" href="#">...</a></li>
              <li class="page-item"><a class="page-link" href="#">8</a></li>
              <li class="page-item"><a class="page-link" href="#">9</a></li>
              <li class="page-item">
                <a class="page-link" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</section>
    <!-- Blog Area End -->