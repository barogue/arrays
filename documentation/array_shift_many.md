## Description

Shift multiple elements off the beginning of an array

```php
array_shift_many(array $array, int $elements): array|null
```

## Parameters

**array**

The input array

**elements**

The number of elements to shift off of the array


## Examples

**Example # 1 Example uses of array_shift_many()**

```php
$array = [1, 2, 3, 4, 5]
$shiftped = array_shift_many($array, 3);
print_r($array);
print_r($shiftped);
```

The above example will output:

```
Array
(
    4
    5
)
Array
(
    1
    2
    3
)
```