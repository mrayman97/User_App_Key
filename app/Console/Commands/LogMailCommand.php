<?php

namespace App\Console\Commands;

use App\ApplicationModel;
use App\Events\LogMailSentEvent;
use App\Mail\LogMail;
use App\Observers\ApplicationObserver;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class LogMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'logmail:send';

//    protected $events = ['retrieved', 'creating', 'created', 'updating', 'updated',
//        'saving', 'saved', 'restoring', 'restored',
//        'deleting', 'deleted', 'forceDeleted'];

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envoyer un email par jour des modifications + suppression + accès dans un tableau.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //TODO
        $logFile = file(storage_path().'/logs/ObserverLog.txt');
        $logCollection = [];
        // Loop through an array, show HTML source as HTML source; and line numbers too.
        foreach ($logFile as $line_num => $line) {
            //   $logCollection[] = array('line'=> $line_num, 'content'=> htmlspecialchars($line));
            array_push($logCollection, array('line'=> $line_num, 'content'=> htmlspecialchars($line)));
        }

        $countvalue = array('Created' => 0,'Updated' => 0,'Deleted' => 0 );

        foreach($logCollection as $log){
            //match the words with the content file and count them
            if (count(preg_grep ('/Created/', $log)) > 0) {
                $countvalue['Created'] += 1 ;
            }
            elseif (count(preg_grep ('/Updated/', $log)) > 0) {
                $countvalue['Updated'] += 1 ;
            }
            elseif (count(preg_grep ('/Deleted/', $log)) > 0) {
                $countvalue['Deleted'] += 1 ;
            }
        }

        if ($countvalue['Created'] > 0 && $countvalue['Updated'] > 0  && $countvalue['Deleted'] > 0 )
        {
            $content = $countvalue['Created']." New Applications has been Created ".$countvalue['Updated']." has been updated and ".$countvalue['Deleted']." has been deleted";
        }

        Mail::raw($content, function($message){
            $message->from('admin@gmail.com');
            $message->to('test@gmail.com')->subject('Mail Log');
        });

        $this->info('Email sent successfully');


    }
}
