<?php

use Illuminate\Database\Seeder;
use App\Domain\Users\Models\User;
use App\Domain\Gravatar\Image;

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
