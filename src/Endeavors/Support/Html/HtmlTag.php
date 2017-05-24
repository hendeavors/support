<?php

namespace Endeavors\Support\Html;

class HtmlTag
{
    /**
     *
     * @todo refactor
     * @todo test with large body of html
     */
    public static function strip($strcontent)
    {
        $content = new Content($strcontent);

        if( $content->hasValidTag() ) {
            
            $result = false;

            $temp = 0; $j = 0;

            for($i = 0; $i < mb_strlen($strcontent); $i++ ) {

                if( $strcontent[$i] == ">" ) {
                    $j++;
                }
                
                if( $strcontent[$i] == ">" && $result == false ) {
                    $temp = $i;

                    $result = true;    
                }
            }

            // if the tag count greater than the closing tag count we have a broken/missing tag
            if( $content->tagCount() > $j && $temp > 0 || $temp == 0) {
                
                $tagPosition = $content->validTagPosition();

                $startPosition = $tagPosition + mb_strlen($content->tag()->getValue());

                $beforeText = substr($strcontent, 0, $tagPosition);

                $afterText = substr($strcontent, $startPosition);

                $newContent = trim($beforeText) . ' ' . trim($afterText);
            }
            else {
                $newContent = substr($strcontent, 0, $content->validTagPosition()) . substr($strcontent, $temp+1, mb_strlen($strcontent));
            }

            $strcontent = static::strip($newContent);          
        }

        return $strcontent;
    }
}