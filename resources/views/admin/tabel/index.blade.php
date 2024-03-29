@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'tabel',
])

@section('content')
    <div class="content">
        <h1>Masukkan tabel liguistik</h1>
        <a href="{{ url('tambah-nilai')}}" class="btn btn-primary">Tambah</a>
        <table id="example" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>                    
                    <th>Nama Liguistik</th>
                    <th>A</th>
                    <th>B</th>
                    <th>C</th>
                    <th>D</th>
                    <center>
                        <th>Image</th>
                    </center>

                    <th>Action</th>
                </tr>
            </thead>
                <tbody>
                    <?php 
                        $id = 0;
                    ?>
                    @foreach ($tabel as $luguistik)
                        <tr>
                            <td>{{ $id++ +1 }}</td>
                            <td>{{$luguistik->asd->nama}}</td>
                            <td>{{$luguistik->A}}</td>
                            <td>{{$luguistik->B}}</td>
                            <td>{{$luguistik->C}}</td>
                            <td>{{$luguistik->D}}</td>
                            <td><center>
                                <img src="{{ asset('paper/img/' . $luguistik->asd->visualisasi) }}" class="figure-img img-fluid rounded" style="width:250px;height:200px;">

                            </center>
                            </td>
                            <td>
                                
                                <a href="{{ url('edit-nilai/'.$luguistik->id)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square fa-2xl"></i></a>
                                <a href="{{ url('hapus-nilai/'.$luguistik->id)}}" class="btn btn-primary"><i class="fa-sharp fa-solid fa-trash fa-beat-fade fa-2xl"></i></a href="">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Body</th>
                </tr>
            </tfoot>
        </table>


    </div>
@endsection

