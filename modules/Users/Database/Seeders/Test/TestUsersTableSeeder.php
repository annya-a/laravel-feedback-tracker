<?php

namespace Modules\Users\Database\Seeders\Test;

use Illuminate\Database\Seeder;
use Modules\Users\Entities\User;
use Modules\Gravatar\Image;

class TestUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param Image $image
     * @return void
     */
    public function run(Image $image)
    {
        factory(User::class, 10)
            ->create()
            ->each(function (User $user) use ($image) {
                $user->addMediaFromUrl($image->generateUrl($user->email, 500))->toMediaCollection('avatar');
            });
    }
}
