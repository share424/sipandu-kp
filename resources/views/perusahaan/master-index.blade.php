@section('title')
SiPandu KP - List Perusahaan
@endsection
@extends('vendors.neon.master')
@section('style')
<!-- DataTables CSS -->
<link href="{{ asset('vendors/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('vendors/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('vendors/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('rightbar-content')
<!-- Start XP Breadcrumbbar -->
<div class="xp-breadcrumbbar">
    <div class="row">
        <div class="col-md-6 col-lg-6">
            <h4 class="xp-page-title">List Perusahaan</h4>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="xp-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List Perusahaan</li>
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
                    <h5 class="card-title text-black">Data List Perusahaan</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table-perusahaan" class="display table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Nama Pemilik</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($perusahaan as $p)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$p->nama_perusahaan}}</td>
                                    <td>{{$p->nama_pemilik}}</td>
                                    <td>{{$p->alamat_perusahaan}}</td>
                                    <td>
                                        
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                            
                        </table>
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
<script src="{{ asset('vendors/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendors/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendors/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('vendors/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('vendors/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendors/js/init/table-datatable-init.js') }}"></script>

<script>
    $("#table-perusahaan").DataTable();
</script>

@endsection