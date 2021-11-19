@extends('admin.layout.master')

@section('extra-css')
    <link href="{{ asset('admin2/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
          type="text/css"/>
@endsection

@section('body')
    <div class="container-fluid">

        <form method="GET" >
            <div class="row mb-3">

                <div class="col-3">
                    <select name="league" class="form-control" id="">
                        <option value=""> -- Lig Seçin -- </option>
                        <option value="1"> Süper Lig </option>
                        <option value="2"> 1. Lig </option>
                    </select>
                </div>

                <div class="col-3">

                    <select name="year" class="form-control" id="">
                        <option value=""> -- Yıl Seçin -- </option>
                        <option value="2020"> 2020 </option>
                        <option value="2019"> 2019 </option>
                    </select>
                </div>

                <button class="btn btn-success">Git</button>

            </div>
        </form>
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
						<span class="card-icon">
												<i class="flaticon2-list text-primary"></i>
											</span>
                    <h3 class="card-label">Hesaplanmış Puan Yıl {{ $year }}</h3>




                </div>

            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable" id="kt_datatable"
                       style="margin-top: 13px !important">
                    <thead>
                    <tr>
                        <th>Takım</th>
                        <th>Puan</th>
                        <th>Geçmiş Lig Puanı</th>
                        <th>Şampiyonlar Ligi Puanı</th>
                        <th>Uefa Ligi Puanı</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $da)
                    <tr>
                        <td>{{ $da['team'] }}</td>
                        <td>{{ $da['point'] }}</td>
                        <td>{{ $da['prev_point'] }}</td>
                        <td>{{ $da['cl_point'] }}</td>
                        <td>{{ $da['ul_point'] }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <!--end: Datatable-->
            </div>
        </div>
    </div>
@endsection

@section('extra-js')

@endsection
