<?php

namespace Modules\Votes\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Posts\Entities\Post;

class VotersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Post $post
     * @return Response
     */
    public function index(Post $post)
    {
        $post = $post->load('voters', 'voters.media');

        return view('votes::voters.index', compact('post'));
    }
}
