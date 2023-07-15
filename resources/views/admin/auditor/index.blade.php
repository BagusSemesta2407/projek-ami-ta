@extends('layouts.base')

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="card">
                <div class="card-header">
                    Data Auditor
                    <a href="{{ route('admin.auditor.create') }}" class="btn btn-outline-primary block float-end">
                        Tambah
                    </a>
                </div>


                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Auditor</th>
                                <th>Email</th>
                                <th>Jabatan</th>
                                <th>Tugas</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($auditor as $item)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $item->user->name }}
                                    </td>
                                    <td>
                                        {{ $item->user->email }}
                                    </td>

                                    <td>
                                        @if ($item->jabatan == 'ketua')
                                            Ketua Tim Auditor
                                        @elseif ($item->jabatan == 'sekretaris')
                                            Sekretaris Tim Auditor
                                        @else
                                            Anggota Tim Auditor
                                        @endif
                                    </td>

                                    <td>
                                        {{ $item->tugas }}
                                    </td>

                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('admin.auditor.edit', $item->id) }}"
                                                class="btn btn-sm btn-outline-warning">
                                                <i class="bi bi-pen"></i>
                                            </a>
                                            &nbsp;
                                            {{-- <form method="POST" action="{{ route('admin.auditor.destroy', $item->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit"
                                                    class="btn btn-sm btn-outline-danger btn-flat show_confirm"
                                                    data-toggle="tooltip" title='Delete'>
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </form> --}}

                                            <button class="btn btn-sm btn-outline-danger delete" data-url="{{ route('admin.auditor.destroy', $item->id) }}">
                                                <i class="bi bi-trash3"></i>
                                            </button>

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
