<?php

namespace Domain\Features\Services;

use App\Providers\FeaturesProvider;
use Core\Services\BasicService;
use Domain\Features\Models\Feature;

class FeatureService extends BasicService implements FeatureServiceContract
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return Feature::class;
    }
}
