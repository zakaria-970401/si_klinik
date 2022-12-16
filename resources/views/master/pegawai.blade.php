@extends('layouts.base')

@section('title', 'LIST MASTER DATA PEGAWAI')
@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url({{ asset('assets/img/icons/spot-illustrations/corner-1.png') }});">
        </div>
        <div class="card-body position-relative">
            <div class="row">
                <div class="float-end">
                    <a href="#add-pegawai" data-bs-toggle="modal" class="btn btn-md btn-primary mb-3"><i
                            class="fas fa-plus-circle"></i> Add Pegawai
                    </a>
                </div>
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>NO</th>
                                    <th>NIK</th>
                                    <th>NAMA PEGAWAI</th>
                                    <th>DEPT</th>
                                    <th>TOOLS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr class="text-center">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->nik}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->dept}}</td>
                                    <td>
                                        <a href="javascript:void(0)" onclick="editpegawai('{{$item->id}}')" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                        <a href="{{url('master/deletePegawai/' . $item->id)}}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
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

    <div id="add-pegawai" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{url('master/addPegawai')}}" id="form-add-pegawai" method="post">
                        @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="my-addon">Nama pegawai</span>
                                        </div>
                                        <input class="form-control" type="text" name="name" placeholder="Silahkan isi" aria-label="Recipient's " aria-describedby="my-addon" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="my-addon">NIK PEGAWAI</span>
                                        </div>
                                        <input class="form-control" type="number" name="nik" placeholder="Silahkan isi" aria-label="Recipient's " aria-describedby="my-addon" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group mt-4">
                                        <select id="my-select" class="form-control" name="dept" required>
                                            <option value="" selected disabled>DEPARTMENT</option>
                                            <option value="IT">IT</option>
                                            <option value="KASIR">KASIR</option>
                                            <option value="OB">OB</option>
                                        </select>
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

    <div id="edit-pegawai" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{url('master/updatePegawai')}}" id="form-update-pegawai" method="post">
                        @csrf
                        <input type="hidden" name="id_pegawai" id="idpegawaiValue" value="">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="my-addon">Nama pegawai</span>
                                            </div>
                                            <input class="form-control namaPegawaiValue" type="text" name="name" placeholder="Silahkan isi" aria-label="Recipient's " aria-describedby="my-addon" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="my-addon">NIK PEGAWAI</span>
                                            </div>
                                            <input class="form-control nikPegawaiValue" type="number" name="nik" placeholder="Silahkan isi" aria-label="Recipient's " aria-describedby="my-addon" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group mt-4">
                                            <select id="selectPegawai" class="form-control" name="dept" required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                        <button type="submit" class="btn btn-md btn-success btn-update"><i class="fas fa-save"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

    <script type="text/javascript">
        $('#form-add-pegawai').submit(function(){
            $('.btn-save').attr('disabled', 'disabled');
        });

        function editpegawai(id){
            $.ajax({
                url: "{{ url('master/editPegawai') }}/" + id,
                type: "GET",
                dataType: "json",
                success: function(response) {
                    $('#edit-pegawai').modal('show');
                    $('#idpegawaiValue').val(response.data.id)
                    $('.namaPegawaiValue').val(response.data.name)
                    $('.nikPegawaiValue').val(response.data.nik)
                    $('#selectPegawai').html('')
                    $('#selectPegawai').append(`
                                    <option value="${response.data.dept}" selected>${response.data.dept}</option>
                                    <option value="IT">IT</option>
                                    <option value="KASIR">KASIR</option>
                                    <option value="OB">OB</option>`)
                },
                errror: function(error) {
                    console.log(error);
                }
            });
        }
    </script>
@endsection
