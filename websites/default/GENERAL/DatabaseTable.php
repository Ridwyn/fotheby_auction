<?php
namespace GENERAL;
class DatabaseTable {
    public $table;
    private $pdo;
    private $primaryKey;

    public function __construct($pdo, $table, $primaryKey) {
    $this->pdo = $pdo;
    $this->table = $table;
    $this->primaryKey = $primaryKey;
    }
    public function find($field, $value) {
        $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' = :value');
        $criteria = [
        'value' => $value
        ];
        $stmt->execute($criteria);
        return $stmt->fetchAll();
    }
    public function findDateAscending($field, $value) {
        $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' >= :value ORDER BY closingDate ASC LIMIT 10');
        $criteria = [
        'value' => $value
        ];
        $stmt->execute($criteria);
        return $stmt->fetchAll();
    }
    public function findMultiple($record) {
        $keys = array_keys($record);
        $values = implode(', ', $keys);
        $valuesWithColon = implode(', :', $keys);
        $str='';
        for ($i=0; $i <count($keys) ; $i++) {
            if($i==(count($keys)-1)){
                $str.=$keys[$i].' =:'.$keys[$i];
            }else{
                $str.=$keys[$i].' =:'.$keys[$i].' AND ';

            }
        }
        $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE '. $str);
        $stmt->execute($record);
        return $stmt->fetchAll();
    }
    public function findCount($field, $value) {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) as COUNT FROM ' . $this->table . ' WHERE ' . $field . ' = :value');
        $criteria = [
        'value' => $value
        ];
        $stmt->execute($criteria);
        return $stmt->fetch();
    }


    public function findByID($value) {
        $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $this->primaryKey . ' = :value');
        $criteria = [
        'value' => $value
        ];
        $stmt->execute($criteria);
        return $stmt->fetchAll();
    }

    function save($record) {
        try {
          return  $this->insert($record);
        }catch (\PDOException $e) {
            $this->update($record);
        }
    }
    function insert($record) {
        $keys = array_keys($record);
        $values = implode(', ', $keys);
        $valuesWithColon = implode(', :', $keys);
        $query = 'INSERT INTO ' . $this->table . ' (' . $values . ') VALUES (:' . $valuesWithColon . ')';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($record);
        return $this->pdo->lastInsertId();
    }
    function update($record) {
        $query = 'UPDATE ' . $this->table . ' SET ';
        $parameters = [];
        foreach ($record as $key => $value) {
        $parameters[] = $key . ' = :' .$key;
        }
        $query .= implode(', ', $parameters);
        $query .= ' WHERE ' . $this->primaryKey . ' = :primaryKey';
        $record['primaryKey'] = $record[$this->primaryKey];
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($record);
    }

    function findAll() {
        $stmt =  $this->pdo->prepare('SELECT * FROM ' . $this->table );
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function deleteByID($value) {
        $stmt = $this->pdo->prepare('DELETE FROM ' . $this->table . ' WHERE ' . $this->primaryKey . ' = :value');
        $criteria = [
        'value' => $value
        ];
        $stmt->execute($criteria);
    }
    public function deleteField($field, $value) {
        $stmt = $this->pdo->prepare('DELETE FROM ' . $this->table . ' WHERE ' . $field . ' = :value');
        $criteria = [
        'value' => $value
        ];
        $stmt->execute($criteria);
    }

    public function archive($value) {
        try
        {
            $this->addArchive($value);
            $this->deleteByID($value);
        }
    catch (\PDOException $e) {
        $stmt = $this->pdo->prepare('DELETE FROM ' . $this->table . '_archive WHERE ' . $this->primaryKey . ' = :value');
        $criteria = [
        'value' => $value
        ];
        $stmt->execute($criteria);
        $this->addArchive($value);
    }


    }

    public function addArchive($value){
        $stmt = $this->pdo->prepare('INSERT INTO ' . $this->table . '_archive SELECT * FROM '.$this->table.' WHERE ' . $this->primaryKey . ' = :value');
        $criteria = [
            'value' => $value
            ];
            $stmt->execute($criteria);
    }
}
