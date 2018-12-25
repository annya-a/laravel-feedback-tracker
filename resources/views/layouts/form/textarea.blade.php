<textarea name="{{ $name }}"
    @isset($placeholder)
        placeholder="{{ $placeholder }}"
    @endisset
>
@isset($value)
    {{ $value }}
@endisset
</textarea>
