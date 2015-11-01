<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model {

	protected $table = 'divisions';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name'];

	public function user()
    {
        return $this->hasMany('App\User', 'division_id');
    }

}
