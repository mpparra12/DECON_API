<?php
 
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
        $stmt = $this->db->prepare("SELECT * FROM clients WHERE clientid = :transaction_id");
        $stmt->execute([':transaction_id' => $transactionId]);
        return $stmt->fetch();
    }
 
    // Función para obtener todos los clientes
    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM clients");
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
 
        $stmt = $this->db->prepare("SELECT * FROM [dbo].[Projects&Proposal]");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    // Función para obtener todos los proyectos
    public function getAllProjects()
    {
 
        $stmt = $this->db->prepare("SELECT * FROM [dbo].[Projects&Proposal] where Category='Contrated'");
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
 
        $sql = "INSERT INTO clients
                ([Name], [Address], [City], [State], [ZipCode], [Active],[Country],[Documents_and_other_requirements],[Invoice_Date],[Logo],[Period_of_Invoice],[Procedure])
                VALUES (:name, :address, :city, :state, :zipcode, :active,:count,:doc1, :inv1, :logo1, :per1, :proc1)";
 
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':name' => $nom,
            ':address' => $add,
            ':city' => $cit,
            ':state' => $state,
            ':zipcode' => $zip,
            ':active' => $act,
            ':count' => $country,
           ':doc1' => $doc,
          ':inv1' => $inv,
          ':logo1' => $logo,
          ':per1' => $per,
          ':proc1' => $proc,
        ]);
    }
 
    // Función para agregar un cliente en la tabla clients
    //public function addProposal($nom, $cat, $des, $con, $est, $year, $country, $pro, $nopro, $proreq, $prosub, $statpro, $scope )
   
    //{
 
        //$sql = "INSERT INTO [Projects&Proposal]
                //([ClientName], [Category], [ProjectDescription], [ContractValue], [Estimated_h], [Year],[Country],[Proposal],[NoProposal],[ProposalRequestDate],[ProposalSubmitted],[StatusProp],[Scope])
                //VALUES (:nom, :cat, :des, :con, :est, :year,:country,:pro, :nopro, :proreq, :prosub, :statpro,:scope )";
 
        //$stmt = $this->db->prepare($sql);
        //$stmt->execute([
            //':nom' => $nom,
            //':cat' => $cat,
            //':des' => $des,
            //':con' => $con,
            //':est' => $est,
            //':year' => $year,
            //':country' => $country,
           //':pro' => $pro,
          //':nopro' => $nopro,
          //':proreq' => $proreq,
          //':prosub' => $prosub,
          //':statpro' => $statpro,
         //':scope ' => $scope ,
        //]);
    //}
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
        ]);
 
        return $stmt->rowCount();
    }
    
    // Función para actualizar proposal to Project
    public function updateProposaltoProject( $Client, $selectedClient,$selectedEmployee, $AgreementNo, $ClientProject, $ClientProjectCost, $selectedFP, $ProjectCSJ, $State, $County, $City, $HighwayNo, $Owner,$Segment, $Bridge, $Contact, $yearFP,  $FP, $ProjectName, $ProjectScope, $DepartmentManager,  $ProjectManager, $Task, $DECONProjectType, $Market, $MainServiceLine, $EngineeringService, $FPRequestedDate, $FPSenttoClien, $NTPDate, $ProjectFee, $ID, $DueDate, $Project, $SubProject, $Status,$Category)
    {
        $sql = "UPDATE [dbo].[Projects&Proposal] SET
                        ([ProjectName]=:ProjectName, 
                        [Project]= :Project, 
                        [ProjectDescription]= :ProjectName, 
                        [ContractValue]= :ProjectFee, 
                        [SubProject]= :SubProject, 
                        [Task]= :Task,
                        [DeparmentManager]= :DepartmentManager,
                        [AwardDate]= :NTPDate,
                        [Status]= :Status,
                        [Category]= :Category,
                        [DECONProjectType]= :ProjectType,
                        [Scope]=  :ProjectScope, 
                        [EstimatedDueDate]= :DueDate,
                        [PM]= :ProjectManager,
                        [Discipline]= :MainServiceLine,
                        [Market] = :Market, 
                        [ServiceEng] = :EngineeringService,
                    
                                  

                WHERE [ID] = :ID";
 
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':Client' => $Client,
            ':selectedClient' => $selectedClient,
            ':selectedEmployee' => $selectedEmployee,
            ':AgreementNo' => $AgreementNo,
            ':ClientProject' => $ClientProject,
            ':ClientProjectCost' => $ClientProjectCost,
            ':selectedFP' => $selectedFP,
            ':ProjectCSJ' => $ProjectCSJ,
            ':State' => $State,
            ':County' => $County,
            ':City' => $City,
            ':HighwayNo' => $HighwayNo,
            ':Owner' => $Owner,
            ':Segment' => $Segment,
            ':Bridge' => $Bridge,
            ':Contact' => $Contact,
            ':yearFP' => $yearFP,
            ':FP' => $FP,
            ':ProjectName' => $ProjectName,
            ':ProjectScope' => $ProjectScope,
            ':DepartmentManager' => $DepartmentManager,
            ':ProjectManager' => $ProjectManager,
            ':ProjectType' => $DECONProjectType,
            ':Market' => $Market,
            ':Task' => $Task,
            ':MainServiceLine' => $MainServiceLine,
            ':EngineeringService' => $EngineeringService,          
            ':FPRequestedDate' => $FPRequestedDate,  
            ':FPSenttoClien' => $FPSenttoClien,  
            ':NTPDate' => $NTPDate,  
            ':ProjectFee' => $ProjectFee,  
            ':ID' => $ID, 
            ':Project' => $Project,   
            ':SubProject' => $SubProject, 
            ':Status' => $Status, 
            ':Category' => $Category,  
            ':DueDate' => $DueDate                                                                                                                                     
        ]);
 
        return $stmt->rowCount();
    }
    

    
 
// Función para agregar un proposal
    public function addProposal ($nom, $cat, $des, $con, $est, $year, $pro, $nopro, $country, $proreq, $prosub, $scope, $statpro)
{
 
    $sql = "INSERT INTO [dbo].[Projects&Proposal]
            ([Name], [Category], [ProjectDescription], [ContractValue], [EstimatedHours], [Year],[Proposal],[NoProposal],[Country],[ProposalRequestDate],[ProposalSubmitted],[Scope],[StatusProp])
            VALUES (:name, :category, :projectdescription, :contractvalue, :estimatedhours, :year, :proposal,:noproposal, :country, :proposalrequestdate, :proposalsubmitted, :scope, :statusprop)";
 
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
 