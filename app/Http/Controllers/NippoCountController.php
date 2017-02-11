<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class NippoCountController extends Controller
{
    public function count($ymd = null)
    {
        $target_ymd = $ymd ? substr($ymd, 0, 4).'/'.substr($ymd, 4, 2).'/'.substr($ymd, 6, 2) : date('Y/m/d', strtotime('yesterday'));
        $posts = $this->getPosts($target_ymd);

        $posts_count = count($posts);
        $wip_count = 0;
        $stargazers = '';
        foreach($posts as $post) {
            if ($post->wip) {
                $wip_count++;
            }
            $stargazers .= '><'.$post->url.'|'.$post->name.'>'.PHP_EOL;
            for ($i = 0; $i < $post->stargazers_count; $i++) {
                $stargazers .= '>:star: '.$post->stargazers[$i]->user->name.($post->stargazers[$i]->body ? ' ＜'.str_replace(PHP_EOL, '', $post->stargazers[$i]->body) : '').PHP_EOL;
            }
            $stargazers .= '>'.PHP_EOL;
        }

        $wip_text = '';
        if ($wip_count > 0) {
            $wip_text = '(WIP '.$wip_count.'件)';
        }

        $text = $target_ymd . 'の日報はありませんよー';
        if ($posts_count > 0) {
            $text = $target_ymd . 'の日報は' . $posts_count . '件'.$wip_text.'でした。';
        }

        return [
            'text' => $text.($stargazers ? PHP_EOL.$stargazers : ''),
        ];
    }

    protected function getPosts($target_ymd)
    {
        $client = new \GuzzleHttp\Client();
        $url = 'https://api.esa.io/v1/teams/REPLACE_YOUR_TEAM/posts';
        $res = $client->get($url,[
            'query'=>[
                'access_token' => 'REPLACE_YOUR_ACCESS_TOKEN',
                'q' => 'in:日報/'.$target_ymd,
                'include' => 'stargazers',
                'per_page' => 100,
            ],
        ]);
        $body = json_decode($res->getBody());
        return $body->posts;
    }
}
