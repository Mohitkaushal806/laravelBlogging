<?php

// $session = \Config\Services::session();
// $session = session();
?>
<!doctype html>
<html lang="en">

<!-- Mirrored from preview.colorlib.com/theme/magdesign/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Apr 2021 06:47:26 GMT -->
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="preconnect" href="https://fonts.gstatic.com/">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/client/font/icomoon/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/client/css/style.css')}}">
<link rel="stylesheet" href="https://preview.colorlib.com/theme/magdesign/fonts/flaticon/font/flaticon.css">
<link rel="stylesheet" href="https://preview.colorlib.com/theme/magdesign/css/tiny-slider.css">
<link rel="stylesheet" href="https://preview.colorlib.com/theme/magdesign/css/glightbox.min.css">
<link rel="stylesheet" href="https://preview.colorlib.com/theme/magdesign/css/aos.css"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://preview.colorlib.com/theme/magdesign/css/style.css">
<title>Bloggers</title>
</head>
<body>
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>
    <nav class="site-nav">
        <div class="container">
            <div class="site-navigation">
                <div class="row">
                    <div class="col-md-6 text-center order-1 order-md-2 mb-3 mb-md-0">
                    <a href="https://preview.colorlib.com/theme/magdesign/index.html" class="logo m-0 text-uppercase">Blogger's</a>
                    </div>
                    <div class="col-md-3 order-3 order-md-1">
                    </div>
                    <div class="col-md-3 text-end order-2 order-md-3 mb-3 mb-md-0">
                        <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Add New Blog</button>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="section pt-5 pb-0">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-7 text-center">
                    <h2 class="heading">Trending</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="posts-slide-wrap">
                        <div class="posts-slide" id="posts-slide">
                            @foreach ($blogs as $key => $value) 
                                @if($value->status == 1)
                                    <div class="item">
                                        <div class="post-entry d-lg-flex">
                                            <div class="me-lg-5 thumbnail mb-4 mb-lg-0">
                                                <a>
                                                    <img src="{{asset('storage/uploads/'.$value->blog_img)}}" style="width: 100%;" alt="Image" class="img-fluid"/>
                                                </a>
                                            </div>
                                            <div class="content align-self-center">
                                                <div class="post-meta mb-3">
                                                    <span class="date">{{$value->created_At}}</span>
                                                </div>
                                                <h2 class="heading"><a>{{$value->blog_title}}</a></h2>
                                                <p>{{$value->blog}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="row g-5">
                
                    @foreach ($blogs as $key => $value)
                        <div class="col-lg-4" style="padding: 1%;">
                            <div class="post-entry d-block small-post-entry-v">
                                <div class="thumbnail">
                                    <a>
                                        <img src="{{asset('storage/uploads/'.$value->blog_img)}}" class="img-fluid" style="width : 300px;"/>
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="post-meta mb-1">
                                        <span class="date">{{$value->created_At}}</span>
                                    </div>
                                    <h2 class="heading mb-3"><a>{{$value->blog_title}}</a></h2>
                                    <p>{{$value->blog}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                
            </div>
        </div>
    </div>
    <div class="py-5 bg-light mx-md-3 sec-subscribe">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h4 fw-bold">Contact us</h2>
                </div>
            </div>
            <form  method="POST" action="{{ asset('/contact')}}" class="row">
                    {{csrf_field()}}
                <div class="col-md-4">
                    <div class="mb-3 mb-md-0">
                        <input type="email" class="form-control" name="email" required placeholder="Enter your email">
                    </div>
                </div>
                <div class="col-md-8 d-grid">
                    <textarea row="5" placeholder="Your message..." name="message" required class="form-control"></textarea>
                </div>
                <div class="col-md-12 d-grid" style="margin-top: 2%;">
                    <input type="submit" class="btn btn-primary" value="Done">
                </div>
            </form>
        </div>
    </div>
    <div class="site-footer">
        <div class="container">
            <div class="row justify-content-center copyright">
                <div class="col-lg-7 text-center">
                    <div class="widget">
                        <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by Bloggers
                        </p>
                        <div class="d-block">
                            <a href="#" class="m-2">Terms &amp; Conditions</a>/
                            <a href="#" class="m-2">Privacy Policy</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Write Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <form id="blog_form" method="POST" action="{{ asset('/blog_upload')}}" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-12 form-group">
                    <label>Blog Image</label>
                    <input type="file" class="form-control" name="blog_img" required placeholder="Enter title..."/>
                </div>
                <div class="col-lg-12 form-group">
                    <label>Blog title</label>
                    <input type="text" class="form-control" name="blog_title" required placeholder="Enter title..."/>
                </div>
                <div class="col-lg-12 form-group">
                    <label>Blog</label>
                    <textarea rows="5" class="form-control" name="blog" required placeholder="Type Blog...">
                    </textarea>
                </div>
            </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="confirm_edit(event)">Save BLog</button>
      </div>
    </div>
  </div>
</div><script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://preview.colorlib.com/theme/magdesign/js/bootstrap.bundle.min.js"></script>
    <script src="https://preview.colorlib.com/theme/magdesign/js/tiny-slider.js"></script>
    <script src="https://preview.colorlib.com/theme/magdesign/js/glightbox.min.js"></script>
    <script src="https://preview.colorlib.com/theme/magdesign/js/aos.js"></script>
    <script src="https://preview.colorlib.com/theme/magdesign/js/navbar.js"></script>
    <script src="https://preview.colorlib.com/theme/magdesign/js/counter.js"></script>
    <script src="https://preview.colorlib.com/theme/magdesign/js/custom.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function confirm_edit(e){
        e.preventDefault();
        $("#blog_form").submit();
    }
</script>
    
    @if(session('blog_insert') == 1)
        <script>
            swal({
                title: "Thanks!",
                text: "Blog is submitted successfully!",
                icon: "success",
            })
        </script>
    @elseif(session('blog_insert') == 2)
    <script>
        swal({
            title: "Error!",
            text: "Blog is not submitted!",
            icon: "error",
        })
    </script>
    @endif

    @if(session('contact_insert') == 1)

    <script>
        swal({
            title: "Thanks!",
            text: "Your message is recorded successfully!",
            icon: "success",
        })
    </script>
    @elseif(session('contact_insert') == 2)
    <script>
        swal({
            title: "Error!",
            text: "Your message is not recorded! try again...",
            icon: "error",
        })
    </script>
    @endif

</body>

<!-- Mirrored from preview.colorlib.com/theme/magdesign/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Apr 2021 06:47:26 GMT -->
</html>