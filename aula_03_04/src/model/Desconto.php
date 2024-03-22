<?php

namespace Daoo\Aula03\model;

use Exception;
use Daoo\Aula03\interfaces\iDAO;

class Desconto extends Model implements iDAO
{
    private $id, $taxa, $descricao;

    public function __construct(
        float $taxa = 0,
        string $descricao = ''
    ) {
        $this->table = 'descontos';
        $this->primary = 'id_desc';
        $this->taxa = $taxa;
        $this->descricao = $descricao;
        try {
            parent::init();
            error_log("Desconto: " . print_r($this, TRUE));
        } catch (Exception $error) {
            throw $error;
        }
    }

    public function setId(int $id): void{
        $this->id = $id;
    }

    public function getColumns(): array
    {
        $columns = [
            "taxa" => $this->taxa,
            "descricao" => $this->descricao
        ];
        if ($this->id) 
            $columns[$this->primary] = $this->id;
        
            return $columns;
    }

    public function read(int $id = null): array {
        try {
            $sql = "SELECT * FROM $this->table ";
            if (isset($id))
                $sql .= "WHERE $this->primary = :id";

            $prepStmt = $this->conn->prepare($sql);
            
            if (isset($id))
                $prepStmt->bindValue(':id', $id);

            if (!$prepStmt->execute())
                throw new Exception("Erro no select!");

            if(isset($id)){
                $result =  $prepStmt->fetch(self::FETCH);
                if(!$result) throw new Exception("Nao encontrado!!!");
                return $result;
            }
            else{
                return $prepStmt->fetchAll(self::FETCH);
            }
        } catch (Exception $error) {
            error_log("ERRO: " . print_r($error, TRUE));
            throw new Exception($error->getMessage());
        }finally{
            $this->dumpQuery($prepStmt);
        }
    }

    public function create():bool
    {
        return $this->insert();
    }

    public function update():bool
    {
        try {
            $this->values[':id'] = $this->id;
            $sql = "UPDATE $this->table SET $this->updated 
            WHERE $this->primary = :id";

            $prepStmt = $this->conn->prepare($sql);

            // echo json_encode([
            //     'sql'=>$sql,
            //     'values'=>$this->values
            // ]);
            // die;

            if ($prepStmt->execute($this->values)) {
                $this->dumpQuery($prepStmt);
                return $prepStmt->rowCount() > 0;
            }
        } catch (Exception $error) {
            error_log("ERRO: " . print_r($error, TRUE));
            $this->dumpQuery($prepStmt);
            return false;
        }
    }

    public function delete($id):bool
    {
       return $this->deleteById($id);
    }

    public function filter($arrayFilter):array
    {
        return [];
    }

}