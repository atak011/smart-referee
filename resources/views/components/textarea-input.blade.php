<div class="form-group">
    @isset($label)
        <label for="{{ $name }}">{{ $label }}</label>
    @endif
    <textarea class="form-control" id="{{ $name }}" name="{{ $name }}" rows="4" placeholder="{{ $placeholder }}">@if($model){{ $model->$name }}@endif</textarea>
</div>
