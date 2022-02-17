@extends('base')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Formulir Tanggungan Orang tua</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="@if(!empty($model)) {{ url('tanggungan/'.$model->id) }} @else {{ url('tanggungan') }}@endif" method="post">
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
                                    <label for="Kode">Tanggungan</label>
                                    <input type="text" name="tanggungan" class="form-control" value="@if(!empty($model)) {{$model->tanggungan}} @endif" required>
                                    <small style="color: orange">* tidak boleh kosong</small>
                                </div>
                                <div class="form-group">
                                    <label for="Kode">Bobot</label>
                                    <input type="number" name="bobot" class="form-control" value="@if(!empty($model)){{$model->bobot}}@endif" required>
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
