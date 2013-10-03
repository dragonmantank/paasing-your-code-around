<?php

namespace PYCA\Entity;

use PhpORM\Entity\EntityAbstract;

class DrunkText extends EntityAbstract
{
    protected $id;
    protected $phonenumber;
    protected $message;
    protected $dateadded;
    protected $approved;
}