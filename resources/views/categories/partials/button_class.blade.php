@switch($name)
    @case('bugs')
    btn-secondary
    @break

    @case('features')
    btn-primary
    @break

    @case('improvements')
    btn-success
    @break
@endswitch
