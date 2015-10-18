# Introduction

A *shape* consists of a group of zero or more data *field*s taken together as a whole. [It takes on the role of what C and C# call a *struct*.] Such a construct is sometimes referred to as a *lightweight class*. For example:

```hack
shape('x' => int, 'y' => int)
```

The definition of a shape contains an ordered set of fields each of which has a name and a type. In this case, the shape consists of two `int` fields, with the names `'x'` and `'y'`, respectively.

Although we can use a shape type directly, oftentimes it is convenient to create an alias, such as the name `Point` below, and use that instead.

```hack
type Point = shape('x' => int, 'y' => int);
function f(Point $p1): void { /* ... */ }

class C {
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

The name of a field can be written in one of three possible forms:

  * A single-quoted string (as shown above)
  * An integer literal
  * A class constant of type `int` or `string`

The names of all fields in a given shape definition must be distinct and have the same form.

**[[Rex: Re int literal usage, re-run my original test, as back then, I couldn't get the compiler to accept these]]**

The following example shows how class constants can be used:

````hack
class C1 {
  const string KEYA = 'x';
  const string KEYB = 'y';
  // ...
}

type Point = shape(C1::KEYA => int, C1::KEYB => int);
```
