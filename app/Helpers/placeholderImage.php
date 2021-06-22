<?php

if (!function_exists('placeholderImage')) {

    /**
     * description
     *
     * @param
     * @return string
     */
    function placeholderImage(string $name) : string
    {
        return "https://ui-avatars.com/api/?name={$name}&color=7F9CF5&background=EBF4FF";
    }
}
