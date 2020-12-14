<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Http, Log;
use App\Models\Post;

class GetPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Posts from jsonplaceholder and store them in database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public $url;
    public function __construct()
    {
        parent::__construct();
        $this->url = config('api.url');
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $post = Post::get();
        if($post->isEmpty()){
            $posts = Http::get($this->url)->json();
            foreach($posts as $post){
                Post::create([
                    'title' => $post['title'],
                    'body' => $post['body']
                ]);
            }
        }
        $this->info('The app is already loaded with Posts data from API');
    }
}
