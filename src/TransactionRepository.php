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
                    transaction_id, amount, currency, login_key_id, reference,
                    url_success, url_cancel, url_fail, url_notification, email, 
                    forename, surname, phone, address, city, state, country, postal_code, metatrader_id,broker,
                    requestNumber
                ) VALUES (
                    :transaction_id, :amount, :currency, :login_key_id, :reference,
                    :url_success, :url_cancel, :url_fail, :url_notification, :email, 
                    :forename, :surname, :phone, :address, :city, :state, :country, :postal_code, :metatrader_id,
                    :broker,:requestNumber
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
            ':metatrader_id' => $data['MetaTraderID']?? null,
            ':broker' => $data['broker'] ?? null,
            'requestNumber' => $data['RequestNumber'] ?? null
        ]);
    }

    // Función para obtener una transacción por ID
    public function getTransactionById($transactionId)
    {
        $stmt = $this->db->prepare("SELECT * FROM clients WHERE clientid = :transaction_id");
        $stmt->execute([':transaction_id' => $transactionId]);
        return $stmt->fetch();
    }

    public function getAll()
    {
        $stmt1 = $this->db->prepare("SELECT * FROM clients");
        $stmt1->execute();
        return $stmt1->fetchAll();
    }

    // Función para guardar log de una transacción en la base de datos
    public function saveLogTransaction($requestJson, $originUrl)
    {
        $sql = "INSERT INTO log_requests (request_json, origin_url) VALUES (:request_json, :origin_url)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':request_json' => $requestJson,
        ':origin_url' => $originUrl
        ]);
    }
      // Función para guardar datos en la tabla de empleados en la base de datos
      public function Addclient($nom, $add, $cit, $state, $zip, $Act)
      {
          $sql = "INSERT INTO clients
(
`Name`,
`Address`,
`City`,
`State`,
`ZipCode`)
VALUES
(:name, :address, :city  , :state , :zipcode)";
  
          $stmt = $this->db->prepare($sql);
          $stmt->execute([
          ':name' => $nom,
          ':address' => $add, 
          ':city' => $cit,
          ':state'=> $state,
          ':zipcode'=> $zip
          
          ]);
      }
      public function deleteClientById($transactionId)
    {
        $stmt = $this->db->prepare("DELETE FROM clients WHERE clientid = :transaction_id");
        $stmt->execute([':transaction_id' => $transactionId]);
        return $stmt->fetch();
    }

    public function Updateclient($nom, $add, $cit, $state, $zip, $act, $id ): void
    {
        $sql = "UPDATE clients SET 
            
                    `Name` = :name,
                    `Address` = :address,
                    `City` = :city,
                    `State` = :state,
                    `ZipCode` = :zipcode,
                    `Active`=:act

                    
                WHERE `ClientID` = :id";  


        $stmt = $this->db->prepare($sql);
        $stmt->execute([
        ':name' => $nom,
        ':address' => $add, 
        ':city' => $cit,
        ':state'=> $state,
        ':zipcode'=> $zip,
        ':act'=> $act,
        ':id'=> $id
        ]);
    }

    public function getAll_Projects()
    {
        $stmt1 = $this->db->prepare("SELECT * FROM projects_proposal"); 
        $stmt1->execute();
        return $stmt1->fetchAll();
    }
    
    public function Addclient($name, $address, $city, $state, $zipcode, $act)
{
    $stmt = $this->db->prepare("INSERT INTO projects_proposal (name, address, city, state, zipcode, activity) VALUES (?, ?, ?, ?, ?, ?)");
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

