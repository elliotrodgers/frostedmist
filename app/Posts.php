<?php

namespace App;

use BaoPham\DynamoDb\DynamoDbModel;

class Posts extends DynamoDbModel
{
    protected $table = 'Posts';
}
