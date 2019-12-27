<?php

/**
 * Created by PhpStorm.
 * User: yangcongcong
 * Date: 2019/12/27
 * Time: 15:43
 */
class Solution3
{

    /**
     * @param String $s
     * @return Integer
     */
    //滑动窗口
    function lengthOfLongestSubstring($s)
    {

        $left = 0;
        $right = 0;
        $s_len = strlen($s);
        $temp = substr($s, $left, $right - $left + 1);
        $max = strlen($temp);

        while ($right < $s_len && $left < $s_len) {

            $right++;

            $curr_right_str = substr($s, $right, 1);

            $index = strpos($temp, $curr_right_str);

            if ($index !== false) {
                $left += $index + 1;
            }

            $temp = substr($s, $left, $right - $left + 1);
            $max = strlen($temp) > $max ? strlen($temp) : $max;
        }
        return $max;
    }
}

$m = new Solution3();
$r = $m->lengthOfLongestSubstring('abcdabd');
var_dump($r);