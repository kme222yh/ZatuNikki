<?php

use Illuminate\Support\Facades\Auth;


if(!function_exists('url2aTag')){
    function url2aTag($str){
        $pattern = '/((?:https?|ftp):\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)/';
        $replace = '<a href="$1" target="_blank">$1</a>';
        return preg_replace($pattern, $replace, $str);
    }
}
