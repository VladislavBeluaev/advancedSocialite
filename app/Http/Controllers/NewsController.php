<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Store;
use App\Http\Requests\NewsRequest;
use App\News;
use Illuminate\Support\Facades\Gate;
class NewsController extends Controller
{

    public function __construct(Store $newsStore)
    {
        $this->middleware('auth');
        $this->newsStore =$newsStore; 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd($this->newsStore->all(['paginate'=>5]));
        return view('news.index')->with(['news'=>$this->newsStore->all(['paginate'=>5])]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('add',app(News::class));
        // if(Gate::denies('add',app(News::class)))
        //     {
        //         session()->flash('message','PERMISSION DENIED!!!');
        //         return back();
        //    }
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
       return $this->newsStore->create($this);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return $this->newsStore->show($news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        if(Gate::denies('edit',$news))
            {
                session()->flash('message','Править документ может только создатель!!');
                return back();
            }
            return view('news.edit')->with(compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(News $news)
    {
       return $this->newsStore->update($news,$this); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function newsHasSaved($news)
    {
        session()->flash('message','Новость успешно создана');
        return redirect()->route('news.index');
    }

    public function newsHasUpdated($new)
    {
        session()->flash('message','Новость успешно обновлена');
        return back();
    }
}
