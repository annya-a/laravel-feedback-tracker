<div class="text-danger">
    @if ($errors->has($name))
        {{ $errors->first($name) }}
    @endif
</div>
