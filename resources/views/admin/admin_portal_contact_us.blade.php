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
                          <th>Email</th>
                          <th>Message</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody> 
                        <?php
                          $i = 1;
                            foreach($contacts as $u){
                                echo '
                                    <tr>
                                        <td>'.$i.'</td>
                                        <td>'.$u->email.'</td>
                                        <td>'.$u->message.'</td>
                                        <td>
                                            <button class="btn btn-info" onclick="reply_open('.$u->id.')"  data-target="#exampleModal2" data-toggle="modal">Reply</button>
                                        </td>
                                    </tr>      
                                ';
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
   @csrf
<!-- Modal 2-->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reply</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding: 5%;">
            <div class="forn-control">
                <label>Write reply</label>
                <textarea rows="5" class="form-control" id="msg" placeholder="Type here...."></textarea>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" onclick="send_reply()">Send</button>
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
    var msg_id = 0;
        function reply_open(id){
            msg_id = id;
            console.log(msg_id);
        }
        function send_reply(){
          $.ajax({
            url: '{{asset("admin/sent-reply")}}',
            method : "POST",
            data : {
              _token : $("input[name='_token']").val(),
              msgID : msg_id,
              msg : $("#msg").val()
            },
            success : function(res){
              if(res == "success"){
                swal({
                  title: "Sent!",
                  text: "Mail is sent successfully!",
                  icon: "success",
                }).then(res => {
                  window.location.reload();
                })
              }else{
                swal({
                  title: "Error!",
                  text: "Mail is not sent!",
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