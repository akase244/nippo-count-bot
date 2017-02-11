# nippo-count-bot

esaの「日報/YYYY/MM/DD/」配下に書かれた各メンバーの前日の日報を取得し、タイトルとスターを可視化して月曜日〜金曜日の12時にSlackに投稿するbotです。

以下の箇所を環境に応じて書き換えてください。

- `app/Console/Commands/NippoCount.php`

```
public function handle()
{
      ・
      ・
      $url = 'http://REPLACE_YOUR_HOST_NAME/count/'.$target_ymd; // REPLACE POINT
      ・
      ・
      $url = 'https://hooks.slack.com/services/REPLACE_YOUR_TOKEN'; // REPLACE POINT
      ・
      ・
}
```

- `app/Http/Controllers/NippoCountController.php`

```
protected function getPosts($target_ymd)
{
    ・
    ・
    $url = 'https://api.esa.io/v1/teams/REPLACE_YOUR_TEAM/posts'; // REPLACE POINT
    $res = $client->get($url,[
        'query'=>[
            'access_token' => 'REPLACE_YOUR_ACCESS_TOKEN', // REPLACE POINT
            ・
            ・
        ],
    ]);
    ・
    ・
}
```
