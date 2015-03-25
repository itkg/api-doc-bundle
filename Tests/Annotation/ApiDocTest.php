<?php

class ApiDocTest extends PHPUnit_Framework_TestCase
{
    public function testGetSetAndToArray()
    {
        $data = array('resources' => array('test.md'), 'resourcesContent' => '');
        $apiDoc = new \Itkg\ApiDocBundle\Annotation\ApiDoc($data);

        $this->assertEquals(array('test.md'), $apiDoc->getResources());
        $this->assertEquals($apiDoc, $apiDoc->setResources(array('other.md')));
        $this->assertEquals(array('other.md'), $apiDoc->getResources());

        $array = $apiDoc->toArray();
        $this->assertEquals($array['resources'], $apiDoc->getResources());
        $this->assertEquals($array['resourcesContent'], $apiDoc->getResourcesContent());

    }
}
