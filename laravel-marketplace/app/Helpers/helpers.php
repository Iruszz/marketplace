<?php

if (!function_exists('getRandomTailwindColor')) {
    function getRandomTailwindColor(): string
    {
        $tailwindColors = [
            'red-50', 'blue-50', 'green-50', 'yellow-50', 'purple-50',
            'pink-50', 'orange-50', 'cyan-50', 'rose-50', 'gray-50',
        ];

        return $tailwindColors[array_rand($tailwindColors)];
    }
}

if (!function_exists('BadgeColor')) {
    function BadgeColor(string $color): array
    {
        [$name, $tone] = explode('-', $color);

        $textColor = "{$name}-" . (intval($tone) + 650);

        return [
            'text' => $textColor,
        ];
    }
}
