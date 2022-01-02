<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Nette\Utils\DateTime;

class Localupdater implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function uniqueId()
    {
        return 1;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $fecha = new DateTime();
        $valor = microtime();
        error_log($valor);
        $response = Http::patch('https://papeleria-8d415-default-rtdb.firebaseio.com/variables.json', [
            "dato" => $valor,
        ]);
    }
}
