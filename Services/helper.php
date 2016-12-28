<?php

/**
 * Wrapper for ENV to set a default value in case no env is set.
 */
if(!function_exists("env")) {
    function env($env_property, $default_value = null)
    {
        return getenv($env_property) ?: $default_value;
    }
}
