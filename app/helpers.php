<?php

function removeArabicDiacritics($text): string
{
    $remove = array('ِ', 'ُ', 'ٓ', 'ٰ', 'ْ', 'ٌ', 'ٍ', 'ً', 'ّ', 'َ');
    $text = str_replace($remove, '', $text);
    return trim($text);
}

function removeQuranicDiacritics($text): string
{
    $text = preg_replace('/[^\dء-ي- ]/ui', '', $text);
    $text = trim(str_replace('  ', ' ', $text));
    $text = str_replace(['ؤ', 'ئ', 'أ', 'إ', 'آ', 'ة'], ['ء', 'ء', 'ا', 'ا', 'ا', 'ت'], $text);
    return trim($text);
}

function escapeElasticReservedChars($string): array|string|null
{
    $regex = "/[\\+\\-\\=\\&\\|\\!\\(\\)\\{\\}\\[\\]\\^\\\"\\~\\*\\<\\>\\?\\:\\\\\\/]/";
    return preg_replace($regex, addslashes('\\$0'), $string);
}

function summary($str, $limit = 100, $strip = true): string
{
    $str = $strip ? strip_tags($str) : $str;

    if (strlen($str) > $limit) {
        $str = substr($str, 0, $limit - 3);
        return (substr($str, 0, strrpos($str, ' ')) . '...');
    }

    return trim($str);
}

function extension($file)
{
    if (str_contains($file, 'youtube')) {
        return 'youtube';
    }

    $path_parts = pathinfo($file);

    return $path_parts['extension'] ?? null;
}
