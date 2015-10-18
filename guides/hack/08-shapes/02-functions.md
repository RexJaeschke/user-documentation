# Shape-Specific Methods

The abstract final class `Shapes` provides some static methods that can operate on a shape of any type. These methods are described below:

## `idx()`

```hack
public static function idx(S $shape, arraykey $index) : ?Tv; 
public static function idx(S $shape, arraykey $index, Tv $default) : Tv; 
```

This method searches shape `$shape` (whose type is designated here as `S`) for the field named `$index`. If the field exists, its value is returned; otherwise, a default value is returned. For a field of type *T*, the function returns a value of type `?`*T*. A default value `$default` can be provided; however, if that argument is omitted, the value `null` is used. `$index` must be a single-quoted string or a class constant of type `string` or `int`.

```hack
  $s = shape('x' => 10, 'y' => 20);
  $v = Shapes::idx($s, 'x');      // field exists, return 10
  $v = Shapes::idx($s, 'z');		  // field does not exist; return implict default, null
  $v = Shapes::idx($s, 'z', -99);	// field does not exist; return explicit default, -99
```

## `keyExists()`

```hack
public static function keyExists(S $shape, arraykey $index): bool; 
```

This method searches shape `$shape` (whose type is designated here as `S`) for the field named `$index`. If the field exists, `true` is returned; otherwise, `false` is returned. `$index` must be a single-quoted string or a class constant of type `string` or `int`.

```hack
$s = shape('id' => "23456", 'url' => "www.example.com", 'count' => 23);
$v = Shapes::keyExists($s, 'url');		// field exists, return true
$v = Shapes::keyExists($s, 'name');		// does not exist, return false
```

## `removeKey()`

```hack
public static function removeKey(S $shape, arraykey $index): void; 
```

Given a shape `$shape` (whose type is designated here as `S`) and a field name `$index`, this method removes the specified field from that shape. If the field specified does not exist, the removal request is ignored. `$index` must be a single-quoted string or a class constant of type `string` or `int`.

```hack
$s = shape();
Shapes::removeKey($s, 'name');	// no such field, so request ignored

$s = shape('x' => 10, 'y' => 20);
Shapes::removeKey($s, 'x');   	// field 'x' removed

$s = shape('id' => "23456", 'url' => "www.example.com", 'count' => 23);
Shapes::removeKey($s, 'url');		// field 'url' removed
```

## `toArray()`

```hack
public static function toArray(S $shape): array<arraykey, mixed>; 
```

This method returns an array of type `array<arraykey, mixed>` containing one element for each field in the shape `$shape`. Each element's key and value are the name and value, respectively, of the corresponding field. The order of the elements in the array is the same as the order in which the fields were inserted into the shape.

```hack
$s = shape();
$a = Shapes::toArray($s);   // returns an array of 0 elements

$s = shape('id' => "23456", 'url' => "www.example.com", 'count' => 23);
$a = Shapes::toArray($s);   // returns an array of 3 elements, of type string, string, and int, respectively
```
