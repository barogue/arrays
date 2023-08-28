## Description

Pop multiple elements off the end of an array

```php
array_pop_many(array $array, int $elements): array|null
```

## Parameters

**array**

The input array

**elements**

The number of elements to pop off of the array


## Examples

**Example # 1 Example uses of array_pop_many()**

```php
$array = [1, 2, 3, 4, 5]
$popped = array_pop_many($array, 3);
print_r($array);
print_r($popped);
```

The above example will output:

```
Array
(
    1
    2
)
Array
(
    3
    4
    5
)
```