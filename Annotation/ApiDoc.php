<?php

namespace Itkg\ApiDocBundle\Annotation;

use Nelmio\ApiDocBundle\Annotation\ApiDoc as BaseApiDoc;

/**
 * @Annotation
 */
class ApiDoc extends BaseApiDoc
{

    /**
     * @var array
     */
    protected $resources = array();

    /**
     * @var string
     */
    protected $resourcesContent = '';

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (isset($data['resources'])) {
            if (!is_array($data['resources'])) {
                $data['resources'] = array($data['resources']);
            }
            $this->resources = $data['resources'];
        }

        parent::__construct($data);
    }

    /**
     * @return string
     */
    public function getResourcesContent()
    {
        return $this->resourcesContent;
    }

    /**
     * @param $resourcesContent
     *
     * @return $this
     */
    public function setResourcesContent($resourcesContent)
    {
        $this->resourcesContent = $resourcesContent;

        return $this;
    }

    /**
     * @return array
     */
    public function getResources()
    {
        return $this->resources;
    }

    /**
     * @param array $resources
     *
     * @return $this
     */
    public function setResources(array $resources)
    {
        $this->resources = $resources;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $data = parent::toArray();
        $data['resources'] = $this->resources;
        $data['resourcesContent'] = $this->resourcesContent;

        return $data;
    }
}
