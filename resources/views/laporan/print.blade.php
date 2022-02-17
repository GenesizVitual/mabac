<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Tabel Rangking metode Mabac</title>
    <style>
        #customers {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        #customers td, #customers th {
          border: 1px solid #ddd;
          padding: 8px;
        }
        
        #customers tr:nth-child(even){background-color: #f2f2f2;}
        
        #customers tr:hover {background-color: #ddd;}
        
        #customers th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #04AA6D;
          color: white;
        }
        </style>
</head>
<body>
    <h3 style="text-align: center">Data Penerima Bantuan dengan Perengkingan menggunakan metode mabac</h3>
    <table id="customers">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>Rangking</th>
            </tr>
        </thead>
        <tbody>
            {{-- {{dd($mabac)}} --}}
            @if (!empty($mabac['matrik_rangking']))
                @foreach ($mabac['matrik_rangking'] as $key => $item)
                    <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $siswa->where('kode', $key)->first()->name }}</td>
                        <td>{{ $item }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</body>
</html>