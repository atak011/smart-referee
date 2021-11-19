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
                        <option value=""> -- Klasman Seçin -- </option>
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
                    <h3 class="card-label">Hakem Listesi</h3>

                </div>

            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable" id="kt_datatable"
                       style="margin-top: 13px !important">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ev Sahibi</th>
                        <th>Ort .Gözlemci Puanı</th>
                        <th>Klasman</th>
                        <th>Sistem Puanı</th>
                        <th>İşlem</th>

                    </tr>
                    </thead>
                </table>
                <!--end: Datatable-->
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
    <script src="{{ asset('admin2/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>

        $('#kt_datatable').DataTable({
            responsive: true,
            autoWidth: false,
            processing: true,
            serverSide: true,
            language:{
                "url":"//cdn.datatables.net/plug-ins/1.10.12/i18n/Turkish.json"
            },
            ajax: "{{ route('referee.datatable') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'average_score', name: 'average_score'},
                {data: 'class', name: 'class'},
                {data: 'point', name: 'point'},
                {data: 'action', name: 'action'},
            ],
        });
    </script>
@endsection
