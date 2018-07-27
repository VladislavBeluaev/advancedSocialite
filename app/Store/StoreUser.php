<?php

namespace App\Store;
use App\User;
use App\Contracts\Store;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
class StoreUser implements Store
{
    use ValidatesRequests;

    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

public function show(User $user)
{
    return $user;
}
    public function all(){}
    public function create(){}
    public function update($model){}
    public function delete($model){}
}
