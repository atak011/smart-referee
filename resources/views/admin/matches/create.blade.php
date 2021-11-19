@extends('admin.layout.master')

@section('extra-css')

@endsection

@section('body')
    <div class="container-fluid">
        <div class="card card-custom example example-compact gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Kategori Ekleme</h3>
                </div>
            </div>
            <form action="{{ isset($category) ?  route('category.update',$category->id):route('category.store') }}" method="POST" enctype="multipart/form-data">
            <div class="card-body">


                @isset($category)
                    @method('PUT')
                @endisset
                @csrf
                <!-- Vital Info -->
                    <h2 class="content-heading pt-0">Kategori Bilgileri</h2>
                    <div class="col-lg-6">
                        <x-text-input type="text" name="name" :value="$category->details[0]->name ?? old('name')" label="Kategori Adı" placeholder="Kategori Adı Giriniz"/>

                       <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <x-select-input name="parent_id" label="Kategori Seçiniz" />
                                    <x-checkbox-input name="showMenu" label="Menüde Göster"/>

                                    @if(isset($category) && $category->parent_id)
                                        <x-checkbox-input name="parentChoose" label="Ana Kategori Yap"/>
                                    @endif
                                </div>
                            </div>
                        </div>

                        @if($conf['highlighted_image'])
                            <x-fileupload-input type="file" :image="$category->details[0]->highlighted_image ?? '' " class="form-control" name="highlighted_image" />
                        @endif

                        @if($conf['category_view'])
                            <x-fileupload-input type="file" class="form-control"  name="category_view" />
                        @endif
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

@section('extra-js')
    <script>
        initSelect('{{ route('category.select',['type' => 'tree']) }}', 'Üst Kategori Seçin', '#parent_id', {{$category->parent_id ?? '' }});

        $(document).ready(function (){
            $('#parentChoose').on('change', function(e) {
                if(this.checked) {
                    $('#parent_id').val(null).trigger('change');
                }
            });
        })

    </script>

@endsection
