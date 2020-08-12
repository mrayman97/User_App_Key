<?php

namespace App\Observers;

use App\UserAppKeyModel;
use Faker\Provider\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Request;

class UserAppKeyObserver
{
    /**
     * Handle the user app key model "created" event.
     *
     * @param  \App\UserAppKeyModel  $userAppKeyModel
     * @return void
     */
    public function created(UserAppKeyModel $userAppKeyModel)
    {
        $datetime = date('Y-m-d H:i:s');
        $typeAppKey = $userAppKeyModel->type;
        $ip = Request::ip();
        $agent = Request::header('user-agent');

        $content = "['Type' => 'UserAppKey',
                'Operation' => 'Created',
                'app_id' => ' $userAppKeyModel->key ',
                'type' => '$typeAppKey',
                'datetime' =>  ' $datetime' ,
                'ip' => '$ip',
                'agent' => '$agent'
            ]";
        Log::channel('observers')->info($content);
    }

    /**
     * Handle the user app key model "updated" event.
     *
     * @param  \App\UserAppKeyModel  $userAppKeyModel
     * @return void
     */
    public function updated(UserAppKeyModel $userAppKeyModel)
    {
        $datetime = date('Y-m-d H:i:s');
        $typeAppKey = $userAppKeyModel->type;
        $ip = Request::ip();
        $agent = Request::header('user-agent');

        $content = "['Type' => 'UserAppKey',
                'Operation' => 'Updated',
                'app_id' => ' $userAppKeyModel->app_id ',
                'type' => '$typeAppKey',
                'datetime' =>  ' $datetime' ,
                'ip' => '$ip',
                'agent' => '$agent'
            ]";
        Log::channel('observers')->info($content);

    }

    /**
     * Handle the user app key model "deleted" event.
     *
     * @param  \App\UserAppKeyModel  $userAppKeyModel
     * @return void
     */
    public function deleted(UserAppKeyModel $userAppKeyModel)
    {
        $datetime = date('Y-m-d H:i:s');
        $typeAppKey = $userAppKeyModel->type;
        $ip = Request::ip();
        $agent = Request::header('user-agent');

        $content = "['Type' => 'UserAppKey',
                'Operation' => 'Deleted',
                'app_id' => ' $userAppKeyModel->app_id ',
                'type' => '$typeAppKey',
                'datetime' =>  ' $datetime' ,
                'ip' => '$ip',
                'agent' => '$agent'
            ]";
        Log::channel('observers')->info($content);
    }

    /**
     * Handle the user app key model "restored" event.
     *
     * @param  \App\UserAppKeyModel  $userAppKeyModel
     * @return void
     */
    public function restored(UserAppKeyModel $userAppKeyModel)
    {
        $datetime = date('Y-m-d H:i:s');
        $typeAppKey = $userAppKeyModel->type;
        $ip = Request::ip();
        $agent = Request::header('user-agent');

        $content = "['Type' => 'UserAppKey',
                'Operation' => 'Restored',
                'app_id' => ' $userAppKeyModel->app_id ',
                'type' => '$typeAppKey',
                'datetime' =>  ' $datetime' ,
                'ip' => '$ip',
                'agent' => '$agent'
            ]";
        Log::channel('observers')->info($content);
    }

    /**
     * Handle the user app key model "force deleted" event.
     *
     * @param  \App\UserAppKeyModel  $userAppKeyModel
     * @return void
     */
    public function forceDeleted(UserAppKeyModel $userAppKeyModel)
    {
        $datetime = date('Y-m-d H:i:s');
        $typeAppKey = $userAppKeyModel->type;
        $ip = Request::ip();
        $agent = Request::header('user-agent');

        $content = "['Type' => 'UserAppKey',
                'Operation' => 'Force Deleted',
                'app_id' => ' $userAppKeyModel->app_id ',
                'type' => '$typeAppKey',
                'datetime' =>  ' $datetime' ,
                'ip' => '$ip',
                'agent' => '$agent'
            ]";
        Log::channel('observers')->info($content);
    }
}
