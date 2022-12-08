<?php

namespace App\Console\Commands;

use App\Models\Service;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class DailyServiceUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'service:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update services from smsfollowes API to our database.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Service::truncate();
        $response = Http::post(env('SMSFOLLOWES_API_URL'), [
            'key' => env('SMSFOLLOWES_API'),
            'action' => 'services',
        ]);

        foreach ($response->json() as $service) {
            $data = new Service;
            $data->_id = $service['service'];
            $data->title = $service['name'];
            $data->cost = $service['rate'];
            $data->min_order = $service['min'];
            $data->max_order = $service['max'];
            $data->type = $service['type'];
            $data->category = $service['category'];
            $data->refill = $service['refill'];
            $data->cancel = $service['cancel'];

            $data->save();
        }
    }
}
