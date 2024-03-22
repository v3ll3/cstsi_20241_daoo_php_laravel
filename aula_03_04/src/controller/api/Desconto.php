<?php

namespace Daoo\Aula03\controller\api;

use Daoo\Aula03\model\Desconto as ModelDesconto;
use Exception;

class Desconto extends Controller
{

	private ModelDesconto $model;

	public function __construct()
	{
		try {
			$this->model = new ModelDesconto();
			$this->setHeader(200);
		} catch (Exception $error) {
			$this->setHeader(500, "Erro ao conectar ao banco!");
			json_encode(["error" => $error->getMessage()]);
		}
	}

	public function index()
	{
		// echo json_encode([
		// 	"data"=>"Listar Descontos!!"
		// ]);
		echo json_encode($this->model->read());
	}

	// public function daoo($msg){
	// 	echo $msg;
	// }

	public function show($id)
	{
		try{
			$desconto = $this->model->read($id);
			$response = ['desconto' => $desconto];
		}catch(Exception $error) {
			$response = [
				'Erro' => "Desconto não encontrado",
				'Msg'=> $error->getMessage(),
				'Trace'=>$error->getTrace()
			];
			$this->setHeader(404, $error->getMessage());
		}
		echo json_encode($response);
	}

	public function store()
	{
		try {
			$this->validateDescontoRequest();

			$this->model = new ModelDesconto(
				$_POST['taxa'],
				$_POST['descricao']
			);

			if ($this->model->create()) {
				echo json_encode([
					"success" => "Desconto criado com sucesso!",
					"data" => $this->model->getColumns()
				]);
			} else {
				$msg = 'Erro ao cadastrar descote!';
				$this->setHeader(500, $msg);
				throw new Exception($msg);
			}
		} catch (Exception $error) {
			echo json_encode([
				"error" => $error->getMessage(),
				"trace" => $error->getTrace()
			]);
		}
	}

	public function update()
	{
		try {
			if (!$this->validatePostRequest(['id']))
				throw new Exception("Informe o ID do Desconto!!");

			$this->validateDescontoRequest();

			$this->model = new ModelDesconto(
				$_POST['taxa'],
				$_POST['descricao']
			);
			
			$this->model->setId($_POST['id']);
			// error_log(print_r($this->model,TRUE));
			// throw new \Exception('LOG');

			if ($this->model->update())
				echo json_encode([
					"success" => "Desconto atualizado com sucesso!",
					"data" => $this->model->getColumns()
				]);
			else throw new Exception("Erro ao atualizar produto!");
		} catch (Exception $error) {
			$this->setHeader(500, 'Erro interno do servidor!!!!');
			echo json_encode([
				"error" => $error->getMessage()
			]);
		}
	}

	public function remove()
	{
		try {
			if (!$this->validatePostRequest(['id'])){
				throw new Exception('Erro: id obrigatorio!');
			}
			$id = $_POST["id"];
			if ($this->model->delete($id)) {
				$response = ["message:" => "Desconto id:$id removido com sucesso!"];
			} else {
				$this->setHeader(500, 'Internal Error.');
				throw new Exception("Erro ao remover Produto!");
			}
			echo json_encode($response);
		} catch (Exception $error) {
			echo json_encode([
				"error" => $error->getMessage()
			]);
		}
	}

	public function filter(): void
	{

		if (!isset($_POST))
			echo json_encode(["error" => "enviar os filtros"]);
		$reulsts = $this->model->filter($_POST);
		echo json_encode($reulsts);
	}

	private function validateDescontoRequest()
	{
		$fields = [
			'taxa',
			'descricao',
		];
		if (!$this->validatePostRequest($fields))
			throw new Exception('Erro: campos imcompletos!');
	}
}
