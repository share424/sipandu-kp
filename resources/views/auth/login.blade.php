@section('title')
Neon - Form Input Mask
@endsection
@extends('vendors.neon.login')
@section('style')

@endsection
@section('rightbar-content-login')
<!-- Start XP Breadcrumbbar -->

<!-- End XP Breadcrumbbar -->
<!-- Start XP Contentbar -->
<div class="xp-contentbar card">

    <div id="xp-container">
        <div class="row">

            <!-- Start XP Col -->
            <div class="col-lg-6">
                <img src="vendors/images/jaring.jpg" height="auto" width="100%" alt="Thumbnail Image" class="img-thumbnail">
            </div>
            <!-- End XP Col -->


            <!-- Start XP Col -->
            <div class="col-lg-6 card card-body " style="border-radius: 0px;">
                <h3 class="text-center mt-0 m-b-15">
                    <!-- <a href="index.html" class="xp-web-logo"><img src="assets/images/ikan.png" height="40" alt="logo">
            </a> -->
                </h3>
                <div class="p-3">
                    <form action="{{ route('auth.login') }}" method="post">
                        @csrf
                        <div class="text-center mb-3">
                            <h4 class="text-black">SELAMAT DATANG</h4>
                            <p class="text-muted">Silahkan lengkapi form untuk masuk ke akun Anda </p>
                        </div>
                        <div style="width:100%; text-align: center;" class="form-group">
                            <input type="text" class="form-control" id="username" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                        @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="form-row">
                            <div class="form-group col-6">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="rememberme">
                                    <label class="custom-control-label" for="rememberme">Ingatkan Saya</label>
                                </div>
                            </div>
                            <div class="form-group col-6 text-right">
                                <label class="forgot-psw">
                                    <a id="forgot-psw" href="{{ route('auth.reset-password') }}">Lupa Password?</a>
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-rounded btn-lg btn-block">Login</button><br>

                        <p class="text-muted">Belum memiliki akun? <a href="{{ route('auth.signup') }}">Daftar Sekarang</a></p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </form>
                </div>






            </div>
            <!-- End XP Contentbar -->
            @endsection
            @section('script')
            <!-- Input Mask JS -->
            <script src="{{ asset('assets/plugins/bootstrap-inputmask/jquery.inputmask.bundle.min.js') }}"></script>
            <script src="{{ asset('assets/js/init/form-inputmask-init.js') }}"></script>
            @endsection