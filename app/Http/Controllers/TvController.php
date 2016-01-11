<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Tmdb\Repository\TvRepository;

class TvController extends Controller {

  private $tv;

  function __construct(TvRepository $tv)
  {
    $this->tv = $tv; 
  }


  public function getPopular()
  {
    $result = $this->tv->getPopular();
    var_dump($result); 
  }
}
