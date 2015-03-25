<?php

class MarkdownResourcesHandlerTest extends PHPUnit_Framework_TestCase
{
    public function testHandle()
    {
        $handler = new \Itkg\ApiDocBundle\AnnotationHandler\MarkdownResourceHandler(
            new Parsedown(),
            __DIR__.'/../data'
        );

        $apiDoc = new \Itkg\ApiDocBundle\Annotation\ApiDoc(array('resources' => array('test.md')));
        $handler->handle(
            $apiDoc,
            array($apiDoc),
            new \Symfony\Component\Routing\Route('/demo'),
            new ReflectionMethod(__CLASS__, 'testHandle')
        );

        $content = <<<EOF
<h1>This is a test</h1>
EOF;

        $this->assertEquals($content, $apiDoc->getResourcesContent());
    }
}
