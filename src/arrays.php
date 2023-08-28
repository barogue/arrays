<?php

if (!function_exists('array_at')) {
    /**
     * Get the nth value from an array.
     *
     * @param array $array
     * @param int $index
     *
     * @return mixed
     */
    function array_at(array $array, int $index): mixed
    {
        if ($index < 0) {
            $index = count($array) + $index;
        }
        if ($index < 0 || $index >= count($array)) {
            return null;
        }
        return $array[array_keys($array)[$index]];
    }
}

if (!function_exists('array_deflate')) {
    /**
     * Flattens a nested array into a single level array.
     *
     * By default, it will keep the keys but use a dot notation to indicate depth.
     *
     * @param array $array
     * @param bool $keys
     *
     * @return array
     */
    function array_deflate(array $array, bool $keys = true): array
    {
        $results = [];
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                foreach (array_deflate($value) as $k => $v) {
                    $results[$key.'.'.$k] = $v;
                }
            } else {
                $results[$key] = $value;
            }
        }
        return $keys ? $results : array_values($results);
    }
}

if (!function_exists('array_except')) {
    /**
     * Return a subset of the array by passing in an array of keys to discard
     *
     * @param array $array
     * @param array $keys
     *
     * @return array
     */
    function array_except(array $array, array $keys): array
    {
        return array_diff_key($array, array_flip($keys));
    }
}

if (!function_exists('array_exists')) {
    /**
     * Determine if a key exists in an array using dot notation for nested sets
     *
     * @param array $array
     * @param int|string $key
     *
     * @return bool
     *
     * @see array_key_exists()
     * @link https://www.php.net/manual/en/function.array-key-exists.php
     */
    function array_exists(array $array, int|string $key): bool
    {
        foreach (explode('.', $key) as $key) {
            if (!is_array($array) || !array_key_exists($key, $array)) {
                return false;
            }
            $array = &$array[$key];
        }
        return true;
    }
}

if (!function_exists('array_first')) {
    /**
     * Get the first value from an array
     *
     * If a callback is provided, then returns the first value that causes the callback to return true
     *
     * @param array $array
     * @param callable|null $callback
     * @param mixed|null $default
     *
     * @return mixed
     */
    function array_first(array $array, callable $callback = null, mixed $default = null): mixed
    {
        if (empty($array)) {
            return $default;
        }

        if ($callback === null) {
            foreach ($array as $item) {
                return $item;
            }
        }

        foreach ($array as $key => $value) {
            if ($callback($value, $key)) {
                return $value;
            }
        }

        return $default;
    }
}

if (!function_exists('array_first_key')) {
    /**
     * Get the first key from an array
     *
     * If a callback is provided, then returns the first key that causes the callback to return true
     *
     * @param array $array
     * @param callable|null $callback
     * @param mixed|null $default
     *
     * @return mixed
     */
    function array_first_key(array $array, callable $callback = null, mixed $default = null): mixed
    {
        if (empty($array)) {
            return $default;
        }

        if ($callback === null) {
            foreach ($array as $key => $item) {
                return $key;
            }
        }

        foreach ($array as $key => $value) {
            if ($callback($value, $key)) {
                return $key;
            }
        }

        return $default;
    }
}

if (!function_exists('array_get')) {
    /**
     * Get a value from the array using dot notation for nested sets
     *
     * @param array $array
     * @param string $key
     * @param mixed|null $default
     *
     * @return mixed
     */
    function array_get(array $array, string $key, mixed $default = null): mixed
    {
        foreach (explode('.', $key) as $key) {
            if (!isset($array[$key])) {
                return $default;
            }
            $array = &$array[$key];
        }
        return $array;
    }
}

if (!function_exists('array_inflate')) {
    /**
     * Expands a flattened array back into a nested array.
     *
     * This will not work on flattened arrays where the keys were not kept.
     *
     * @param array $array
     *
     * @return array
     */
    function array_inflate(array $array): array
    {
        $results = [];
        foreach ($array as $key => $value) {
            array_set($results, $key, $value);
        }
        return $results;
    }
}

if (!function_exists('array_join')) {
    /**
     * Join the elements of the array together as a string connected by a substring.
     *
     * An optional second parameter can be used as a final string
     *
     * @param array $array
     * @param string $glue
     * @param string|null $finalGlue
     *
     * @return string
     */
    function array_join(array $array, string $glue = '', string $finalGlue = null): string
    {
        if ($finalGlue === null || count($array) <= 1) {
            return implode($glue, $array);
        }
        $last = array_pop($array);
        return implode($glue, $array).$finalGlue.$last;
    }
}

if (!function_exists('array_key_at')) {
    /**
     * Get the nth key from an array.
     *
     * @param array $array
     * @param int $index
     *
     * @return int|string|null
     */
    function array_key_at(array $array, int $index): int|string|null
    {
        if ($index < 0) {
            $index = count($array) + $index;
        }
        return array_keys($array)[$index] ?? null;
    }
}

