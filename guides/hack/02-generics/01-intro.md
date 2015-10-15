# Introduction

Certain types (classes, interfaces, and traits) and their methods can be parameterized; that is, their declarations can have one or more placeholder names—called *type parameters*—that are associated with types via *type arguments* when a class is instantiated or a method is called. A type or method having such placeholder names is called a *generic type* or *generic method*, respectively. Top-level functions can also be parameterized giving rise to *generic functions*.

An example of a generic class is `Vector<T>`, from the Hack collections
implementation. `T` is a type parameter, and it is what makes Vector
generic. It can hold any kind of value, from `int` to an instance of a class, for example.
However, for any instantiation of the Vector class, once a type has been associated
with `T`, that type cannot be changed.

@@ intro-examples/vector.php @@

`$x` is a `Vector<int>`, while `$y` is a `Vector<string>`. A `Vector<int>` and
`Vector<string>` are not the same type.

Methods and functions can also be generic. One use case is when they need to
manipulate generic classes:

@@ intro-examples/generic-methods.php @@

The above example shows a generic function `swap<T>()` operating on a generic
`Box<T>` class.

Generics allow developers to write one class or method with the ability to be
parameterized to any type, all while preserving type safety. Without generics,
accomplishing a similar model would require creating `BoxInt` and `BoxString`
classes, and that quickly gets verbose. Alternatively, we could treat `$value`
as a `mixed` type and do `instanceof()` checks, which means that inserting
a `string` into a box of `int` would not raise a typechecker error, but would only
be discovered at runtime.

The *arity* of a generic type or method is the number of type parameters declared for that type or method. As such, class `Vector` has arity 1. The Hack library generic container class `Map` implements an ordered, dictionary-style collection. This type has arity 2, and utilizes a key type and a value type, so the type `Map<int, Employee>`, for example, could be used to represent a group of Employee objects indexed by an integer employee number.

Within a generic parameter list, the parameter names must
  * be distinct
  * all begin with the letter T
  * not be the same as that used for a generic parameter for an enclosing class, interface, or trait.
