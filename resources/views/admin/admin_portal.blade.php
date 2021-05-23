<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Blogger-Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('assets/admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{asset('assets/admin/vendors/iconfonts/ionicons/dist/css/ionicons.css') }}">
    <link rel="stylesheet" href="{{asset('assets/admin/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{asset('assets/admin/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{asset('assets/admin/vendors/css/vendor.bundle.addons.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/shared/style.css') }}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/demo_1/style.css') }}">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="{{asset('assets/admin/images/favicon.ico') }}" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html">
            <h6 style="color: white; font-size: 30px; margin: 5%;">Blogger</h6> </a>
          <a class="navbar-brand brand-logo-mini" href="index.html">
            <h6 style="color: white; margin: 2%;">Blogger</h6> </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block">Welcome Admin !</li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="text-wrapper">
                  <p class="profile-name">{{session('email')}}</p>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">Main Menu</li>
            <li class="nav-item">
              <a class="nav-link" href="{{asset('/admin/dashboard') }}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{asset('/admin/contact')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Contacts</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{asset('admin/logOut')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Logout</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Blog</th>
                          <th>Post By</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody> 
                        <?php
                          $i = 1;
                            foreach($blogs as $u){
                              $post_by = "Laravel";
                              if($u->upload_form == 0){
                                $post_by = "Codeignitor";
                              }
                                echo '
                                    <tr>
                                        <td>'.$i.'</td>
                                        <td>'.$u->blog.'</td>
                                        <td>'.$post_by.'</td>
                                        <td>';
                                        if($u->upload_form == 1){
                                          if($u->status == 0){
                                            echo '
                                            <button class="btn btn-light" onclick="trending_blog('.$u->blog_id.')">
                                              <i class="fa fa-line-chart" style="color: red;"></i>
                                            </button>';
                                          }else{
                                            echo '
                                            <button class="btn btn-danger" onclick="untrending_blog('.$u->blog_id.')">
                                              <i class="fa fa-line-chart"></i>
                                            </button>';
                                          }
                                          echo '
                                                    <button class="btn btn-info" onclick="edit_blog('.$u->blog_id.')"  data-target="#exampleModal2" data-toggle="modal">View</button>
                                                    <button  data-toggle="modal" onclick="edit_blog('.$u->blog_id.')" data-target="#exampleModal" class="btn btn-warning">Edit</button>
                                                    <button class="btn btn-danger" onclick="del_blog('.$u->blog_id.')">Delete</button>
                                                  </td>
                                              </tr>      
                                          ';
                                        }else{
                                          echo '
                                                   <button class="btn btn-danger" disabled>Only for CodeIgnitor user</button>
                                                  </td>
                                              </tr>      
                                          ';
                                        }
                                
                                $i++;
                            }
                        
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Blogger 2020</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <textarea class="form-control" id="blog" rows="10"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="confirm_edit()">Edit</button>
      </div>
    </div>
  </div>
</div>
@csrf
<!-- Modal 2-->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Read Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding: 5%;">
      <img src="" style="width: 100%; margin-bottom: 2%;" id="blog_img"/>
                  <p id="view_blog"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('assets/admin/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{asset('assets/admin/vendors/js/vendor.bundle.addons.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{asset('assets/admin/js/shared/off-canvas.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{asset('assets/admin/js/demo_1/dashboard.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- End custom js for this page-->
    <script>
    var blog_ID = 0;
        function untrending_blog(id){
          $.ajax({
            url: "{{asset('admin/trend_blog')}}",
            method : "POST",
            data : {
              _token : $("input[name='_token']").val(),
              blog_id : id,
              status : 0
            },
            success : function(res){
              if(res == "success"){
                swal({
                  title: "Success!",
                  text: "Blog is marked as Un_trending successfully!",
                  icon: "success",
                }).then(res => {
                  window.location.reload();
                })
              }else{
                swal({
                  title: "Error!",
                  text: "Blog is not marked as Un_trending , try Again!",
                  icon: "error",
                }).then(res => {
                })
              }
            }
          })
        }
        function trending_blog(id){
          $.ajax({
            url: "{{asset('admin/trend_blog')}}",
            method : "POST",
            data : {
              _token : $("input[name='_token']").val(),
              blog_id : id,
              status : 1
            },
            success : function(res){
              if(res == "success"){
                swal({
                  title: "Success!",
                  text: "Blog is marked as trending successfully!",
                  icon: "success",
                }).then(res => {
                  window.location.reload();
                })
              }else{
                swal({
                  title: "Error!",
                  text: "Blog is not marked as trending , try Again!",
                  icon: "error",
                }).then(res => {
                })
              }
            }
          })
        }
        function del_blog(id){
          console.log("dewfe");
          $.ajax({
            url: "{{asset('admin/delete_blog')}}",
            method : "POST",
            data : {
              _token : $("input[name='_token']").val(),
              blog_id : id
            },
            success : function(res){
              if(res == "success"){
                swal({
                  title: "Deleted!",
                  text: "Blog is successfully deleted!",
                  icon: "success",
                }).then(res => {
                  window.location.reload();
                })
              }else{
                swal({
                  title: "Error!",
                  text: "Blog is not deleted!",
                  icon: "error",
                }).then(res => {
                })
              }
            }
          })
        }
        function edit_blog(id){
          console.log("fedfrbgrg");
          blog_ID = id;
          $.ajax({
            url: "{{asset('admin/get')}}",
            method : "POST",
            data : {
              _token : $("input[name='_token']").val(),
              blog_id : id
            },
            success : function(res){
              console.log(typeof(res));
              console.log(res);
              $("#blog").val(res[0]["blog"]);
              $("#view_blog").html(res[0]["blog"]);
              $("#blog_img").prop( "src" , "{{asset('/storage/uploads/')}}/" + res[0]['blog_img']);
            }
          })
        }
        function confirm_edit(){
          $.ajax({
            url: "{{asset('admin/edit_blog')}}",
            method : "POST",
            data : {
              _token : $("input[name='_token']").val(),
              blog_id : blog_ID,
              blog : $("#blog").val()
            },
            success : function(res){
              if(res == "success"){
                swal({
                  title: "Edit Done!",
                  text: "Blog is Edited successfully!",
                  icon: "success",
                }).then(res => {
                  window.location.reload();
                })
              }else{
                swal({
                  title: "Error!",
                  text: "Blog is not Edited!",
                  icon: "error",
                }).then(res => {
                })
              }
            }
          })
        }
    </script>
  </body>
</html>