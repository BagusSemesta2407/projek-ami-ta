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
                                         <p class=" mb-0">{{ $item->categoryUnit->name }}</p>
                                         <div class="btn-group dropstart me-1 mb-1">
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
 