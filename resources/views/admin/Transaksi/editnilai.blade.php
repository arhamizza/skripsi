@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'transaksi',
])

@section('content')
    <div class="content">
        <div class="card">
            <a href="{{ url('transaksigurus_edit/' . $transaksi->id) }}" class="btn btn-light"><i
                    class="fa-sharp fa-solid fa-left-long fa-2xl"></i></a>
            <div class="card-body">
                <div class="class-header">
                    <h3>PENILAIAN LINGUISTIK</h3>
                    <h4>Nama Guru: {{ $transaksii->guru->nama_guru }}</h4>
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
                                                    <th scope="col">NAMA Siswa</th>
                                                    <th scope="col">NAMA Kriteria</th>
                                                    <th scope="col">Nilai LINGUISTIK</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                
                                                @foreach ($viewtabel as $item)
                                                    <tr>
                                                        <td>{{ $item->siswa->nama_siswa }}</td>                    
                                                        <td>{{ $item->kriteria->nama_kriteria }}</td>                    
                                                        <td>{{ $item->linguistik->asd->nama }}</td>                    
                                                        <td>
                                                        </td>

                                                        @php $no++; @endphp
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
