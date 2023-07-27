@extends('layouts.base')
@section('content')
    <div class="page-content">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    Rapat Tinjauan Manajemen

                    <a href="{{ route('menu-p4mp.rapat-tinjauan-manajemen.create') }}" class="btn btn-outline-primary float-end">
                        Tambah
                    </a>
                </div>

                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Laporan RTM</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($risalahRapat as $item)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        Risalah Rapat Tinjauan Manajemen Audit Mutu Internal Tahun {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('Y') }}
                                    </td>
                                    <td>
                                        <a href="{{ route('menu-p4mp.rapat-tinjauan-manajemen.edit', $item->id) }}"
                                            class="btn btn-sm btn-outline-warning">
                                            <i class="bi bi-pen"></i>
                                        </a>
                                        <a href="{{ route('menu-p4mp.rapat-tinjauan-manajemen.risalah', $item->id) }}" class="btn btn-sm btn-outline-info">
                                            <i class="bi bi-journal-plus"></i>
                                        </a>
                                        <a href="{{ route('menu-p4mp.cetak-rtm', $item->id) }}" class="btn btn-sm btn-outline-success" target="_blank">
                                            <i class="bi bi-printer-fill"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection