# Introduction

A *shape* consists of a group of zero or more data *field*s taken together as a whole. For example:

```hack
shape('x' => int, 'y' => int)
```

The definition of a shape contains an ordered set of fields each of which has a name and a type. In this case, the shape consists of two `int` fields, with the names `'x'` and `'y'`, respectively.

Although we can use a shape type directly, oftentimes it is convenient to create an alias, such as the name `Point` below, and use that instead.

```hack
type Point = shape('x' => int, 'y' => int);
function f(Point $p1): void { /* ... */ }

class C1 {
  private Point $origin;
  private function __construct(int $x = 0, int $y = 0) {
    $this->origin = shape('x' => $x, 'y' => $y);
  }
}
```
A field in a shape is accessed using its name as the key in a subscript-expression that operates on a shape of the corresponding shape type. For example:

```hack
function distance_between_2_Points(Point $p1, Point $p2): float {
  $dx = $p1['x'] - $p2['x'];
  $dy = $p1['y'] - $p2['y'];
  return sqrt($dx*$dx + $dy*$dy);
}
```

The name of a field can be written in one of two possible forms:

  * A single-quoted string (as shown above)
  * A class constant of type `string` or `int` 

Note that an integer literal **cannot** be used directly as a field name.

The names of all fields in a given shape definition must be distinct and have the same form.

The following example shows how class constants can be used:

````hack
class C2 {
  const string KEYA = 'x';
  const string KEYB = 'y';
  const int KEYX = 10;
  const int KEYY = 23;
}

type Point2 = shape(C2::KEYA => int, C2::KEYB => int);

type Point3 = shape(C2::KEYX => int, C2::KEYY => int);
```
In the case of the integer class constants, by arbitrary choice, the x-coordinate is stored in the element with key 10, while the y-coordinate is stored in the element with key 23.
