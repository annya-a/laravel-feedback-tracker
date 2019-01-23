@if ($voters->isNotEmpty())
    @foreach($voters as $voter)
        <div class="voter-item">
            <div class="float-left mr-2">
                <img class="rounded-circle avatar-sm" src="{{ asset($voter->getFirstMediaUrl('avatar', 'thumb')) }}" />
            </div>
            <div>
                {{ $voter->name }}
            </div>
        </div>
    @endforeach
@else
    {{ __('No voters yet. Be the first who votes this post!') }}
@endif

