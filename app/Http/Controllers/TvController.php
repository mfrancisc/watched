<?php

namespace App\Http\Controllers;

use Tmdb;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TvController extends Controller {

  /**
   * returns list of popular tv show
   * @return  json 
   */
  public function getPopular()
  {
      return Tmdb::getTvApi()->getPopular();
  }
}
