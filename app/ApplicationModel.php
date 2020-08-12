<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicationModel extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $table = 'applications';
    protected $casts = ['app_id' => 'string'];
    protected $primaryKey = 'app_id';
    protected $fillable = ['app_id','manager', 'name', 'logo', 'description','timestamps'];

    public function eloquserappkeys(){
        return $this->hasMany('App\UserAppKeyModel','key');
    }
}
