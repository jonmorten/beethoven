<?php

namespace OhSeven\Beethoven\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Board
 */
class Board
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \stdClass
     */
    private $columns;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \stdClass
     */
    private $filter;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set columns
     *
     * @param \stdClass $columns
     * @return Board
     */
    public function setColumns($columns)
    {
        $this->columns = $columns;

        return $this;
    }

    /**
     * Get columns
     *
     * @return \stdClass
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Board
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set filter
     *
     * @param \stdClass $filter
     * @return Board
     */
    public function setFilter($filter)
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * Get filter
     *
     * @return \stdClass
     */
    public function getFilter()
    {
        return $this->filter;
    }
}
