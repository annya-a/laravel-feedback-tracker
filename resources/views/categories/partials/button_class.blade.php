@switch($name)
    @case('bugs')
    btn-dark-danger
    @break

    @case('features')
    btn-primary
    @break

    @case('improvements')
    btn-success
    @break
@endswitch
