@extends('admin.layout.master')

@section('extra-css')
    <link href="{{ asset('admin2/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
          type="text/css"/>
@endsection

@php
    function getReferee($id){
     return DB::table('matched_referee')->where('match_id',$id)->get();
    }

@endphp

@section('body')

    <div class="container-fluid">


        <form method="GET">
            <div class="row mb-3">
                <a href="{{ route('match.match') }}" class="btn btn-success">
                    Eşleştirmeyi Başlat
                </a>
                <div class="col-3">
                    <select name="league" class="form-control" id="">
                        <option value=""> -- Hafta Seçin --</option>
                        <option value="1"> 1.Hafta</option>
                    </select>
                </div>

                <button class="btn btn-success">Git</button>

            </div>
        </form>


        <div class="row">
            @foreach($matches as $match)
                <div class="card card-custom col-5 mt-3 ml-3">
                    <div class="card-header">
                        <div class="card-title">
						<span class="card-icon">
												<i class="flaticon2-list text-primary"></i>
											</span>
                            <h3 class="card-label">{{ $match->home }} - {{ $match->away }} </h3>


                        </div>
                        <h3 class="card-subtitle mt-3">Sistem Puanı : {{ $match->point }}</h3>
                    </div>
                    <div class="card-body">
                        @if($match->is_derby)
                            <span class="badge badge-danger">DERBİ</span>
                            <hr>
                        @endif

                        @if($loop->index == 0)
                            <span class="badge badge-success">Haftanın maçı</span>
                            <hr>
                        @endif
                        <h4>Önerilen Hakemler</h4>

                        @php

                            $referee = getReferee($match->id);

                        @endphp

                        @if(!$referee->isEmpty())

                            <h5>{{ $referee[0]->possible_1 }} <span class="badge badge-success">Önerilen</span></h5>
                            <br>
                            <h5>{{ $referee[0]->possible_2 }}</h5> <br>
                            <h5>{{ $referee[0]->possible_3 }}</h5>

                        @else
                            Eşleştirme Yapılmamış

                        @endif


                    </div>
                </div>
            @endforeach
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
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Turkish.json"
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
