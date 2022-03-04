@section('title') 
Neon - Form Input Mask
@endsection
@extends('vendors.neon.master')
@section('style')

@endsection 
@section('rightbar-content')
<!-- Start XP Breadcrumbbar -->                    
<!-- <div class="xp-breadcrumbbar"> -->
         
<!-- </div> -->
<!-- End XP Breadcrumbbar -->
<!-- Start XP Contentbar -->    
<!-- <div class="xp-contentbar card"> -->

<!-- <style type="text/css">
    h1{
        color: black;
    }
    h2{
        color: black;
        font-size: 30px;
        font-family: sans-serif;
    }
    h4{
        color: black;
        font-size: 40px;
        font-family: sans-serif;
    }

    button.btn.btn-primary{
        background-color: blue;
        border-color: blue;
    }
</style> -->

<div id="xp-container">

<!-- Start XP Breadcrumbbar -->                    
            <div class="xp-breadcrumbbar">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <h1>JENIS LAYANAN</h1>
                    </div>
                    <div class="col-md-6 col-lg-6">
                       
                    </div>
                </div>          
            </div>
            <!-- End XP Breadcrumbbar -->

            <!-- Start XP Contentbar -->    
            <div class="xp-contentbar">

                <!-- Start Widget -->

                <!-- Start XP Row -->
                <div class="row"> 

                    @foreach($pelayanan as $index => $ply)
                    <!-- Start XP Col 1-->
                    <div class="col-md-6 col-lg-6 col-xl-4">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="xp-widget-box">
                                    <div class="float-left">
                                        <h4>{{ $index + 1 }}
                                        <a href="{{ route($ply->home) }}"><button @if($ply->type == \App\Pelayanan\PelayananProvider::PELAYANAN_BERBAYAR) style="background-color: orange; border-color: orange;" @endif  class="btn btn-primary" type="submit">{{ $ply->type }}</button></a></h4>
                                        <hr>
                                       

                                        <h2 class="mb-2 font-14">{{ $ply->nama }}</h2>
                                        <!-- <p class="mb-2 font-14 text-muted">Klik untuk memproses layanan >>></p>   -->
                                                                         
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End XP Col 1-->
                    @endforeach

                    
                </div>
                <!-- End XP Col 9-->




</div>
<!-- End XP Contentbar -->
@endsection
@section('script')
<!-- Input Mask JS -->
<script src="{{ asset('assets/plugins/bootstrap-inputmask/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/init/form-inputmask-init.js') }}"></script>
@endsection 