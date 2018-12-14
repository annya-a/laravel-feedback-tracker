<?php

namespace App\Http\Controllers\Features;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Domain\Features\Services\FeatureServiceContract;

class FeatureController extends Controller
{
    /**
     * Items per page.
     *
     * @var integer
     */
    const ITEMS_PER_PAGE = 10;

    /**
     * Feature service.
     *
     * @var FeatureServiceContract
     */
    protected $feature_service;

    /**
     * FeatureController constructor.
     *
     * @param FeatureServiceContract $featureService
     */
    public function __construct(FeatureServiceContract $featureService)
    {
        $this->feature_service = $featureService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features = $this->feature_service->paginate(self::ITEMS_PER_PAGE);

        return view('features.index', compact('features'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
}
