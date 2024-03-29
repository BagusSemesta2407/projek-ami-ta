@extends('layouts.base')

@section('content')
{{-- <form enctype="multipart/form-data" method="POST" action="{{ route('admin.instrument.store') }}"> --}}

    <div class="col-12 col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-lg">
                        <thead>
                            <tr>
                                <th>List Unit Kerja</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse (@$dataInstrument as $item)
                                <tr>
                                    <td class="d-flex justify-content-between">
                                        <p class=" mb-0">{{ $item->categoryUnit->name }}</p>
                                        <div class="btn-group dropstart me-1 mb-1">
                                            {{-- <button type="button" class="btn btn-secondary dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Drop left
                                            </button> --}}
                                            <a href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" >
                                            <i class="bi bi-three-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a 
                                                href="{{ route('menu-auditor.index-instrument-auditor.validasi-instrument-auditor', $item->id) }}" 
                                                class="dropdown-item">
                                                    Validasi Instrument
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <td class="text-center col-12"> 
                                    <img src="{{ asset('empty.svg') }}" alt="" class="m-5">
                                    <p>
                                        Belum Ada Data Kategori Unit Kerja
                                    </p>
                                    {{-- <a href="{{ route('admin.category-unit.index') }}">Klik Disini</a> --}}
                                </td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
{{-- </form> --}}

@endsection
