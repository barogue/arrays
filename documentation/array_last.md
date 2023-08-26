## Description

Get the last item from an array

If a callback is provided, then get the last value that causes the callback to return true.

```php
function array_last(array $array, callable $callback = null, mixed $default = null): mixed
```

## Parameters

**array**

The input array

**callback**

If provided, then each item is checked against the callback. The last to make it return true is returned.

**default**

If no value can be returned, then this value will be returned instead.

## Returns

The last item in the array or last item to match the callback or `$default` if no value is found.

## Examples

**Example # 1 Example uses of array_last() with an empty array**

```php
$array = [];
echo array_last($array);
```

The above example will output:

```
null
```

**Example # 2 an array with items**

```php
$array = ['a' => 1, 2, 3];
echo array_last($array);
```

The above example will output:

```
3
```

**Example # 3 an array with callback**

```php
$array = [1, 2, 3, 4, 5, 6, 7, 8, 9];
echo array_last($array, fn ($value) => $value <= 5);
```

The above example will output:

```
5
```