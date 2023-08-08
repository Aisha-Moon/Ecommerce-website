<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Admin</title>
       @include('backend.includes.style')
    </head>
    <body class="sb-nav-fixed">
       @include('backend.includes.header')
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @include('backend.includes.sidebar')
            </div>
            <div id="layoutSidenav_content">
                @yield('content')
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        @include('backend.includes.script')
        <script type="text/javascript">
        $("document").ready(function(){
           setTimeout(function() {
               $('#success').fadeOut('fast');
            }, 2000);
           setTimeout(function() {
               $('#error').fadeOut('fast');
            }, 2000);
        })
        </script>
    </body>
</html>
