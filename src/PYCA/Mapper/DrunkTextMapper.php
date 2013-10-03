<?php

namespace PYCA\Mapper;

use PhpORM\Mapper\MapperAbstract;

class DrunkTextMapper extends MapperAbstract
{
    protected $table = 'drunk_texts';
    protected $entityClass = 'PYCA\Entity\DrunkText';
}