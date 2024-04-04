<?php

if (! function_exists('current_user')) {
    function current_user()
    {
        return auth()->user();
    }
}

if (! function_exists('is_employeer')) {

    /**
     *
     */
    function is_employeer() {
        if (current_user()->is_employeer == 1){
            return true;
        } else if (current_user()->is_employeer ==0){
            return false;
        }
    }
}
