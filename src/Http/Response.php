<?php

namespace Twitter\Http;

class Response
{
  protected string $content = '';
  protected array $headers = [];
  protected int $statusCode = 200;

  public function __construct(string $content = '', int $statusCode = 200, array $headers = ['Content-Type' => 'text/html'])
  {
    $this->content = $content;
    $this->statusCode = $statusCode;
    $this->headers = $headers;
  }

  public function getContent(): string
  {
    return $this->content;
  }

  public function setContent(string $content)
  {
    $this->content = $content;

    return $this;
  }

  public function getHeaders(): array
  {
    return $this->headers;
  }

  public function setHeaders(array $headers)
  {
    $this->headers = $headers;

    return $this;
  }

  public function getStatusCode(): int
  {
    return $this->statusCode;
  }

  public function setStatusCode(int $statusCode)
  {
    $this->statusCode = $statusCode;

    return $this;
  }

  public function send()
  {
    // Envoyer les en-têtes (headers)
    /**
     * [
     *   'Content-Type' => 'text/html',
     *   'lang' => 'fr_FR'
     * ]
     */
    foreach ($this->headers as $key => $value) {
      header($key . ': ' . $value);
    }

    // Envoyer le code
    http_response_code($this->statusCode);

    // Envoyer le content
    echo $this->content;
  }
}
