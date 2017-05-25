<?php

namespace Endeavors\Support\Tests\Html;

use Endeavors\Support\Html\Content;

class ContentTest extends \Orchestra\Testbench\TestCase
{
    public function testContentHasValidTag()
    {
        $contents = [
            'Before text <fourty% after invalid tag text <strong>NO</strong> after valid text',
            'Before text <40% after invalid tag text <strong>NO</strong> after valid text',
            'Before text <strong>tag text</strong>',
            'Before text NO</strong> after valid text <40% after invalid tag text <strong>NO</strong> after valid text',
            'Before text <strong>NO</strong> after valid text <40% after invalid tag text <strong>NO</strong> after valid text',
            'Before text <span some after text <40% some after invalid text'
        ];

        foreach($contents as $content) {
            $content = new Content($content);

            $this->assertTrue( $content->hasValidTag() );
        }
    }
}