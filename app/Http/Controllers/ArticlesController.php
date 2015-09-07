<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Articles;
use App\Http\Requests\ArticlesRequest;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Request;
use App\Http\Auth\AuthController;



class ArticlesController extends Controller
{
    public function index()
    {
    	// sem scope
    	//$articles = Articles::latest('published_at')->where('published_at', '<=' , Carbon::now() )->get();
    	//com scope
    	$articles = Articles::latest('published_at')->published()->get();
    	return view('articles/index' , compact('articles', $articles) );
    }

    public function show($id)
    {
    	$article = Articles::findOrFail($id);
        	

    	return  view('articles/show' , compact( 'article' ));
    }


    public function create()
    {
    	return view('articles/create');
    }

    public function store(ArticlesRequest $request)
    {
		//$input =  Request::all();
		//$input['published_at'] = Carbon::now();
		//Articles::create($input);

    	// sem utilizar validacao por Requests
		//Articles::create( Request::all() );

    	// utilizando validacao por Request
		//Articles::create( $request->all() );



        // Salvando o user id utilizando Eloquent Relationships

        $article = new Articles( $request->all() );
        \Auth::user()->articles()->save( $article );

		return redirect('articles');

    }


    public function edit($id)
    {
    	$article = Articles::findOrFail($id);    	
    	return view('articles/edit', compact('article') );
    }

    public function update($id , ArticlesRequest $request )
    {	

    	$article = Articles::findOrFail($id);    	
    	$article->update( $request->all() );

    	return redirect('articles');
    }
}
