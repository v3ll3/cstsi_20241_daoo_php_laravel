<?php

namespace Daoo\Aula03\model;

use Exception;
use Daoo\Aula03\interfaces\iDAO;

class Desconto extends Model implements iDAO
{
    private $id, $taxa, $descricao;

    public function __construct(
        float $taxa = 0,
        string $descricao = '',
    ) {
        $this->table = 'descontos';
        $this->primary = 'id_desc';
        $this->taxa = $taxa;
        $this->descricao = $descricao;
        try {
            parent::init();
            error_log("Produto: " . print_r($this, TRUE));
        } catch (Exception $error) {
            throw $error;
        }
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

    public function read(int $id = null):array{
        try {
            $sql = "SELECT * FROM $this->table ";
            if (isset($id))
                $sql .= "WHERE $this->primary = :id";

            $prepStmt = $this->conn->prepare($sql);
            
            if (isset($id))
                $prepStmt->bindValue(':id', $id);

            if (!$prepStmt->execute())
                throw new Exception("Erro no select!");

            return $prepStmt->fetchAll(self::FETCH);
        } catch (Exception $error) {
            error_log("ERRO: " . print_r($error, TRUE));
            throw new Exception($error->getMessage());
        }finally{
            $this->dumpQuery($prepStmt);
        }
    }

    public function create():bool
    {
        try {
            $sql = "INSERT INTO $this->table ($this->columns) "
                . "VALUES ($this->params)";

            error_log(print_r([
                "colunas" => $this->columns,
                "param" => $this->params,
                "valores" => $this->values,
                "SQL" => $sql
            ], true));

            $prepStmt = $this->conn->prepare($sql);
            $result = $prepStmt->execute($this->values);

            if (!$result || $prepStmt->rowCount() != 1)
                throw new Exception("Erro ao inserir desconto!!");

            $this->id = $this->conn->lastInsertId();
            $this->dumpQuery($prepStmt);
            return true;
        } catch (Exception $error) {
            error_log("ERRO: " . print_r($error, TRUE));
            $prepStmt ?? $this->dumpQuery($prepStmt);
            return false;
        }
    }

    public function update():bool
    {
        return true;
    }

    public function delete($id):bool
    {
         return true;
    }

    public function filter($arrayFilter):array
    {
        return [];
    }

}