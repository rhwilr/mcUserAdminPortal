<?php namespace rhwilr\mcUserAdminPortal\Api\v1\Transformers;

/**
 * Class Transformer
 * @package rhwilr\mcUserAdminPortal\Api\v1\Transformers
 */
abstract class Transformer {

    /**
     * Transforms a collection
     *
     * @param array $items
     * @return array
     */
    public function transformCollection(array $items)
    {
        return array_map([$this, 'transform'], $items);
    }

    public abstract function transform($item);
}