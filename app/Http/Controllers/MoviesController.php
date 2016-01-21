<?php

namespace App\Http\Controllers;

use Tmdb;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MoviesController extends Controller {

    /**
     * returns list of popular movies
     * @return json 
     */
    function getPopular()
    {
      return Tmdb::getMoviesApi()->getPopular();
    }
}
