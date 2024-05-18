<?php
function count_vowels($word) {
    return preg_match_all('/[aeiou]/i', $word, $matches);
}

function reverse_vowels($word) {
    $vowels = implode(array_filter(str_split($word), function ($c) {
        return preg_match('/[aeiou]/i', $c);
    }));

    $v = 0;
    $reverse = implode(array_map(function ($i) use ($word, $vowels, &$v) {
        $is_vowel = preg_match('/[aeiou]/i', $word[$i]);
        return $is_vowel ? $vowels[strlen($vowels) - 1 - $v++] : $word[$i];
    }, array_keys(str_split($word))));

    return $reverse;
}

$strings = ["Hello", "World", "PHP", "Programming"];

foreach ($strings as $string) {
    $vowelCount = count_vowels($string);
    $reversedString = reverse_vowels($string);

    echo "Original string: $string\n";
    echo "Vowel count: $vowelCount\n";
    echo "Reversed string: $reversedString\n\n";
}
