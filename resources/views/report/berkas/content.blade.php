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
        <tr>
            <td>
                Jenjang
            </td>

            <td>
                Diploma 3
            </td>

        </tr>
        <tr>
            <td>
                @if ($dataInstrument->categoryUnit->kategori_audit == 'Unit')
                    Unit
                @elseif ($dataInstrument->categoryUnit->kategori_audit == 'Program Studi')
                    Program Studi
                @else
                    Jurusan
                @endif
            </td>

            <td>
                {{ $dataInstrument->categoryUnit->name }}
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
        @foreach ($auditor as $item)
            @if ($item->jabatan == 'anggota')
                <tr>
                    <td>
                        Anggota Auditor
                    </td>

                    <td>
                        {{ $loop->iteration }}. {{ $item->name }}
                    </td>
                </tr>
            @endif
        @endforeach
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
