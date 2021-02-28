<?php

class Company
{
    // DB
    private $conn;
    private $table = 'companies';

    // Properties
    public $session_id;
    public $id;
    public $field_1;
    public $field_2;
    public $field_3;
    public $field_4;
    public $field_5;
    public $field_6;
    public $field_7;
    public $field_8;
    public $field_9;
    public $field_10;
    public $date;
    public $model;
    public $factor_1;
    public $factor_2;
    public $factor_3;
    public $factor_4;
    public $factor_6;
    public $factor_7;
    public $lpt;
    public $beh;
    public $fin;
    public float $total;
    private $keys = [
        0 => 'SessionID',
        1 => 'ID',
        2 => 'Field1',
        3 => 'Field2',
        4 => 'Field3',
        5 => 'Field4',
        6 => 'Field5',
        7 => 'Field6',
        8 => 'Field7',
        9 => 'Field8',
        10 => 'Field9',
        11 => 'Field10',
        12 => 'Date'
    ];

    // Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function checkValues($data)
    {
        for ($i = 0; $i < sizeof($this->keys); $i++) {
            if (array_key_exists($this->keys[$i], (array)$data)) {
            } else {
                if ($this->keys[$i] == 'Field1') {
                } else {
                    http_response_code(400);
                    echo json_encode(['Error' => 'Missing key: ' . $this->keys[$i]]);
                    return false;
                }
            }
        }
        $this->assignValues($data);
        return true;
    }

    private function assignValues($data)
    {
        if (empty($this->field_1)) {
        } else {
            $this->field_1 = htmlspecialchars(strip_tags($data->Field1));
        }
        $this->session_id = htmlspecialchars(strip_tags($data->SessionID));
        $this->id = htmlspecialchars(strip_tags($data->ID));
        $this->field_2 = htmlspecialchars(strip_tags($data->Field2));
        $this->field_3 = htmlspecialchars(strip_tags($data->Field3));
        $this->field_4 = htmlspecialchars(strip_tags($data->Field4));
        $this->field_5 = htmlspecialchars(strip_tags($data->Field5));
        $this->field_6 = htmlspecialchars(strip_tags($data->Field6));
        $this->field_7 = htmlspecialchars(strip_tags($data->Field7));
        $this->field_8 = htmlspecialchars(strip_tags($data->Field8));
        $this->field_9 = htmlspecialchars(strip_tags($data->Field9));
        $this->field_10 = htmlspecialchars(strip_tags($data->Field10));
        $this->date = htmlspecialchars(strip_tags($data->Date));
        $this->assignModel();
        $this->calculateData();
    }

    public function checkSessionID($session_id)
    {
        $sql = "SELECT SessionID FROM companies where SessionID = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(1, $session_id);

        $stmt->execute();

        return $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    private function assignModel()
    {
        if (substr($this->id, 1, 3) == '116' && substr($this->id, 1, 3) == '119') {
            $this->model = 'A';
        } else {
            $this->model = 'B';
        }
    }

    private function calculateData()
    {
        switch ($this->model) {
            case 'A':
                if ($this->field_1) {
                    $this->factor_1 = $this->field_2;
                    $this->field_1 = null;
                } else {
                    $this->factor_1 = $this->field_1;
                }
                $this->factor_2 = $this->field_8 + $this->field_10;
                $this->factor_3 = $this->field_3;
                $this->factor_4 = $this->field_4 / $this->field_5;
                $this->factor_6 = $this->field_6 * 100;
                if ($this->field_7 == 1 && $this->field_7 == 5 && $this->field_7 == 10) {
                    $this->factor_7 = 1;
                } else {
                    $this->factor_7 = 2;
                }
                $this->lpt = $this->factor_1 + $this->factor_2 + $this->factor_3;
                $this->beh = $this->factor_4;
                $this->fin = $this->factor_6 + $this->factor_7;
                $this->total = exp($this->lpt + $this->beh + $this->fin) / (exp($this->lpt + $this->beh + $this->fin) + 1);
                break;

            case 'B':
                if (empty($this->field_1)) {
                    $this->factor_1 = $this->field_2;
                    $this->field_1 = null;
                } else {
                    $this->factor_1 = $this->field_1;
                }
                $this->factor_2 = $this->field_8 + $this->field_10;
                $this->factor_6 = $this->field_6 * 100;
                if ($this->field_7 == 1 && $this->field_7 == 5 && $this->field_7 == 10) {
                    $this->factor_7 = 1;
                } else {
                    $this->factor_7 = 2;
                }
                $this->lpt = $this->factor_1 + $this->factor_2;
                $this->fin = $this->factor_6 + $this->factor_7;
                $this->total = exp($this->lpt + $this->fin) / (exp($this->lpt + $this->fin) + 1);
                break;
        }
    }

    public function create()
    {
        $sql = "INSERT INTO $this->table
    SET
      SessionID = :SessionID,
      ID = :ID,
      Field1 = :Field1,
      Field2 = :Field2,
      Field3 = :Field3,
      Field4 = :Field4,
      Field5 = :Field5,
      Field6 = :Field6,
      Field7 = :Field7,
      Field8 = :Field8,
      Field9 = :Field9,
      Field10 = :Field10,
      Date = :Date,
      Model = :Model,
      Factor1 = :Factor1,
      Factor2 = :Factor2,
      Factor3 = :Factor3,
      Factor4 = :Factor4,
      Factor6 = :Factor6,
      Factor7 = :Factor7,
      LPT = :LPT,
      BEH = :BEH,
      FIN = :FIN,
      Total = :Total";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':SessionID', $this->session_id);
        $stmt->bindParam(':ID', $this->id);
        $stmt->bindParam(':Field1', $this->field_1);
        $stmt->bindParam(':Field2', $this->field_2);
        $stmt->bindParam(':Field3', $this->field_3);
        $stmt->bindParam(':Field4', $this->field_4);
        $stmt->bindParam(':Field5', $this->field_5);
        $stmt->bindParam(':Field6', $this->field_6);
        $stmt->bindParam(':Field7', $this->field_7);
        $stmt->bindParam(':Field8', $this->field_8);
        $stmt->bindParam(':Field9', $this->field_9);
        $stmt->bindParam(':Field10', $this->field_10);
        $stmt->bindParam(':Date', $this->date);
        $stmt->bindParam(':Model', $this->model);
        $stmt->bindParam(':Factor1', $this->factor_1);
        $stmt->bindParam(':Factor2', $this->factor_2);
        $stmt->bindParam(':Factor3', $this->factor_3);
        $stmt->bindParam(':Factor4', $this->factor_4);
        $stmt->bindParam(':Factor6', $this->factor_6);
        $stmt->bindParam(':Factor7', $this->factor_7);
        $stmt->bindParam(':LPT', $this->lpt);
        $stmt->bindParam(':BEH', $this->beh);
        $stmt->bindParam(':FIN', $this->fin);
        $stmt->bindParam(':Total', $this->total);

        if ($stmt->execute()) {
            return $data = ['Session_ID' => $this->session_id, 'ID' => $this->id, 'Date' => $this->date, 'Total' => $this->total];
        }

        return false;
    }
}
