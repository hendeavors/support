<?php

namespace Endeavors\Support\Html;

use Endeavors\Support\Html\Tag\Tag;
use Endeavors\Support\Str;

final class Content
{
    protected $content;
    
    /**
     * @param string $content
     *
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    public function tag()
    {
        $tag = (Str::needle($this->content, Tag::getValues()));

        return Tag::byValue($tag);
    }

    public function tagCount()
    {
        return count( Str::needles($this->content, Tag::getValues()) );
    }

    public function hasValidTag()
    {
        return false !== $this->validTagPosition();
    }
    
    /**
     * Checks for the valid tag position
     * The tags may not be in the same order as the enumeration
     * We need to return the smaller value
     * @return int|bool
     */
    public function validTagPosition()
    {
        $position = $this->validTagPositionForward();

        if( $position <= $reverse = $this->validTagPositionReverse() ) {
            return $position;
        }

        return $reverse;
    }

    protected function validTagPositionForward()
    {
        return Str::position($this->content, Tag::getValues());
    }

    protected function validTagPositionReverse()
    {
        return Str::position($this->content, array_reverse(Tag::getValues()));
    }
}