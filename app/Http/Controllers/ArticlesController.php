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


    public function __construct()
    {
        $this->middleware('auth' , ['except' => ['index' , 'show'] ] );
    }


    public function index()
    {
    	// sem scope
    	//$articles = Articles::latest('published_at')->where('published_at', '<=' , Carbon::now() )->get();
    	//com scope
    	$articles = Articles::latest('published_at')->published()->get();
    	return view('articles/index' , compact('articles', $articles) );
    }

    public function show(articles $article)
    {
    	return  view('articles/show' , compact( 'article' ));
    }


    public function create()
    {
        $tags = \App\Tag::lists('name' , 'id');
    	return view('articles/create', compact('tags'));
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

        //  $article = new Articles( $request->all() );
        //  \Auth::user()->articles()->save( $article );

        // Salvando o article usando a relação do Eloquent diretamente

        //$article = \Auth::user()->articles()->create( $request->all() );
        
        //$this->syncTags( $article , $request->input('tag_list') );


        // Juntando as instruções anteriores para melhorar o código
        $this->createArticle($request);

        // 
        //\Session::flash('flash_message', 'Artigo criado com sucesso!');
        session()->flash('flash_message', 'Artigo criado com sucesso!');
        session()->flash('flash_message_important', true);


		return redirect('articles');

    }


    public function edit(articles $article)
    {
        // antes de usar a tecnica de Route Model Binding
    	//$article = Articles::findOrFail($id);    
        $tags = \App\Tag::lists('name' , 'id');	

    	return view('articles/edit', compact('article' , 'tags') );
    }

    public function update(ArticlesRequest $request , Article $article )
    {	

    	$article->update( $request->all() );

        $this->syncTags( $article , $request->input('tag_list') );

    	return redirect('articles');
    }

    private function syncTags(Article $article , array $tags )
    {
       $article->tags()->sync( $tags );

    }

    private function createArticle( ArticleRequest $request )
    {
        // Salvando o article usando a relação do Eloquent diretamente
        $article = \Auth::user()->articles()->create( $request->all() );
        $this->syncTags( $article , $request->input('tag_list') );

        return $article;
    }
}
