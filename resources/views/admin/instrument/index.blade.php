@extends('layouts.base')

@section('content')
    <div class="row mt-5">
        <div class="col-md-6 col-xl-4">
            <a class="card mb-3" href="#">
                <div class="card-body">
                    <p class="mb-0">
                        {{-- <a href="#">body</a> --}}
                        body
                    </p>
                </div>
            </a>
            <div class="card mb-3">
                <div class="card-body">
                    <p class="mb-0">
                        <a href="">body</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="page-content">
    <section class="row">
        <div class="card">
            <div class="card-header">
                Data Unit Kerja

            </div>

            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Unit</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($instrument as $item)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $item->categoryUnit->name }}
                                </td>

                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </section>
</div> --}}
@endsection
