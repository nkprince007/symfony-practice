<?php
/**
 * Created by PhpStorm.
 * User: nkprince007
 * Date: 24/09/16
 * Time: 11:47 PM
 */

namespace AppBundle\Service;


class MarkdownTransformer
{
    public function __construct($markdownParser) {
        $this->markdownParser = $markdownParser;
    }

    public function parse($str) {
        return $this->markdownParser->transformMarkdown($str);
    }
}