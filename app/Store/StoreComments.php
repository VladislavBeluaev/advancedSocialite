<?php

namespace App\Store;
use App\Comments;
use App\Contracts\Store;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
class StoreComments implements Store
{
    use ValidatesRequests;

    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

public function show(User $user)
{

}
    public function all(){}

    public function create(){
        list($model,$listener) = func_get_args();
        $this->check()->save($model);
        return $listener->CommentsHasSaved($model);
    }


    public function update($model){}
    public function delete($model){}

    protected function check()
    {
        $this->validate($this->request,$this->rules);
        return $this;
    }

    protected function save($model)
    {
        return $model->comments()->save(new Comments(['body'=>$this->request->body]));
    }

    private $rules = ['body'=>'string|required|min:3'];
}
