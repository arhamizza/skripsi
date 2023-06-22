@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'alternatif',
])

@section('content')
    <div class="content">
        <h1>Tabel Alternatif</h1>
        <table id="example" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>                    
                    <th>Nama Alternatif</th>
                </tr>
            </thead>
                <tbody>
                    <?php 
                        $id = 0;
                    ?>
                    @foreach ($alternatif as $item)
                        <tr>
                            <td>{{ $id++ +1 }}</td>
                            <td>{{$item->nama_alternatif}}</td>
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
