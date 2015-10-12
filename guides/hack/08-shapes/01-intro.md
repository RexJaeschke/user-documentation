# Shapes

**Under Construction**

A *shape* is ... *field* 

type aliasing needed

Shapes are a specific type alias representing a structured array, with a deterministic name and type of keys. They can be used as type annotations as well.nter file contents here


## Shape Literals

A *shape literal* creates an unnamed shape with fields having values as specified by a list of field-initializers. The order of the field-initializers in that list need not be the same as the order of the field specifiers in the shape type's definition. For example:

```hack
type Point = shape('x' => int, 'y' => int);

function createPoint(int $x = 0, int $y = 0): Point {
  return shape('y' => $y, 'x' => $x);
}
```

Note that the term *literal* as used with shapes is a misnomer; the expressions in the field initializers need not be compile-time constants.

xx
