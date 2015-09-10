#Opaque Type Aliases

An *opaque type alias* is created using `newtype`. Unlike with [Transparent Type Aliases](03-transparent.md), with care in organizing source code, the compiler can make sure that general-purpose code cannot access an opaque alias's underlying type directly.

##Aliases without Type Constraints

Each opaque alias type is distinct from its underlying type and from any other types aliasing it or its underlying type. Only source code in the file that contains the definition of the opaque type alias is allowed access to the underlying implementation. 

Consider a file, Point.php, that contains an opaque alias definition for a 2D point type and a number of function primitives:

```Hack
// Point.php - Point implementation file

newtype Point = (int, int);

function createPoint(int $x, int $y): Point {
  return tuple($x, $y);
}

function setX(Point $p, int $x): void {   // ***** test this, 'cos if passed by value won't work
  $p[0] = $x;
}

function setY(Point $p, int $y): void {
  $p[1] = $y;
}

function getX(Point $p): int {
  return $p[0];
}

function getY(Point $p): int {
  return $p[1];
}
```

Only those functions that need to know `Point`'s underlying structure should be defined in the Point implementation file. All general-purpose functions that support the `Point` type can reside in something like PointFunctions.php, as shown below:

```Hack
// PointFunctions.php - Point's supporting functions

require_once 'Point.php';

function distance_between_2_Points(Point $p1, Point $p2): float {
  $dx = getX($p1) - getX($p2);
  $dy = getY($p1) - getY($p2);
  return sqrt($dx*$dx + $dy*$dy);
}
```

```Hack
// TestPoint.php - User code that test type Point

require_once 'Point.php';

function main(): void {
  $p1 = createPoint(5, 3);
  $p2 = createPoint(9, -5);
  $dist = distance_between_2_Points($p1, $p2);
  echo "distance between points is " . $dist ."\n";
}

main();
```

Being in the same file as the alias definition, function createPoint and friends have---and need---direct access to the integer fields in any Point's tuple. However, any file that includes this file does not.

##Aliases with Type Constraints

??????

Similarly, if a file defines the following alias:
newtype Counter = int;
any file that includes this file has no knowledge that a Counter is really an integer, so that the including file cannot perform any integer-like operations on a Widget.

The presence of a type-constraint allows an opaque type alias to be treated as if it had the type specified by type-constraint-type, which removes some of the alias's opaqueness. Note: Although the presence of a constraint allows the alias type to be converted implicitly to that constraint type, there is no conversion in the opposite direction.
