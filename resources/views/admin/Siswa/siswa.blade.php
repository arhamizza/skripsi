@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'siswa',
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
            <h1>DAFTAR NAMA Siswa</h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Addsiswa">
                Add Siswa
            </button>
            <table id="example" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kelas</th>
                        <th>Nama Siswa</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                    $no = 1;
                    @endphp
                    @foreach ($siswa as $sk)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $sk->nama_kelas->nama_kelas }}</td>
                            <td>{{ $sk->nama_siswa }}</td>
                            <td>
                                <button class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#Editsiswa-{{ $sk->id }}">
                                    <i class="fa-solid fa-pen-to-square fa-2xl"></i>
                                </button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#Deletesiswa-{{ $sk->id }}">
                                    <i class="fa-sharp fa-solid fa-trash fa-beat-fade fa-2xl"></i>
                                </button>
                            </td>
                        </tr>
                        @php $no++; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div><!-- /.panel-->
    <!--/.main-->

    <!-- The Modal -->
    <div class="modal" id="Addsiswa">
        <div class="modal-dialog">
            <div class="modal-content">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Nama Siswa</h4>
                </div>


                <!-- Modal body -->
                <div class="modal-body">
                    <form role="form" action="{{ url('siswa_add') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="position-option">Pilih Kelas</label><br>
                            <select class="form-select" name="id_kelas">
                                <option value>Pilih Nama Linguistik</option>
                                @foreach ($siswa2 as $item)
                                    <option value="{{ $item->id }}" class="bold">{{ $item->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Siswa</label>
                            <input class="form-control" name="nama_siswa" placeholder="Nama siswa">
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

    @foreach ($siswa as $sk)
        <div class="modal" id="Editsiswa-{{ $sk->id }}">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Nama Siswa</h4>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form role="form" action="{{ url('siswa_update/' . $sk->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="position-option">Pilih Kelas</label><br>
                                <select class="form-select" name="id_kelas">
                                    <option value>Pilih Nama Linguistik</option>
                                    @foreach ($siswa2 as $item)
                                        <option value="{{ $item->id }}" class="bold">{{ $item->nama_kelas }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" value="{{ $sk->nama_siswa }}" class="form-control" name="nama_siswa"
                                    value="" placeholder="Masukkan Nama siswa">
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

        <div class="modal" id="Deletesiswa-{{ $sk->id }}">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Nama Siswa</h4>

                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <h5>Apakah Kamu Yakin Delete?</h5>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <a href="{{ url('siswa_delete/' . $sk->id) }}" class="btn btn-info">Yes</a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
