@extends('layouts.base')

@section('title', 'ADD PASIEN')
@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url({{ asset('assets/img/icons/spot-illustrations/corner-1.png') }});">
        </div>
        <div class="card-header">
            <div class="card-title">
                FORM ADD PASIEN
            </div>
        </div>
        <div class="card-body position-relative">
            <form action="{{ url('pasien/add') }}" method="post" id="form-add-pasien">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="floatingInput" type="text" placeholder="Silahkan isi"
                                required name="nama" />
                            <label for="floatingInput">Nama Pasien</label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select id="" class="form-control" name="usia" required>
                                <option value="" selected disabled>USIA PASIEN</option>
                                @for ($i = 1; $i <= 150; $i++)
                                    <option value="{{ $i }}">{{ $i }} TAHUN </option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select id="" class="form-control" name="id_wilayah" required>
                                <option value="" selected disabled>WILAYAH PASIEN</option>
                                @foreach ($wilayah as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select id="" class="form-control" name="jenis_kelamin" required>
                                <option value="" selected disabled>JENIS KELAMIN PASIEN</option>
                                <option value="PRIA">PRIA</option>
                                <option value="WANITA">WANITA</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-floating mt-3">
                            <textarea class="form-control" name="keluhan" required id="floatingTextarea2" placeholder="Silahkan isi"
                                style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Keluhan Pasien</label>
                        </div>
                    </div>
                    <div class="col-sm-6 mt-3">
                        <div class="form-group">
                            <select id="" class="form-control" name="id_tindakan" required>
                                <option value="" selected disabled>TINDAKAN</option>
                                @foreach ($tindakan as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 mt-3">
                        <div class="form-group">
                            <select id="" class="form-control" name="id_obat" required>
                                <option value="" selected disabled>OBAT</option>
                                @foreach ($obat as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-floating mt-3">
                            <input class="form-control tagihanValue" id="floatingInput" type="text"
                                placeholder="Silahkan isi" required name="tagihan" />
                            <label for="floatingInput">Total Tagihan</label>
                        </div>
                    </div>
                </div>
                <div class="float-end mt-4">
                    <button type="submit" class="btn btn-md btn-info btn-save"><i class="fas fa-save"></i> Save</button>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        $('#form-add-pasien').submit(function(e) {
            e.preventDefault();
            $('.btn-save').attr('disabled', 'disabled')
            $.ajax({
                url: "{{ url('pasien/add') }}",
                type: 'POST',
                data: $('#form-add-pasien').serialize(),
                success: function(response) {
                    if (response.status == 'format') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Oops...',
                            text: 'Format rupiah tidak sesuai',
                        });
                        $('.btn-save').attr('disabled', false)
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Good Job!',
                            text: 'Data has been saved',
                        });
                        location.href = "{{ url('pasien/invoice') }}/" + response.data
                    }
                },
                error: function(error) {
                    $('.btn-save').attr('disabled', false)
                }
            });
        });

        $(function() {
            $(".tagihanValue").keyup(function(e) {
                $(this).val(format($(this).val()));
            });
        });
        var format = function(num) {
            var str = num.toString().replace("", ""),
                parts = false,
                output = [],
                i = 1,
                formatted = null;
            if (str.indexOf(".") > 0) {
                parts = str.split(".");
                str = parts[0];
            }
            str = str.split("").reverse();
            for (var j = 0, len = str.length; j < len; j++) {
                if (str[j] != ",") {
                    output.push(str[j]);
                    if (i % 3 == 0 && j < (len - 1)) {
                        output.push(",");
                    }
                    i++;
                }
            }
            formatted = output.reverse().join("");
            return ("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
        };
    </script>
@endsection
