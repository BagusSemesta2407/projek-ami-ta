 <!DOCTYPE html>
 <html>

 <head>
     <title>Isi Halaman</title>
     <style>
         /* Style for the content page */
         body {
             text-align: center;
             padding-top: 50px;
             font-size: 12px;
             font-family: 'Arial', serif;
         }

         table {
             width: 80%;
             border-collapse: collapse;
             margin-bottom: 20px;
             margin-left: 30px;
         }

         th,
         td {
             border: 1px solid black;
             padding: 8px;
         }
     </style>
 </head>

 <body>
     {{-- <h2>Isi Halaman</h2>
    <p>Ini adalah isi halaman PDF.</p> --}}

     <!-- Example table, replace with your data -->
     <table class="table border">
         <h4>IDENTITAS</h4>

         <tr>
             <td>
                 Nama Instansi
             </td>

             <td>
                 Politeknik Negeri Subang
             </td>

         </tr>
         @if ($dataInstrument->kategori_audit == 'Program Studi')
             <tr>
                 <td>
                     Jenjang
                 </td>

                 <td>
                     {{ $dataInstrument->programStudi->jenjang->name }}
                 </td>
             </tr>
             <tr>
                 <td>
                     Jurusan
                 </td>

                 <td>
                     {{ $dataInstrument->programStudi->jurusan->name }}
                 </td>
             </tr>
             <tr>
                 <td>
                     Program Studi
                 </td>

                 <td>
                     {{ $dataInstrument->programStudi->name }}
                 </td>
             </tr>
         @elseif ($dataInstrument->kategori_audit == 'Jurusan')
             <tr>
                 <td>
                     Jenjang
                 </td>

                 <td>
                    -
                 </td>
             </tr>
             <tr>
                 <td>
                     Jurusan
                 </td>

                 <td>
                     {{ $dataInstrument->jurusan->name }}
                 </td>
             </tr>
             <tr>
                 <td>
                     Program Studi
                 </td>

                 <td>
                     -
                 </td>
             </tr>
         @endif

         <tr>
             <td>
                 Unit
             </td>

             <td>
                 @if (@$dataInstrument->kategori_audit == 'Unit')
                     {{ $dataInstrument->unit->name }}
                 @else
                     -
                 @endif
             </td>
         </tr>

         <tr>
             <td>
                 @if (@$dataInstrument->kategori_audit == 'Jurusan')
                     Ketua Jurusan
                 @elseif (@$dataInstrument->kategori_audit == 'Program Studi')
                     Ketua Program Studi
                 @else
                     Kepala Unit
                 @endif
             </td>
             <td>
                 {{ $dataInstrument->auditee->name }}
             </td>
         </tr>

         <tr>
             <td>
                 Tanggal Audit
             </td>

             <td>
                 {{ \Carbon\Carbon::parse($dataInstrument->tanggal_audit)->translatedFormat('d F Y') }}

             </td>
         </tr>
         @foreach ($auditor as $item)
             @if ($item->jabatan == 'ketua')
                 <tr>
                     <td>
                         Ketua Auditor
                     </td>

                     <td>
                         {{ $item->user->name }}
                     </td>
                 </tr>
             @endif
         @endforeach
         {{-- @foreach ($auditor as $item)
             @if ($item->jabatan == 'anggota') --}}
         <tr>
             <td>
                 Anggota Auditor 1
             </td>

             <td>
                 {{ $dataInstrument->auditor->user->name }}
             </td>
         </tr>
         <tr>
             <td>
                 Anggota Auditor 2
             </td>

             <td>
                 {{ $dataInstrument->auditor2->user->name }}
             </td>
         </tr>
         {{-- @endif
         @endforeach --}}
         <tr>
             <td>
                 Tahun
             </td>

             <td>
                 {{ \Carbon\Carbon::parse($dataInstrument->tanggal_audit)->translatedFormat('Y') }}

             </td>
         </tr>
     </table>

     <!-- Add more content below the table if needed -->
 </body>

 </html>
