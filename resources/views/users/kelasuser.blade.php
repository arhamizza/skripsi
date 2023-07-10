@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'kelas',
])

@section('content')
    <div class="content">
        <h1>Tabel kriteria</h1>
        <table id="example" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>                    
                    <th>Nama kelas</th>
                </tr>
            </thead>
                <tbody>
                    <?php 
                        $id = 0;
                    ?>
                    @foreach ($kelas as $item)
                        <tr>
                            <td>{{ $id++ +1 }}</td>
                            <td>{{$item->nama_kelas}}</td>
                        </tr>
                    @endforeach
                </tbody>
            
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
