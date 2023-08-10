<?php 
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require_once"vendor/autoload.php";

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$configuration = new \Slim\Container($configuration);


$app = new \Slim\App($configuration);

//Metodo de requisições

//GET
$app->get('/produtos[/{nome}]',function(Request $request, Response $response, array $args){
    $limit = $request->getQueryParams()['limit'] ?? 10;
    $nome = $args['nome'] ?? 'mouse';

    return $response->getBody()->write("{$limit} Produtos do banco de dados com o nome {$nome}");
});

//Post inserir
$app->post('/produtos', function(Request $request, Response $response, array $args){
    //retorna um array com todos os dados que estão sendo passados.
    $data = $request->getParsedBody();

    $nome = $data['nome'] ?? '';

    return $response->getBody()->write(("Produto {$nome} (POST)"));
});

//PUT alterar
$app->put('/produtos', function(Request $request, Response $response, array $args){
    //retorna um array com todos os dados que estão sendo passados.
    $data = $request->getParsedBody();

    $nome = $data['nome'] ?? '';

    return $response->getBody()->write(("Produto {$nome} (PUT)"));
});

//Delete deletar
$app->delete('/produtos', function(Request $request, Response $response, array $args){
    //retorna um array com todos os dados que estão sendo passados.
    $data = $request->getParsedBody();

    $nome = $data['nome'] ?? '';

    return $response->getBody()->write(("Produto {$nome} (DELETE)"));
});

$app ->run();