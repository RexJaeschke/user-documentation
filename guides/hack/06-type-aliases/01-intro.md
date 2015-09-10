#Introduction

A *type alias* is a shorthand name for a (potentially long and complex) type specifier or definition. Once a type alias has been defined, it can be used in any context in which the associated type is permitted. Type aliaising is an abstraction mechanism. (Shape types can *only* be used via type aliases; see below.)

Any given type can have multiple aliases, and a type alias can itself have aliases. As such, a given type can be known by any number of (equivalent) names.

The type being aliased could be as simple as `int`, `string`, or a class type name, or as complicated as a map-like array, a tuple, or a shape. In the following example, `Counter` is defined to be an alias for an `int`, and `Point` is defined to be an alias for a tuple of two `int`s:

```Hack
type Counter = int;
newtype Point = (int, int);
```

Type aliases are created using the `newtype` and `type` keywords. An alias created using `newtype` is an [*opaque type alias*](02-opaque.md). An alias created using `type` is a [*transparent type alias*](03-transparent.md).

**Rex: I don't want to duplicate the grammar here, but how can I point to it from here? The complete syntax and constraints of a type-alias definition are defined in ...**

Note that shape types *must* be used with a type alias. Consider the following shape definition that is to represent a complex number:

```Hack
shape('real' => float, 'imag' => float)
```

Unfortunately, a shape definition cannot be used directly in place of a type. For example, the following is prohibited:

```Hack
function f1(shape('x' => int, 'y' => int) $p1): void { … }  // DISALLOWED
```

Instead, the shape must first be given a type-alias name, with that name being used in all subsequent references to that shape type, as follows:

```Hack
type Complex = shape('real' => float, 'imag' => float);
function f1(Complex $p1): void { … }  // OK
```
