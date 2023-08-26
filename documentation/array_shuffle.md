## Description

Shuffle an array, with an option to maintain keys or not

```php
array_shuffle(array $array, bool $keepKeys): array
```

## Parameters

**array**

The input array

**keepKeys**

Keep the keys intact or not.

## Examples

**Example # 1 Example uses of array_shuffle() while keeping keys**

```php
$array = ['a' => 1, 'b' => 2, , 'c' => 3];
$shuffled = array_shuffle($array, true);
print_r($array);
```

The above example may output:

```
Array
(
    [b] => 2
    [c] => 3
    [a] => 1
)
```

**Example # 2 Example uses of array_shuffle() while not keeping keys. Identical to `shuffle()`**

```php
$array = ['a' => 1, 'b' => 2, , 'c' => 3];
$shuffled = array_shuffle($array, false);
print_r($array);
```

The above example may output:

```
Array
(
    0 => 2
    1 => 3
    2 => 1
)

```