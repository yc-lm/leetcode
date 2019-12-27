<?php
/**
 * Created by PhpStorm.
 * User: yangcongcong
 * Date: 2019/12/27
 * Time: 11:33
 */

class Solution1
{

    /**
     * @param String $s
     * @param String $sub
     * @return string
     */
    function minCoverSubString($s, $sub)
    {

        $left = 0;
        $right = -1;
        $s_len = strlen($s);
        $sub_len = strlen($sub);
        $sub_count = [];
        $curr_count = 0;
        $min_len = 0;
        $min_start = 0;

        for ($i = 0; $i < $sub_len; $i++) {
            $sub_str = substr($sub, $i, 1);
            if (isset($sub_count[$sub_str])) {
                $sub_count[$sub_str] += 1;
            } else {
                $sub_count[$sub_str] = 1;
            }
        }

        while ($right < $s_len && $left < $s_len) {

            if ($curr_count < $sub_len) {
                $right++;

                if ($right >= $s_len) {
                    break;
                }

                $curr_right_str = substr($s, $right, 1);

                if (isset($sub_count[$curr_right_str])) {

                    if ($sub_count[$curr_right_str] > 0) {
                        $curr_count++;
                    }

                    $sub_count[$curr_right_str] -= 1;
                }
            } elseif ($curr_count == $sub_len) {
                //记录匹配的区间
                if ($right - $left + 1 < $min_len || $min_len == 0) {
                    $min_len = $right - $left + 1;
                    $min_start = $left;
                }


                $curr_left_str = substr($s, $left, 1);

                if (isset($sub_count[$curr_left_str])) {

                    if ($sub_count[$curr_left_str] >= 0) {
                        $curr_count--;
                    }
                    $sub_count[$curr_left_str] += 1;
                }
                $left++;
            }
        }

        return $min_len > 0 ? substr($s, $min_start, $min_len) : "";

    }
}

$m = new Solution1();
$a = $m->minCoverSubString('adobecodebanc', 'abc');
var_dump($a);


