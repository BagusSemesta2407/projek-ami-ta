@extends('layouts.base')

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="card">
                <div class="card-header">
                    Data User

                    <a href="{{ route('admin.user.create') }}" class="btn btn-outline-primary block float-end">
                        Tambah
                    </a>

                </div>

                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP/NIK</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($user as $item)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $item->nip }}
                                    </td>
                                    <td>
                                        {{ $item->name }}
                                    </td>

                                    <td>
                                        {{ $item->email }}
                                    </td>
                                    <td>
                                        {{-- {{ $item->name }} --}}
                                        @if ($item->getRoleNames()[0] == 'admin')
                                            Admin
                                        @elseif ($item->getRoleNames()[0] == 'auditee')
                                            Auditee
                                        @elseif ($item->getRoleNames()[0] == 'auditor')
                                            Auditor
                                        @elseif ($item->getRoleNames()[0] == 'P4MP')
                                            Kepala P4MP
                                        @else
                                            Tidak Memiliki Role
                                        @endif
                                    </td>


                                    <td>
                                        <div class="d-flex ">
                                            <a href="{{ route('admin.user.edit', $item->id) }}"
                                                class="btn btn-sm btn-outline-warning">
                                                <i class="bi bi-pen"></i>
                                            </a>
                                            &nbsp;
                                            <button class="btn btn-sm btn-outline-danger delete"
                                                data-url="{{ route('admin.user.destroy', $item->id) }}">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                            &nbsp;
                                            <button
                                                class="btn btn-sm btn-outline-{{ $item->status == 'Active' ? 'info' : 'secondary' }} user-active"
                                                data-url="{{ route('admin.user.status-user', $item->id) }}"
                                                data-status={{ $item->status }}>
                                                @if ($item->status == 'Non Active')
                                                    <i class="bi bi-lock"></i>
                                                @else
                                                    <i class="bi bi-unlock"></i>
                                                @endif
                                            </button>

                                            {{-- <button class=" user-active" data-url="{{ route('admin.status-user', $item->id) }}" data-status={{ $item->status }} title="Ubah Status User">
                                            <i class="bi bi-person-fill-lock"></i>
                                        </button> --}}
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

@section('script')
    <script type="text/javascript">
        $(document).on('click', '.user-active', function() {
            let url = $(this).data('url');
            let status = $(this).data('status');

            let title = status == 'Active' ? 'Non Aktifkan User?' : 'Aktifkan User?';
            let text = status == 'Active' ? 'User akan dinonaktifkan.' : 'User akan diaktifkan kembali.';
            let icon = status == 'Active' ? 'warning' : 'info';

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            Swal.fire({
                title: title,
                text: text,
                icon: icon,
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'GET',
                        url: url,
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Status User Berhasil Diubah!',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1500 // Durasi toast success
                            }).then(function() {
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            console.log('Error: ', xhr
                            .responseJSON); // Tampilkan pesan error spesifik
                            Swal.fire({
                                title: 'Gagal!',
                                text: 'Terjadi kesalahan saat mengubah status user.',
                                icon: 'error',
                                showConfirmButton: false,
                                timer: 1500 // Durasi toast error
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection
