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

if (!function_exists('getCategoryClasses')) {
    function getCategoryClasses(string $color): string
    {
        $colorVariants = [
            'red-50'    => 'text-red-700 border-red-600',
            'blue-50'   => 'text-blue-700 border-blue-600',
            'green-50'  => 'text-green-700 border-green-600',
            'yellow-50' => 'text-yellow-700 border-yellow-600',
            'purple-50' => 'text-purple-700 border-purple-600',
            'pink-50'   => 'text-pink-700 border-pink-600',
            'orange-50' => 'text-orange-700 border-orange-600',
            'cyan-50'   => 'text-cyan-700 border-cyan-600',
            'rose-50'   => 'text-rose-700 border-rose-600',
            'gray-50'   => 'text-gray-700 border-gray-600',
        ];

        return $colorVariants[$color] ?? 'text-gray-700 hover:bg-gray-100';
    }
}
