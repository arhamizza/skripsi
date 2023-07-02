@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'usermanagement',
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
            <h1>User Management</h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Addusers">
                Add users
            </button>
            <table id="example" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email </th>
                        <th>role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1;
                    @endphp
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->is_active == '1')
                                    {{ 'Admin' }}
                                @else
                                    {{ 'User' }}
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#Edituser-{{ $user->id }}">
                                    <i class="fa-solid fa-pen-to-square fa-2xl"></i>
                                </button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#Deleteuser-{{ $user->id }}">
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
    <div class="modal" id="Addusers">
        <div class="modal-dialog">
            <div class="modal-content">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add New user</h4>
                </div>


                <!-- Modal body -->
                <div class="modal-body">
                    <form role="form" action="{{ url('usermanagement_add') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" name="name" placeholder="user Name">
                        </div>
                        <div class="form-group">
                            <label>No email</label>
                            <input class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                        </div>
                        <select name="is_active" id="is_active">
                            <option value="0" selected='selected'>User</option>
                            <option value="1">Admin</option>
                            {{-- <input class="form-control" name="is_active" placeholder="Role"> --}}
                        </select>

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

    @foreach ($users as $vd)
        <div class="modal" id="Edituser-{{ $vd->id }}">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit user</h4>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form role="form" action="{{ url('usermanagement_update/' . $vd->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" value="{{ $vd->name }}" class="form-control" name="Name"
                                    value="" placeholder="Masukkan Name">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" value="{{ $vd->email }}" class="form-control" name="Email"
                                    value="" placeholder="Masukkan Email">
                            </div>
                            {{-- <div class="form-group">
                                <label for="">Password</label>
                                <input type="text" value="{{ $vd->password }}" class="form-control" name="Password" value=""
                                    placeholder="Masukkan Password">
                            </div> --}}

                            <div class="form-group">
                                <label for="">Role</label>
                                <select name="is_active" id="is_active">
                                    <option value="0" selected='selected'>User</option>
                                    <option value="1">Admin</option>
                                    {{-- <input class="form-control" name="is_active" placeholder="Role"> --}}
                                </select>
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

        <div class="modal" id="Deleteuser-{{ $vd->id }}">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Delete user</h4>

                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <h5>Apakah Kamu Yakin Delete?</h5>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <a href="{{ url('usermanagement_delete/' . $vd->id) }}" class="btn btn-info">Yes</a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
