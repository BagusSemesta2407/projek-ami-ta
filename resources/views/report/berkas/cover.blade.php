<!DOCTYPE html>
<html>

<head>
    <title>Cover Halaman</title>
    <style>
        /* Style for the cover page */
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .cover-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            /* Position the image inside the container */
            top: 0;
            left: 0;
        }

        .cover-content {
            position: absolute;
            /* Position the content inside the container */
            top: 32%;
            /* Center the content vertically */
            left: 8%;
            /* Center the content horizontally */
            /* transform: translate(-50%, -50%); */
            /* text-align: center; */
            font-size: 24px;
            color: white;
            text-shadow: 2px 2px 4px #000;
        }

        .cover-text {
            font-size: 30px;
            color: black;
            font-weight: bold;
            text-transform: uppercase;
            line-height: 1.5;
        }
    </style>
</head>

<body>
    <div class="cover-container">
        <img src="{{ asset('assetReport/cover.jpg') }}" alt="Cover Image" class="cover-image">
        <div class="cover-content">
            <div class="cover-text">
                LAPORAN AUDIT MUTU INTERNAL
            </div>
            @if ($dataInstrument->kategori_audit == 'Program Studi')
                <div class="cover-text">
                    PROGRAM STUDI {{ $dataInstrument->programStudi->jenjang->name }}
                    {{ $dataInstrument->programStudi->name }}
                </div>
            @elseif ($dataInstrument->kategori_audit == 'Program Studi')
                <div class="cover-text">
                    JURUSAN {{ $dataInstrument->jurusan->name }}
                </div>
            @else
                <div class="cover-text">
                    {{ $dataInstrument->unit->name }}
                </div>
            @endif
            <div class="cover-text">
                TAHUN {{ \Carbon\Carbon::parse($dataInstrument->tanggal_audit)->translatedFormat('Y') }}
            </div>
        </div>
    </div>
    </div>
</body>

</html>
