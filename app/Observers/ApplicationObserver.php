<?php

namespace App\Observers;

use App\ApplicationModel;
use App\Console\Commands\LogMailCommand;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class ApplicationObserver
{
    /**
     * Handle the application model "created" event.
     *
     * @param  \App\ApplicationModel  $applicationModel
     * @return void
     */
    public function created(ApplicationModel $applicationModel)
    {
        $datetime = date('Y-m-d H:i:s');
        $ip = Request::ip();
        $agent = Request::header('user-agent');

        $content = "['Type' => 'Application',
                'Operation' => 'Created',
                'app_id' => ' $applicationModel->app_id ',
                'datetime' =>  ' $datetime' ,
                'ip' => '$ip',
                'agent' => '$agent',
            ]";
//        Storage::prepend('logs/ObserverLog.txt',$content );
        Log::channel('observers')->info($content);
    }

    /**
     * Handle the application model "updated" event.
     *
     * @param  \App\ApplicationModel  $applicationModel
     * @return void
     */
    public function updated(ApplicationModel $applicationModel)
    {
        $datetime = date('Y-m-d H:i:s');
        $ip = Request::ip();
        $agent = Request::header('user-agent');

        $content = "['Type' => 'Application',
                'Operation' => 'Updated',
                'app_id' => ' $applicationModel->app_id ',
                'datetime' =>  ' $datetime' ,
                'ip' => '$ip',
                'agent' => '$agent'
            ]";
        Log::channel('observers')->info($content);
    }

    /**
     * Handle the application model "deleted" event.
     *
     * @param  \App\ApplicationModel  $applicationModel
     * @return void
     */
    public function deleted(ApplicationModel $applicationModel)
    {
        $datetime = date('Y-m-d H:i:s');
        $ip = Request::ip();
        $agent = Request::header('user-agent');

        $content = "['Type' => 'Application',
                'Operation' => 'Deleted',
                'app_id' => ' $applicationModel->app_id ',
                'datetime' =>  ' $datetime' ,
                'ip' => '$ip',
                'agent' => '$agent'
            ]";
        Log::channel('observers')->info($content);
    }

    /**
     * Handle the application model "restored" event.
     *
     * @param  \App\ApplicationModel  $applicationModel
     * @return void
     */
    public function restored(ApplicationModel $applicationModel)
    {
        $datetime = date('Y-m-d H:i:s');
        $ip = Request::ip();
        $agent = Request::header('user-agent');

        $content = "['Type' => 'Application',
                'Operation' => 'Restored',
                'app_id' => ' $applicationModel->app_id ',
                'datetime' =>  ' $datetime' ,
                'ip' => '$ip',
                'agent' => '$agent'
            ]";
        Log::channel('observers')->info($content);
    }

    /**
     * Handle the application model "force deleted" event.
     *
     * @param  \App\ApplicationModel  $applicationModel
     * @return void
     */
    public function forceDeleted(ApplicationModel $applicationModel)
    {
        $datetime = date('Y-m-d H:i:s');
        $ip = Request::ip();
        $agent = Request::header('user-agent');

        $content = "['Type' => 'Application',
                'Operation' => 'Force Deleted',
                'app_id' => ' $applicationModel->app_id ',
                'datetime' =>  ' $datetime' ,
                'ip' => '$ip',
                'agent' => '$agent'
            ]";
        Log::channel('observers')->info($content);
    }
}
