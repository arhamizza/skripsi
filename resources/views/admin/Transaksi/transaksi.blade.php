@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'transaksi',
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
            <h1>DAFTAR TRANSAKSI</h1>
            <a href="{{ url('transaksigurus_add')}}" class="btn btn-primary">Tambah</a>
            <div class="table-responsive">
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
                                        <a href="{{ url('transaksigurus_edit/'.$sk->id)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square fa-2xl"></i></a>
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
            </div>
        </div>
    </div><!-- /.panel-->
    <!--/.main-->

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
                    <form role="form" action="{{ url('transaksi_add') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Transaksi</label>
                            <input class="form-control" name="nama" placeholder="Transaksi">
                        </div>
                        <div class="form-group">
                            <label for="position-option">Pilih Kelas</label><br>
                            <select class="form-select" name="id_kelas">
                                <option value>Pilih Kelas</option>
                                @foreach ($kelas as $item)
                                    <option value="{{ $item->id }}" class="bold">{{ $item->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control"
                                style="width: 100%; display: inline;" onchange="invoicedue(event);" required
                                value="{{ old('started_at') }}">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input class="form-control" name="keterangan" type="text" placeholder="Keterangan">
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

    @foreach ($transaksi as $sk)
        <div class="modal" id="Edittransaksi-{{ $sk->id }}">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Nama transaksi</h4>
                    </div>

                    
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form role="form" action="{{ url('transaksi_update/' . $sk->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Transaksi</label>
                                <input type="text" value="{{ $sk->nama }}" class="form-control" name="nama"
                                    value="" placeholder="Masukkan transaksi">
                            </div>
                            <div class="form-group">
                                <label for="position-option">Pilih Kelas</label><br>
                                <select class="form-control" id="type" name="id_kelas">
                                    @foreach ($kelas as $kel)
                                        <option value="{{ $kel->id }}"
                                            {{ $kel->id_kelas == $sk->id ? 'selected' : '' }}>{{ $kel->nama_kelas }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control"
                                    style="width: 100%; display: inline;" onchange="invoicedue(event);" required
                                    value="{{ old('started_at') }}">
                            </div>
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <input type="text" value="{{ $sk->keterangan }}" class="form-control"
                                    name="keterangan" value="" placeholder="Masukkan Keterangan">
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
                        <a href="{{ url('transaksi_delete/' . $sk->id) }}" class="btn btn-info">Yes</a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
