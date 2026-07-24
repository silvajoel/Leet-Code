<?php

class Solution{
    /**
     * @param Integer $x
     * @return Boolean
     */

    function isPalindrome($x) {
        // Números negativos não são palíndromos
        if ($x < 0) {
            return false;
        }

        $original = $x; // Copia o valor original
        $invertido = 0;

        while ($x > 0) {
            $invertido = ($invertido * 10) + ($x % 10);
            $x = (int) ($x / 10); // $x vai reduzindo até virar 0
        }

        // Compara o invertido com a cópia original
        return $invertido == $original;
    }
}

$x = 1213; // Exemplo de palíndromo
$solution = new Solution();
$result = $solution->isPalindrome($x);

echo $result ? "É palíndromo" : "Não é palíndromo";
