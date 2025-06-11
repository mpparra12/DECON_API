<?php
 use Slim\Http\UploadedFile;

class TransactionRepository
{
    // Almacena la conexión PDO
    protected $db;
 
    // Constructor que recibe la conexión de la base de datos (PDO)
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
 
    // Función para guardar una transacción en la base de datos
    public function saveTransaction($data, $transactionId)
    {
        $sql = "INSERT INTO transactions (
                    [transaction_id], [amount], [currency], [login_key_id], [reference],
                    [url_success], [url_cancel], [url_fail], [url_notification], [email],
                    [forename], [surname], [phone], [address], [city], [state], [country], [postal_code], [metatrader_id], [broker],
                    [requestNumber]
                ) VALUES (
                    :transaction_id, :amount, :currency, :login_key_id, :reference,
                    :url_success, :url_cancel, :url_fail, :url_notification, :email,
                    :forename, :surname, :phone, :address, :city, :state, :country, :postal_code, :metatrader_id,
                    :broker, :requestNumber
                )";
 
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':transaction_id' => $transactionId,
            ':amount' => $data['amount'],
            ':currency' => $data['currency'],
            ':login_key_id' => $data['loginKeyId'],
            ':reference' => $data['reference'],
            ':url_success' => $data['urlSuccess'],
            ':url_cancel' => $data['urlCancel'],
            ':url_fail' => $data['urlFail'],
            ':url_notification' => $data['urlNotification'] ?? null,
            ':email' => $data['email'],
            ':forename' => $data['forename'] ?? null,
            ':surname' => $data['surname'] ?? null,
            ':phone' => $data['phone'] ?? null,
            ':address' => $data['address'] ?? null,
            ':city' => $data['city'] ?? null,
            ':state' => $data['state'] ?? null,
            ':country' => $data['country'] ?? null,
            ':postal_code' => $data['postalCode'] ?? null,
            ':metatrader_id' => $data['MetaTraderID'] ?? null,
            ':broker' => $data['broker'] ?? null,
            ':requestNumber' => $data['RequestNumber'] ?? null
        ]);
    }
 
