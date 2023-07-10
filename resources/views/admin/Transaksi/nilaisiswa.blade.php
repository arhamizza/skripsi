@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'transaksi_guru',
])

@section('content')
    <!-- content -->
    <div class="content">
        <!--/.row-v class="col-lg-12">
                            <h1 class="page-header">List users</h1>
                        </div>
                    </div> --}}
                    <!--/.row-->

        @if ($message = Session::get('success'))
            <div class="alert bg-success" role="alert">
                <em class="fa fa-lg fa-check">&nbsp;</em>
                {{ $message }}
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert bg-danger" role="alert">
                <em class="fa fa-lg fa-check">&nbsp;</em>
                {{ $message }}
            </div>
        @endif
        <div class="content">
            <h2>DAFTAR TRANSAKSI GURU YANG MENILAI</h2>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Addtransaksi">
                Add transaksi
            </button>
            {{-- <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <tr>
                            <th>No</th>
                            <th>Kelas yang diuji</th>
                            <th>Nama</th>
                            <th>Keterangan</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                        $no = 1;
                        @endphp
                        @foreach ($transaksi as $sk)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $sk->kelas->nama_kelas }}</td>
                                <td>{{ $sk->nama }}</td>
                                <td>{{ $sk->keterangan }}</td>
                                <td>{{ date('d-M-y', strtotime($sk->tanggal)) }}</td>
                                <td>
                                    <button class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#Edittransaksi-{{ $sk->id }}">
                                        <i class="fa-solid fa-pen-to-square fa-2xl"></i>
                                    </button>
                                    <br><br>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#Deletetransaksi-{{ $sk->id }}">
                                        <i class="fa-sharp fa-solid fa-trash fa-beat-fade fa-2xl"></i>
                                    </button>
                                </td>
                            </tr>
                            @php $no++; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div> --}}
            <table id="example" class="display nowrap" style="width:100%">
                <thead>
                    <tr>      
                        <th>Nama Siswa</th>         
                        <th>Nilai_linguistik</th>         
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                    $no = 1;
                    @endphp
                    @foreach($nilai as $nilaii)
                    <tr>


                        <td>{{ $nilaii->siswa->nama_siswa }}</td>               
                        {{-- <td>{{ $nilaii->linguistik->asd->nama}}</td>                --}}
                        {{-- <td>{{ $nilai->guru->nama_guru }}</td>               
                        <td>{{ $nilai->siswa->nama_siswa}}</td>                --}}
                        <td>
                            {{-- <button class="btn btn-info btn-sm" data-toggle="modal"
                                data-target="#Edittransaksi-{{ $transaksi_guru->id }}">
                                <i class="fa-solid fa-pen-to-square fa-2xl"></i>
                            </button> --}}
                            {{-- <button class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#Deletetransaksi-{{ $transaksi_guruss }}">
                                <a href="{{ url('transaksiguru_admin/' . $nilaii->id_guru.'/'. $nilaii->id_transaksi) }}">aaaa</a>
                                <i class="fa-sharp fa-solid fa-trash fa-beat-fade fa-2xl"></i>
                            </button> --}}
                        </td>
                    </tr>
                    @php $no++; @endphp
                    @endforeach

                </tbody>
            </table>
 

            <br><br>
            {{-- <table id="example" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Transaksi</th>
                        <th>Nama Guru</th>           
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                    $no = 1;
                    @endphp
                    @foreach($transaksigurus as $transaksi_guruss)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $transaksi_guruss->transaksi->nama }}</td>
                        <td>{{ $transaksi_guruss->guru->nama_guru }}</td>                
                        <td>
                            <button class="btn btn-info btn-sm" data-toggle="modal"
                                data-target="#Edittransaksi-{{ $transaksi_guruss->id }}">
                                <i class="fa-solid fa-pen-to-square fa-2xl"></i>
                            </button>
                            <button class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#Deletetransaksi-{{ $transaksi_guruss->id }}">
                                <i class="fa-sharp fa-solid fa-trash fa-beat-fade fa-2xl"></i>
                            </button>
                        </td>
                    </tr>
                    @php $no++; @endphp
                    @endforeach

                </tbody>
            </table> --}}
        </div>
    </div><!-- /.panel-->
    <!--/.main-->

    <!-- The Modal -->
    {{-- <div class="modal" id="Addtransaksi">
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
                    <form role="form" action="{{ url('transaksiguru_add') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <select class="form-select" name="id_transaksi">
                                <option value>Pilih Transaksi</option>
                                @foreach ($transaksi as $item)
                                    <option value="{{ $item->id }}" class="bold">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-select" name="id_guru">
                                <option value>Pilih Guru</option>
                                @foreach ($gurus as $item)
                                    <option value="{{ $item->id }}" class="bold">{{ $item->nama_guru }}</option>
                                @endforeach
                            </select>
                        </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($transaksigurus as $sk)
        <div class="modal" id="Edittransaksi-{{ $sk->id }}">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Nama transaksi</h4>
                    </div>

                    
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form role="form" action="{{ url('transaksiguru_update/' . $sk->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="position-option">Pilih Guru</label><br>
                                <select class="form-control" id="type" name="id_guru">
                                    @foreach ($gurus as $kel)
                                        <option value="{{ $kel->id }}"
                                            {{ $kel->id == $sk->id ? 'selected' : '' }}>{{ $kel->nama_guru}}
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
    @endforeach --}}
@endsection
