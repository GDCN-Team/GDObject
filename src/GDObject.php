<?php
/*
 * Copyright (c) 2020. WOSHIZHAZHA120
 */

namespace GDCN;

/**
 * Class GDObject
 * @package GDObject
 */
class GDObject
{
    /**
     * @param array $object
     * @param string $glue
     * @param bool $useKey
     * @param bool $ksort
     * @return string
     */
    public function merge(array $object, string $glue, bool $useKey = true, bool $ksort = true): string
    {
        if ($ksort) {
            ksort($object);
        }

        foreach ($object as $key => $value) {
            $objects[] = implode($glue, $useKey ? [$key, $value] : [$value]);
        }

        return implode($glue, $objects ?? []);
    }

    /**
     * @param string $object
     * @param string $delimiter
     * @param bool $useKey
     * @return array
     */
    public function split(string $object, string $delimiter, bool $useKey = true): array
    {
        $objects = explode($delimiter, $object);

        for ($i = 0, $iMax = count($objects); $i < $iMax; $i += 2) {
            if ($useKey) {
                $result[$objects[$i]] = $objects[$i + 1];
            } else {
                $result[] = $objects[$i + 1];
            }
        }

        return $result ?? [];
    }
}