# nippo-count-bot

esa�Ρ�����/YYYY/MM/DD/���۲��˽񤫤줿�ƥ��С��������������������������ȥ�ȥ�������Ļ벽���Ʒ���������������12����Slack����Ƥ���bot�Ǥ���

�ʲ��βս��Ķ��˱����ƽ񤭴����Ƥ���������

- `app/Console/Commands/NippoCount.php`

```
public function handle()
{
      ��
      ��
      $url = 'http://REPLACE_YOUR_HOST_NAME/count/'.$target_ymd; // REPLACE POINT
      ��
      ��
      $url = 'https://hooks.slack.com/services/REPLACE_YOUR_TOKEN'; // REPLACE POINT
      ��
      ��
}
```

- `app/Http/Controllers/NippoCountController.php`

```
protected function getPosts($target_ymd)
{
    ��
    ��
    $url = 'https://api.esa.io/v1/teams/REPLACE_YOUR_TEAM/posts'; // REPLACE POINT
    $res = $client->get($url,[
        'query'=>[
            'access_token' => 'REPLACE_YOUR_ACCESS_TOKEN', // REPLACE POINT
            ��
            ��
        ],
    ]);
    ��
    ��
}
```
