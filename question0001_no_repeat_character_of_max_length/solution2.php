<?php

/**
 * Created by PhpStorm.
 * User: yangcongcong
 * Date: 2019/12/27
 * Time: 11:22
 */
class Solution2
{

    /**
     * @param String $s
     * @return Integer
     */
    //暴力法
    function lengthOfLongestSubstring($s)
    {
        $len = strlen($s);
        $max = 0;
        for ($i = 0; $i < $len; $i++) {

            for ($j = $i; $j < $len; $j++) {
                $sub = substr($s, $i, $j - $i + 1);
                $sub_len = strlen($sub);
                $temp = [];
                $check = false;
                for ($m = 0; $m < $sub_len; $m++) {
                    $sub_s = substr($sub, $m, 1);
                    if (isset($temp[$sub_s])) {
                        $check = true;
                        break;
                    } else {
                        $temp[$sub_s] = 1;
                    }
                }
                if ($check) {
                    break;
                } else {
                    $max = $sub_len > $max ? $sub_len : $max;
                }
            }
        }
        return $max;
    }
}