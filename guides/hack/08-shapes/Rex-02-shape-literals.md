# Shape Literals

A *shape literal* creates an unnamed shape with fields having values as specified by a list of field-initializers. The order of the field-initializers in that list need not be the same as the order of the field specifiers in the shape type's definition. For example:

```hack
type Point = shape('x' => int, 'y' => int);

function createPoint(int $x = 0, int $y = 0): Point {
  return shape('y' => $y, 'x' => $x);
}
```

A shape literal must initialize all the the fields in the shape.

Note that the term *literal* as used with shapes is a misnomer; the expressions in the field initializers need not be compile-time constants.

**[[Rex: CHECK THIS: If the shape literal is made up entirely of literals, it can be used in function default values (and class field initialiers), as follows:]]**

```hack
class CY {
  private Point $p1 = shape('x' => 0, 'y' => 5);
}
```
