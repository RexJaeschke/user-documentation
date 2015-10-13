# Shape-Specific Functions

Every shape has available to it a series of static functions, defined in the abstract final class `Shape`. These functions are described below:

**[[Rex: Run my tests/examples and fill in the details below.]]**

## `idx()`

```hack
12 abstract final class Shapes { 
13 
14 /** 
15  * Shapes::idx is a helper function for accessing shape field value, or getting 
16  * a default if it's not set - similar to idx(), but for shapes. 
17  * 
18  * This behavior cannot be expressed with type hints, so it's hardcoded in the 
19  * typechecker. Depending on arity, it will be one of the 
20  * 
21  * idx(S $shape, arraykey $index) : ?Tv, 
22  * idx(S $shape, arraykey $index, Tv $default) : Tv, 
23  * 
24  * where $index must be statically known (literal or class constant), and S is 
25  * a shape containing such key: 
26  * 
27  * type S = shape( 
28  *   ... 
29  *   $index => Tv, 
30  *   ... 
31  * ) 
32  */ 
33   public static function idx( 
34     shape() $shape, 
35     arraykey $index, 
36     $default = null, 
37   ) {} 
38 
```

This function searches a given shape for a given field. If the field exists, its value is returned; otherwise, a default value is returned. For a field of type *T*, the function returns a value of type `?`*T*. A default value can be provided; however, if that argument is omitted, the value `null` is used.

**[[Rex: example goes here]]**

**[[Rex: example discussion goes here]]**

## `keyExists()`

```hack
39   /** 
40    * Check if a field in shape exists. 
41    * Similar to array_key_exists, but for shapes. 
42    */ 
43   public static function keyExists(shape() $shape, arraykey $index): bool {} 
```

This function searches a given shape for a given field. If the field exists, `true` is returned; otherwise, `false` is returned.

**[[Rex: example goes here]]**

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

**[[Rex: example goes here]]**

**[[Rex: example discussion goes here]]**

## `toArray()`

```hack
51   public static function toArray(shape() $shape): array<arraykey, mixed>; 
```

This function returns an array of type `array<arraykey, mixed>` containing one element for each field in the shape. Each element's key and value are the name and value, respectively, of the corresponding field. The order of the elements is the same as the order of the fields.

**[[Rex: example goes here]]**

**[[Rex: example discussion goes here]]**
