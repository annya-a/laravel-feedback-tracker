<?php

namespace Modules\Votes\Database\Seeders\Test;

use Illuminate\Database\Seeder;
use Modules\Posts\Entities\Post;
use Modules\Users\Entities\User;

class TestVotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // We don't want that combination of post and user duplicates.
        for ($i = 1; $i <= 3000; $i++) {
            $post = $this->randomPost();
            $user = $this->randomUser($post);

            if ($post && $user) {
                factory(\Modules\Votes\Entities\Vote::class, 1)->create(['post_id' => $post->id, 'user_id' => $user->id]);
            }

        }
    }

    /**
     * Get random post.
     *
     * @return Post
     */
    private function randomPost()
    {
        return Post::inRandomOrder()->first();
    }

    /**
     * Get random user which hasn't voted yet for specific post.
     *
     * @var Post $post_id
     *
     * @return User
     */
    private function randomUser($post)
    {
        return User::inRandomOrder()->whereDoesntHave('postVotes', function ($query) use ($post) {
            $query->where('post_id', $post->id)
                ->whereColumn('users.id', '!=', 'posts.user_id');
        })->first();
    }
}
