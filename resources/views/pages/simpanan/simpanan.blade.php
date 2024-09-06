@extends('layout.app')

@section('title', 'Table')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Table</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#"></a></div>
                    <div class="breadcrumb-item"></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Table</h2>

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Daftar Simpanan</h4>
                                <a href="{{ route('simpanan.create') }}" class="btn btn-primary">Tambah Simpanan</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-bordered table-md table">
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Nasabah</th>
                                            <th>Jumlah Simpanan</th>
                                            <th>Bunga Simpanan</th>
                                            <th>Edit</th>
                                            <th>Hapus</th>
                                        </tr>
                                        @foreach ($simpanan as $simpan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $simpan->nasabah->nama }}</td>
                                            <td>{{ $simpan->jumlah_simpanan }}</td>
                                            <td><div class="badge badge-success">{{ $simpan->bunga_simpanan }}%</div></td>
                                            <td><a href="{{ route('simpanan.edit', $simpan->id) }}" class="btn btn-success">Edit</a></td>
                                            <td>
                                                <form action="{{ route('simpanan.destroy', $simpan->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <nav class="d-inline-block">
                                    <ul class="pagination mb-0">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/components-table.js') }}"></script>
@endpush