///////     LISTAR   ////////
 
    // Función para obtener Cliente  por el ID
    public function getTransactionById($transactionId)
    {
        $stmt = $this->db->prepare("SELECT * FROM clients WHERE ID= :transaction_id");
        $stmt->execute([':transaction_id' => $transactionId]);
        return $stmt->fetch();
    }

 
    // Función para obtener todos los clientes
    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM clients ORDER BY Name ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    // Función para obtener todos los Employee
    public function getEmployee()
    {
        $stmt = $this->db->prepare("SELECT * FROM [dbo].[User]");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Función para obtener todos los Employee
    public function getManager()
    {
        $stmt = $this->db->prepare("SELECT * FROM [dbo].[User] where DM='1' ");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Función para obtener todos los Employee
    public function getPM()
    {
        $stmt = $this->db->prepare("SELECT * FROM [dbo].[User] where PM='1' ");
        $stmt->execute();
        return $stmt->fetchAll();
    }


    // Función para obtener todos las Propuestas
    public function getAllProposals()
    {
 
        $stmt = $this->db->prepare("SELECT * FROM [dbo].[Projects&Proposal] where Country='USA'");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Función para obtener el ultimo Subproject 
    public function getLastSubproject($transactionId)
    {
        $stmt = $this->db->prepare("SELECT MAX(SubProject) AS Mproj FROM [dbo].[Projects&Proposal] WHERE Project= :transaction_id");
        $stmt->execute([':transaction_id' => $transactionId]);
        return $stmt->fetchAll();
    }



    // Función para obtener todos los proyectos
    public function getAllProjectsStatus($transactionId)
    {
  //      $stmt = $this->db->prepare("SELECT * FROM [dbo].[Projects&Proposal] where Category='Contrated'"); 
        $stmt = $this->db->prepare("SELECT Project.[ProjectName],
      Project.[ClientName],
      Project.[ProjectDescription],
      Project.[PM],
      Project.[ContractValue],
      Project.[ProjectType],
      Project.[NoProposal],
      Project.[AwardDate],
      Project.[Discipline],
      Project.[Market],
      Project.[DeparmentManager],
      Project.[ServiceEng],
      Project.[Task],
     Project.[DeparmentManager],
	  Project.[Year],
      Project.[Status],
      Project.[Scope],
      Project.[EstimatedDueDate],
      Project.[File],
      Project.[ProposalRequestDate],
      Project.[ProposalSubmitted],
	  Detail.[Agreement],
      Detail.[ProjectCost],
      Detail.[ProjectCSJContractNo],
      Detail.[State],
      Detail.[County],
      Detail.[City],
      Detail.[HighwayNo],
      Detail.[Owner],
      Detail.[SegmentBridge],
      Detail.[BridgeDistrict],
      Detail.[ContactInformation],
      Detail.[GeneralDescriptionProject],
      Detail.[ProjectName],
      Detail.[ClientProject]
FROM [Projects&Proposal] AS Project
INNER JOIN [ClientDetailProject] AS Detail ON Project.ProjectName=Detail.ProjectName where Category='Contrated' and Status=:transaction_id ORDER BY Project.ProjectName ASC");

        $stmt->execute([':transaction_id' => $transactionId]);
        return $stmt->fetchAll();
    }

    // Función para obtener todos los proyectos
    public function getAllProjects()
    {
  //      $stmt = $this->db->prepare("SELECT * FROM [dbo].[Projects&Proposal] where Category='Contrated'"); 
        $stmt = $this->db->prepare("SELECT Project.[ProjectName],
     Project.[ID] AS ID,
      Project.[ClientName],
      Project.[ProjectDescription],
      Project.[PM],
      Project.[ContractValue],
      Project.[ProjectType],
      Project.[NoProposal],
      Project.[AwardDate],
      Project.[Discipline],
      Project.[Market],
      Project.[DeparmentManager],
      Project.[ServiceEng],
      Project.[Task],
     Project.[DeparmentManager],
	  Project.[Year],
      Project.[Status],
      Project.[Scope],
      Project.[EstimatedDueDate],
      Project.[File],
      Project.[ProposalRequestDate],
      Project.[ProposalSubmitted],
      Project.[ProjectName],
	  Detail.[Agreement],
      Detail.[ProjectCost],
      Detail.[ProjectCSJContractNo],
      Detail.[State],
      Detail.[County],
      Detail.[City],
      Detail.[ID] AS IDD,

      Detail.[HighwayNo],
      Detail.[Owner],
      Detail.[SegmentBridge],
      Detail.[BridgeDistrict],
      Detail.[ContactInformation],
      Detail.[GeneralDescriptionProject],
      Detail.[ProjectName] AS ProjectNameDe,
      Detail.[ClientProject]
FROM [Projects&Proposal] AS Project
INNER JOIN [ClientDetailProject] AS Detail ON Project.ProjectName=Detail.ProjectName where Category='Contrated' ORDER BY Project.ProjectName ASC");


        $stmt->execute();
        return $stmt->fetchAll();
    }
 
    // Función para obtener todos los proyectos Activos para QAQC
    public function getProjectQAQC()
    {
 
        $stmt = $this->db->prepare("SELECT * FROM [dbo].[Projects&Proposal] where Category='Contrated' AND Status='Under Production'");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Función para obtener todos los años
    public function getbyYear()
    {
        $stmt = $this->db->prepare("SELECT distinct Year FROM [dbo].[Projects&Proposal]");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Función para obtener todos los Projects
    public function getProjectA()
    {
        $stmt = $this->db->prepare("SELECT distinct Project FROM [dbo].[Projects&Proposal] where Project is not null ORDER BY Project ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }


    // Función para obtener all market
    public function getAllMarket()
    {
        $stmt = $this->db->prepare("SELECT * FROM TypeMarket");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Función para obtener all Type Project
    public function getAllTypeProject()
    {
        $stmt = $this->db->prepare("SELECT * FROM TypeProject");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Función para obtener All Type Service Line
    public function getAllTypeServiceLine()
    {
        $stmt = $this->db->prepare("SELECT * FROM TypeServiceLine");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Función para obtener all Type Status Project
    public function getAllTypeStatusProject()
    {
        $stmt = $this->db->prepare("SELECT * FROM TypeStatusProject");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /// Función para obtener all Status proposal
    public function getAllStatusProposal()
    {
        $stmt = $this->db->prepare("SELECT * FROM TypeStatusProposal");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /// Función para obtener all Status proposal
    public function getAllNoProposal($transactionId)
    {
        $stmt = $this->db->prepare("SELECT * FROM [dbo].[Projects&Proposal] where NoProposal is not null AND NoProposal <>'' AND Year= :transaction_id");
        $stmt->execute([':transaction_id' => $transactionId]);
        return $stmt->fetchAll();
    }


      // Función para obtener Proposal Num by ID
      public function getByProposalNum($transactionId)
      {
          $stmt = $this->db->prepare("SELECT * FROM [dbo].[Projects&Proposal] WHERE NoProposal = :transaction_id");
          $stmt->execute([':transaction_id' => $transactionId]);
          return $stmt->fetch();
      }

      public function getLastProposalNum($transactionId)
      {
          $stmt = $this->db->prepare("SELECT * FROM [dbo].[LastProjectProposal] WHERE Name = :transaction_id");
          $stmt->execute([':transaction_id' => $transactionId]);
          return $stmt->fetch();
      }      
 
// Función para obtener todos los project details
    public function getAllProjectDetails()
    {
        $stmt = $this->db->prepare("SELECT * FROM ClientDetailProject");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Función para obtener todos los Contactos
    public function getAllContacts()
    {
 
         $stmt = $this->db->prepare("SELECT * FROM Contacts");
        $stmt->execute();
        return $stmt->fetchAll();
    }

///////     ADICIONAR   ////////
 
    // Función para guardar log de una transacción en la base de datos
    public function saveLogTransaction($requestJson, $originUrl)
    {
        $sql = "INSERT INTO log_requests ([request_json], [origin_url]) VALUES (:request_json, :origin_url)";
 
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':request_json' => $requestJson,
            ':origin_url' => $originUrl
        ]);
    }
 
    // Función para agregar un cliente en la tabla clients
    public function addClient($nom, $add, $cit, $state, $zip, $act,$country, $doc, $inv, $logo, $per, $proc)
   
    {
       //  require_once 'class-phpass.php';
      //  $directory='./images/';
    //   $uploadedFile = $file->getUploadedFiles();
        $sql = "INSERT INTO clients
                ([Name], [Address], [City], [State], [ZipCode], [Active],[Country],[Documents_and_other_requirements],[Invoice_Date],[Logo],[Period_of_Invoice],[Procedure])
                VALUES (:name, :address, :city, :state, :zipcode, :active,:count,:doc1, :inv1, :logo1, :per1, :proc1)";
 
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':name', $nom);
        $stmt->bindValue(':address', $add);
        $stmt->bindValue(':city', $cit === null ? null : $cit ,     $cit === null ? PDO::PARAM_NULL : PDO::PARAM_STR);
        $stmt->bindValue(':state', $state === null ? null : $state ,     $state=== null ? PDO::PARAM_NULL : PDO::PARAM_STR);
        $stmt->bindValue(':zipcode', $zip=== null ? null : $zip,     $zip=== null ? PDO::PARAM_NULL : PDO::PARAM_STR);
        $stmt->bindValue(':active',   $act   === null ? null : $act   ,   $act      === null ? PDO::PARAM_NULL : PDO::PARAM_STR);
        $stmt->bindValue(':count',  $country=== null ? null : $country,  $country  === null ? PDO::PARAM_NULL : PDO::PARAM_STR);
        $stmt->bindValue(':doc1',  $doc=== null ? null : $doc,  $doc=== null ? PDO::PARAM_NULL : PDO::PARAM_STR);
        $stmt->bindValue(':inv1', $inv === null ? null : $inv , $inv  === null ? PDO::PARAM_NULL : PDO::PARAM_STR);
        $stmt->bindValue(':logo1',   $logo=== null ? null : $logo,   $logo=== null ? PDO::PARAM_NULL : PDO::PARAM_STR);
        $stmt->bindValue(':per1',  $per=== null ? null : $per,  $per=== null ? PDO::PARAM_NULL : PDO::PARAM_STR);
        $stmt->bindValue(':proc1', $proc=== null ? null : $proc, $proc === null ? PDO::PARAM_NULL : PDO::PARAM_STR);

        return $stmt->execute();
  //     $id = $this->db->lastInsertId();
 //       $filename = moveUploadedFile($directory, $uploadedFile['Imagen'],$id);
  //      $tmp = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/Images/".$filename;
    }
 
    // Función para agregar un cliente en la tabla clients
    public function addProposal($idcli, $nom, $cat, $des, $con, $est, $year, $country, $pro, $nopro, $proreq, $prosub, $statpro, $scope)
    {
        $sql = "INSERT INTO [Projects&Proposal]
                ([IDClient], [ClientName], [Category], [ProjectDescription], [ContractValue], [Estimated_h], [Year], [Country],
                [Proposal], [NoProposal], [ProposalRequestDate], [ProposalSubmitted], [StatusProp], [Scope])
                VALUES (:idcli, :nom, :cat, :des, :con, :est, :year, :country, :pro, :nopro, :proreq, :prosub, :statpro, :scope)";

        $stmt = $this->db->prepare($sql);

        // Asignar los valores usando bindValue con tipo correcto
        $stmt->bindValue(':nom', $nom);
        $stmt->bindValue(':cat', $cat);
        $stmt->bindValue(':des', $des);
        $stmt->bindValue(':est', $est);
        $stmt->bindValue(':year', $year);
         $stmt->bindValue(':con', $con);   

        $stmt->bindValue(':country', $country);
        $stmt->bindValue(':idcli', $idcli === null ? null : $idcli,     $idcli=== null ? PDO::PARAM_NULL : PDO::PARAM_STR);
      
        $stmt->bindValue(':pro',     $pro     === null ? null : $pro,     $pro     === null ? PDO::PARAM_NULL : PDO::PARAM_STR);
        $stmt->bindValue(':nopro',   $nopro   === null ? null : $nopro,   $nopro   === null ? PDO::PARAM_NULL : PDO::PARAM_STR);
        $stmt->bindValue(':proreq',  $proreq  === null ? null : $proreq,  $proreq  === null ? PDO::PARAM_NULL : PDO::PARAM_STR);
        $stmt->bindValue(':prosub',  $prosub  === null ? null : $prosub,  $prosub  === null ? PDO::PARAM_NULL : PDO::PARAM_STR);
        $stmt->bindValue(':statpro', $statpro === null ? null : $statpro, $statpro === null ? PDO::PARAM_NULL : PDO::PARAM_STR);
        $stmt->bindValue(':scope',   $scope   === null ? null : $scope,   $scope   === null ? PDO::PARAM_NULL : PDO::PARAM_STR);

        return $stmt->execute();
    }


///////     ACTUALIZAR   ////////
 
 
    // Función para actualizar un cliente
    public function updateClient($nom, $add, $cit, $state, $zip, $act, $id)
    {
        $sql = "UPDATE [dbo].[Clients] SET
                    [Name] = :name1,
                    [Address] = :address1,
                    [City] = :city,
                    [State] = :state1,
                    [ZipCode] = :zipcode,
                    [Active] = :act
                WHERE [ID] = :id";
 
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':name1' => $nom,
            ':address1' => $add,
            ':city' => $cit,
            ':state1' => $state,
            ':zipcode' => $zip,
            ':act' => $act,
            ':id' => $id
        ]);
 
        return $stmt->rowCount();
    }

    // Función para actualizar un Last Proposal and Project
    public function updatelastProposal($proj, $prop, $id)
    {
        $sql = "UPDATE [dbo].[LastProjectProposal] SET [NoProposal] = :prop1,  [NoProject] = :proj1  WHERE [ID] = :id1";
 
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':id1' => $id,
            ':prop1' => $prop,
            ':proj1' => $proj,
             
        ]);
 
        return $stmt->rowCount();
    }



    // Función para actualizar proposal

public function updateProposal($nom, $cat, $des, $con, $est, $year, $pro, $id, $nopro, $country, $proreq, $prosub, $scope, $statpro )
    {
        $sql = "UPDATE [dbo].[Projects&Proposal] SET
                        ([Name]=:name, 
                        [Category]= :category, 
                        [ProjectDescription]= :projectdescription, 
                        [ContractValue]= :contractvalue, 
                        [EstimatedHours]= :estimatedhours, 
                        [Year]= :year,
                        [Proposal]= :proposal,
                        [NoProposal]= :noproposal,
                        [Country]= :country,
                        [ProposalRequestDate]= :proposalrequestdate,
                        [ProposalSubmitted]= :proposalsubmitted,
                        [Scope]=  :scope,
                        [StatusProp]= :statusprop)

                WHERE [ID] = :id";
 
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':name' => $nom,
            ':category' => $cat,
            ':projectdescription' => $des,
            ':contractvalue' => $con,
            ':estimatedhours' => $est,
            ':year' => $year,
            ':proposal' => $pro,
            ':noproposal' => $nopro,
            ':country' => $country,
            ':proposalrequestdate' => $proreq,
            ':proposalsubmitted' => $prosub,
            ':scope' => $scope,
            ':statusprop' => $statpro,
            ':id' => $id
        ]);
 
        return $stmt->rowCount();
    }
    
    // Función para actualizar details

public function updateProjectdetails($ClientName,  $Agreement, $ProjectCost,  $ProjectCSJNo, $State, $County, $City, $HighwayNo,  $Owner, $SegmentBridge,  $BridgeDistrict, $ContactInf, $GralDesProject,
$ProjectName, $ClientProject, $ID)

    {
        $sql = "UPDATE [dbo].[ClientDetailProject] SET
                        ([ClientName]=:ClientName, 
                        [Agreement]= :Agreement, 
                        [ProjectCost]= :ProjectCost, 
                        [ProjectCSJContractNo]= :ProjectCSJContractNo, 
                        [State]= :State, 
                        [County]= :County,
                        [City]= :City,
                        [HighwayNo]= :HighwayNo,
                        [Owner]= :Owner,
                        [SegmentBridge]= :SegmentBridge,
                        [BridgeDistrict]= :BridgeDistrict,
                        [ContactInformation]=  :ContactInformation,
                        [ClientProject]=  :ClientProject,
                        [GeneralDescriptionProject]= :GeneralDescriptionProject)

                WHERE [ID] = :id";
 

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':ClientName' => $ClientName,
            ':Agreement' => $Agreement,
            ':ProjectCost' => $ProjectCost,
            ':ProjectCSJContractNo' => $ProjectCSJNo,
            ':State' => $State,
            ':County' => $County,
           ':City' => $City,
          ':HighwayNo' => $HighwayNo,
          ':Owner' => $Owner,
          ':SegmentBridge' => $SegmentBridge,
          ':BridgeDistrict' => $BridgeDistrict,
           ':ContactInformation' => $ContactInf,
          ':GeneralDescriptionProject' => $GralDesProject,
          ':ProjectName' => $ProjectName,
          ':ClientProject' => $ClientProject,
            ':id' => $ID
        ]);
 
        return $stmt->rowCount();
    }
    

    // Función para actualizar Project
    public function updateProject($FP, $ProjectDescription,  $ProjectFee, $Task, $DepartmentManager, $NTPDate,  $Status,  $ProjectType, $ProjectScope,$DueDate, $ProjectManager, $MainServiceLine, $Market, $EngineeringService, $ID)
    {

       $sql = "UPDATE [dbo].[Projects&Proposal] SET
                        [NoProposal]=:FP, 
                        [ProjectDescription]= :ProjectDescription, 
                        [ContractValue]= :ProjectFee, 
                        [Task]= :Task,
                        [DeparmentManager]= :DepartmentManager,
                        [AwardDate]= :NTPDate,
                        [Status]= :Status,
                        [ProjectType]= :ProjectType,
                        [Scope]=  :ProjectScope, 
                        [EstimatedDueDate]= :DueDate,
                        [PM]= :ProjectManager,
                        [Discipline]= :MainServiceLine,
                        [Market] = :Market, 
                        [ServiceEng] = :EngineeringService  WHERE [ID] = :ID";
 
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
          
          ':FP' => $FP,
           ':ProjectDescription' => $ProjectDescription,
          ':ProjectFee' => $ProjectFee,
           ':Task' => $Task,
          ':DepartmentManager' => $DepartmentManager,
          ':NTPDate' => $NTPDate,
          ':Status' => $Status,
           ':ProjectType' => $ProjectType,
          ':ProjectScope' => $ProjectScope,
           ':DueDate' => $DueDate,
          ':ProjectManager' => $ProjectManager,
           ':MainServiceLine' => $MainServiceLine,
           ':Market' => $Market,
           ':EngineeringService' => $EngineeringService,   
           ':ID' => $ID                                          
                                                                                        
           ]);
 
        return $stmt->rowCount();
    }

    // Función para actualizar proposal to Project
    public function updateProposaltoProject($ProjectName,  $Project, $ProjectDescription,  $ProjectFee, $SubProject, $Task, $DepartmentManager, $NTPDate,  $Status, $Category,  $ProjectType, $ProjectScope,$DueDate, $ProjectManager, $MainServiceLine, $Market, $EngineeringService, $ID)
    {

       $sql = "UPDATE [dbo].[Projects&Proposal] SET
                        [ProjectName]=:ProjectName, 
                        [Project]= :Project, 
                        [ProjectDescription]= :ProjectDescription, 
                        [ContractValue]= :ProjectFee, 
                        [SubProject]= :SubProject, 
                        [Task]= :Task,
                        [DeparmentManager]= :DepartmentManager,
                        [AwardDate]= :NTPDate,
                        [Status]= :Status,
                        [Category]= :Category,
                        [ProjectType]= :ProjectType,
                        [Scope]=  :ProjectScope, 
                        [EstimatedDueDate]= :DueDate,
                        [PM]= :ProjectManager,
                        [Discipline]= :MainServiceLine,
                        [Market] = :Market, 
                        [ServiceEng] = :EngineeringService  WHERE [ID] = :ID";
 
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
          
          ':ProjectName' => $ProjectName,
           ':Project' => $Project,
           ':ProjectDescription' => $ProjectDescription,
          ':ProjectFee' => $ProjectFee,
           ':SubProject' => $SubProject,
           ':Task' => $Task,
          ':DepartmentManager' => $DepartmentManager,
          ':NTPDate' => $NTPDate,
          ':Status' => $Status,
          ':Category' => $Category,
           ':ProjectType' => $ProjectType,
          ':ProjectScope' => $ProjectScope,
           ':DueDate' => $DueDate,
          ':ProjectManager' => $ProjectManager,
           ':MainServiceLine' => $MainServiceLine,
           ':Market' => $Market,
           ':EngineeringService' => $EngineeringService,   
           ':ID' => $ID                                          
                                                                                        
           ]);
 
        return $stmt->rowCount();
    }
    
    // Función para agregar un details en la tabla detailsprojects
    public function addProjectdetails($ClientName, $Agreement, $ProjectCost, $ProjectCSJNo, $State, $County,$City, $HighwayNo, $Owner, $SegmentBridge, $BridgeDistrict, $ContactInf,$GralDesProject,$ProjectName, $ClientProject)
   
    {
 
        $sql = "INSERT INTO ClientDetailProject
                ([ClientName], [Agreement], [ProjectCost], [ProjectCSJContractNo], [State], [County],[City],[HighwayNo],[Owner],[SegmentBridge],[BridgeDistrict],
                [ContactInformation],[GeneralDescriptionProject],[ProjectName],[ClientProject])
                VALUES (:ClientName, :Agreement, :ProjectCost, :ProjectCSJContractNo, :State, :County,:City,:HighwayNo, :Owner, :SegmentBridge, :BridgeDistrict,
                 :ContactInformation,:GeneralDescriptionProject, :ProjectName, :ClientProject)";
 
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':ClientName' => $ClientName,
            ':Agreement' => $Agreement,
            ':ProjectCost' => $ProjectCost,
            ':ProjectCSJContractNo' => $ProjectCSJNo,
            ':State' => $State,
            ':County' => $County,
           ':City' => $City,
          ':HighwayNo' => $HighwayNo,
          ':Owner' => $Owner,
          ':SegmentBridge' => $SegmentBridge,
          ':BridgeDistrict' => $BridgeDistrict,
           ':ContactInformation' => $ContactInf,
          ':GeneralDescriptionProject' => $GralDesProject,
          ':ProjectName' => $ProjectName,
          ':ClientProject' => $ClientProject,
        ]);
    }

 
///////     ELIMINAR   ////////
 
    // Función para eliminar un cliente por ID
    public function deleteClientById($clientId)
    {
      //console.log(clientId);
        $stmt = $this->db->prepare("DELETE FROM [dbo].[Clients] WHERE ID = :client_id");
        $stmt->execute([':client_id' => $clientId]);
        return $stmt->rowCount() > 0; // Returns true if a row was affected
    }
}
 
?>
 