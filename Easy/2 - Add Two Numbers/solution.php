<?php

class ListNode
{
    public $val;
    public $next;

    public function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}

class Solution
{
    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    public function addTwoNumbers($l1, $l2)
    {
        $dummy = new ListNode();
        $current = $dummy;
        $carry = 0;

        while ($l1 !== null || $l2 !== null || $carry > 0) {
            $v1 = $l1 !== null ? $l1->val : 0;
            $v2 = $l2 !== null ? $l2->val : 0;

            $sum = $v1 + $v2 + $carry;
            $carry = intdiv($sum, 10);

            $current->next = new ListNode($sum % 10);
            $current = $current->next;

            $l1 = $l1 !== null ? $l1->next : null;
            $l2 = $l2 !== null ? $l2->next : null;
        }

        return $dummy->next;
    }
}

function createList(array $values)
{
    $dummy = new ListNode();
    $current = $dummy;

    foreach ($values as $value) {
        $current->next = new ListNode($value);
        $current = $current->next;
    }

    return $dummy->next;
}

function printList($node)
{
    while ($node !== null) {
        echo $node->val;

        if ($node->next !== null) {
            echo " -> ";
        }

        $node = $node->next;
    }

    echo PHP_EOL;
}

// Exemplo do LeetCode
$l1 = createList([2, 4, 3]);
$l2 = createList([5, 6, 4]);

$solution = new Solution();
$result = $solution->addTwoNumbers($l1, $l2);

echo "Resultado: ";
printList($result);