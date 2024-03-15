<?php

namespace Daoo\Aula03\interfaces;

interface iDAO
{
    public function create():bool;
    public function read(int $id = null):array;
    public function update():bool;
    public function delete($id):bool;
    public function filter(array $filters):array;
}