if (!function_exists('array_last')) {
    /**
     * Get the last value from an array
     *
     * If a callback is provided, then returns the last value that causes the callback to return true
     *
     * @param array $array
     * @param callable|null $callback
     * @param mixed|null $default
     *
     * @return mixed
     */
    function array_last(array $array, callable $callback = null, mixed $default = null): mixed
    {
        if (empty($array)) {
            return $default;
        }

        $reversedArray = array_reverse($array, true);

        if ($callback === null) {
            foreach ($reversedArray as $item) {
                return $item;
            }
        }

        foreach ($reversedArray as $key => $value) {
            if ($callback($value, $key)) {
                return $value;
            }
        }

        return $default;
    }
}

if (!function_exists('array_last_key')) {
    /**
     * Get the last key from an array
     *
     * If a callback is provided, then returns the last key that causes the callback to return true
     *
     * @param array $array
     * @param callable|null $callback
     * @param mixed|null $default
     *
     * @return mixed
     */
    function array_last_key(array $array, callable $callback = null, mixed $default = null): mixed
    {
        if (empty($array)) {
            return $default;
        }

        $reversedArray = array_reverse($array, true);

        if ($callback === null) {
            foreach ($reversedArray as $key => $item) {
                return $key;
            }
        }

        foreach ($reversedArray as $key => $value) {
            if ($callback($value, $key)) {
                return $key;
            }
        }

        return $default;
    }
}

if (!function_exists('array_only')) {
    /**
     * Return a subset of the array by passing in an array of keys to keep
     *
     * @param array $array
     * @param array $keys
     *
     * @return array
     */
    function array_only(array $array, array $keys): array
    {
        return array_intersect_key($array, array_flip($keys));
    }
}

if (!function_exists('array_pop_many')) {
    /**
     * Pop multiple elements off the end of array
     *
     * If number of elements is less than 1, then the method will return null.
     *
     * For each element being popped off, it's value will be added to the return array. If the array is empty at the time, the returned value will be null.
     *
     * @param array &$array
     * @param int $elements
     *
     * @return array|null
     */
    function array_pop_many(array &$array, int $elements): ?array
    {
        if ($elements <= 0) {
            return null;
        }
        $results = [];
        for ($i = 0; $i < $elements; $i++) {
            $results[] = array_pop($array);
        }
        return $results;
    }
}

if (!function_exists('array_pull')) {
    /**
     * Return and remove a value from the array using dot notation for nested sets
     *
     * @param array &$array
     * @param string $key
     *
     * @return mixed
     */
    function array_pull(array &$array, string $key): mixed
    {
        $keys = explode('.', $key);
        $final = array_pop($keys);
        foreach ($keys as $key) {
            if (!isset($array[$key])) {
                return null;
            }
            $array = &$array[$key];
        }
        $value = $array[$final] ?? null;
        unset($array[$final]);
        return $value;
    }
}

if (!function_exists('array_random')) {
    /**
     * Picks one or more random entries out of an array, and returns the value (or values) of the random entries.
     *
     * @param array $array
     * @param int $num
     *
     * @return mixed|array
     */
    function array_random(array $array, int $num = 1): mixed
    {
        $key = empty($array) || $num > count($array) ? null : @array_rand($array, $num);
        if ($key === null) {
            return null;
        }
        if (is_array($key)) {
            return array_only($array, $key);
        }
        return $array[$key];
    }
}

if (!function_exists('array_set')) {
    /**
     * Set a value in the array using dot notation for nested sets
     *
     * @param array &$array
     * @param string $key
     * @param mixed $value
     *
     * @return void
     */
    function array_set(array &$array, string $key, mixed $value)
    {
        foreach (explode('.', $key) as $key) {
            $array = &$array[$key];
        }
        $array = $value;
    }
}

if (!function_exists('array_shuffle')) {
    /**
     * Shuffle an array while optionally keeping the keys intact
     *
     * @param array $array
     * @param bool $keepKeys
     *
     * @return array
     */
    function array_shuffle(array $array, bool $keepKeys = true): array
    {
        if (!$keepKeys) {
            shuffle($array);
            return $array;
        }
        $keys = array_keys($array);
        shuffle($keys);
        $result = [];
        foreach ($keys as $key) {
            $result[$key] = $array[$key];
        }
        return $result;
    }
}

if (!function_exists('array_unset')) {
    /**
     * Remove a value from the array using dot notation for nested sets
     *
     * @param array &$array
     * @param string $key
     *
     * @return void
     */
    function array_unset(array &$array, string $key)
    {
        $keys = explode('.', $key);
        $final = array_pop($keys);
        foreach ($keys as $key) {
            if (!isset($array[$key])) {
                return;
            }
            $array = &$array[$key];
        }
        unset($array[$final]);
    }
}
