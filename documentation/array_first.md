## Description

Get the first item from an array

If a callback is provided, then get the first value that causes the callback to return true.

```php
function array_first(array $array, callable $callback = null, mixed $default = null): mixed
```

## Parameters

**array**

The input array

**callback**

If provided, then each item is checked against the callback. The first to make it return true is returned.

**default**

If no value can be returned, then this value will be returned instead.

## Returns

The first item in the array or first item to match the callback or `$default` if no value is found.

## Examples

**Example # 1 Example uses of array_first() with an empty array**

```php
$array = [];
echo array_first($array);
```

The above example will output:

```
null
```

**Example # 2 an array with items**

```php
$array = ['a' => 1, 2, 3];
echo array_first($array);
```

The above example will output:

```
1
```

**Example # 3 an array with callback**

```php
$array = [1, 2, 3, 4, 5, 6, 7, 8, 9];
echo array_first($array, fn ($value) => $value >= 5);
```

The above example will output:

```
5
```