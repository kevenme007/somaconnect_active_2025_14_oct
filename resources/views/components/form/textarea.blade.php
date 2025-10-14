<div class="form-group {{ $class }}">
    <label for="{{ $name }}">{{ $label }} @if($required)*@endif</label>
    <textarea
        name="{{ $name }}"
        id="{{ $name }}"
        class="form-control"
        {{ $required ? 'required' : '' }}
    >{{ old($name, $value) }}</textarea>
</div>
