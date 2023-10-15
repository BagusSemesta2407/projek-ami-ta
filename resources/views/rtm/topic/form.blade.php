@extends('layouts.base')

@section('content')
    <section>
        <div class="card collapse-icon accordion-icon-rotate">
            <div class="card-header">
                <h1 class="card-title pl-1">Detail Audit Dokumen</h1>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="accordion" id="cardAccordion">

                        @foreach ($tinjauanPengendalian as $item)
                            <div class="card">
                                <div class="card-header" id="headingOne" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"
                                    role="button">
                                    <span
                                        class="collapsed collapse-title">{{ $item->auditLapangan->auditDokumen->evaluasiDiri->instrument->target }}</span>
                                </div>
                                <div id="collapseOne" class="collapse pt-1" aria-labelledby="headingOne"
                                    data-parent="#cardAccordion">
                                    <div class="card-body col-12">
                                        <b>
                                            Hasil Temuan Audit :
                                        </b>
                                        {{ $item->auditLapangan->hasil_temuan_audit }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <label for="" class="col-md-6">
                                    <b>
                                        Tanggal
                                    </b>
                                </label>


                                <label for="" class="col-md-6">
                                    <b>
                                        Tempat
                                    </b>
                                </label>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    {{ \Carbon\Carbon::parse($risalahRapat->tanggal)->translatedFormat('d F Y') }}
                                </div>

                                <div class="col-md-6">
                                    {{ $risalahRapat->tempat }}
                                </div>
                            </div>

                            <div class="row">
                                <label for="" class="col-md-6">
                                    <b>
                                        Waktu
                                    </b>
                                </label>
                                <label for="" class="col-md-6">
                                    <b>
                                        Agenda
                                    </b>
                                </label>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    {{ \Carbon\Carbon::parse($risalahRapat->waktu)->translatedFormat('H:i') }} - Selesai
                                </div>
                                <div class="col-md-6">
                                    {{ $risalahRapat->agenda }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            Risalah Rapat Tinjauan Manajemen
                            <div class="col-12">
                                <form action="{{ route('menu-p4mp.rapat-tinjauan-manajemen.post-risalah', $risalahRapat) }}"
                                    class="form form-form-vertical" enctype="multipart/form-data" method="POST"
                                    id="form">
                                    {{ csrf_field() }}
                                    <div id="formRepeater">
                                        <div class="repeater-item mb-3">
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" name="topik_diskusi[]" class="form-control"
                                                        placeholder="Topik Diskusi">
                                                </div>
                                                <div class="col">
                                                    <textarea name="deskripsi[]" class="form-control" placeholder="Deskripsi"></textarea>
                                                </div>
                                                <div class="col-auto">
                                                    <button type="button"
                                                        class="btn btn-danger remove-btn">&times;</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" id="addBtn" class="btn btn-primary">Add New Item</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            // Add new repeater item
            $("#addBtn").click(function() {
                var newItem = `
      <div class="repeater-item mb-3">
        <div class="row">
          <div class="col">
            <input type="text" name="topik_diskusi[]" class="form-control" placeholder="Topik Diskusi">
          </div>
          <div class="col">
            <textarea name="deskripsi[]" class="form-control" placeholder="Deskripsi"></textarea>
          </div>
          <div class="col-auto">
            <button type="button" class="btn btn-danger remove-btn">&times;</button>
          </div>
        </div>
      </div>`;
                $("#formRepeater").append(newItem);
            });

            // Remove repeater item
            $(document).on("click", ".remove-btn", function() {
                $(this).closest(".repeater-item").remove();
            });
        });
    </script>
@endsection
