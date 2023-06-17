@extends('layouts.app2', [
    'class' => '',
    'elementActive' => 'dashboard',
])

@section('content')
    <div class="content">
        <h1>Masukkan tabel linguistik</h1>
        <a href="{{ url('tambah-linguistik')}}" class="btn btn-primary">Tambah</a>
        <table id="example" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>                    
                    <th>Name</th>
                    <th>Gambar visualisasi HFLTS</th>
                </tr>
            </thead>
                <tbody>
                    <?php 
                        $id = 0;
                    ?>
                    @foreach ($data as $datatables)
                        <tr>
                            <td>{{ $id++ +1 }}</td>
                            <td>{{$datatables->nama}}</td>
                            <td>
                                <img src="{{ asset('paper/img/' . $datatables->visualisasi) }}" class="figure-img img-fluid rounded" style="width:450px;height:300px;">
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
