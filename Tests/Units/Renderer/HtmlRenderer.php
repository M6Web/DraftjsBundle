<?php

namespace M6Web\Bundle\DraftjsBundle\Tests\Units\Renderer;

use M6Web\Bundle\DraftjsBundle\Renderer\HtmlRenderer as TestedClass;
use M6Web\Bundle\DraftjsBundle\Tests\Units\TestsContextTrait;
use mageekguy\atoum;

/**
 * HtmlRenderer
 */
class HtmlRenderer extends atoum
{
    use TestsContextTrait;

    /**
     * Test exception undefined entityMap
     */
    public function testRender()
    {
        $json = '{"entityMap":{},"blocks":[{"key":"e0vbh","text":"Hello wÖrld!","type":"unstyled","depth":0,"inlineStyleRanges":[{"offset":6,"length":2,"style":"BOLD"}],"entityRanges":[],"data":{}}]}';
        $rawState = $this->getRawState($json);

        $blockGuesser = $this->getMockBlockGuesser();
        $converter = $this->getMockConverter();
        $builder = $this->getMockBuilder($blockGuesser);

        $this
            ->if($renderer = new TestedClass($converter, $builder))
            ->then
                ->string($renderer->render($rawState))
                ->isEqualTo('Hello <span class="bold">wÖ</span>rld!')
            ->then
                ->mock($converter)->call('convertFromRaw')->withArguments($rawState)->once()
                ->mock($builder)->call('build')->once()
        ;
    }
}
