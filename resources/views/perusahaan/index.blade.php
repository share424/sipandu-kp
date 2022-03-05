@section('title')
SiPandu KP - Info Perusahaan
@endsection
@extends('vendors.neon.master')
@section('style')
<!-- DataTables CSS -->
<link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('rightbar-content')
<!-- Start XP Breadcrumbbar -->
<div class="xp-breadcrumbbar">
    <div class="row">
        <div class="col-md-6 col-lg-6">
            <h4 class="xp-page-title">Info Perusahaan</h4>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="xp-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Perusahaan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Info Perusahaan</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- End XP Breadcrumbbar -->
<!-- Start XP Contentbar -->
<div class="xp-contentbar">
    <!-- Start XP Row -->
    <div class="row">
        <!-- End XP Col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header bg-white">
                    <h5 class="card-title text-black">Info Perusahaan</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_perusahaan">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="{{ $perusahaan->nama_perusahaan }}" placeholder="Nama Perusahaan" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_pemilik">Nama Pemilik</label>
                        <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" value="{{ $perusahaan->nama_pemilik }}" placeholder="Nama Pemilik" readonly>
                    </div>
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input type="text" class="form-control" id="website" name="website" value="{{ $perusahaan->website }}" placeholder="Website" readonly>
                    </div>
                    <div class="form-group">
                        <label for="npwp">NPWP</label>
                        <input type="text" class="form-control" id="npwp" name="npwp" value="{{ $perusahaan->npwp }}" placeholder="NPWP" readonly>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat_perusahaan" rows="3" readonly>{{ $perusahaan->alamat_perusahaan }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <!-- End XP Col -->

    </div>
    <!-- End XP Row -->
</div>
<!-- End XP Contentbar -->
@endsection
@section('script')
<!-- Required Datatable JS -->
<script src="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
@endsection