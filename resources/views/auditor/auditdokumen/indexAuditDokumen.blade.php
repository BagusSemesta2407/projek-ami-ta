{{-- @extends('layouts.base')

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="card">
                <div class="card-header">
                    Data Audit Dokumen

                    <a href="{{ route('admin.category-unit.create') }}" class="btn btn-outline-primary block float-end">
                        Tambah
                    </a>

                </div>

                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Standar SPMI</th>
                                <th>Butir Mutu</th>
                                <th>Status Ketercapaian</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($instrumentAuditee as $item)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $item->instrument->status_standar }}
                                    </td>
                                    <td>
                                        {{ $item->instrument->name }}
                                    </td>
                                    <td>
                                        {{ $item->status_ketercapaian }}
                                    </td>

                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('menu-auditor.index-audit-dokumen.input-hasil-audit-dokumen', $item->id) }}"
                                                class="btn btn-sm btn-outline-secondary">
                                                <i class="bi bi-file-earmark-diff"></i>
                                            </a>
                                            &nbsp;

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
    </div>
@endsection

 --}}


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
                                                 href="
                                                 {{ route('menu-auditor.index-audit-dokumen.get-index-data-audit-dokumen', $item->id) }}
                                                 " 
                                                 class="dropdown-item">
                                                     Audit
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
 