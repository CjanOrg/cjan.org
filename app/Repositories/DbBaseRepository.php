<?php namespace CJAN\Repositories;

class DbBaseRepository extends BaseRepository {

	protected $model;

	public function __construct($model)
	{
		$this->model = $model;
	}
	public function all()
	{
		if ($this->model === NULL)
		{
			return array();
		}
		return $this->model->all()->toArray();
	}
	public function allWith(array $with)
	{
		if ($this->model === NULL)
		{
			return array();
		}
		return $this->model->with($with)->get()->toArray();
	}
	public function create($input)
	{
		if ($this->model === NULL)
		{
			return array();
		}
		return $this->model->create($input)->toArray();
	}
	public function update($id, $input)
	{
		if ($this->model === NULL)
		{
			return array();
		}
		return $this->model->find($id)->update($input);
	}
	public function find($id)
	{
		if ($this->model === NULL)
		{
			return NULL;
		}
		$model = $this->model->find($id);
		if($model) {
			return $model->toArray();
		}
		return null;
	}
	public function findWith($id, array $with)
	{
		Log::debug(sprintf("findWith [%d] -> %s", $id, implode($with, ',')));
		if ($this->model === NULL)
		{
			return array();
		}
		return $this->model->with($with)->find($id)->toArray();
	}
	public function paginate($perPage = 10)
	{
		if ($this->model === NULL)
		{
			return array();
		}
		return $this->model->paginate($perPage)->toArray();
	}
	public function paginateWith($perPage = 10, array $with)
	{
		if ($this->model === NULL)
		{
			return array();
		}
		return $this->model->with($with)->paginate($perPage)->toArray();
	}
	public function delete($id)
	{
		if ($this->model === NULL)
		{
			return array();
		}
		return $this->model->find($id)->delete();
	}
}
