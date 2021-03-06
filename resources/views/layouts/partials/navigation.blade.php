<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="/">Laravel Feedback</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item row nav-item-avatar">
                    <div class="col-2 mr-2">
                        <img class="rounded-circle" src="{{ asset($currentUser->getFirstMediaUrl('avatar', 'thumb')) }}" />
                    </div>
                    <div class="col">
                        <div>{{ $currentUser->name }}</div>
                        <div class="text-muted">{{ $currentUser->email }}</div>
                    </div>

                </li>
            </ul>
        </div>
    </div>
</nav>
