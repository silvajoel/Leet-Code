<?php

class Solution {
    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
       
        $tamanhoTotal = strlen($s); 
        $window = 0; // Início da janela
        $recorde = 0; 
        $map = [];
        
        // $i funciona como o FIM da janela
        for ($i = 0; $i < $tamanhoTotal; $i++) {
            $caracter = $s[$i];
            
            // Correção 3: Verifica se repetiu E se está dentro da janela atual
            if (isset($map[$caracter]) && $map[$caracter] >= $window) {
                // Move o início da janela para logo após a posição antiga da letra
                $window = $map[$caracter] + 1; 
            }
            
            // Correção 4: Salva a posição atual ($i) onde a letra foi vista
            $map[$caracter] = $i;

            // Correção 5: Tamanho atual é (Fim - Início + 1)
            $tamanhoAtual = $i - $window + 1;
            
            // Se o tamanho atual bateu o recorde, atualiza
            if ($tamanhoAtual > $recorde) {
                $recorde = $tamanhoAtual;
            }
        }
        
        return $recorde;
    }
}

// Teste do exemplo 1:
$solution = new Solution();
echo $solution->lengthOfLongestSubstring("abcabcbb"); // Saída correta: 3
