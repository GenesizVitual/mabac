@extends('base')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Penentuan kriteria</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Input kriteria</h4>
                        </div>
                        <div class="card-body">
                            <form action="@if(!empty($alternatif_dipilih)) {{url('penentuan-kriteria/'.$alternatif_dipilih->id)}} @else {{url('penentuan-kriteria')}} @endif" method="post">
                                @method($method)
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="siswa">Siswa</label>
                                            <select name="AL" class="form-control" required>
                                                @if (!empty($siswa))
                                                    <option value="">Silahkan pilih nama siswa</option>
                                                    @foreach ($siswa as $item)
                                                        <option value="{{ $item->id }}" @if(!empty($alternatif_dipilih)) @if($item->id==$alternatif_dipilih->AL) selected @endif @endif>{{ $item->name }}</option>
                                                    @endforeach
                                                @else
                                                    <option value="">Belum ada data siswa</option>
                                                @endif
                                            </select>
                                            <small style="color: orange">*Tidak boleh kosong</small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="siswa">Pekerjaan orang tua</label>
                                            <select name="K01" class="form-control" required>
                                                @if (!empty($pekerjaan))
                                                    <option value="">Silahkan pilih pekerjaan orang tua</option>
                                                    @foreach ($pekerjaan as $item)
                                                        <option value="{{ $item->id }}" @if(!empty($alternatif_dipilih)) @if($item->id==$alternatif_dipilih->K01) selected @endif @endif>{{ $item->pekerjaan }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <option value="">Belum ada data siswa</option>
                                                @endif
                                            </select>
                                            <small style="color: orange">*Tidak boleh kosong</small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="siswa">Penghasilan orang tua</label>
                                            <select name="K02" class="form-control" required>
                                                @if (!empty($penghasilan))
                                                    <option value="">Silahkan pilih penghasilan orang tua</option>
                                                    @foreach ($penghasilan as $item)
                                                        <option value="{{ $item->id }}"  @if(!empty($alternatif_dipilih)) @if($item->id==$alternatif_dipilih->K02) selected @endif @endif>{{ $item->penghasilan }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <option value="">Belum ada data siswa</option>
                                                @endif
                                            </select>
                                            <small style="color: orange">*Tidak boleh kosong</small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="siswa">Tanggungan orang tua</label>
                                            <select name="K03" class="form-control" required>
                                                @if (!empty($tanggungan))
                                                    <option value="">Silahkan pilih tanggungan orang tua</option>
                                                    @foreach ($tanggungan as $item)
                                                        <option value="{{ $item->id }}" @if(!empty($alternatif_dipilih)) @if($item->id==$alternatif_dipilih->K03) selected @endif @endif>{{ $item->tanggungan }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <option value="">Belum ada data siswa</option>
                                                @endif
                                            </select>
                                            <small style="color: orange">*Tidak boleh kosong</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-info">Simpan</button>
                                        @if(!empty(Session::get('message_success')))
                                            <p style="color: green">{{Session::get('message_success')}}</p>
                                        @endif
                                        
                                        @if(!empty(Session::get('message_fail')))
                                            <p style="color: red">{{Session::get('message_fail')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="kriteria-tab" data-toggle="tab" href="#kriteria"
                                        role="tab" aria-controls="kriteria" aria-selected="true">Data Kriteria</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="alternatif-tab" data-toggle="tab" href="#alternatif"
                                        role="tab" aria-controls="alternatif" aria-selected="false">Bobot Alternatif</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="normalisasi-tab" data-toggle="tab" href="#normalisasi"
                                        role="tab" aria-controls="normalisasi" aria-selected="false">Matrix Normalisasi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tertimbang-tab" data-toggle="tab" href="#tertimbang"
                                        role="tab" aria-controls="tertimbang" aria-selected="false">Matrix Tertimbang</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="q-tab" data-toggle="tab" href="#q" role="tab"
                                        aria-controls="q" aria-selected="false">Matrix Q</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="perengkingan-tab" data-toggle="tab" href="#perengkingan"
                                        role="tab" aria-controls="perengkingan" aria-selected="false">Perangkingan</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="kriteria" role="tabpanel"
                                    aria-labelledby="kriteria-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Kode</th>
                                                        <th>Nama</th>
                                                        <th>Pekerjaan orang tua</th>
                                                        <th>Penghasilan orang tua</th>
                                                        <th>Tanggungan Orang tua</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (!empty($alternatif))
                                                        @php($no = 1)
                                                        @foreach ($alternatif as $data)
                                                            <tr>
                                                                <td>AL{{ $data->id }}</td>
                                                                <td>{{ $data->getSiswa->name }}</td>
                                                                <td>{{ $data->getPekerjaanOrtu->pekerjaan }}</td>
                                                                <td>{{ $data->getPenghasilanOrtu->penghasilan }}</td>
                                                                <td>{{ $data->getTanggungan->tanggungan }}</td>
                                                                <td>
                                                                    <form action="{{url('penentuan-kriteria/'.$data->id)}}" method="post">
                                                                        @method('delete')
                                                                        {{ csrf_field() }}
                                                                        <a href="{{url('penentuan-kriteria/'.$data->id.'/edit')}}" class="btn btn-warning">ubah</a>
                                                                        <button type="submit" class="btn btn-danger"
                                                                            onclick="return confirm('Apakah anda akan menghapus data kriteria ini ...?')">hapus</button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="6">Data Alternatif belum tersedia</td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="alternatif" role="tabpanel"
                                    aria-labelledby="alternatif-tab">
                                    alternatif
                                </div>
                                <div class="tab-pane fade" id="normalisasi" role="tabpanel"
                                    aria-labelledby="normalisasi-tab">
                                    romalisasi
                                </div>
                                <div class="tab-pane fade" id="tertimbang" role="tabpanel"
                                    aria-labelledby="tertimbang-tab">
                                    tertimbang
                                </div>
                                <div class="tab-pane fade" id="q" role="tabpanel" aria-labelledby="q-tab">
                                    matrix q
                                </div>
                                <div class="tab-pane fade" id="perengkingan" role="tabpanel"
                                    aria-labelledby="perengkingan-tab">
                                    perengkingan
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
