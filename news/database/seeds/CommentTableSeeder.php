<?php // app/database/seeds/CommentTableSeeder.php
use Illuminate\Database\Seeder;
use App\Comment;

class CommentTableSeeder extends Seeder {

    public function run()
    {
        DB::table('comments')->delete();
    
        Comment::create(array(
            'userid' => '0',
            'storyid' => '1',
            'content' => 'Look I am a test comment.'
        ));
    
        Comment::create(array(
            'userid' => '1',
            'storyid' => '1',
            'content' => 'This is going to be super crazy.'
        ));
    
        Comment::create(array(
            'userid' => '1',
            'storyid' => '1',
            'content' => 'I am a master of Laravel and Angular.'
        ));
    }    

}