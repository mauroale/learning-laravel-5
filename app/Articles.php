<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon; 
class Articles extends Model
{
    protected $fillable = [
    			'title',
    			'body',
    			'published_at',
                
                'user_id'
    ];


    // Tornando o campo published_at um objeto do Carbon
    protected $dates = ['published_at'];

    // setNameAttribute 
    public function setPublishedAtAttribute( $date )
    {
    	$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }



    // Utilizando scope para criar querys personalizadas. Ver ArticlesController@index
    public function scopePublished($query)
	{
		$query->where('published_at' , '<=' , Carbon::now() );
	}

	public function scopeUnpublished($query)
	{
		$query->where('published_at' , '>' , Carbon::now() );
	}



    // Um artigo pertence a um usuário

    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
