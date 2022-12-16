@extends('layouts.base')

@section('title', 'ADD PASIEN')
@section('content')
    @php
        $random = rand(1000, 50000);
    @endphp
    <div class="card mb-3">
        <div class="card-body">
            <div class="row justify-content-between align-items-center no-print">
                <div class="col-md">
                    <h5 class="mb-2 mb-md-0">No Tagihan #SKLINIK{{ $random }}</h5>
                </div>
                <div class="col-auto">
                    <button class="btn btn-falcon-default btn-sm me-1 mb-2 mb-sm-0" type="button"
                        onclick="window.print()"><span class="fas fa-print me-1"> </span>Print</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <div class="row align-items-center text-center mb-3">
                <div class="col-sm-6 text-sm-start"><img src="{{ asset('assets/img/favicons/favicon.png') }}" alt="invoice"
                        width="150" /></div>
                <div class="col text-sm-end mt-3 mt-sm-0">
                    <h2 class="mb-3">Tagihan Pembayaran</h2>
                    <h5>KLINIK SIKLINIK</h5>
                    <p class="fs--1 mb-0">Jl. Rambutan 5 <br />Kota Bekasi</p>
                </div>
                <div class="col-12">
                    <hr />
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="text-500">Pembayaran Untuk</h6>
                    <h5>{{ $data->nama }}</h5>
                </div>
                <div class="col-sm-auto ms-auto">
                    <div class="table-responsive">
                        <table class="table table-sm table-borderless fs--1">
                            <tbody>
                                <tr>
                                    <th class="text-sm-end">Nomer Tagihan:</th>
                                    <td>SKLINIK{{ $random }}</td>
                                </tr>
                                <tr>
                                    <th class="text-sm-end">Tanggal Tagihan:</th>
                                    <td>{{ \Carbon\carbon::parse($data->created_at)->format('d M Y') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="table-responsive scrollbar mt-4 fs--1">
                <table class="table table-striped border-bottom">
                    <thead class="light">
                        <tr class="bg-primary text-white dark__bg-1000">
                            <th class="border-0">Deskripsi</th>
                            <th class="border-0">Keluhan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="align-middle">
                                <h6 class="mb-0 text-nowrap">
                                    OBAT : {{ DB::table('master_obat')->where('id', $data->id_obat)->first()->name ?? '-' }}
                                </h6>
                                <h6 class="mb-0 text-nowrap">
                                    TINDAKAN :
                                    {{ DB::table('master_tindakan')->where('id', $data->id_tindakan)->first()->name ?? '-' }}
                                </h6>
                            </td>
                            <td class="align-middle">
                                <h6 class="mb-0 text-nowrap">
                                    {{ $data->keluhan }}
                                </h6>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row justify-content-end">
                <div class="col-auto">
                    <table class="table table-sm table-borderless fs--1 text-end">
                        <tr>
                            <th class="text-900">Total:</th>
                            <td class="fw-semi-bold">{{ 'Rp ' . number_format($data->total_tagihan, 2, ',', '.') }} </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript"></script>
@endsection
