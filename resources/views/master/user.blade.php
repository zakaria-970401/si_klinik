@extends('layouts.base')

@section('title', 'LIST MASTER DATA USER')
@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url({{ asset('assets/img/icons/spot-illustrations/corner-1.png') }});">
        </div>
        <div class="card-body position-relative">
            <div class="row">
                <div class="float-end">
                    <a href="#add-user" data-bs-toggle="modal" class="btn btn-md btn-primary mb-3"><i
                            class="fas fa-plus-circle"></i> Add User
                    </a>
                </div>
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>NO</th>
                                    <th>NAMA</th>
                                    <th>EMAIL</th>
                                    <th>ROLE</th>
                                    <th>TOOLS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            @if ($item->auth_group == 1)
                                                ADMIN
                                            @else
                                                DATA ENTRY
                                            @endif
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" onclick="edituser('{{ $item->id }}')"
                                                class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                            <a href="{{ url('master/deleteuser/' . $item->id) }}"
                                                class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="add-user" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{ url('master/adduser') }}" id="form-add-user" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="my-addon">Nama</span>
                                            </div>
                                            <input class="form-control" type="text" name="name"
                                                placeholder="Silahkan isi" aria-label="Recipient's "
                                                aria-describedby="my-addon" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="my-addon">EMAIL</span>
                                            </div>
                                            <input class="form-control" type="email" name="email"
                                                placeholder="Silahkan isi" aria-label="Recipient's "
                                                aria-describedby="my-addon" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mt-4">
                                            <select id="my-select" class="form-control" name="role" required>
                                                <option value="" selected disabled>ROLE</option>
                                                <option value="1">ADMIN</option>
                                                <option value="2">DATA ENTRY</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group mt-4">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="my-addon">PASSWORD</span>
                                            </div>
                                            <input class="form-control" type="password" name="password"
                                                placeholder="Silahkan isi" aria-label="Recipient's "
                                                aria-describedby="my-addon" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-md btn-success btn-save"><i class="fas fa-save"></i> Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div id="edit-user" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{ url('master/updateuser') }}" id="form-update-user" method="post">
                        @csrf
                        <input type="hidden" name="id_user" id="iduserValue" value="">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="my-addon">Nama</span>
                                            </div>
                                            <input class="form-control namaValue" type="text" name="name"
                                                placeholder="Silahkan isi" aria-label="Recipient's "
                                                aria-describedby="my-addon" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="my-addon">EMAIL</span>
                                            </div>
                                            <input class="form-control emailValue" type="email" name="email"
                                                placeholder="Silahkan isi" aria-label="Recipient's "
                                                aria-describedby="my-addon" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group mt-4">
                                            <select id="selectRole" class="form-control" name="role" required>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mt-4 btn-reset">

                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-md btn-success btn-update"><i class="fas fa-save"></i>
                        Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script type="text/javascript">
        $('#form-add-user').submit(function() {
            $('.btn-save').attr('disabled', 'disabled');
        });

        function edituser(id) {
            $.ajax({
                url: "{{ url('master/edituser') }}/" + id,
                type: "GET",
                dataType: "json",
                success: function(response) {
                    $('#edit-user').modal('show');
                    $('#iduserValue').val(response.data.id)
                    $('.namaValue').val(response.data.name)
                    $('.emailValue').val(response.data.email)
                    $('#selectRole').html('')
                    if (response.data.auth_group == 1) {
                        var text = 'ADMIN';
                    } else {
                        var text = 'DATA ENTRY'
                    }
                    $('#selectRole').append(`
                                    <option value="${response.data.auth_group}" selected>${text}</option>
                                    <option value="1">ADMIN</option>
                                    <option value="2">DATA ENTRY</option>`)

                    $('.btn-reset').html('')
                    $('.btn-reset').append(`
                            <a href="{{ url('master/user/resetPassword/${response.data.id}') }}" class="btn btn-md btn-dark"><i class="fas fa-history"></i> Reset Password</a>
                                        <span class="text-danger">Default : 123456</span>
                                    `)
                },
                errror: function(error) {
                    console.log(error);
                }
            });
        }
    </script>
@endsection
