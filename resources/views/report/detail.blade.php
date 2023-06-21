@extends('layouts.base')

@section('content')

    <head>
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
                    <ol class="sub-menu">
                        <li>
                            <h3>IDENTITAS</h3>
                        </li>
                    </ol>
                    <table>
                        <tr>
                            <td>
                                Nama Instansi :
                            </td>

                            <td>
                                Politeknik Negeri Subang
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                                
                            </td>

                            <td>
                                Politeknik Negeri Subang
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
