<?php

namespace PhpORM\Mapper;

class MapperAbstract
{
    protected $db;
    protected $entityClass;
    protected $table;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function delete(array $where)
    {
        $db = $this->getDb();

        $db->delete($this->table, $where);
    }

    public function fetchAll()
    {
        $db = $this->getDb();

        $sql = "SELECT * FROM "  . $this->table . " ORDER BY id ASC";
        $result = $db->fetchAll($sql);

        $data = array();
        foreach($result as $row) {
            $class = $this->entityClass;
            $data[] = new $class($row);
        }

        return $data;
    }

    public function find($id)
    {
        return $this->findBy('id', $id);
    }

    public function findBy($key, $value)
    {
        $db = $this->getDb();

        $sql = "SELECT * FROM "  . $this->table . " WHERE ".$key." = :value ORDER BY id ASC";
        $result = $db->fetchAssoc($sql, array('value' => $value));

        $class = $this->entityClass;
        return new $class($result);
    }

    public function findAllBy($key, $value)
    {
        $db = $this->getDb();
        $sql = "SELECT * FROM "  . $this->table . " WHERE ".$key." = :value ORDER BY id ASC";
        $result = $db->fetchAll($sql, array('value' => $value));

        $data = array();
        foreach($result as $row) {
            $class = $this->entityClass;
            $data[] = new $class($row);
        }

        return $data;
    }

    /**
     * @return \PDO
     */
    public function getDb()
    {
        return $this->db;
    }

    public function save($entity)
    {
        $db = $this->getDb();
        $table = ''.$this->table.'';
        $objectData = $entity->toArray();
        foreach($objectData as $key => $value) {
            if(is_object($value) && get_class($value) == 'DateTime') {
                $value = $value->format('Y-m-d H:i:s');
            }
            $objectData[$key] = $value;
            //unset($objectData[$key]);
        }

        if($entity->id) {
            $db->update($table, $objectData, array('id' => $entity->id));
        } else {
            unset($objectData['id']);
            $db->insert($table, $objectData);
            $entity->id = $db->lastInsertId();
        }
    }
}