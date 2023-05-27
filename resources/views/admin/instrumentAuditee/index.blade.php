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
                                    <td class="col-auto">
                                        <p class=" mb-0">{{ $item->categoryUnit->name }}</p>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.instrument-auditee.create-form-instrument-auditee', $item->id) }}" class="float-end">
                                            <i class="bi bi-chevron-right"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <td class="text-center col-12"> 
                                    <img src="{{ asset('oops.png') }}" alt="" class="m-5">
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
