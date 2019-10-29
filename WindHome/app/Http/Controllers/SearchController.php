<?php

namespace App\Http\Controllers;

use App\Http\Service\ServiceInterface\ImageServiceInterface;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    protected $imageService;

    public function __construct(ImageServiceInterface $imageService)
    {
        $this->imageService = $imageService;
    }

    public function searchByCity(Request $request)
    {
    }

    public function searchCity(Request $request)
    {
    }

}
