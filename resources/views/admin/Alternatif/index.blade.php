@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'alternatif',
])

@section('content')
    <div class="content">
        <h1>Tabel Alternatif</h1>
        <a href="{{ url('tambah-alternatif')}}" class="btn btn-primary">Tambah</a>
        <table id="example" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>                    
                    <th>Nama Alternatif</th>
                    <th>Action</th>
                </tr>
            </thead>
                <tbody>
                    <?php 
                        $id = 0;
                    ?>
                    @foreach ($alternatif as $alternatif)
                        <tr>
                            <td>{{ $id++ +1 }}</td>
                            <td>{{$alternatif->nama_alternatif}}</td>
                            </td>
                            <td>
                                
                                <a href="{{ url('edit-alternatif/'.$alternatif->id)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square fa-2xl"></i></a>
                                <a href="{{ url('hapus-alternatif/'.$alternatif->id)}}" class="btn btn-primary"><i class="fa-sharp fa-solid fa-trash fa-beat-fade fa-2xl"></i></a href="">
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

