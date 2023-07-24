<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
        <style>
            body {
                font-family: 'Times New Roman', serif;
                font-size: 15px;
            }
    
            .page-header {
                text-align: center;
                margin-bottom: 20px;
                font-weight: bold;
                margin-bottom: .0001pt;
                font-size: 16px
            }
    
            ol {
                list-style-type: upper-roman;
            }
    
            h3 {
                font-size: 16px;
            }
    
            table,
            tr,
            td {
                border-collapse: collapse;
                border: none;
            }
        </style>
</head>
<body>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="page-header">
                    LAPORAN AUDIT MUTU INTERNAL
                </div>
                <div class="page-header">
                    LEMBAGA PENELITIAN DAN PENGABDIAN KEPADA MASYARAKAT
                </div>
                <div class="page-header">
                    POLITEKNIK NEGERI SUBANG
                </div>
    
                <div class="container">
                    <h3>IDENTITAS</h3>
                    {{-- <ol class="sub-menu">
                        <li>
                        </li>
                    </ol> --}}
                    <table class="table border">
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
                                Nama Prodi  
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
                        <tr>
                            <td>
                                 Auditor  
                            </td>
    
                            <td>
                                {{ $dataInstrument->auditor->name }}
                            </td>
                        </tr>
                    </table>
                </div>
    
                <div class="container">
                    
                </div>
            </div>
        </div>
    </section>
</body>
</html>