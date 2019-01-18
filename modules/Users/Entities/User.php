<?php

namespace Modules\Users\Entities;

use App\Core\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Modules\Votes\HasVoter\HasVoterModel;
use Modules\Votes\HasVoter\HasVoterModelContract;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class User extends Model implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract,
    HasMedia,
    HasVoterModelContract
{
    use Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail, HasMediaTrait, HasVoterModel;

    /**
     * Register media collections.
     */
    public function registerMediaCollections()
    {
        $this->addMediaCollection('avatar')
            ->singleFile();
    }

    /**
     * Add media conversions.
     *
     * @param Media|null $media
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(100);
    }
}
