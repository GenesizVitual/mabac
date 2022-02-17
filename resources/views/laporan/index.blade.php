@extends('base')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data Perengkingan</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tabel Rangking</h4>
                            <div class="card-toll">
                                <a href="{{url('cetak-perengkingan')}}" class="btn btn-info float-right">Cetak</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
