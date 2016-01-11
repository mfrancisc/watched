<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Tmdb\Repository\MovieRepository;

class MoviesController extends Controller {

    private $movies;

    function __construct(MovieRepository $movies)
    {
        $this->movies = $movies;
    }

    /**
     * returns list of popular movies
     * @return Tmdb\Model\Collection\ResultCollection with Tmdb\Model\Movie
     */
    function getPopular()
    {
        $movies = $this->movies->getPopular();
    }
}
