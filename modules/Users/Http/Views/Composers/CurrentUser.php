<?php

namespace Modules\Users\Http\Views\Composers;

use Illuminate\View\View;

class CurrentUser
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('currentUser', request()->user());
    }
}
