@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'kelas',
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
            <h1>DAFTAR NAMA Kelas</h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Addkelas">
                Add kelas
            </button>
            <table id="example" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kelas</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1;
                    @endphp
                    @foreach ($kelas as $sk)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $sk->nama_kelas }}</td>
                            <td>
                                <button class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#Editkelas-{{ $sk->id }}">
                                    <i class="fa-solid fa-pen-to-square fa-2xl"></i>
                                </button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#Deletekelas-{{ $sk->id }}">
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
    <div class="modal" id="Addkelas">
        <div class="modal-dialog">
            <div class="modal-content">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Nama Kelas</h4>
                </div>


                <!-- Modal body -->
                <div class="modal-body">
                    <form role="form" action="{{ url('kelas_add') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama Kelas</label>
                            <input class="form-control" name="nama_kelas" placeholder="Nama kelas">
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

    @foreach ($kelas as $sk)
        <div class="modal" id="Editkelas-{{ $sk->id }}">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Nama Kelas</h4>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form role="form" action="{{ url('kelas_update/' . $sk->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" value="{{ $sk->nama_kelas }}" class="form-control" name="nama_kelas"
                                    value="" placeholder="Masukkan Nama kelas">
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

        <div class="modal" id="Deletekelas-{{ $sk->id }}">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Nama Kelas</h4>

                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <h5>Apakah Kamu Yakin Delete?</h5>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <a href="{{ url('kelas_delete/' . $sk->id) }}" class="btn btn-info">Yes</a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
