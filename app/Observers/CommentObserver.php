<?php

namespace App\Observers;

use App\Models\Comment;
use App\Notifications\CommentNotify;

class CommentObserver
{

    public function created(Comment $comment)
    {
//        dd($comment);
       //发送通知
        $comment->article->user->notify(new CommentNotify($comment));
    }


    public function updated(Comment $comment)
    {
        //
    }


    public function deleted(Comment $comment)
    {
        //
    }


    public function restored(Comment $comment)
    {
        //
    }


    public function forceDeleted(Comment $comment)
    {
        //
    }
}
