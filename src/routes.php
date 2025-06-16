<?php
use Slim\Http\UploadedFile;
ini_set('display_errors', '0');
error_reporting(0);
 
require __DIR__ . '/TransactionRepository.php';
 
///////     GETS   ////////
 
 
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

// GET: Get last SubProject
$app->get('/api/decon/getLastSubproject', function ($request, $response) {
    $idTransaction = $request->getQueryParam('Project');
 
    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->getLastSubproject($idTransaction);
 
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
// GET: Get last SubProject
$app->get('/api/decon/getLastSubproject', function ($request, $response) {
    $idTransaction = $request->getQueryParam('Project');
 
    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->getLastSubproject($idTransaction);
 
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

// GET: Get Projects by status
$app->get('/api/decon/getAllProjectsStatus', function ($request, $response) {
    $idTransaction = $request->getQueryParam('Status');
    $transactionRepository = new TransactionRepository($this->db);
  $data = $transactionRepository->getAllProjectsStatus($idTransaction);
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

// GET: Get by distinct Project
$app->get('/api/decon/getProjectA', function ($request, $response) {
    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->getProjectA();
 
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


// GET: Get all Contacts
$app->get('/api/decon/getAllContacts', function ($request, $response) {
    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->getAllContacts();
 
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

// GET: Get Projects by status
$app->get('/api/decon/getAllProjectsStatus', function ($request, $response) {
    $idTransaction = $request->getQueryParam('Status');
    $transactionRepository = new TransactionRepository($this->db);
  $data = $transactionRepository->getAllProjectsStatus($idTransaction);
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

// GET: Get by distinct Project
$app->get('/api/decon/getProjectA', function ($request, $response) {
    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->getProjectA();
 
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


// GET: Get all Contacts
$app->get('/api/decon/getAllContacts', function ($request, $response) {
    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->getAllContacts();
 
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
    try {
        $current_date = date("YmdHis");
        $directory='./images/';
        $uploadedFile = $request->getUploadedFiles();
        $filename = moveUploadedFile($directory, $uploadedFile['file'],"logo".$current_date);
     
       $tmp = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/images/".$filename;

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
    $logo=$tmp;
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
 
    $OkResponse = [
            'error' => false,
            'stateCode' => 200,
            'result' => 'Registro exitoso'
        ];
        return $response->withJson($OkResponse, 200);
    } catch (Exception $e) {
        $errorResponse = [
            'error' => true,
            'stateCode' => 400,
            'result' => 'error: '.$e->getMessage()
        ];
        return $response->withJson($errorResponse, 400);
    }
        
        
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

// PUT: Update a detail Projects
$app->post('/api/decon/updateProjectdetails', function ($request, $response) {

 


    $input = $request->getParsedBody();
    $ProjectName= $input['ProjectName'];
    $Project= $input['Project'];
    $ProjectFee= $input['ProjectFee'];
    $ProjectDescription= $input['ProjectDescription'];
    $SubProject= $input['SubProject'];
    $Task= $input['Task'];
    $DepartmentManager= $input['DepartmentManager'];
    $NTPDate= $input['NTPDate'];
    $Status= $input['Status'];
    $Category= $input['Category'];  
    $ProjectType= $input['ProjectType'];
    $ProjectScope= $input['ProjectScope'];
    $DueDate= $input['DueDate'];
    $ProjectManager= $input['ProjectManager'];
    $MainServiceLine= $input['MainServiceLine'];
    $Market= $input['Market'];
    $EngineeringService= $input['EngineeringService'];
    $ID= $input['ID'];
    $IDD= $input['IDD'];
    $ClientName= $input["selectedClient"] ?? null;
    $Agreement= $input["AgreementNo"] ?? null;
    $ProjectCSJNo = $input["ClientProjectCost"] ?? null;
    $ProjectCSJ= $input['ProjectCSJ'];
    $State= $input['State'];
    $County= $input['County'];
    $City= $input['City'];
    $HighwayNo= $input['HighwayNo'];
    $Owner= $input['Owner'];
    $SegmentBridge = $input['Segment'];
    $BridgeDistrict = $input['Bridge'];
    $ContactInf = $input['Contact'];
    $GralDesProject=$input['GeneralDescription'];
    $ClientProject= $input["ClientProject"] ?? null;
    $ProjectCost= $input["ProjectCost"];


    $transactionRepository = new TransactionRepository($this->db);

      $data1 = $transactionRepository->updateProjectdetails($ClientName,  $Agreement, $ProjectCost,  $ProjectCSJNo, $State, $County, $City, $HighwayNo,  $Owner, $SegmentBridge,  $BridgeDistrict, $ContactInf, $GralDesProject,
$ProjectName, $ClientProject, $ID);

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

 

// PUT: Update Project


$app->post('/api/decon/updateProject', function ($request, $response) {
 


    $input = $request->getParsedBody();
    $FP= $input['FP'];
    $ProjectFee= $input['ProjectFee'];
    $ProjectDescription= $input['ProjectDescription'];
    $Task= $input['Task'];
    $DepartmentManager= $input['DepartmentManager'];
    $NTPDate= $input['NTPDate'];
    $Status= $input['Status'];
    $ProjectType= $input['ProjectType'];
    $ProjectScope= $input['ProjectScope'];
    $DueDate= $input['DueDate'];
    $ProjectManager= $input['ProjectManager'];
    $MainServiceLine= $input['MainServiceLine'];
    $Market= $input['Market'];
    $EngineeringService= $input['EngineeringService'];
    $ID= $input['ID'];
    $ClientName= $input["selectedClient"] ?? null;
    $Agreement= $input["AgreementNo"] ?? null;
    $ProjectCSJNo = $input["ClientProjectCost"] ?? null;
    $ProjectCSJ= $input['ProjectCSJ'];
    $State= $input['State'];
    $County= $input['County'];
    $City= $input['City'];
    $HighwayNo= $input['HighwayNo'];
    $Owner= $input['Owner'];
    $SegmentBridge = $input['Segment'];
    $BridgeDistrict = $input['Bridge'];
    $ContactInf = $input['Contact'];
    $GralDesProject=$input['GeneralDescription'];
    $ClientProject= $input["ClientProject"] ?? null;


    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->updateProject($FP, $ProjectDescription,  $ProjectFee, $Task, $DepartmentManager, $NTPDate,  $Status,  $ProjectType, $ProjectScope,$DueDate, $ProjectManager, $MainServiceLine, $Market, $EngineeringService, $ID);
 
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
        'result' => "Client ID $ID updated successfully"
    ], 200);
});



// PUT: Update Proposal to Project


$app->post('/api/decon/updateProposaltoProject', function ($request, $response) {
 


    $input = $request->getParsedBody();
    $ProjectName= $input['ProjectName'];
    $Project= $input['Project'];
    $ProjectFee= $input['ProjectFee'];
    $ProjectDescription= $input['ProjectDescription'];
    $SubProject= $input['SubProject'];
    $Task= $input['Task'];
    $DepartmentManager= $input['DepartmentManager'];
    $NTPDate= $input['NTPDate'];
    $Status= $input['Status'];
    $Category= $input['Category'];  
    $ProjectType= $input['ProjectType'];
    $ProjectScope= $input['ProjectScope'];
    $DueDate= $input['DueDate'];
    $ProjectManager= $input['ProjectManager'];
    $MainServiceLine= $input['MainServiceLine'];
    $Market= $input['Market'];
    $EngineeringService= $input['EngineeringService'];
    $ID= $input['ID'];
    $ClientName= $input["selectedClient"] ?? null;
    $Agreement= $input["AgreementNo"] ?? null;
    $ProjectCSJNo = $input["ClientProjectCost"] ?? null;
    $ProjectCSJ= $input['ProjectCSJ'];
    $State= $input['State'];
    $County= $input['County'];
    $City= $input['City'];
    $HighwayNo= $input['HighwayNo'];
    $Owner= $input['Owner'];
    $SegmentBridge = $input['Segment'];
    $BridgeDistrict = $input['Bridge'];
    $ContactInf = $input['Contact'];
    $GralDesProject=$input['GeneralDescription'];
    $ClientProject= $input["ClientProject"] ?? null;


    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->updateProposaltoProject($ProjectName,  $Project, $ProjectDescription,  $ProjectFee, $SubProject, $Task, $DepartmentManager, $NTPDate,  $Status, $Category,  $ProjectType, $ProjectScope,$DueDate, $ProjectManager, $MainServiceLine, $Market, $EngineeringService, $ID);
 
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
        'result' => "Client ID $ID updated successfully"
    ], 200);
});

$app->post('/api/decon/addProjectdetails', function ($request, $response) {
 

    $input = $request->getParsedBody();
    $ProjectName= $input['ProjectName'];
    $Project= $input['Project'];
    $ProjectFee= $input['ProjectFee'];
    $ProjectDescription= $input['ProjectScope'];
    $SubProject= $input['SubProject'];
    $Task= $input['Task'];
    $DepartmentManager= $input['DepartmentManager'];
    $NTPDate= $input['NTPDate'];
    $Status= $input['Status'];
    $Category= $input['Category'];  
    $ProjectType= $input['ProjectType'];
    $ProjectScope= $input['ProjectScope'];
    $DueDate= $input['DueDate'];
    $ProjectManager= $input['ProjectManager'];
    $MainServiceLine= $input['MainServiceLine'];
    $Market= $input['Market'];
    $EngineeringService= $input['EngineeringService'];
    $ID= $input['ID'];
    $ClientName= $input["selectedClient"] ?? null;
    $Agreement= $input["AgreementNo"] ?? null;
    $ProjectCSJNo = $input["ClientProjectCost"] ?? null;
    $ProjectCSJ= $input['ProjectCSJ'];
    $State= $input['State'];
    $County= $input['County'];
    $City= $input['City'];
    $HighwayNo= $input['HighwayNo'];
    $Owner= $input['Owner'];
    $SegmentBridge = $input['Segment'];
    $BridgeDistrict = $input['Bridge'];
    $ContactInf = $input['Contact'];
    $GralDesProject=$input['GeneralDescription'];
    $ClientProject= $input["ClientProject"] ?? null;
    $ProjectCost= $input["ProjectCost"];


    $transactionRepository = new TransactionRepository($this->db);

       $data1 = $transactionRepository->addProjectdetails($ClientName, $Agreement, $ProjectCost, $ProjectCSJNo, $State, $County,$City, $HighwayNo, $Owner, $SegmentBridge, $BridgeDistrict, $ContactInf,$GralDesProject,$ProjectName, $ClientProject);

    if ($data1 === 0) {
        return $response->withJson([
 
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

// PUT: Update a detail Projects
$app->post('/api/decon/updateProjectdetails', function ($request, $response) {

 


    $input = $request->getParsedBody();
    $ProjectName= $input['ProjectName'];
    $Project= $input['Project'];
    $ProjectFee= $input['ProjectFee'];
    $ProjectDescription= $input['ProjectDescription'];
    $SubProject= $input['SubProject'];
    $Task= $input['Task'];
    $DepartmentManager= $input['DepartmentManager'];
    $NTPDate= $input['NTPDate'];
    $Status= $input['Status'];
    $Category= $input['Category'];  
    $ProjectType= $input['ProjectType'];
    $ProjectScope= $input['ProjectScope'];
    $DueDate= $input['DueDate'];
    $ProjectManager= $input['ProjectManager'];
    $MainServiceLine= $input['MainServiceLine'];
    $Market= $input['Market'];
    $EngineeringService= $input['EngineeringService'];
    $ID= $input['ID'];
    $IDD= $input['IDD'];
    $ClientName= $input["selectedClient"] ?? null;
    $Agreement= $input["AgreementNo"] ?? null;
    $ProjectCSJNo = $input["ClientProjectCost"] ?? null;
    $ProjectCSJ= $input['ProjectCSJ'];
    $State= $input['State'];
    $County= $input['County'];
    $City= $input['City'];
    $HighwayNo= $input['HighwayNo'];
    $Owner= $input['Owner'];
    $SegmentBridge = $input['Segment'];
    $BridgeDistrict = $input['Bridge'];
    $ContactInf = $input['Contact'];
    $GralDesProject=$input['GeneralDescription'];
    $ClientProject= $input["ClientProject"] ?? null;
    $ProjectCost= $input["ProjectCost"];


    $transactionRepository = new TransactionRepository($this->db);

      $data1 = $transactionRepository->updateProjectdetails($ClientName,  $Agreement, $ProjectCost,  $ProjectCSJNo, $State, $County, $City, $HighwayNo,  $Owner, $SegmentBridge,  $BridgeDistrict, $ContactInf, $GralDesProject,
$ProjectName, $ClientProject, $ID);

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

 

// PUT: Update Project


$app->post('/api/decon/updateProject', function ($request, $response) {
 


    $input = $request->getParsedBody();
    $FP= $input['FP'];
    $ProjectFee= $input['ProjectFee'];
    $ProjectDescription= $input['ProjectDescription'];
    $Task= $input['Task'];
    $DepartmentManager= $input['DepartmentManager'];
    $NTPDate= $input['NTPDate'];
    $Status= $input['Status'];
    $ProjectType= $input['ProjectType'];
    $ProjectScope= $input['ProjectScope'];
    $DueDate= $input['DueDate'];
    $ProjectManager= $input['ProjectManager'];
    $MainServiceLine= $input['MainServiceLine'];
    $Market= $input['Market'];
    $EngineeringService= $input['EngineeringService'];
    $ID= $input['ID'];
    $ClientName= $input["selectedClient"] ?? null;
    $Agreement= $input["AgreementNo"] ?? null;
    $ProjectCSJNo = $input["ClientProjectCost"] ?? null;
    $ProjectCSJ= $input['ProjectCSJ'];
    $State= $input['State'];
    $County= $input['County'];
    $City= $input['City'];
    $HighwayNo= $input['HighwayNo'];
    $Owner= $input['Owner'];
    $SegmentBridge = $input['Segment'];
    $BridgeDistrict = $input['Bridge'];
    $ContactInf = $input['Contact'];
    $GralDesProject=$input['GeneralDescription'];
    $ClientProject= $input["ClientProject"] ?? null;


    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->updateProject($FP, $ProjectDescription,  $ProjectFee, $Task, $DepartmentManager, $NTPDate,  $Status,  $ProjectType, $ProjectScope,$DueDate, $ProjectManager, $MainServiceLine, $Market, $EngineeringService, $ID);
 
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
        'result' => "Client ID $ID updated successfully"
    ], 200);
});



// PUT: Update Proposal to Project


$app->post('/api/decon/updateProposaltoProject', function ($request, $response) {
 


    $input = $request->getParsedBody();
    $ProjectName= $input['ProjectName'];
    $Project= $input['Project'];
    $ProjectFee= $input['ProjectFee'];
    $ProjectDescription= $input['ProjectDescription'];
    $SubProject= $input['SubProject'];
    $Task= $input['Task'];
    $DepartmentManager= $input['DepartmentManager'];
    $NTPDate= $input['NTPDate'];
    $Status= $input['Status'];
    $Category= $input['Category'];  
    $ProjectType= $input['ProjectType'];
    $ProjectScope= $input['ProjectScope'];
    $DueDate= $input['DueDate'];
    $ProjectManager= $input['ProjectManager'];
    $MainServiceLine= $input['MainServiceLine'];
    $Market= $input['Market'];
    $EngineeringService= $input['EngineeringService'];
    $ID= $input['ID'];
    $ClientName= $input["selectedClient"] ?? null;
    $Agreement= $input["AgreementNo"] ?? null;
    $ProjectCSJNo = $input["ClientProjectCost"] ?? null;
    $ProjectCSJ= $input['ProjectCSJ'];
    $State= $input['State'];
    $County= $input['County'];
    $City= $input['City'];
    $HighwayNo= $input['HighwayNo'];
    $Owner= $input['Owner'];
    $SegmentBridge = $input['Segment'];
    $BridgeDistrict = $input['Bridge'];
    $ContactInf = $input['Contact'];
    $GralDesProject=$input['GeneralDescription'];
    $ClientProject= $input["ClientProject"] ?? null;


    $transactionRepository = new TransactionRepository($this->db);
    $data = $transactionRepository->updateProposaltoProject($ProjectName,  $Project, $ProjectDescription,  $ProjectFee, $SubProject, $Task, $DepartmentManager, $NTPDate,  $Status, $Category,  $ProjectType, $ProjectScope,$DueDate, $ProjectManager, $MainServiceLine, $Market, $EngineeringService, $ID);
 
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
        'result' => "Client ID $ID updated successfully"
    ], 200);
});

$app->post('/api/decon/addProjectdetails', function ($request, $response) {
 

    $input = $request->getParsedBody();
    $ProjectName= $input['ProjectName'];
    $Project= $input['Project'];
    $ProjectFee= $input['ProjectFee'];
    $ProjectDescription= $input['ProjectScope'];
    $SubProject= $input['SubProject'];
    $Task= $input['Task'];
    $DepartmentManager= $input['DepartmentManager'];
    $NTPDate= $input['NTPDate'];
    $Status= $input['Status'];
    $Category= $input['Category'];  
    $ProjectType= $input['ProjectType'];
    $ProjectScope= $input['ProjectScope'];
    $DueDate= $input['DueDate'];
    $ProjectManager= $input['ProjectManager'];
    $MainServiceLine= $input['MainServiceLine'];
    $Market= $input['Market'];
    $EngineeringService= $input['EngineeringService'];
    $ID= $input['ID'];
    $ClientName= $input["selectedClient"] ?? null;
    $Agreement= $input["AgreementNo"] ?? null;
    $ProjectCSJNo = $input["ClientProjectCost"] ?? null;
    $ProjectCSJ= $input['ProjectCSJ'];
    $State= $input['State'];
    $County= $input['County'];
    $City= $input['City'];
    $HighwayNo= $input['HighwayNo'];
    $Owner= $input['Owner'];
    $SegmentBridge = $input['Segment'];
    $BridgeDistrict = $input['Bridge'];
    $ContactInf = $input['Contact'];
    $GralDesProject=$input['GeneralDescription'];
    $ClientProject= $input["ClientProject"] ?? null;
    $ProjectCost= $input["ProjectCost"];


    $transactionRepository = new TransactionRepository($this->db);

       $data1 = $transactionRepository->addProjectdetails($ClientName, $Agreement, $ProjectCost, $ProjectCSJNo, $State, $County,$City, $HighwayNo, $Owner, $SegmentBridge, $BridgeDistrict, $ContactInf,$GralDesProject,$ProjectName, $ClientProject);

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


function moveUploadedFile($directory, Slim\Http\UploadedFile $uploadedFile,$name)
    {
        $extension = strtoupper(pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION));
        $filename = sprintf('%s.%0.8s', $name, $extension);
        $uploadedFile->moveTo($directory . DIRECTORY_SEPARATOR . $filename);

        return $filename;
    }