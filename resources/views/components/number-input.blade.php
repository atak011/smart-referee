<div class="form-group">
    @if($label)
    <label>{{ $label }}</label>
    @endif
    <div class="input-group">
        <input type="number" name="{{ $name }}" value="{{ $value ?? '' }}" class="form-control" placeholder="{{ $placeholder ?? '' }}" >
    </div>

    @isset($hint)
    <span class="form-text text-muted">{{ $hint }}</span>
    @endisset
</div>

