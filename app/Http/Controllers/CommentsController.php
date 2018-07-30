<?php

namespace App\Http\Controllers;

use App\News;
use App\Contracts\Store;
use Illuminate\Http\Request;
use App\Notifications\AddedNewUser;
class CommentsController extends Controller
{
    protected $storeComments;

    public function __construct(Store $storeComments)
    {  $this->middleware('auth') ;
        $this->storeComments = $storeComments;
    }

    public function store(News $new)
    {
       return $this->storeComments->create($new,$this);
       
    }

    public function CommentsHasSaved($model)
    {
        if(!\Auth::user()->owns($model)) $model->notify(new AddedNewUser($model));
        return back();
    }
}
