@extends('base')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data Siswa</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    @if(Session::get('message_success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{ Session::get('message_success') }}
                        </div>
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <a href="{{url('siswa/create')}}" class="btn btn-info">Tambah Siswa</a>
                            <table class="table table-striped table-hover mt-2" >
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode Siswa</th>
                                        <th>Nama</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($model_siswa))
                                    @php($i=1)
                                        @foreach ($model_siswa as $item)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$item->kode}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>
                                                <form action="{{url('siswa/'.$item->id)}}" method="post">
                                                    @method('delete')
                                                    {{ csrf_field() }}
                                                    <a href="{{url('siswa/'.$item->id.'/edit')}}" class="btn btn-warning">Ubah</a>
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda akan menghapus data siswa dengan nama {{$item->name}}')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3">Data siswa masih kosong</td>
                                        </tr>
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
