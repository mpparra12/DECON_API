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

    // Función para obtener una transacción por ID
    public function getTransactionById($transactionId)
    {
        $stmt = $this->db->prepare("SELECT * FROM clients WHERE clientid = :transaction_id");
        $stmt->execute([':transaction_id' => $transactionId]);
        return $stmt->fetch();
    }

    // Función para obtener una transacción por Project Name
    public function getTransByProjectName($transactionId)
    {
        $stmt = $this->db->prepare("SELECT * FROM QCProcess WHERE ProjectNam = :transaction_id");
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

    // Función para obtener todos los proyectos Activos para QAQC
    public function getProjectQAQC()
    {
       $category="Contrated";
       $status="Under Production";
        $stmt = $this->db->prepare("SELECT * FROM Projects&Proposal where Category=:category And Status = :status");
        $stmt->execute([
         ':category' => $category
         ':status' => $status
]);
        return $stmt->fetchAll();
    }

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
    public function addClient($nom, $add, $cit, $state, $zip, $act)
    {
        // Provide default values if name or active status is missing
       // $nom = $nom ?? ''; // Default to empty string if name is null
        //$act = $act ?? 1; // Default to 1 (active) if active status is null

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

    // Función para eliminar un cliente por ID
    public function deleteClientById($clientId)
    {
      //console.log(clientId);
        $stmt = $this->db->prepare("DELETE FROM [dbo].[Clients] WHERE ID = :client_id");
        $stmt->execute([':client_id' => $clientId]);
        return $stmt->rowCount() > 0; // Returns true if a row was affected
    }

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

    // Función para obtener todos los proyectos
    public function getAllProposals()
    {
 
        $stmt = $this->db->prepare("SELECT * FROM [dbo].[Projects&Proposal]"); 
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Función para agregar un cliente en la tabla projects_proposal
    public function addProposalProject($name, $address, $city, $state, $zipcode, $act)
    {
        $stmt = $this->db->prepare("INSERT INTO [dbo].[Projects&Proposal] ([name], [address], [city], [state], [zipcode], [activity]) 
                                    VALUES (?, ?, ?, ?, ?, ?)");
        $result = $stmt->execute([$name, $address, $city, $state, $zipcode, $act]);

        if ($result) {
            return [
                'success' => true,
                'id' => $this->db->lastInsertId()
            ];
        } else {
            return false;
        }
    }
}

?>