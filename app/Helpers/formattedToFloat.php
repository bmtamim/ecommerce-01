<?php

if (!function_exists('formattedToFloat')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function formattedToFloat($value)
    {
        return filter_var($value,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
    }
}
