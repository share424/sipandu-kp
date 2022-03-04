<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Neon is a bootstrap, laravel & php admin dashboard template">
        <meta name="keywords" content="admin, admin dashboard, admin panel, admin template, admin theme, bootstrap 4, laravel, php, crm, analytics, responsive, sass support, ui kits, web app, clean design">
        <meta name="author" content="Themesbox17">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> @yield('title') </title>
        <!-- Fevicon -->
        <link rel="shortcut icon" href="{{ url('vendors/neon/images/favicon.ico') }}">
        <!-- Start CSS -->   
        @yield('style')
        <link href="{{ url('vendors/neon/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ url('vendors/neon/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ url('vendors/neon/css/style.css') }}" rel="stylesheet" type="text/css">
        <!-- End CSS -->
    </head>
    <body class="xp-vertical">
        <!-- Search Modal -->
        <div class="modal search-modal fade" id="xpSearchModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="xp-searchbar">
                            <form>
                                <div class="input-group">
                                    <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit" id="button-addon2">GO</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start XP Container -->
        <div id="xp-container">     
            <!-- Start XP Leftbar -->
            @include('vendors.neon.sidebar')
            <!-- End XP Leftbar -->
            <!-- Start XP Rightbar -->
            @include('vendors.neon.rightbar')  
            <div class="contentbar">        
            @yield('content')
            </div>
            <!-- Start XP Footerbar -->
            <div class="xp-footerbar">
                <footer class="footer">
                    <p class="mb-0">© 2020 Neon - All Rights Reserved.</p>
                </footer>
            </div>
            <!-- End XP Footerbar -->
            <!-- End XP Rightbar -->  
        </div>
        <!-- End XP Container -->
        <!-- Start JS -->        
        <script src="{{ url('vendors/neon/js/jquery.min.js') }}"></script>
        <script src="{{ url('vendors/neon/js/popper.min.js') }}"></script>
        <script src="{{ url('vendors/neon/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('vendors/neon/js/modernizr.min.js') }}"></script>
        <script src="{{ url('vendors/neon/js/detect.js') }}"></script>
        <script src="{{ url('vendors/neon/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ url('vendors/neon/js/sidebar-menu.js') }}"></script> 
        @yield('script')
        <!-- Main JS -->
        <script src="{{ url('vendors/neon/js/main.js') }}"></script>
        <!-- End JS -->
    </body>
</html>    