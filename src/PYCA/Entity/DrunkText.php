<?php

namespace PYCA\Entity;

use PhpORM\Entity\EntityAbstract;

class DrunkText extends EntityAbstract
{
    protected $id;
    protected $phoneNumber;
    protected $message;
    protected $dateAdded;
    protected $approved;
}