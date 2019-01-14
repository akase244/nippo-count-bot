# nippo-count-bot

esaの「日報/YYYY/MM/DD/」配下に書かれた各メンバーの前日の日報を取得し、タイトルとスターを可視化して月曜日〜金曜日の12時にSlackに投稿するbotです。

以下の箇所を環境に応じて書き換えてください。

- `.env.example`

日報カウンターを稼働させるサーバーのホスト名を入力してください。
```
NIPPO_COUNT_HOST_NAME=REPLACE_YOUR_NIPPO_COUNT_HOST_NAME
```

Slack通知を行うためのHOOK用トークンを入力してください。
```
SLACK_HOOK_TOKEN=REPLACE_YOUR_SLACK_HOOK_TOKEN
```

esaのチーム名を入力してください。
```
ESA_TEAM_NAME=REPLACE_YOUR_ESA_TEAM_NAME
```

esaのAPI呼び出しを行うためのアクセストークンを入力してださい。
```
ESA_ACCESS_TOKEN=REPLACE_YOUR_ESA_ACCESS_TOKEN
```

使い方
```
$ cp .env.example .env
$ php artisan key:generate
```

月曜〜金曜の12時に実行するようにしているので時間を変更する場合は以下のファイルを修正してください。

- `app/Console/Kernel.php`

```
$schedule->command('nippo_count')
         ->cron('0 12 * * 1-5');
```
