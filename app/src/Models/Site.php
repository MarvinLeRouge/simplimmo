<?php

namespace Simplimmo\Models;

use Simplimmo\Core\Model as Model;
use \DateTime;

class Site extends Model {
    public function __construct(protected $data = []) {
        parent::__construct($data);
    }

}