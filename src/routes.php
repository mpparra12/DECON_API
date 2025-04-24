<?php

ini_set('display_errors', '0');
error_reporting(0);

require_once 'TransactionRepository.php';

// GET: Get transaction by ID
$app->get('/api/decon/getTransaction', function ($request, $response) {
    $idTransaction = $request->getQueryParam('id');

    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->getTransactionById($idTransaction);

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

// GET: Get all transactions
$app->get('/api/decon/getAll', function ($request, $response) {
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

    return $response->withJson($data, 200);
});

// POST: Add a client
$app->post('/api/decon/AddClient', function ($request, $response) {
    $input = $request->getParsedBody();

    $nom = $input["name"];
    $addr = $input["add"];
    $cit = $input["city"];
    $state = $input["state"];
    $zip = $input["zipcode"];
    $act = $input["act"];

    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->addClient($nom, $addr, $cit, $state, $zip, $act);

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

// PUT: Update a client
$app->put('/api/decon/updateClient', function ($request, $response) {
    $input = $request->getParsedBody();
    $queryParams = $request->getQueryParams();

    $id = $queryParams['id'] ?? null;

    if (!$id) {
        return $response->withJson([
            'error' => true,
            'stateCode' => 400,
            'result' => 'Missing ID in request'
        ], 400);
    }

    $nom = $input["Name"];
    $addr = $input["Address"] ?? null;
    $cit = $input["City"] ?? null;
    $state = $input["State"] ?? null;
    $zip = $input["ZipCode"] ?? null;
    $act = $input["Active"] ?? null;

    /*if (!$nom || !$addr || !$cit || !$state || !$zip || !isset($act)) {
        return $response->withJson([
            'error' => true,
            'stateCode' => 400,
            'result' => 'Missing required fields'
        ], 400);
    }*/

    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->Updateclient($nom, $addr, $cit, $state, $zip, $act, $id);

    if ($data === 0) {
        return $response->withJson([
            'error' => true,
            'stateCode' => 400,
            'result' => "No records updated. ID may not exist or values were the same."
        ], 400);
    }

 return $response->withJson([
        'error' => false,
        'stateCode' => 200,
        'result' => "Client ID $id updated successfully"
    ], 200);
});

// DELETE: Delete a client
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
    $data = $transactionRepository->deleteClientById($idClient);

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
    ], 200);
});
