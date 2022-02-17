@extends('base')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Formulir Siswa</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="@if(!empty($model_siswa)) {{ url('siswa/'.$model_siswa->id) }} @else {{ url('siswa') }}@endif" method="post">
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger alert-dismissible show fade">
                                            <div class="alert-body">
                                                <button class="close" data-dismiss="alert">
                                                    <span>×</span>
                                                </button>
                                                {{ $error }}
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                {{ csrf_field() }}
                                @method($method)
                                <div class="form-group">
                                    <label for="Kode">Kode Siswa</label>
                                    <input type="text" name="kode" class="form-control" value="@if(!empty($model_siswa)) {{$model_siswa->kode}} @endif" required>
                                    <small style="color: orange">* tidak boleh kosong</small>
                                </div>
                                <div class="form-group">
                                    <label for="Kode">Nama Siswa</label>
                                    <input type="text" name="name" class="form-control" value="@if(!empty($model_siswa)) {{$model_siswa->name}} @endif" required>
                                    <small style="color: orange">* tidak boleh kosong</small>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
