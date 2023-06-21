@extends('layouts.app2', [
    'class' => '',
    'elementActive' => 'tabel',
])

@section('content')
    <div class="content">
        <h1>Masukkan tabel liguistik</h1>
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

@push('scripts')
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });
    </script>
@endpush
