<?php

namespace App\Http\Controllers;

use Cache;
use Tmdb;
use Tmdb\Helper\ImageHelper;
use App\Http\Controllers\Controller;

class TvController extends Controller {

  private $helper;

  public function __construct(ImageHelper $helper)
  {
    $this->helper = $helper;
  }

  /**
   * Search for list by name
   *
   * @param  string $query
   * @return json
   */
  public function search($query)
  {
    return Tmdb::getSearchApi()->searchTv($query);
  }

  /**
   * Returns list of popular tv shows
   *
   * @return json
   */
  public function getPopular()
  {
    //if result not in cache, executes api call
    return Cache::rememberForever('popularsTv', function() {
      return $this->getPopularFromSource();
    }); 
  }

  /**
   * Gets data from source 
   *
   * @return json
   */
  private function getPopularFromSource()
  {
    $populars = Tmdb::getTvApi()->getPopular();
  
    $popularsWithUrls = $this->getPosterUrls($populars);

    return $popularsWithUrls;

  }

  /**
   * Adding complete url to poster images
   *
   * @param  $populars
   * @return json
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
