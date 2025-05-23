<?php
 
ini_set('display_errors', '0');
error_reporting(0);
 
require __DIR__ . '/TransactionRepository.php';
 
///////     GETS   ////////
 
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
 
// GET: Get all Clients
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
 
// GET: Get all employees
$app->get('/api/decon/getEmployee', function ($request, $response) {
    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->getEmployee();
 
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

// GET: Get all employees Manager
$app->get('/api/decon/getManager', function ($request, $response) {
    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->getManager();
 
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

// GET: Get all employees PM
$app->get('/api/decon/getPM', function ($request, $response) {
    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->getPM();
 
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
 
// GET: Get Project QA-QC
$app->get('/api/decon/getProjectQAQC', function ($request, $response) {
    $transactionRepository = new TransactionRepository($this->db);
  //$data = $transactionRepository->getAllProjects();
   $data = $transactionRepository->getProjectQAQC();
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
 
// GET: Get Proposals
$app->get('/api/decon/getAllProposals', function ($request, $response) {
    $transactionRepository = new TransactionRepository($this->db);
  $data = $transactionRepository->getAllProposals();
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
 
// GET: Get Projects
$app->get('/api/decon/getAllProjects', function ($request, $response) {
    $transactionRepository = new TransactionRepository($this->db);
  $data = $transactionRepository->getAllProjects();
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
$app->get('/api/decon/getbyProjectName', function ($request, $response) {
    $idTransaction = $request->getQueryParam('ProjectName');
 
    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->getByProjectName($idTransaction);
 
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
 
 
 
// GET: Get transaction by Proposal
$app->get('/api/decon/getByProposalNum', function ($request, $response) {
    $idTransaction = $request->getQueryParam('NoProposal');
 
    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->getByProposalNum($idTransaction);
 
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

// GET: Get by distinct Year
$app->get('/api/decon/getbyYear', function ($request, $response) {
    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->getbyYear();
 
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

// GET: Get all Type Market
$app->get('/api/decon/getAllMarket', function ($request, $response) {
    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->getAllMarket();
 
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

// GET: Get all Type Project
$app->get('/api/decon/getAllTypeProject', function ($request, $response) {
    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->getAllTypeProject();
 
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

// GET: Get all Type Service Line
$app->get('/api/decon/getAllTypeServiceLine', function ($request, $response) {
    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->getAllTypeServiceLine();
 
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

// GET: Get all Type Status Project
$app->get('/api/decon/getAllTypeStatusProject', function ($request, $response) {
    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->getAllTypeStatusProject();
 
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

// GET: Get all Type Status Proposal
$app->get('/api/decon/getAllStatusProposal', function ($request, $response) {
    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->getAllStatusProposal();
 
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

// GET: Get Num Proposal by year

$app->get('/api/decon/getAllNoProposal', function ($request, $response) {
    $idTransaction = $request->getQueryParam('Year');
 
    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->getAllNoProposal($idTransaction);
 
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

// GET: Get Last Num Proposal by Name

$app->get('/api/decon/getLastProposalNum', function ($request, $response) {
    $idTransaction = $request->getQueryParam('Name');
 
    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->getLastProposalNum($idTransaction);
 
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




// GET: Get all Project Details
$app->get('/api/decon/getAllProjectDetails', function ($request, $response) {
    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->getAllProjectDetails();
 
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

///////     ADICIONAR   ////////
 
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
 
// POST: Add a proposal
$app->post('/api/decon/addProposal', function ($request, $response) {
    $input = $request->getParsedBody();
 
    $idcli = $input["IDClient"];
    $nom = $input["ClientName"];
    $cat = $input["Category"];
    $des = $input["ProjectDescription"];
    $con = $input["ContractValue"];
    $est = $input["Estimated_h"];
    $year=$input["Year"];
    $pro=$input["Proposal"];
    $nopro=$input["NoProposal"];
    $country=$input["Country"];
    $proreq=$input["ProposalRequestDate"];
    $prosub=$input["ProposalSubmitted"];
    $scope=$input["Scope"];
    $statpro=$input["StatusProp"];
 
    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->addProposal($idcli, $nom, $cat, $des, $con, $est, $year, $country, $pro, $nopro, $proreq, $prosub, $statpro, $scope );
 
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
 
 
///////     ACTUALIZAR   ////////
 
 
// PUT: Update a client
$app->post('/api/decon/updateClient', function ($request, $response) {
 
 
    $input = $request->getParsedBody();
    $nom = $input["Name"];
    $addr = $input["Address"] ?? null;
    $cit = $input["City"] ?? null;
    $state = $input["State"] ?? null;
    $zip = $input["ZipCode"] ?? null;
    $act = $input["Active"] ?? null;
    $id = $input['ID'];
 
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
 
// PUT: Update a lastProposal
$app->post('/api/decon/updatelastProposal', function ($request, $response) {
 
 
    $input = $request->getParsedBody();
    $prop = $input["NoProposal"];
    $proj = $input["NoProject"];
    $id= $input["ID"];

 
    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->updatelastProposal($proj, $prop, $id);
 
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
 
// PUT: Update a Proposal
$app->post('/api/decon/updateProposal', function ($request, $response) {
 
 
    $input = $request->getParsedBody();
    $nom = $input["Name"];
    $cat = $input["Category"] ?? null;
    $des = $input["ProjectDescription"] ?? null;
    $con = $input["ContractValue"] ?? null;
    $est = $input["EstimatedHours"] ?? null;
    $year = $input["Year"] ?? null;
    $id = $input['ID'];
    $pro = $input['Proposal'];
    $nopro = $input['NoProposal'];
    $country = $input['Country'];
    $proreq = $input['ProposalRequestDate'];
    $prosub = $input['ProposalSubmitted'];
    $scope = $input['Scope'];
    $statpro  = $input['StatusProp'];

    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->updateProposal($nom, $cat, $des, $con, $est, $year, $pro, $id, $nopro, $country, $proreq, $prosub, $scope, $statpro );
 
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

// PUT: Update Proposal to Project
$app->post('/api/decon/updateProposaltoProject', function ($request, $response) {
 


    $input = $request->getParsedBody();
    $Client= $input["Client"];
    $selectedClient= $input["selectedClient"] ?? null;
    $selectedEmployee= $input["selectedEmployee"] ?? null;
    $AgreementNo= $input["AgreementNo"] ?? null;
    $ClientProject= $input["ClientProject"] ?? null;
    $ClientProjectCost= $input["ClientProjectCost"] ?? null;
    $selectedFP= $input['selectedFP'];
    $ProjectCSJ= $input['ProjectCSJ'];
    $State= $input['State'];
    $County= $input['County'];
    $City= $input['City'];
    $HighwayNo= $input['HighwayNo'];
    $Owner= $input['Owner'];
    $Segment= $input['Segment'];
    $Bridge= $input['Bridge'];
    $yearFP= $input['yearFP'];
    $Contact= $input['Contact'];
    $FP= $input['FP'];
    $ProjectName= $input['ProjectName'];
    $ProjectScope= $input['ProjectScope'];
    $DepartmentManager= $input['DepartmentManager'];
    $ProjectManager= $input['ProjectManager'];
    $DECONProjectType= $input['DECONProjectType'];
    $Task= $input['Task'];
    $Market= $input['Market'];
    $MainServiceLine= $input['MainServiceLine'];
    $EngineeringService= $input['EngineeringService'];
    $FPRequestedDate= $input['FPRequestedDate'];
    $FPSenttoClien= $input['FPSenttoClien'];
    $NTPDate= $input['NTPDate'];
    $ProjectFee= $input['ProjectFee'];
    $DueDate= $input['DueDate'];
    $Project= $input['Project'];
    $SubProject= $input['SubProject'];
    $Status= $input['Status'];
    $Category= $input['Category'];   
    $ID= $input['ID'];
    $ProjectDescription= $input['ProjectDescription'];
    $ProjectType= $input['ProjectType'];
    
    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->updateProposaltoProject($ProjectName,  $Project, $ProjectDescription,  $ProjectFee, $SubProject, $Task, $DepartmentManager, $NTPDate,  $Status, $Category,  $ProjectType, $ProjectScope,$DueDate, $ProjectManager, $MainServiceLine, $Market, $EngineeringService, $ID);
 
    if ($data === 0) {
        return $response->withJson([
            'error' => true,
            'stateCode' => 400,
            'result' => "No records updated. ID may not exist or values were the same."
        ], 400);
    }
       $data1 = $transactionRepository->addProjectdetails($Client, $AgreementNo, $ClientProjectCost, $ProjectCSJ, $State, $County,$City, $HighwayNo, $Owner, $Segment, $Bridge, $Contact,$ProjectScope,$ProjectName, $ClientProject);

    if ($data1 === 0) {
        return $response->withJson([
            'error' => true,
            'stateCode' => 400,
            'result' => "No records updated. ID may not exist or values were the same."
        ], 400);
    }
      
 
 return $response->withJson([
        'error' => false,
        'stateCode' => 200,
        'result' => "Client ID $ID updated successfully"
    ], 200);
});

 
///////     BORRAR   ////////
 
 
// DELETE: Delete a client
$app->post('/api/decon/deleteClient', function ($request, $response) {
    $input = $request->getParsedBody();
    $idClient = $input['ID'];
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
