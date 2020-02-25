<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <!-- Breadcumb Area -->
      <div class="breadcumb_area">
        <div class="container h-100">
          <div class="row h-100 align-items-center">
            <div class="col-12">
              <h5>Blog Details</h5>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item active">Blog Details</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- Breadcumb Area -->
      <?php //if(!empty($blog)){ ?>
        <!-- Single Blog Post Area -->
        <section class="singl-blog-post-area section_padding_100_50">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8">
                <!-- Blog Details Area -->
                <div class="blog-details-area mb-50">
                  <!-- Image -->
                  <img class="mb-30" src="<?php echo FILE_UPLOAD_PATH.$blog->images;?>" alt="blog-img">

                  <!-- Blog Title -->
                  <h3 class="mb-30"><?php echo $blog->title?></h3>

                  <!-- Bar Area -->
                  <div class="status-bar mb-15">
                    <a href="#"><i class="icofont-user-male"></i> <?php echo $blog->author ?></a>
                    <a href="#"><i class="icofont-ui-clock"></i> <?php echo dateFormater($blog->created_at);?></a>
                    <a href="#"><i class="icofont-tags"></i> Handbags</a>
                    <a href="#"><i class="icofont-speech-comments"></i><?php echo count($comments); ?> Comments</a>
                  </div>

                  <?php echo $blog->content;?>

                </div>

                <div class="comments-area">
                  <div class="comment_area mb-50 clearfix">
                    <h5 class="mb-4">3 Comments</h5>

                    <ol>
                      <?php if(!empty($comments)){
                        foreach ($comments as $key => $comment) { ?>
                        <!-- Single Comment Area -->
                        <li class="single_comment_area">
                          <div class="comment-wrapper clearfix">
                            <div class="comment-meta">
                              <div class="comment-author-img">
                                <img class="img-circle" src="img/partner-img/tes-1.png" alt="">
                              </div>
                            </div>
                            <div class="comment-content">
                              <h5 class="comment-author"><a href="#"><?php echo $comment->name;?></a></h5>
                              <p><?php echo $comment->message;?></p>
                              <a href="#" class="reply">Reply</a>
                            </div>
                          </div>
                          <ul class="children">
                            <li class="single_comment_area">
                              <div class="comment-wrapper clearfix">
                                <div class="comment-meta">
                                  <div class="comment-author-img">
                                    <img class="img-circle" src="img/partner-img/tes-2.png" alt="">
                                  </div>
                                </div>
                                <div class="comment-content">
                                  <h5 class="comment-author"><a href="#">Nazrul Islam</a></h5>
                                  <p>Thanks for your valuable feedback @Lim Jannat. Stay with us.</p>
                                  <a href="#" class="reply">Reply</a>
                                </div>
                              </div>
                            </li>
                          </ul>
                        </li>
                      <?php }} ?>
                    </ol>
                  </div>

                  <div class="contact_from mb-50">
                    <h5 class="mb-4">Leave a Comment</h5>
                    <p>Make sure you enter the required information where indicated red starmark. HTML code is not allowed.</p>
                    <form id="comment_form" method="post">
                      <div class="row">
                        <div class="col-12 col-lg-6">
                          <div class="form-group mb-30"><code style="color: red">*</code>
                            <input type="text" class="form-control"  placeholder="Name" tabindex="1"
                            name="name" value="<?php echo isset($customer_data->name)?$customer_data->name:'';?>"/>
                          </div>
                        </div>
                        <div class="col-12 col-lg-6">
                          <div class="form-group mb-30"><code style="color: red">*</code>
                            <input type="text" class="form-control" name="email" placeholder="Email" tabindex="2" value="<?php echo isset($customer_data->email)?$customer_data->email:'';?>" required pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" />
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group mb-30">
                            <input id="website" type="text" name="website" class="form-control" placeholder="website url">
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group mb-30"> <code style="color: red">*</code>
                            <textarea class="form-control" name="message" id="message" cols="30" rows="7" placeholder="Comment" tabindex="4"></textarea>
                          </div>
                        </div>
                        <div class="col-12">
                          <button class="btn btn-primary" type="submit">Submit Comment</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <div class="col-12 col-lg-4">
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
                    <h6>Related Post</h6>
                    <?php if(!empty($related_blog)){
                      foreach ($related_blog as $key => $r_blog) { ?>
                        <!-- Recent Post -->
                        <div class="single_latest_post">
                          <div class="post-thumbnail">
                            <img src="<?php echo FILE_UPLOAD_PATH.$r_blog->images;?>" alt="blog image">
                          </div>
                          <div class="post-content">
                            <a href="<?php echo base_url('blog/view/'.$r_blog->slug);?>"><?php echo $r_blog->title;?></a>
                          </div>
                        </div>
                      <?php }} ?>
                    </div>

                    <!-- Catagory -->
                    <div class="widget-area catagory_section mb-30">
                      <h6>Catagory</h6>
                      <ul id="category">
                      </ul>
                    </div>

                    <!-- Tages -->
                    <div class="widget-area tag_section mb-30">
                      <h6>Tags Cloud</h6>
                      <ul>
                        <?php
                        $blog_tags = json_decode($blog->tags);
                        if(!empty($blog_tags)){
                        foreach ($blog_tags as $key => $b_tag) {
                          foreach ($tags as $key => $tag) {
                            if($tag->id == $b_tag){?>
                              <li><a href="#"><?php echo $tag->name; ?></a></li>
                            <?php }
                          }
                        }}
                        ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Single Blog Post Area -->
        <?php //}else{ ?>
          <!-- Not Found Area -->
          <section class="error_page text-center section_padding_100">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                  <div class="not-found-text">
                    <h2>404</h2>
                    <h5 class="mb-3">Oops! Page Not Found</h5>
                    <p>Sorry! the page you looking for is not found. Make sure that you have typed the currect URL</p>
                    <a href="<?php echo base_url('blog'); ?>" class="btn btn-primary mt-3"><i class="fa fa-home" aria-hidden="true"></i> GO BLOG HOME</a>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Not Found Area End -->
        <?php //} ?>


