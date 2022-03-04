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
<div class="container card mt-4">

    <div id="xp-container">
        <div class="row">

            <!-- Start XP Col -->
            <div class="col-lg-12 card card-body " style="border-radius: 0px;">
                <h3 class="text-center mt-0 m-b-15">
                    <!-- <a href="index.html" class="xp-web-logo"><img src="assets/images/ikan.png" height="40" alt="logo">
            </a> -->
                </h3>
                <div class="p-3">
                    <form action="{{ route('auth.signup') }}" method="post">
                        @csrf
                        <div class="text-center mb-3">
                            <h4 class="text-black">DAFTAR</h4>
                            <p class="text-muted">Silahkan lengkapi form untuk mendaftarkan Akun anda </p>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama-lengkap", name="nama_lengkap", placeholder="Nama Lengkap" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="hp", name="hp", placeholder="No. HP" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="no-identitas", name="no_identitas", placeholder="No. Identitas (KTP/Passport)" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="alamat", name="alamat", placeholder="Alamat" required>
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
                        
                        <button type="submit" class="btn btn-primary btn-rounded btn-lg btn-block">Daftar</button><br>

                        <p class="text-muted">Sudah memiliki akun? <a href="{{ route('auth.login') }}">Login Sekarang</a></p>
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