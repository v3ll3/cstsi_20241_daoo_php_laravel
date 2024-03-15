<?php

namespace Daoo\Aula03\model;

use Daoo\Aula03\database\Connection;
use Exception;
use PDO;

abstract class Model
{
    protected $conn;    //connection

    protected $table;   //tableName
    protected $primary; //primary Key
    protected $columns; //columnNames
    protected $params;  //:columnNames
    protected $updated; //set columnNames=:columnNames
    protected $values;  //array values
    protected $filters; //like
    // private $delimiter; //Delmitadores de campo
    protected const FETCH = PDO::FETCH_ASSOC;

    public abstract function getColumns():array;

    protected function init():void 
    {
        try {
            $this->conn = Connection::getConnection();
            $this->resetMappers();
            // $this->delimiter = '`';
            // if (Connection::getDrive() == 'pgsql')
            //     $this->delimiter = "\"";
            $this->mapColumns($this);
        } catch (Exception $error) {
            error_log("EXCEPTION MODEL:");
            throw $error;
        }
    }

    private function resetMappers()
    {
        $this->filters = '';
        $this->columns = '';
        $this->params = '';
        $this->updated = '';
        $this->values = [];
    }

    protected function mapColumns(Model $especificModel): void
    {
        if (count($this->values))
            $this->resetMappers();

        if (isset($especificModel)) {
            foreach ($especificModel->getColumns() as $key => $value) { //key=columnNames
                $this->params .= " :$key,"; //":nome, :descricao, :qtd_estoque..."
                $this->columns .= " $key,";//"nome, descricao, qtd_estoque..."
                $this->values[":$key"] = is_bool($value) ? (int)$value : $value;
                /*Array:
                    [
                        ':nome'=>'TV LG',
                        ':descricao'=>'TV Smart WebOS 5',
                        ':qtd_estoque'=>200,
                        ...
                    ]
                */
                // $this->updated .= $this->delimite($key) . " = :$key,"; //POSTGRE
            }
            $this->params = substr($this->params, 0, strlen($this->params) - 1);
            $this->columns = substr($this->columns, 0, strlen($this->columns) - 1);
            $this->updated = substr($this->updated, 0, strlen($this->updated) - 1);
        }
    }

    protected function setFilters($arrayFilter)
    {
        $this->filters = '1';
        $this->values = [];
        foreach ($arrayFilter as $key => $value) {
            $this->filters .= " AND `$key` like :$key";
            $this->values[":$key"] = "%$value%";
        }
    }

    protected function dumpQuery($prepStatement)
    {
        ob_start();
        $prepStatement->debugDumpParams();
        error_log(ob_get_contents());
        ob_end_clean();
    }
}
