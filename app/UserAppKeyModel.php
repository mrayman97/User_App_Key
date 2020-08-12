<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAppKeyModel extends Model
{
    protected $table = 'user_app_keys';
    protected $casts = ['key' => 'string'];
    protected $primaryKey = 'key';
    protected $fillable = ['app_id', 'key', 'email', 'type','timestamps'];

    public function eloqapplications(){
        return $this->belongsTo('App\ApplicationModel','app_id');
    }
}
