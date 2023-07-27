<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 14px;
        }

        h5 {
            /* font-size: 12pt; */
            text-align: center;

        }

        table {
            padding-left: 7px;
            text-align: left;
        }

        /* #topik, #data-topic {
            border: 1px black;
            border-collapse: collapse;
        } */
    </style>
</head>

<body>
    <img src="{{ asset('kop-polsub.png') }}" alt="" style="width: 700px">
    <h5>
        <b>
            RISALAH RAPAT
        </b>
    </h5>


    <table>
        <tbody>
            <tr>
                <td>Hari, Tanggal</td>
                <td>:</td>
                <td>
                    {{ \Carbon\Carbon::parse($risalahRapat->tanggal_audit)->translatedFormat('d F Y') }}
                </td>
            </tr>
            <tr>
                <td>Waktu</td>
                <td>:</td>
                <td>{{ \Carbon\Carbon::parse($risalahRapat->waktu)->translatedFormat('H:i') }} - Selesai</td>
            </tr>
            <tr>
                <td>Tempat</td>
                <td>:</td>
                <td>{{ $risalahRapat->tempat }}</td>
            </tr>
            <tr>
                <td>Agenda</td>
                <td>:</td>
                <td>{{ $risalahRapat->agenda }}</td>
            </tr>
        </tbody>
    </table>

    <br>
    <table style="width:100%" id="topic" border="1" cellspacing="0" cellpadding="5">
        <tr>
          <th id="data-topic">Topik</th>
          <th id="data-topic">Deskripsi</th> 
        </tr>
        @foreach ($topic as $item)
            <tr>
                <td>
                    {{ $item->topik_diskusi }}
                </td>
                <td>
                    {{ $item->deskripsi }}
                </td>
            </tr>
        @endforeach
      </table>
</body>

</html>
