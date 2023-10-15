<!DOCTYPE html>
<html>

<head>
    <title>Isi Halaman</title>
    <style>
        /* Style for the content page */
        body {
            text-align: left;
            padding-top: 50px;
            font-size: 12px;
            font-family: 'Arial', serif;
            margin-bottom: 20px;
            margin-left: 30px;
            width: 80%;
            padding: 8px;
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
    <h4>Tujuan Audit Mutu Internal</h4>
    @foreach ($tujuan as $item)
        {{ $loop->iteration }} . {{ $item->deskripsi_tujuan }}
    @endforeach
    <br>

    <h4>Lingkup Audit Internal</h4>
    @foreach ($lingkup as $item)
        {{ $loop->iteration }}. {{ $item->deskripsi_lingkup }}
    @endforeach

    <br>
    <h4>Temuan Audit</h4>
    <table class="table border">
        <thead>
            <tr>
                <th>No</th>
                <th>Standar SPMI</th>
                <th>Indikator</th>
                <th>Status Ketercapaian</th>
                <th>Hasil Temuan Audit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($auditLapangan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->auditDokumen->evaluasiDiri->instrument->status_standar }}</td>
                    <td>{{ $item->auditDokumen->evaluasiDiri->instrument->target }}</td>
                    <td>{{ $item->auditDokumen->evaluasiDiri->instrument->status_ketercapaian }}</td>
                    <td>{{ strip_tags($item->hasil_temuan_audit) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <h4>Kelebihan</h4>
    @foreach ($kesimpulan as $item)
        {{ $loop->iteration }}.{{ $item->kelebihan }}
    @endforeach
    <h4>Kesimpulan</h4>
    @foreach ($kesimpulan as $value)
        {{ $loop->iteration }}.{{ $value->kesimpulan }}
    @endforeach
    <!-- Add more content below the table if needed -->
</body>

</html>
