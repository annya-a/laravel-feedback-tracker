<?php

namespace Modules\Gravatar;

use Illuminate\Support\Arr;

class Image
{
    /**
     * Api URL.
     */
    const API_URL = 'https://www.gravatar.com';

    /**
     * Generate image by email
     *
     * @param string $email
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function generateUrl(string $email, int $size)
    {
        $options = ['s' => $size, 'd' => 'identicon', 'r' => 'PG'];
        $url = static::API_URL . '/avatar/' . md5($email) . '?' . Arr::query($options);

        return url($url, $options);
    }
}
