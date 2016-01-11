<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Tmdb\Repository\TvRepository;

class TvController extends Controller
{
  private $tvRepository;

  public function __constructor(TvRepository $tvRepository)
  {
    $this->tvRepository = $tvRepository;

  }

  public function show()
  {
    $result = $this->tvRepository->getPopular();
    var_dump($result); 
  }
  //
}
