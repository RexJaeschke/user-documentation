#Introduction

A *type alias* is a shorthand name for a (potentially long and complex) type specifier or definition. Once a type alias has been defined, it can be used in any context in which the associated type is permitted. Type aliaising is an abstraction mechanism.

Any given type can have multiple aliases, and a type alias can itself have aliases.

The type being aliased could be as simple as `int`, `string`, or a class type name, or as complicated as a map-like array, a tuple, or a shape. In the following example, `Counter` is defined to be an alias for an `int`, and `Point` is defined to be an alias for a tuple of two `int`s:

```Hack
type Counter = int;
newtype Point = (int, int);
```





Type aliases are created using either the `newtype` or `type` keywords. An alias created using `newtype` is an [*opaque type alias*](02-opaque.md). An alias created using `type` is a [*transparent type alias*](03-transparent.md).

[[Rex: I don't want to duplicate the grammar here, but how can I point to it from here?

The complete syntax and constraints are defined in ...]]


