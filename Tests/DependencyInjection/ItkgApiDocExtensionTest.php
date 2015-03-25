<?php

namespace Itkg\ApiDocBundle\Tests\DependencyInjection;

use Itkg\ApiDocBundle\DependencyInjection\ItkgApiDocExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Yaml\Parser;

class ItkgApiDocExtensionTest extends \PHPUnit_Framework_TestCase
{
    private $container;

    public function testChangeRootPath()
    {
        $this->loadContainer();
        $this->assertEquals('my_root_path', $this->container->getParameter('itkg_api_doc.resources.root_path'));
    }

    protected function loadContainer()
    {
        $this->container= new ContainerBuilder();
        $loader = new ItkgApiDocExtension();
        $config = $this->getConfig();
        $loader->load(array($config), $this->container);
    }

    /**
     * getConfig
     *
     * @return array
     */
    protected function getConfig()
    {
        $yaml = <<<EOF
resources:
    root_path: my_root_path

EOF;
        $parser = new Parser();
        return $parser->parse($yaml);
    }
}