#Introduction

A *type alias* is a shorthand name for a (potentially long and complex) type. Once a type alias has been defined, it can be used in any context in which the associated type is permitted. Type aliaising is an abstraction mechanism.

Any given type can have multiple aliases, and a type alias can itself have aliases.

The type being aliased could be as simple as `int`, `string`, or a class type name, or as complicated as a map-like array, a tuple, or a shape. For example:

```Hack
newtype Point = (int, int);

function create_point(int $x, int $y): Point {
  return tuple($x, $y);
}

function distance(Point $p1, Point $p2): float {
  $dx = $p1[0] - $p2[0];
  $dy = $p1[1] - $p2[1];
  return sqrt($dx*$dx + $dy*$dy);
}
```

[[Rex: I don't want to duplicate the grammar here, but how can I point to it from here?]]






An alias created using `newtype` is an [*opaque type alias*](02-opaque.md). An alias created using `type` is a [*transparent type alias*](03-transparent.md).



