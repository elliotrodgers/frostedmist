<?php

namespace App;

use BaoPham\DynamoDb\DynamoDbModel;

class Posts extends DynamoDbModel
{
    protected $table = 'Posts';

    public function getLatest()
    {
        return $this->limit(1)->get();
    }
}
