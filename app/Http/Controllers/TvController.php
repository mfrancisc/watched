<?php

namespace App\Http\Controllers;

use Cache;
use Tmdb;
use App\Http\Requests;
use Tmdb\Helper\ImageHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    //if result not in cache, executes api call
    return Cache::rememberForever('popularsTv', function() {
      return $this->getPopularFromSource();
    }); 
  }

  /**
   * gets data from source 
   * @return json
   */
  private function getPopularFromSource()
  {
    $populars = Tmdb::getTvApi()->getPopular();

    $popularsWithUrls = $this->getPosterUrls($populars);

    return $popularsWithUrls;

  }

  /**
   *  Adding complete url to poster images
   *  @return json
   */
  private function getPosterUrls($populars)
  {

    foreach($populars['results'] as $cnt => $tvShow)
    {
      $tvShow['poster_path_url'] = $this->helper->getUrl($tvShow['poster_path']);
      $populars['results'][$cnt] = $tvShow;
    }

    return $populars;
  }

}
