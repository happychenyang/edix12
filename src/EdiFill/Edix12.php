<?php

namespace EdiFill;

/**
 * Created by PhpStorm.
 * User: zt19264
 * Date: 2022/11/23
 * Time: 10:56
 */

class Edix12
{
    public const SEGMENT_TERMINATOR_POSITION = 105;

    public const SUBELEMENT_SEPARATOR_POSITION = 104;

    public const ELEMENT_SEPARATOR_POSITION = 3;

    /**
     * Parse an EDI document. Data will be returned as an array of instances of
     * EDI\Document. Document should contain exactly one ISA/IEA envelope.
     */
    public static function parse($res)
    {
        if (!$res) {
            throw new \Exception('No resource or string passed to parse()');
        }

        $data = $res;
        // treat as string.
        if (strcasecmp(substr($data, 0, 3), 'ISA') != 0) {
            throw new \Exception('ISA segment not found in data stream');
        }

        $segment_terminator = substr($data, self::SEGMENT_TERMINATOR_POSITION, 1);
        print_r($segment_terminator);die;
//        $element_separator = substr($data, self::ELEMENT_SEPARATOR_POSITION, 1);
//        $subelement_separator = substr($data, self::SUBELEMENT_SEPARATOR_POSITION, 1);
//
//        $document = null;
//        $raw_segments = explode($segment_terminator, $data);


        return $data;
    }

    /**
     * 解析数据
     * @param string $file
     * @return array 解析好的数据
     * @throws \Exception
     */
    public static function parseFile($file)
    {
        $contents = file_get_contents($file);
        return self::parse($contents);
    }
}