<?php

class Solution {
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function Two_Sum($nums, $target) {
        $map = [];

        foreach ($nums as $index => $num) {

            // Check how much further you are from reaching the target.
            $complement = $target - $num;

            // If the complement already exists, return the two indices.
            if (array_key_exists($complement, $map)) {
                return [$map[$complement], $index];
            }

            // Save the current number and its index.
            $map[$num] = $index;
        }

        return [];
    }
}

$nums = [2,7,11,15];
$target = 9;

// Create an object of the class
$solution = new Solution();

// Call the method
$result = $solution->Two_Sum($nums, $target);

// Print the result
print_r($result);