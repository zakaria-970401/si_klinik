@extends('layouts.base')

@section('title', 'LIST MASTER DATA OBAT')
@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url({{ asset('assets/img/icons/spot-illustrations/corner-1.png') }});">
        </div>
        <div class="card-body position-relative">
            <div class="row">
                <div class="float-end">
                    <a href="#add-obat" data-bs-toggle="modal" class="btn btn-md btn-primary mb-3"><i
                            class="fas fa-plus-circle"></i> Add Obat
                    </a>
                </div>
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>NO</th>
                                    <th>NAMA OBAT</th>
                                    <th>JENIS OBAT</th>
                                    <th>CREATED BY</th>
                                    <th>CREATED TIME</th>
                                    <th>TOOLS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr class="text-center">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->jenis}}</td>
                                    <td>{{$item->created_by}}</td>
                                    <td>
                                        {{\Carbon\carbon::parse($item->created_at)->format('d-M-Y H:i')}}
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" onclick="editObat('{{$item->id}}')" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                        <a href="{{url('master/deleteObat/' . $item->id)}}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
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

    <div id="add-obat" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{url('master/addObat')}}" id="form-add-obat" method="post">
                        @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="my-addon">Nama Obat</span>
                                        </div>
                                        <input class="form-control" type="text" name="name" placeholder="Silahkan isi" aria-label="Recipient's " aria-describedby="my-addon" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select id="my-select" class="form-control" name="jenis" required>
                                            <option value="" disabled selected>JENIS OBAT</option>
                                            <option value="Pil">Pil</option>
                                            <option value="Syrup">Syrup</option>
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

    <div id="edit-obat" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{url('master/updateObat')}}" id="form-update-obat" method="post">
                        @csrf
                        <input type="hidden" name="id_obat" id="idObatValue" value="">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="my-addon">Nama Obat</span>
                                            </div>
                                            <input class="form-control obatValue" type="text" name="name" placeholder="Silahkan isi" aria-label="Recipient's " aria-describedby="my-addon" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <select id="selectObat" class="form-control" name="jenis" required>
                                                
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
        $('#form-add-obat').submit(function(){
            $('.btn-save').attr('disabled', 'disabled');
        });

        function editObat(id){
            $.ajax({
                url: "{{ url('master/editObat') }}/" + id,
                type: "GET",
                dataType: "json",
                success: function(response) {
                    $('#edit-obat').modal('show');
                    $('#idObatValue').val(response.data.id)
                    $('.obatValue').val(response.data.name)
                    $('#selectObat').html('')
                    $('#selectObat').append(`
                                    <option value="${response.data.jenis}" selected>${response.data.jenis}</option>
                                    <option value="Pil">Pil</option>
                                    <option value="Syrup">Syrup</option>`)
                },
                errror: function(error) {
                    console.log(error);
                }
            });
        }
    </script>
@endsection
