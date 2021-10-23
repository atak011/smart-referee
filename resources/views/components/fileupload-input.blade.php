<div class="row">
    <div class="col-6">
        <label for="{{$name}}" class="btn btn-primary btn-lg btn-block">Görsel Seçiniz</label>
    </div>
    @isset($image)
    <div class="col-6">
        <img src="{{$image}}" class="w-100" alt="">
    </div>
    @endif
    <input type="file" id="{{$name}}" name="{{$name}}" hidden>
</div>



