Document Shapes::toArray(), Shapes::idx(), etc...

From https://github.com/facebook/hhvm/blob/master/hphp/hack/hhi/Shapes.hhi 

```hack
1 <?hh // decl 
2 /** 
3  * Copyright (c) 2014, Facebook, Inc. 
4  * All rights reserved. 
5  * 
6  * This source code is licensed under the BSD-style license found in the 
7  * LICENSE file in the "hack" directory of this source tree. An additional grant 
8  * of patent rights can be found in the PATENTS file in the same directory. 
9  * 
10  */ 
11 
 
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
 
39   /** 
40    * Check if a field in shape exists. 
41    * Similar to array_key_exists, but for shapes. 
42    */ 
43   public static function keyExists(shape() $shape, arraykey $index): bool {} 
44 
 
45   /** 
46    * Returns a $shape with $index field removed. Currently allowed only for 
47    * local variables. 
48    */ 
49   public static function removeKey(shape() $shape, arraykey $index): void {} 
50 
 
51   public static function toArray(shape() $shape): array<arraykey, mixed>; 
52 } 
```
