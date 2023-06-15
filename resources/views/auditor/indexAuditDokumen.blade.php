@extends('layouts.base')

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="card">
                <div class="card-header">
                    Data Audit Dokumen

                    {{-- <a href="{{ route('admin.category-unit.create') }}" class="btn btn-outline-primary block float-end">
                        Tambah
                    </a> --}}

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

{{-- @section('script')
    
@endsection --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script> --}}
