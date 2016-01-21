<?php

namespace App\Http\Controllers;

use Tmdb;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Tmdb\Helper\ImageHelper;

class TvController extends Controller {

  private $helper;

  public function __construct( ImageHelper $helper)
    {
        $this->helper = $helper;
    }

  /**
    * returns list of popular tv shows
    * @return json
   *
   */
    public function getPopular()
    {
      $populars = Tmdb::getTvApi()->getPopular();

      //adding complete url poster images
      foreach($populars['results'] as $cnt => $tvShow)
      {
        $tvShow['poster_path_url'] = $this->helper->getUrl($tvShow['poster_path']);
        $populars['results'][$cnt] = $tvShow;
      }

      return $populars;
    }

}
