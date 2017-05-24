<?php

namespace Endeavors\Support\Html;

class HtmlTag
{
    /**
     *
     * @todo refactor
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
            if( $content->tagCount() > $j && $temp > 0) {

                $openPosition = $content->validTagPosition();

                $length = $openPosition + mb_strlen($content->tag()->getValue());

                if( " " == $strcontent[$length] ) {
                    $length = $length + 1;
                }

                $beforeText = substr($strcontent, 0, $openPosition);

                $afterText = substr($strcontent, $length);

                $newContent = $beforeText . $afterText; 
            }
            elseif( $temp == 0 ) {
                $newContent = substr($strcontent, 0, $content->validTagPosition()) . substr($strcontent, $content->validTagPosition() + mb_strlen($content->tag()->getValue())+1, mb_strlen($strcontent));
            } else {
                $newContent = substr($strcontent, 0, $content->validTagPosition()) . substr($strcontent, $temp+1, mb_strlen($strcontent));
            }

            $strcontent = static::strip($newContent);          
        }

        return $strcontent;
    }
}