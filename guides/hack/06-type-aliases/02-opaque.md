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

Here then is some code that creates and uses some Points:

```Hack
// TestPoint.php - User code that tests type Point

require_once 'Point.php';

function main(): void {
  $p1 = createPoint(5, 3);
  $p2 = createPoint(9, -5);
  $dist = distance_between_2_Points($p1, $p2);
  echo "distance between points is " . $dist ."\n";
}

main();
```

Being in the same file as the alias definition, function `createPoint` and friends have---and need---direct access to the integer fields in any Point's tuple. However, any file that includes this file does not.

##Aliases with Type Constraints

Consider a file that containins the following opaque type definition:

```Hack
newtype Counter = int;
```

Any file that includes this file has no knowledge that a Counter is really an integer, so that the including file cannot perform any integer-like operations on that type. This is a major limitation, as the supposedly well-chosen name for the abstract type, Counter, suggests that its value could increase and/or decrease. We can "fix" this by adding a type constraint to the alias's definition, as follows:

```Hack
newtype Counter as int = int;
```

The presence of the type constraint allows the opaque type to be treated as if it had the type specified by the type constraint, which removes some of the alias's opaqueness. Note, that although the presence of a constraint allows the alias type to be converted implicitly to the constraint type, no conversion is defined in the opposite direction. Specifically, the following is prohibited:

```Hack
Counter c = 0;    // Prohibited, as there is no implicit conversion from int (the type of 0) to Counter
```

The lesson here is to not get carried away inventing your own custom-name set of types, just for the sake of being cute!

A type constraint must be a subtype of the type being aliased.
