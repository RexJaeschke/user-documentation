# Shape Literals

A *shape literal* creates an unnamed shape with fields having values as specified by a list of field-initializers. The order of the field-initializers in that list need not be the same as the order of the field specifiers in the shape type's definition. For example:

```hack
type Point = shape('x' => int, 'y' => int);

function createPoint(int $x = 0, int $y = 0): Point {
  return shape('y' => $y, 'x' => $x);
}
```

A shape literal must initialize all the the fields in the shape.

Note that the term *literal* as used with shapes is a misnomer; the expressions in the field initializers need not be compile-time constants. And even if all the initializers are constant expressions, the resulting shape literal itself is not, so it cannot be used in contexts where such expressions are required.

```hack
type Point = shape('x' => int, 'y' => int);

class C {
  const Point ORIGIN = shape('x' => 0, 'y' => 0);        // initializer rejected
  private static Point $p2 = shape('x' => 0, 'y' => 5);  // initializer okay
  private Point $p3 = shape('x' => 0, 'y' => 5);         // initializer okay
}
```
