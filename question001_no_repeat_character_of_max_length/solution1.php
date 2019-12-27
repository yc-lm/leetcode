<?php
/**
 * Created by PhpStorm.
 * User: yangcongcong
 * Date: 2019/12/27
 * Time: 11:20
 */
class Solution1 {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        $len = 0;
        $temp_str = '';
        $s_len = strlen($s);

        for ($i=0;$i<$s_len;$i++){
            $str = substr($s,$i,1);
            $index = strpos($temp_str,$str);
            if($index !== false){
                $temp_str .=$str;
                $temp_str = substr($temp_str,$index+1);
            }else{
                $temp_str .=$str;
            }
            $len = strlen($temp_str) > $len ? strlen($temp_str) : $len;
        }
        return $len;
    }
}