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
    public function parse($str) {
        return strtoupper($str);
    }
}