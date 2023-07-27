@extends('layouts.base')

@section('content')
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
                                        <p class=" mb-0">
                                            Audit Dokumen AMI
                                            {{ \Carbon\Carbon::parse($item->tanggal_audit)->translatedFormat('Y') }}
                                        </p>
                                        <div class="btn-group dropstart me-1 mb-1">

                                            <a href="{{ route('menu-auditor.audit-dokumen.data-audit-dokumen', $item->id) }}"
                                                class="btn btn-primary">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            &nbsp;
                                                <a href="{{ route('menu-auditor.audit-dokumen.validasi-audit-dokumen', $item->id) }}" class="btn btn-success">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <td class="text-center col-12">
                                    <img src="{{ asset('empty.svg') }}" alt="" class="m-5">
                                    <p>
                                        Belum Ada Data Kategori Unit Kerja
                                    </p>
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
