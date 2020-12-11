<?php

namespace Twitter\Controller;

use PDO;
use Twitter\Http\Response;
use Twitter\Model\TweetModel;

class TweetController
{
  protected TweetModel $tweetModel;

  public function __construct(TweetModel $tweetModel) {
    $this->tweetModel = $tweetModel;
  }

  /**
   * Envoie les données au TweetModel
   * Pour sauvegarder un tweet
   * Et redirige vers /
   *
   * @return Response
   */
  public function saveTweet(): Response
  {
    $this->tweetModel->save($_POST['author'], $_POST['content']);

    return new Response('', 302, [
      'Location' => '/'
    ]);
  }
}
