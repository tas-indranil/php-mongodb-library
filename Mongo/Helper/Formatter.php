<?php

namespace Mongo\Helper;

class Formatter
{
    public static function check_property_existsa($arrayType, $classObject)
    {
        if(property_exists($classObject, $arrayType))
        {
            return true;
        }
        return false;
    }

    /**
     * @param $style
     * @param $data
     * @return array
     */
    public static function format_read_data($style, $data): array
    {
        $results = [];
        $total = count($style);
        for($i=0;$i<$total;) {
            foreach ($data as $document) {
                foreach ($style as $value) {
                    $results[$i][$value] = $document->$value;
                }
                $i++;
            }
        }
        return $results;
    }


}