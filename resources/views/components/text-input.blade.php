<div class="form-group" id="formGroup{{ $name }}" style="@if($hidden) display:none; @endif">
    @if($label)
    <label for="{{ $name }}">
        {{ $label }} @if($required)<span class="text-danger">*</span>@endif
    </label>
    @endif
    @php
        $class = ''
    @endphp
    @error($name)
    @php
        $class = 'is-invalid'
    @endphp
    @enderror

        @php
            if (!$value){
          if(isset($model)){
                   $value = $model->$name;
                }else{
                     $value = old($name);
                }
    }

        @endphp
    <input type="text" class="form-control  {{$class}}" id="{{ $name }}" name="{{ $name }}"
           value="{{$value}}"
           placeholder="{{ $placeholder ?? $label }}" @if($required) required @endif>
    @error($name)
    <div class="invalid-feedback">{{ $label }} {{ $message }}</div>
    @enderror
</div>

