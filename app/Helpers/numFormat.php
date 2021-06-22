<?php

if (!function_exists('numFormat')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function numFormat($value): string
    {
        return number_format($value,2,'.',',');
    }
}
