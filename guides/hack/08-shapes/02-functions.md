# Shape-Specific Functions

The abstract final class `Shapes` provides some static methods that can operate on a shape of any type. These methods are described below:

## `idx()`

```hack
21  public static function idx(S $shape, arraykey $index) : ?Tv; 
22  public static function idx(S $shape, arraykey $index, Tv $default) : Tv; 
```

This function searches shape `$shape` (whose type is designated here as `S`) for the field named `$index`. If the field exists, its value is returned; otherwise, a default value is returned. For a field of type *T*, the function returns a value of type `?`*T*. A default value `$default` can be provided; however, if that argument is omitted, the value `null` is used. `$index` must be a single-quoted string or a class constant of type `string` or `int`.

```hack
  $s = shape('x' => 10, 'y' => 20);
  $v = Shapes::idx($s, 'x');      // field exists, return 10
  $v = Shapes::idx($s, 'z');		  // field does not exist; return implict default, null
  $v = Shapes::idx($s, 'z', -99);	// field does not exist; return explicit default, -99

  $s = shape(C::KEYINTX => 10, C::KEYINTY => 20);
  $v = Shapes::idx($s, C::KEYINTY);	// field exists, return 20
```

## `keyExists()`

```hack
39   /** 
40    * Check if a field in shape exists. 
41    * Similar to array_key_exists, but for shapes. 
42    */ 
43   public static function keyExists(shape() $shape, arraykey $index): bool {} 
```

This function searches a given shape for a given field. If the field exists, `true` is returned; otherwise, `false` is returned.


```hack
```

**[[Rex: example discussion goes here]]**

## `removeKey()`

```hack
45   /** 
46    * Returns a $shape with $index field removed. Currently allowed only for 
47    * local variables. 
48    */ 
49   public static function removeKey(shape() $shape, arraykey $index): void {} 
```

Given a shape and a field name, this function removes the specified field. If the field specified does not exist, ...


```hack
```

**[[Rex: example discussion goes here]]**

## `toArray()`

```hack
51   public static function toArray(shape() $shape): array<arraykey, mixed>; 
```

This function returns an array of type `array<arraykey, mixed>` containing one element for each field in the shape. Each element's key and value are the name and value, respectively, of the corresponding field. The order of the elements is the same as the order of the fields.


```hack
```

**[[Rex: example discussion goes here]]**
