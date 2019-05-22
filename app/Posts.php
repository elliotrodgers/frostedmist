<?php

namespace App;

use BaoPham\DynamoDb\DynamoDbModel;

class Posts extends DynamoDbModel
{
    protected $table = 'Posts';
    protected $primaryKey = 'pid';

    public function InsertUpdatePost($pid, $title, $image_name, $body)
    {
        $this->pid = $pid;
        $this->title = $title;
        if($image_name != null) {
            $this->image_name = $image_name;
        }
        $this->body = $body;
        $this->save();
    }
}
