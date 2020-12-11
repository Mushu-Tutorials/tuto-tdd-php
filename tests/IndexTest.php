<?php

use PHPUnit\Framework\TestCase;

class IndexTest extends TestCase
{
  /**
   * @test
   */
  // public function test_index_shows_good_hello()
  // {
  //   ob_start();
  //   include 'index.php';

  //   $result = ob_get_clean();


  //   $this->assertEquals('Hello Mushu', $result);
  // }

  public function test_homepage_says_hello()
  {
    // Given
    $_GET['name']= 'Mushu';

    // When
    $controller = new \Twitter\Controller\HelloController();
    $response = $controller->hello();

    // Then
    $this->assertEquals('Bonjour Mushu', $response->getContent());
    $this->assertEquals(200, $response->getStatusCode());
    
    $contentHeader = $response->getHeaders()['Content-Type'] ?? null;
    $this->assertEquals('text/html', $contentHeader);
  }
}
