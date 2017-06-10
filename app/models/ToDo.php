<?php

namespace app\models;

use Pheasant\DomainObject;
use Pheasant\Types;

class ToDo extends DomainObject {

    public function properties()
    {
        return array(
            'id'   => new Types\SequenceType(),
            'title'    => new Types\StringType(255, 'required'),
            'status'   => new Types\BooleanType(),
        );
    }



}