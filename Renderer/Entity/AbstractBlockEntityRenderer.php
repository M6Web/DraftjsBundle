<?php

namespace M6Web\Bundle\DraftjsBundle\Renderer\Entity;

use Symfony\Component\Templating\EngineInterface;

/**
 * Class AbstractBlockEntityRenderer
 *
 * @package M6Web\Bundle\DraftjsBundle\Renderer\Entity
 */
abstract class AbstractBlockEntityRenderer implements BlockEntityRendererInterface
{
    /**
     * @var EngineInterface
     */
    protected $templating;

    /**
     * @var string
     */
    protected $className;

    /**
     * AbstractEntityRenderer constructor.
     *
     * @param EngineInterface $templating
     */
    public function __construct(EngineInterface $templating)
    {
        $this->templating = $templating;
    }

    /**
     * @param string $className
     *
     * @return $this
     */
    public function setClassName($className)
    {
        $this->className = $className;

        return $this;
    }

    /**
     * @return string
     */
    public function getClassName()
    {
        return $this->className;
    }
}
