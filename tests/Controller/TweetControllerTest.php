<?php

use Twitter\Model\TweetModel;
use PHPUnit\Framework\TestCase;
use Twitter\Controller\TweetController;

class TweetControllerTest extends TestCase
{
  /**
   * @test
   */
  public function a_user_can_save_a_tweet()
  {
    $pdo = new \PDO('mysql:host=localhost;dbname=live_test;charset=utf8', 'admin', 'test', [
      \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
    ]);
    // Setup : On vide la BDD
    $pdo->query('DELETE FROM tweet;');

    // Given : Etant donné une requête POST vers /tweet.php
    // Et que les parametres "content" et "author" sont présents
    $_POST['author'] = 'Lior';
    $_POST['content'] = 'Mon premier Tweet';

    // When : Quand mon controller prend la main
    $tweetModel = new TweetModel($pdo);
    $tweetController = new TweetController($tweetModel);
    $response = $tweetController->saveTweet();

    // Then : Alors je m'attend à être redirigé vers /
    $this->assertEquals(302, $response->getStatusCode());
    $this->assertArrayHasKey('Location', $response->getHeaders());
    $this->assertEquals('/', $response->getHeaders()['Location']);

    // Et je m'attend à trouver un tweet dans la BDD
    $result = $pdo->query('SELECT t.* FROM tweet as t');
    $this->assertEquals(1, $result->rowCount());

    // Et le tweet a le bon author et le bon content
    $data = $result->fetch();
    $this->assertEquals('Lior', $data['author']);
    $this->assertEquals('Mon premier Tweet', $data['content']);
  }
}
