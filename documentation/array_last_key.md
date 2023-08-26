## Description

Get the last key from an array

If a callback is provided, then get the last key that causes the callback to return true.

```php
function array_last_key(array $array, callable $callback = null, mixed $default = null): mixed
```

## Parameters

**array**

The input array

**callback**

If provided, then each key is checked against the callback. The last to make it return true is returned.

**default**

If no key can be returned, then this value will be returned instead.

## Returns

The last key in the array or last item to match the callback or `$default` if no key is found.

## Examples

**Example # 1 Example uses of array_last_key() with an empty array**

```php
$array = [];
echo array_last_key($array);
```

The above example will output:

```
null
```

**Example # 2 an array with items**

```php
$array = ['a' => 1, 'b' => 2, 'c' => 3];
echo array_last_key($array);
```

The above example will output:

```
'c'
```

**Example # 3 an array with callback**

```php
$array = [1, 2, 3, 4, 5, 6, 7, 8, 9];
echo array_last_key($array, fn ($value) => $value <= 5);
```

The above example will output:

```
5
```