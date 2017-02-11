<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class NippoCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nippo_count';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Nippo count';

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
        // 月曜から金曜日のみ実行
        if (date('w') >= 1 && date('w') <= 5) {
            // 昨日の日付を取得
            $target_ymd = date('Ymd', strtotime('yesterday'));
            if (date('w') == 1) {
                // 実行日が月曜日の場合は3日前(金曜日)の日付を取得
                $target_ymd = date('Ymd', strtotime('-3 day'));
            }
            $url = 'http://REPLACE_YOUR_HOST_NAME/count/'.$target_ymd;
            $client = new \GuzzleHttp\Client();
            $res = $client->get($url);
            $body = json_decode($res->getBody());

            $url = 'https://hooks.slack.com/services/REPLACE_YOUR_TOKEN';
            $req = $client->post($url,[
                'body' => json_encode([
                    'channel' => '#nippo',
                    'username' => '日報カウンター',
                    'text' => $body->text,
                    'icon_emoji' => ':esadori:',
                ]),
            ]);
        }
    }
}
