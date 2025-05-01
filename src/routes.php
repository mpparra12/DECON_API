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

///
// GET: Get Project QA-QC 
$app->get('/api/decon/getProjectQAQC', function ($request, $response) {
    $transactionRepository = new TransactionRepository($this->db);
  $data = $transactionRepository->getAllProjects();
  // $data = $transactionRepository->getProjectQAQC();
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

///

// GET: Get Proposals 
$app->get('/api/decon/getAllProposals', function ($request, $response) {
    $transactionRepository = new TransactionRepository($this->db);
  $data = $transactionRepository->getAllProposals();
  // $data = $transactionRepository->getProjectQAQC();
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

// GET: Get transaction by Project Name
$app->get('/api/decon/getTransbyProjectName', function ($request, $response) {
    $idTransaction = $request->getQueryParam('ProjectName');

    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->getTransByProjectName($idTransaction);

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

    $nom = $input["Name"];
    $addr = $input["Address"];
    $cit = $input["City"];
    $state = $input["State"];
    $zip = $input["ZipCode"];
    $act = $input["Active"];
    $country=$input["Country"];
    $doc=$input["Documents_and_other_requirements"];
    $inv=$input["Invoice_Date"];
    $logo=$input["Logo"];
    $per=$input["Period_of_Invoice"];
    $proc=$input["Procedure"];

    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->addClient($nom, $addr, $cit, $state, $zip, $act, $country, $doc, $inv, $logo, $per, $proc);

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
$app->post('/api/decon/updateClient', function ($request, $response) {


    $input = $request->getParsedBody();
  //  $queryParams = $request->getQueryParams();

  //  $id = $queryParams['id'] ?? null;

   /* if (!$id) {
        return $response->withJson([
            'error' => true,
            'stateCode' => 400,
            'result' => 'Missing ID in request'
        ], 400);
    }*/

    $nom = $input["Name"];
    $addr = $input["Address"] ?? null;
    $cit = $input["City"] ?? null;
    $state = $input["State"] ?? null;
    $zip = $input["ZipCode"] ?? null;
    $act = $input["Active"] ?? null;
    $id = $input['ID'];

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
$app->post('/api/decon/deleteClient', function ($request, $response) {
    $input = $request->getParsedBody();
    $idClient = $input['ID'];
   // $idClient = $request->getQueryParam('ID');

 /*   if (!$idClient) {
        $errorResponse = [
            'error' => true,
            'stateCode' => 400,
            'result' => 'ID del cliente es requerido'
        ];
        return $response->withJson($errorResponse, 400);
    }*/

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
