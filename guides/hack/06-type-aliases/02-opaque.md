#Opaque Type Aliases

An *opaque type alias* is created using `newtype`. Unlike with [Transparent Type Aliases](03-transparent.md), the compiler can make sure that code cannot access an opaque alias's underlying type directly.

##Aliases without Type Constraints

Each opaque alias type is distinct from its underlying type and from any other types aliasing it or its underlying type. Only source code in the file that contains the definition of the opaque type alias is allowed access to the underlying implementation. 

Consider a file that contains the following, an opaque alias definition and several function definitions:

```Hack
newtype Point = (int, int);

function create_point(int $x, int $y): Point {
  return tuple($x, $y);
}

function distance_between_2_Points(Point $p1, Point $p2): float {
  $dx = $p1[0] - $p2[0];
  $dy = $p1[1] - $p2[1];
  return sqrt($dx*$dx + $dy*$dy);
}
```

Being in the same file as the alias definition, the functions create_point and distance have direct access to the integer fields in any Point's tuple. However, any file that includes this file does not.




##Aliases with Type Constraints

??????

Similarly, if a file defines the following alias:
newtype Widget = int;
any file that includes this file has no knowledge that a Widget is really an integer, so that the including file cannot perform any integer-like operations on a Widget.

The presence of a type-constraint allows an opaque type alias to be treated as if it had the type specified by type-constraint-type, which removes some of the alias's opaqueness. Note: Although the presence of a constraint allows the alias type to be converted implicitly to that constraint type, there is no conversion in the opposite direction.
