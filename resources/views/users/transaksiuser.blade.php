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
            <h2>DAFTAR TRANSAKSI GURU YANG MENILAI</h2>
            <table id="example" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Transaksi</th>
                        <th>Nama Tanggal</th>
                        <th>Nama Kelas</th>           
                        <th>nama Siswa</th>
                        <th>keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                    $no = 1;
                    @endphp
                    @foreach($transaksi as $transaksi_guru)
                    <tr>
                        <td>{{ $transaksi_guru->kode }}</td>
                        <td>{{ $transaksi_guru->nama }}</td>
                        <td>{{ $transaksi_guru->tanggal }}</td>
                        <td>{{ $transaksi_guru->kelas->nama_kelas }}</td>
                        <td>                            
                            @foreach($transaksi_guru -> siswa as $siswa)
                            @if($siswa)
                               {{ $siswa ->nama_siswa }}<br>
                            @else
                            none
                            @endif
                        @endforeach
                    </td>            
                    <td>{{ $transaksi_guru->keterangan }}</td>    
                    </tr>
                    @php $no++; @endphp
                    @endforeach

                </tbody>
            </table>

            <table id="example" class="table" style="width:100%">
                <thead class="text-primary">
                    <tr>
                        <th >NAMA GURU</th>   
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                    $no = 1;
                    @endphp
                    @foreach($tran as $guru)
                    <tr>
                        <td style="font-size: 30px;">{{ $guru->guru->nama_guru }}</td>
                        <td>                            
                            {{-- <button class="btn btn-info btn-sm" data-toggle="modal"
                                data-target="#Edittransaksi-{{ $transaksi_guru->id_guru }}">
                                <i class="fa-solid fa-pen-to-square fa-2xl"></i>
                            </button> --}}
                            <a href="{{ url('transaksiguru_guru/' . $guru->id_guru) }}" style="font-size: 30px;">LANJUT</a>
                            {{-- <button class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#Deletetransaksi-{{ $transaksi_guru->id }}">
                                <i class="fa-sharp fa-solid fa-trash fa-beat-fade fa-2xl"></i>
                            </button> --}}
                        </td>
                    </tr>
                    @php $no++; @endphp
                    @endforeach

                </tbody>
            </table>  

            <br><br>
        </div>
    </div><!-- /.panel-->
    <!--/.main-->


@endsection
