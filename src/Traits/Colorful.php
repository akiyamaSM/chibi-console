<?php


namespace Chibi\Console\Traits;


trait Colorful
{
    /**
     * Red text
     *
     * @param $text
     * @return string
     */
    protected function red($text)
    {
        return "<error>{$text}</error>";
    }

    /**
     * Green text
     *
     * @param $text
     * @return string
     */
    protected function green($text)
    {
        return "<info>{$text}</info>";
    }
}
