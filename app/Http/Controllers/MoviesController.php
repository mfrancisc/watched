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

    function show()
    {
        // returns information of a movie
        $movies = $this->movies->getPopular();
        var_dump($movies);
    }
}
