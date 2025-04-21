<?php

ini_set('display_errors', '0');error_reporting(0);

require_once 'TransactionRepository.php';

$app->get('/api/decon/getTransaction', function ($request, $response)
{
    $idTrasaction = $request->getQueryParam('id');

    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->getTransactionById($idTrasaction);
    if (!$data) {
        $errorResponse = [
            'error' => true,
            'stateCode' => 400,
            'result' => 'No se encontraron Registros'
        ];

        return $response->withJson($errorResponse, 400);
    }
    return $response->withJson($data, 200);

});

$app->get('/api/decon/getAll', function ($request, $response)
{
    //$idTrasaction = $request->getQueryParam('id');

    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->getAll();
    if (!$data) {
        $errorResponse = [
            'error' => true,
            'stateCode' => 400,
            'result' => 'No se encontraron Registros'
        ];

        return $response->withJson($errorResponse, 400);
    }
    return $response->withJson($data, 200)

});

$app->post('/api/decon/AddClient', function ($request, $response)
{
    $input =  $request->getParsedBody();
    $nom= $input["name"];
    $addr= $input["add"];
    $cit= $input["city"];
    $state= $input["state"];
    $zip= $input["zipcode"];
    $act= $input["act"];


    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->Addclient( $nom,  $addr, $cit, $state, $zip, $act);
    if (!$data) {
        $errorResponse = [
            'error' => true,
            'stateCode' => 400,
            'result' => 'No se encontraron Registros'
        ];

        return $response->withJson($errorResponse, 400);
    }
    return $response->withJson($data, 200)


});

$app->put('/api/decon/updateClient', function ($request, $response, $args) {
    $input = $request->getParsedBody();
    $queryParams = $request->getQueryParams();
    
    // Get ID from query string (e.g., ?id=26)
    $id = isset($queryParams['id']) ? $queryParams['id'] : null;

    if (!$id) {
        return $response->withJson([
            'error' => true,
            'stateCode' => 400,
            'result' => 'Missing ID in request'
        ], 400);
    }

    // Extract other parameters from body
    $nom = $input["name"] ?? null;
    $addr = $input["add"] ?? null;
    $cit = $input["city"] ?? null;
    $state = $input["state"] ?? null;
    $zip = $input["zipcode"] ?? null;
    $act = $input["act"] ?? null;

    // Validate required fields
    if (!$nom || !$addr || !$cit || !$state || !$zip || !isset($act)) {
        return $response->withJson([
            'error' => true,
            'stateCode' => 400,
            'result' => 'Missing required fields'
        ], 400);
    }

    // Call the update function
    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->Updateclient($nom, $addr, $cit, $state, $zip, $act, $id);

    if (!$data) {
        return $response->withJson([
            'error' => true,
            'stateCode' => 400,
            'result' => "No records found. ID: $id"
        ], 400);
    }

    return $response->withJson($data, 200)

});


$app->delete('/api/decon/deleteClient', function ($request, $response) {
    $idClient = $request->getQueryParam('id');

    if (!$idClient) {
        $errorResponse = [
            'error' => true,
            'stateCode' => 400,
            'result' => 'ID del cliente es requerido'
        ];
        return $response->withJson($errorResponse, 400);
    }

    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->deleteClientById(transactionId: $idClient);

    if (!$data) {
        $errorResponse = [
            'error' => true,
            'stateCode' => 404,
            'result' => 'Cliente no encontrado o no se pudo eliminar'
        ];
        return $response->withJson($errorResponse, 404);
    }

    return $response->withJson([
        'error' => false,
        'stateCode' => 200,
        'result' => 'Cliente eliminado exitosamente'
    ], 200)

});


?>