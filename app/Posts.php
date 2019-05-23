<?php

namespace App;

use BaoPham\DynamoDb\DynamoDbModel;

class Posts extends DynamoDbModel
{
    protected $table = 'Posts';
    protected $primaryKey = 'pid';

    public function insertUpdatePost($pid, $title, $image_names, $body)
    {
        $this->pid = $pid;
        $this->title = $title;
        if($image_names != null) {
            $this->image_names = $image_names;
        }
        $this->body = $body;
        $this->save();
    }
}
