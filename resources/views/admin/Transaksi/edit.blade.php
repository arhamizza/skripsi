@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'transaksi_guru',
])

@section('content')
    <div class="content">
        <div class="card">
            <a href="{{ url('transaksi_admin')}}" class="btn btn-light"><i class="fa-sharp fa-solid fa-left-long fa-2xl"></i></a>
            <div class="card-body">
                <div class="class-header">
                    <h3>Tambah Data</h3>
                </div>
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">

                            <div class="card-body">
                                <form action="{{ url('update_transaksi/'.$transaksi->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label style="font-size: 20px">Kode</label>
                                        <input class="form-control" value="{{ $transaksi->kode }}" name="kode"
                                            placeholder="Kode" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label style="font-size: 20px">Transaksi</label>
                                        <input class="form-control " value="{{ $transaksi->nama }}" name="nama"
                                            placeholder="Transaksi">
                                    </div>
                                    <div class="form-group">
                                        <label for="position-option">Pilih Kelas</label><br>
                                        <select class="form-control" id="type" name="id_kelas">
                                            @foreach ($kelas as $kel)
                                                <option value="{{ $kel->id }}"
                                                    {{ $kel->id == $transaksi->id_kelas ? 'selected' : '' }}>{{ $kel->nama_kelas}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label style="font-size: 20px">Tanggal</label>
                                        <input type="date" name="tanggal" id="tanggal" class="form-control"
                                            style="width: 100%; display: inline;" onchange="invoicedue(event);" required
                                            value="{{ $transaksi->tanggal }}">
                                    </div>
                                    <div class="form-group">
                                        <label style="font-size: 20px">Keterangan</label>
                                        <input class="form-control" value="{{ $transaksi->keterangan }}" name="keterangan"
                                            type="text" placeholder="Keterangan">
                                    </div>
                                    <center><button type="submit" class="btn btn-primary mr-2">Update</button></center>
                                    <br>
                                </form>

                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                            data-target="#pills-home" type="button" role="tab"
                                            aria-controls="pills-home" aria-selected="true">Guru</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                            data-target="#pills-profile" type="button" role="tab"
                                            aria-controls="pills-profile" aria-selected="false">Siswa</button>
                                    </li>
                                </ul>
                                {{-- tabs 1 --}}
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                        aria-labelledby="pills-home-tab">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#Addtransaksi">
                                            Add transaksi
                                        </button>
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Kode</th>
                                                    <th scope="col">NAMA GURU</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($transaksigurus as $transaksi_guru)
                                                    <tr>
                                                        <td>{{ $transaksi_guru->transaksi->kode }}</td>
                                                        <td>{{ $transaksi_guru->guru->nama_guru }}</td>
                                                        <td>
                                                            {{-- <button class="btn btn-info btn-sm" data-toggle="modal"
                                                            data-target="#Edittransaksi-{{ $transaksi_guru->id }}">
                                                            <i class="fa-solid fa-pen-to-square fa-2xl"></i>
                                                        </button> --}}
                                                            <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                                data-target="#Deletetransaksi-{{ $transaksi_guru->id }}">
                                                                <i
                                                                    class="fa-sharp fa-solid fa-trash fa-beat-fade fa-2xl"></i>
                                                            </button>
                                                            <a href="{{ url('transaksigurus_editnext/'.$transaksi->id. '/' .$transaksi_guru->id_guru)}}" class="btn btn-primary"><i class="fa-sharp fa-solid fa-arrow-right fa-2xl"></i></a>
                                                        </td>
                                                        @php $no++; @endphp
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <!-- The Modal -->
                                        <div class="modal" id="Addtransaksi">
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
                                                        <form role="form" action="{{ url('transaksimodalguru_add') }}"
                                                            method="POST">
                                                            @csrf
                                                            <label style="font-size: 15px">Kode</label>
                                                            <input readonly type="interger" class="form-control" name="id_transaksi" value= "{{$transaksi->id}}">
                                                            <div class="form-group">
                                                                <label for="position-option">Pilih Guru</label><br>
                                                                <select class="form-select" name="id_guru">
                                                                    <option value>Pilih Guru</option>
                                                                    @foreach ($gurus as $item)
                                                                        <option value="{{ $item->id }}"
                                                                            class="bold">{{ $item->nama_guru }}
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
                                        @foreach ($transaksigurus as $sk)                                        
                                        <div class="modal" id="Deletetransaksi-{{ $sk->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                    
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Delete transaksi</h4>
                                    
                                                    </div>
                                    
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <h5>Apakah Kamu Yakin Delete?</h5>
                                                    </div>
                                    
                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <a href="{{ url('transaksiguru_delete/' . $sk->id) }}" class="btn btn-info">Yes</a>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    {{-- tabs 2 --}}
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                        aria-labelledby="pills-profile-tab">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#Addtransaksi2">
                                        Add transaksi
                                        </button>
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Kode</th>
                                                    <th scope="col">NAMA SISWA</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($transaksisiswa as $item)
                                                    <tr>
                                                        <td>{{ $item->transaksi->kode }}</td>
                                                        <td>{{ $item->siswa->nama_siswa }}</td>
                                                        <td>
                                                            {{-- <button class="btn btn-info btn-sm" data-toggle="modal"
                                                            data-target="#Edittransaksi-{{ $transaksi_guru->id }}">
                                                            <i class="fa-solid fa-pen-to-square fa-2xl"></i>
                                                        </button> --}}
                                                            <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                                data-target="#Deletetransaksi-{{ $item->id }}">
                                                                <i
                                                                    class="fa-sharp fa-solid fa-trash fa-beat-fade fa-2xl"></i>
                                                            </button>
                                                        </td>
                                                        @php $no++; @endphp
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <!-- The Modal -->                                        
                                        <div class="modal" id="Addtransaksi2">
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
                                                        <form role="form" action="{{ url('transaksimodalsiswa_add') }}"
                                                            method="POST">
                                                            @csrf
                                                            <label style="font-size: 15px">Kode</label>
                                                            <input readonly type="interger" class="form-control" name="id_transaksi" value= "{{$transaksi->id}}">
                                                            <div class="form-group">
                                                                <label for="position-option">Pilih Siswa</label><br>
                                                                <select class="form-select" name="id_siswa">
                                                                    <option value>Pilih Siswa</option>
                                                                    @foreach ($siswas as $item)
                                                                        <option value="{{ $item->id }}"
                                                                            class="bold">{{ $item->nama_siswa }}
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
