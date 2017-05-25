<?php

namespace Endeavors\Support\Tests\Html;

use Endeavors\Support\Html\HtmlTag;

/**
 * All tags are fairly common testing the strip of one tag will most likely work for another.
 * All tags should still be tested.
 * @todo test all tags
 */

class HtmlTagTest extends \Orchestra\Testbench\TestCase
{
    public function testStripATags()
    {
        $contents = [
            'Some Content with no tag',
            'Before text <fourty% after invalid tag text <a>NO</a> after valid text',
            'Before text <40% after invalid tag text <a>NO</a> after valid text',
            'Before text <a>tag text</a>',
            'Before text NO</a> after valid text <40% after invalid tag text <a>NO</a> after valid text broken',
            'Before text <a>NO</a> after valid text <40% after invalid tag text <a>NO</a> after valid text good',
            'Before <a href="things" class="morethings">Test One</a>',
            'Before text <a some after text <40% some after invalid text'
        ];

        $strippedContents = [
            'Some Content with no tag',
            'Before text <fourty% after invalid tag text NO after valid text',
            'Before text <40% after invalid tag text NO after valid text',
            'Before text tag text',
            'Before text NO after valid text <40% after invalid tag text NO after valid text broken',
            'Before text NO after valid text <40% after invalid tag text NO after valid text good',
            'Before Test One',
            'Before text some after text <40% some after invalid text'
        ];
        
        $i = 0;
        foreach($contents as $content) {
            $this->assertEquals( $strippedContents[$i], HtmlTag::strip($content) );

            $i++;
        }
    }

    public function testStripStrongTags()
    {
        $contents = [
            'Some Content with no tag',
            'Before text <fourty% after invalid tag text <strong>NO</strong> after valid text',
            'Before text <40% after invalid tag text <strong>NO</strong> after valid text',
            'Before text <strong>tag text</strong>',
            'Before text NO</strong> after valid text <40% after invalid tag text <strong>NO</strong> after valid text',
            'Before text <strong>NO</strong> after valid text <40% after invalid tag text <strong>NO</strong> after valid text',
            'Before text <span some after text <40% some after invalid text'
        ];

        $strippedContents = [
            'Some Content with no tag',
            'Before text <fourty% after invalid tag text NO after valid text',
            'Before text <40% after invalid tag text NO after valid text',
            'Before text tag text',
            'Before text NO after valid text <40% after invalid tag text NO after valid text',
            'Before text NO after valid text <40% after invalid tag text NO after valid text',
            'Before text some after text <40% some after invalid text'
        ];
        
        $i = 0;
        foreach($contents as $content) {
            $this->assertEquals( $strippedContents[$i], HtmlTag::strip($content) );

            $i++;
        }
    }

    public function testEdgeCaseTags()
    {
        $contents = [
            'Before <a href="things" class="morethings" Test</a>',
            'Before <ahref="things" class="morethings" Test</a>',
            'Before <center <center <center After',
            'Before <center> <center <center After'
        ];

        $strippedContents = [
            'Before href="things" class="morethings" Test',
            'Before href="things" class="morethings" Test',
            'Before After',
            'Before After'
        ];
        
        $i = 0;
        foreach($contents as $content) {
            $this->assertEquals( $strippedContents[$i], HtmlTag::strip($content) );

            $i++;
        }
    }
}