<?php

namespace Magenest\Test1\Model\ResourceModel\Post;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Define resource model
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Magenest\Test1\Model\Post', 'Magenest\Test1\Model\ResourceModel\Post');
    }

    public function joinTableToGetActorAndDirectory()
    {
        $actorTable = $this->getTable('magenest_actor');
        $actormovieTable = $this->getTable('magenest_movie_actor');
        $directorTable = $this->getTable('magenest_director');
        $result = $this
            ->addFieldToSelect('name', 'movie')
            ->addFieldToSelect('description')
            ->addFieldToSelect('rating')
            ->join($directorTable, 'main_table.director_id=' . $directorTable . '.director_id', ['director' => 'name'])
            ->join($actormovieTable, 'main_table.movie_id=' . $actormovieTable . '.movie_id', null)
            ->join($actorTable, $actorTable . '.actor_id=' . $actormovieTable . '.actor_id', ['actor' => 'name']);
        return $result->getSelect();
    }
}
