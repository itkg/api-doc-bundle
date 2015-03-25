<?php

namespace Itkg\ApiDocBundle\AnnotationHandler;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Nelmio\ApiDocBundle\Extractor\HandlerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Route;

class MarkdownResourceHandler implements HandlerInterface
{
    /**
     * Resources root directory
     *
     * @var string
     */
    private $rootPath;

    /**
     * @var \ParseDown
     */
    private $parser;

    /**
     * @param string $rootPath
     */
    public function __construct(\Parsedown $parser, $rootPath)
    {
        $this->rootPath = $rootPath;
        $this->parser = $parser;
    }

    /**
     * Parse route parameters in order to populate ApiDoc.
     *
     * @param \Nelmio\ApiDocBundle\Annotation\ApiDoc $annotation
     * @param array $annotations
     * @param \Symfony\Component\Routing\Route $route
     * @param \ReflectionMethod $method
     */
    public function handle(ApiDoc $annotation, array $annotations, Route $route, \ReflectionMethod $method)
    {
        if (!$annotation instanceof \Itkg\ApiDocBundle\Annotation\ApiDoc) {
            return;
        }

        $content = '';
        foreach ($annotation->getResources() as $resource) {
            if (!file_exists($file = sprintf('%s/%s', $this->rootPath, $resource))) {
                throw new NotFoundHttpException(sprintf('Resources file %s does not exist', $file));
            }

            $content .= $this->parser->text(file_get_contents($file));
        }
        $annotation->setResourcesContent($content);
    }
}
