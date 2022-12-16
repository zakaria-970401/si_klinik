@extends('layouts.base')

@section('title', 'LIST MASTER DATA TINDAKAN')
@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url({{ asset('assets/img/icons/spot-illustrations/corner-1.png') }});">
        </div>
        <div class="card-body position-relative">
            <div class="row">
                <div class="float-end">
                    <a href="javascript:void(0)" onclick="addTindakan()" class="btn btn-md btn-primary mb-3"><i
                            class="fas fa-plus-circle"></i> Add
                    </a>
                </div>
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>NO</th>
                                    <th>NAMA TINDAKAN</th>
                                    <th>KODE TINDAKAN</th>
                                    <th>TOOLS</th>
                                </tr>
                            </thead>
                            <tbody id="table">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function addTindakan() {
            let values = prompt("SILAHKAN MASUKAN NAMA Tindakan", "");
            if (values != null) {
                $.ajax({
                    url: "{{ url('master/addTindakan') }}/" + values,
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        getList();
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            } else {
                return false;
            }
        }

        getList();

        function getList() {
            $.ajax({
                url: "{{ url('master/getList') }}",
                type: "GET",
                dataType: "json",
                success: function(response) {
                    $('#table').html('')
                    $.each(response.data, function(key, value) {
                        $('#table').append(`
                            <tr class="text-center">
                                <td>${key+1}</td>
                                <td>${value.name}</td>
                                <td>${value.kode}</td>
                                <td>
                                    <a class="btn btn-sm btn-info" onclick="editTindakan('${value.kode}')"><i class="fas fa-edit"></i> Edit</a>
                                    <a class="btn btn-sm btn-danger" onclick="deleteTindakan('${value.kode}')"><i class="fas fa-trash-alt"></i> Delete</a>
                                </td>
                            </tr>
                        `)
                    });
                },
                errror: function(error) {
                    console.log(error);
                }
            });
        }

        function editTindakan(kode) {
            $.ajax({
                url: "{{ url('master/editTindakan') }}/" + kode,
                type: "GET",
                dataType: "json",
                success: function(response) {
                    let values = prompt("Update Lokasi", response.data.name);
                    if (values != null) {
                        $.ajax({
                            url: "{{ url('master/updateTindakan') }}/" + values + "/" + response.data.kode ,
                            type: "GET",
                            dataType: "json",
                            success: function(response) {
                                getList();
                            },
                            errror: function(error) {
                                console.log(error);
                            }
                        });
                    } else {
                        return false;
                    }
                },
                errror: function(error) {
                    console.log(error);
                }
            });
        }

        function deleteTindakan(kode){
            var is_sure = window.confirm("Are You Sure?");
            if(is_sure==false){
                return false;
            }
            else{
                $.ajax({
                    url: "{{ url('master/deleteTindakan') }}/" + kode,
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        getList();
                    },
                    errror: function(error) {
                        console.log(error);
                    }
                });
            }
        }
    </script>
@endsection
