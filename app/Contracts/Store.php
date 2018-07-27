<?php 
namespace App\Contracts;
use Illuminate\Http\Request;
interface Store{

	public function all();
	public function create();
	public function update($model);
	public function delete($model);
}