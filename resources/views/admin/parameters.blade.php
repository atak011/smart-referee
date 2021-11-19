@extends('admin.layout.master')

@section('extra-css')

@endsection

@section('body')
    <div class="container-fluid">
        <div class="card card-custom example example-compact gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Parametreler</h3>
                </div>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">

                    <h2 class="content-heading pt-0">Takımlar Parametresi </h2>
                    <div class="row">
                        <div class="col-lg-4">
                            <x-text-input type="text" name="name" :value="50" label="Lig Katsayısı ( Yüzde )"
                                          placeholder="Lig Katsayısı"/>
                        </div>

                        <div class="col-lg-4">
                            <x-text-input type="text" name="name" :value="50" label="Alt Lig Katsayısı"
                                          placeholder="Alt Lig Katsayısı"/>
                        </div>

                        <div class="col-lg-4">
                            <x-text-input type="text" name="name" :value="10" label="Şampiyonlar Ligi Ek Puan ( Maç Başı )"
                                          placeholder="Şampiyonlar Ligi Ek Puan"/>
                        </div>

                        <div class="col-lg-4">
                            <x-text-input type="text" name="name" :value="5" label="UEFA Ligi Ek Puan ( Maç Başı )"
                                          placeholder="UEFA Ligi Ek Puan"/>
                        </div>

                        <div class="col-lg-4">
                            <x-text-input type="text" name="name" :value="10" label="Derbi Ek Puanı"
                                          placeholder="Derbi Ek Puan"/>
                        </div>

                        <div class="col-lg-4">
                            <x-text-input type="text" name="name" :value="5" label="Yerel Derbi Ek Puan"
                                          placeholder="Yerel Derbi Ek Puan"/>
                        </div>
                    </div>

                    <h2 class="content-heading pt-0">Hakemler Parametresi </h2>

                    <div class="row">
                        <div class="col-lg-4">
                            <x-text-input type="text" name="name" :value="20" label="UEFA Hakemi Ek Puan"
                                          placeholder="UEFA Hakemi Ek Puan"/>
                        </div>

                        <div class="col-lg-4">
                            <x-text-input type="text" name="name" :value="10" label="Üst Klasman Hakemi Ek Puan"
                                          placeholder="Üst Klasman Hakemi Ek Puan"/>
                        </div>

                        <div class="col-lg-4">
                            <x-text-input type="text" name="name" :value="30" label="Son Maç Değerlendirme Adedi"
                                          placeholder="Son Maç Değerlendirme Adedi"/>
                        </div>

                        <div class="col-lg-4">
                            <x-text-input type="text" name="name" :value="5" label="Yılda Aynı Takım Limiti"
                                          placeholder="Yılda Aynı Takım Limiti"/>
                        </div>

                        <div class="col-lg-4">
                            <x-text-input type="text" name="name" :value="4" label="Dinlendirme Haftası"
                                          placeholder="Dinlendirme Haftası"/>
                        </div>

                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <button type="submit" class="btn btn-success">Kategori Kaydet</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
