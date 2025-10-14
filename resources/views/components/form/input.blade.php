<div class="{{ $class }}">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $value) }}"
        class="form-control @error($name) is-invalid @enderror"
        {{ $required ? 'required' : '' }}
    >
    @error($name)
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
