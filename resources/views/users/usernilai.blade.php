@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'transaksi_guru',
])

@section('content')
    <div class="content">
        <div class="card">
            <a href="{{ url('transaksiguru_next/' . $transaksi->id) }}" class="btn btn-light"><i
                    class="fa-sharp fa-solid fa-left-long fa-2xl"></i></a>
            <div class="card-body">
                <div class="class-header">
                    <h3>PENILAIAN LINGUISTIK</h3>
                    <h4>Nama : {{ $transaksii->siswa->nama_siswa }}</h4>
                </div>
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">

                            <div class="card-body">
                                <form action="{{ url('update_transaksi/' . $transaksi->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label style="font-size: 20px">Keterangan</label>
                                        <input class="form-control" value="{{ $transaksi->keterangan }}" name="keterangan"
                                            type="text" placeholder="Keterangan" readonly>
                                    </div>
                                    <br>
                                </form>

                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                            data-target="#pills-profile" type="button" role="tab"
                                            aria-controls="pills-profile" aria-selected="false">Siswa</button>
                                    </li>
                                </ul>
                                {{-- tabs 1 --}}
                                <div class="tab-content" id="pills-tabContent">
                                    {{-- tabs 2 --}}
                                    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel"
                                        aria-labelledby="pills-profile-tab">
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">NAMA Kriteria</th>
                                                    <th scope="col">Nilai LINGUISTIK</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                
                                                @foreach ($kriteria as $item)
                                                    <tr>
                                                        <td>{{ $item->nama_kriteria }}</td>
                                                        
                                                        <td>
                                                            @foreach ($viewtabel as $sk)
                                                            @if ($sk->id_kriteria != null && $item->id == $sk->id_kriteria )
                                                            {{$sk->linguistik->asd->nama}}

                                                            <button class="btn btn-info btn-sm" data-toggle="modal"
                                                            data-target="#Edittransaksi-{{ $sk->id }}">
                                                            <i class="fa-solid fa-pen-to-square fa-2xl"></i>
                                                             </button>
                                                            @else
                                                            @endif 
                                                            @endforeach
                                                        </td>

                                                        <td>                                                   
                                                            <button class="btn btn-info btn-sm" data-toggle="modal"
                                                            data-target="#Addtransaksi-{{ $item->id }}">
                                                            <i class="fa-sharp fa-solid fa-plus fa-2xl"></i>
                                                            </button>

                                                            {{-- @if ($sk->id_kriteria != null && $item->id == $sk->id_kriteria) --}}
                                                            
                                                    
                                                            </button>

                                                          
                                                        </td>
                                                        
                                                        <div class="modal" id="Addtransaksi-{{ $item->id }}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    @if (session('error'))
                                                                        <div class="alert alert-danger">
                                                                            {{ session('error') }}
                                                                        </div>
                                                                    @endif
                                                                    <!-- Modal Header -->
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Tambah Nama transaksi</h4>
                                                                    </div>
                
                
                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <form role="form" action="{{ url('transaksimodalnilai_add') }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <label style="font-size: 15px">Kriteria</label>
                                                                            <input name="id_transaksi" type="hidden" value="{{$transaksi->id}}">
                                                                            <input name="id_siswa" type="hidden" value="{{$transaksii->id_siswa}}">
                                                                            <input readonly type="interger" class="form-control"
                                                                                name="id_kriteria" value="{{ $item->id }}">
                                                                            <div class="form-group">
                                                                                <label for="position-option">Pilih Nilai Linguistik</label><br>
                                                                                <select class="form-select" name="nilai">
                                                                                    <option value>Pilih Nilai </option>
                                                                                    @foreach ($tabel as $item)
                                                                                        <option value="{{ $item->id }}" class="bold">
                                                                                            {{ $item->asd->nama }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                    </div>
                
                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-info">Submit</button>
                                                                        <button type="button" class="btn btn-danger"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                
                                                        </div>
                                                        @php $no++; @endphp
                                                        @endforeach
                                                        
                                                        @foreach ($viewtabel as $skk)
                                                        <div class="modal" id="Edittransaksi-{{ $skk->id }}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                
                                                                    <!-- Modal Header -->
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Edit Nilai</h4>
                                                                    </div>
                                                
                                                                    
                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <form role="form" action="{{ url('nilaiupdate/' . $skk->id) }}" method="POST">
                                                                            @csrf
                                                                            <input name="id_transaksi" type="hidden" value="{{$skk->id_transaksi}}">
                                                                            <input name="id_siswa" type="hidden" value="{{$skk->id_siswa}}">
                                                                            <input name="id_guru" type="hidden" value="{{$skk->id_guru}}">
                                                                            <input readonly type="interger" class="form-control"
                                                                                name="id_kriteria" value="{{ $skk->kriteria->nama_kriteria }}">
                                                                            <div class="form-group">
                                                                                <label for="position-option">Pilih Linguistik</label><br>
                                                                                <select class="form-control" id="type" name="nilai">
                                                                                    @foreach ($tabel as $kel)
                                                                                        <option value="{{ $kel->id }}"
                                                                                            {{ $kel->id == $skk->nilai ? 'selected' : '' }}>{{ $kel->asd->nama}}
                                                                                        </option>
                                                                                    @endforeach
                                                
                                                                                </select>
                                                                            </div>
                                                                    </div>
                                                
                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-info">Update</button>
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                            </tbody>
                                        </table>
                                        <!-- The Modal -->



                                    </div>
                                </div>


                            </div>

                            </form>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
