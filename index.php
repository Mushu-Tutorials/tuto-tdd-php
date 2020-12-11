<?php

use Twitter\Controller\HelloController;
use Twitter\Http\Response;

require_once __DIR__ . '/vendor/autoload.php';

$name = $_GET['name'];

$response = new Response;

/**
 * Etape 1
 * On construit la réponse web souhaitée avec :
 *   - Construction d'un header
 *   - Retour dun code de réponse
 *   - Retour du contenu
 */
// header('Content-Type: text/html');
// http_response_code(200);
// echo "Hello $name";

/**
 * Etape 2
 * On convertit l'étape 1 en version POO utile pour pouvoir tester le code.
 * Création d'une classe Response contenant Header / StatusCode / Content.
 * On ajoute à l'objet l'affichage du contenu avec la méthode send()
 */
// $response->setHeaders([
//   'Content-Type' => 'text/html'
// ]);
// $response->setStatusCode(200);
// $response->setContent("Hello $name");
// $response->send();

/**
 * Etape 3
 * On convertit l'étape 2 faisant appel au HelloController
 * Afin de maintenir le code et les tests à jour.
 */
$helloController = new HelloController;
$response = $helloController->hello();
$response->send();
