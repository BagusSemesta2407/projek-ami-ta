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
        <h4>PENDAHULUAN</h4>

        <tr>
            <td>
                Auditee
            </td>

            <td>
                {{ $dataInstrument->categoryUnit->kepala }}
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
        <tr>
            <td>
                Auditor 1
            </td>

            <td>
                {{ $dataInstrument->auditor->name }}
            </td>
        </tr>
        <tr>
            <td>
                Auditor 2
            </td>

            <td>
                {{ $dataInstrument->auditor2->name }}
            </td>
        </tr>
    </table>

    <!-- Add more content below the table if needed -->
</body>

</html>
