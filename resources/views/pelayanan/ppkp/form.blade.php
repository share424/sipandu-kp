@section('title')
SiPandu KP - Tambah Kapal
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
            <h4 class="xp-page-title">Tambah Kapal</h4>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="xp-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Kapal</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Kapal</li>
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
                    <h5 class="card-title text-black">Tambah Kapal</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('kapal.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama_kapal">Nama Kapal</label>
                            <input type="text" class="form-control" id="nama_kapal" name="nama_kapal" value="{{ old('nama_kapal') }}" placeholder="Nama Kapal">
                        </div>
                        <div class="form-group">
                            <label for="tipe_kapal">Tipe Kapal</label>
                            <select class="form-control" id="tipe_kapal" name="tipe_kapal" required>
                                <option value="">Pilih Tipe Kapal</option>
                                @foreach ($tipe_kapal as $tipe)
                                <option value="{{ $tipe->id }}">{{ $tipe->nama_tipe }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bahan_kapal">Bahan Kapal</label>
                            <select class="form-control" id="bahan_kapal" name="bahan_kapal" required>
                                <option value="">Pilih Bahan Kapal</option>
                                @foreach ($bahan_kapal as $bahan)
                                <option value="{{ $bahan->id }}">{{ $bahan->nama_bahan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ukuran">Merk</label>
                            <input type="text" class="form-control" id="merk" name="merk" value="{{ old('merk') }}" placeholder="Merk" required>
                        </div>

                        <div class="form-group">
                            <label for="ukuran">Ukuran</label>
                            <input type="text" class="form-control" id="ukuran" name="ukuran" value="{{ old('ukuran') }}" placeholder="Ukuran" required>
                        </div>
                        <div class="form-group">
                            <label for="lebar">Lebar</label>
                            <input type="number" class="form-control" id="lebar" name="lebar" value="{{ old('lebar') }}" placeholder="Lebar" required>
                        </div>
                        <div class="form-group">
                            <label for="panjang">Panjang</label>
                            <input type="number" class="form-control" id="panjang" name="panjang" value="{{ old('panjang') }}" placeholder="Panjang" required>
                        </div>
                        <div class="form-group">
                            <label for="dalam">Dalam</label>
                            <input type="number" class="form-control" id="dalam" name="dalam" value="{{ old('dalam') }}" placeholder="Dalam" required>
                        </div>
                        <div class="form-group">
                            <label for="tahun_pembuatan">Tahun Pembuatan</label>
                            <input type="number" class="form-control" id="tahun_pembuatan" name="tahun_pembuatan" value="{{ old('tahun_pembuatan') }}" placeholder="Tahun Pembuatan" required>
                        </div>
                        <div class="form-group">
                            <label for="tempat_pembuatan">Tempat Pembuatan</label>
                            <input type="text" class="form-control" id="tempat_pembuatan" name="tempat_pembuatan" value="{{ old('tempat_pembuatan') }}" placeholder="Tempat Pembuatan" required>
                        </div>
                        <div class="form-group">
                            <label for="loa">LOA</label>
                            <input type="text" class="form-control" id="loa" name="loa" value="{{ old('loa') }}" placeholder="LOA" required>
                        </div>
                        <div class="form-group">
                            <label for="nomor_mesin">Nomor Mesin</label>
                            <input type="text" class="form-control" id="nomor_mesin" name="nomor_mesin" value="{{ old('nomor_mesin') }}" placeholder="Nomor Mesin" required>
                        </div>
                        <div class="form-group">
                            <label for="merk_mesin">Merk Mesin</label>
                            <input type="text" class="form-control" id="merk_mesin" name="merk_mesin" value="{{ old('merk_mesin') }}" placeholder="Merk Mesin" required>
                        </div>
                        <div class="form-group">
                            <label for="tipe_mesin">Tipe Mesin</label>
                            <input type="text" class="form-control" id="tipe_mesin" name="tipe_mesin" value="{{ old('tipe_mesin') }}" placeholder="Tipe Mesin" required>
                        </div>
                        <div class="form-group">
                            <label for="daya_mesin">Daya Mesin</label>
                            <input type="text" class="form-control" id="daya_mesin" name="daya_mesin" value="{{ old('daya_mesin') }}" placeholder="Daya Mesin" required>
                        </div>
                        <div class="form-group">
                            <label for="tempat_pendaftaran">Tempat Pendaftaran</label>
                            <input type="text" class="form-control" id="tempat_pendaftaran" name="tempat_pendaftaran" value="{{ old('tempat_pendaftaran') }}" placeholder="Tempat Pendaftaran" required>
                        </div>
                        <div class="form-group">
                            <label for="akta">Akta</label>
                            <input type="text" class="form-control" id="akta" name="akta" value="{{ old('akta') }}" placeholder="Akta" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_palka">Jumlah Palka</label>
                            <input type="text" class="form-control" id="jumlah_palka" name="jumlah_palka" value="{{ old('jumlah_palka') }}" placeholder="Jumlah Pakta" required>
                        </div>
                        <div class="form-group">
                            <label for="tanda_pengenal_kapal">Tanda Pengenal Kapal</label>
                            <input type="text" class="form-control" id="tanda_pengenal_kapal" name="tanda_pengenal_kapal" value="{{ old('tanda_pengenal_kapal') }}" placeholder="Tanda Pengenal Kapal" required>
                        </div>
                        <div class="form-group">
                            <label for="gt">GT</label>
                            <input type="text" class="form-control" id="gt" name="gt" value="{{ old('gt') }}" placeholder="GT" required>
                        </div>
                        <div class="form-group">
                            <label for="nt">NT</label>
                            <input type="text" class="form-control" id="nt" name="nt" value="{{ old('nt') }}" placeholder="NT" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_kapal_sebelum">Nama Kapal Sebelum</label>
                            <input type="text" class="form-control" id="nama_kapal_sebelum" name="nama_kapal_sebelum" value="{{ old('nama_kapal_sebelum') }}" placeholder="Nama Kapal Sebelum">
                        </div>

                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
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