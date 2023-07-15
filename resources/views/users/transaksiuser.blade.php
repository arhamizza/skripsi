@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'transaksiuser',
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
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-dark">
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
                                        <a href="{{ url('transaksiguru_next/'.$sk->id)}}" class="btn btn-primary"><i class="fa-sharp fa-solid fa-arrow-right fa-2xl"></i></a>
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

@endsection
