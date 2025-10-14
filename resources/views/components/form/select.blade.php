<div class="form-group {{ $class }}">
    <label for="{{ $name }}">{{ $label }} @if($required)*@endif</label>
    <select name="{{ $name }}" id="{{ $name }}" class="form-control" {{ $required ? 'required' : '' }}>
        @foreach($options as $value => $text)
            <option value="{{ $value }}" {{ $value == $selected ? 'selected' : '' }}>{{ $text }}</option>
        @endforeach
    </select>
</div>
