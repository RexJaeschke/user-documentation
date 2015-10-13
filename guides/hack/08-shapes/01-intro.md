# Introduction

**Under Construction**

A *shape* consists of a group of zero or more data *field*s taken together as a whole. [It takes on the role of what C and C# call a *struct*.] Such a construct is sometimes referred to as a *lightweight class*. For example:

```hack
shape('x' => int, 'y' => int);
```

The definition of a shape contains an ordered set of fields each of which has a name and a type. In this case, the shape consists of two `int` fields, with the names `'x'` and `'y'`, respectively.

However, such a construct does not directly define a first-class type. Specifically, such a type **cannot** be used as a type-specifier (in any of the usual places such as in the type of a property, a function parameter, a function return, or a constraint). Instead, a shape definition can only be used as a type-to-be-aliased in an type-alias declaration. For example, the following use is not permitted:

```hack
function f1(shape('x' => int, 'y' => int) $p1): void { … }  // DISALLLOWED
```

To use a shape type, we must first create an alias, such as the name `Point` below. Once that is done, the alias name can be used in any context in which a type-specifier can occur. For example:

```hack
type Point = shape('x' => int, 'y' => int);
function f2(Point $p1): void { ... }
private Point $origin;
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




````hack
class C {
  const string KEY1 = 'x';
  const int KEY2 = 3;
  const bool KEY3 = true;
  const num KEY4 = 2.5;
}
```
xx

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

xx

CHECK THIS: If the shape literal is made up entirely of literals, it can be used in function default default values and class field initialiers, as follows:

class CY {
  private Point $p1 = shape('x' => 0, 'y' => 5);
}

