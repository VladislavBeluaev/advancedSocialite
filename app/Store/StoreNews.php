<?php

namespace App\Store;
use App\Contracts\Store;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Auth;
use App\News;
use Illuminate\Support\Facades\Gate;
class StoreNews implements Store
{
    use ValidatesRequests;
    protected $newsRequest;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function all($parameters=[]){

        if($method = $this->isPaginate($parameters)) return call_user_func_array(array(News::withCreator(),$method),$parameters);
            return News::all();
    }
 
    protected function isPaginate($parameters)
    {   
        if(!empty($parameters) && array_key_exists('paginate',$parameters))
        return key($parameters);
    }


    public function create($listener = null){
        if($this->request->user()->cannot('add',app(News::class)))
        {
             session()->flash('message','Пользватель не может создавать статьи!!');
            return back();
        }
        // if(Gate::denies('add',app(News::class)))
        //     {
        //         session()->flash('message','Пользватель не может создавать статьи!!');
        //         return back();
        //     }
       $news =  $this->check()->save();
        return $listener->newsHasSaved($news);
    }

    public function show($model)
    {
        return $model;
    }

    public function update($model,$listener=null){

       $new =$this->check()->edit($model);
        return $listener->newsHasUpdated($new);
    }
    public function delete($model){}

protected function check()
    {
        $this->validate($this->request,$this->rules);
        return $this;
    }

    protected function save()
    {
       if(Gate::denies('add-news',function(){
            return redirect('/');
        }));
        return  Auth::user()->news()->save( new \App\News($this->getInputFiled()));
    }

    protected function edit($model)
    {

        return  $model->update($this->getInputFiled());
    }

protected function getInputFiled()
{
    return $this->request->only('title','body');
}
    protected $rules  = [
        'title'=>'required|string',
        'body'=>'required|string|min:5'
    ];
}
