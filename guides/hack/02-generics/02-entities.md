Generics can be used on many of the entities you are accustomed to in your programming with Hack.

# Classes

Consider the following example in which `Stack` is a generic class having one type parameter, `T`:

@@ entities-examples/classes.php @@

As shown, the type parameter `T` is used in the declaration of the instance property `$stack`, as the parameter type of the instance method `push`, and as the return type of the instance method `pop`. Note that although `push` and `pop` use the type parameter, they are not themselves generic methods. 

The line commented-out, attempts to call `push` with a non-`int` argument. This is rejected, because `$stInt` is a stack of `int`.

# Functions

Here is an example of a generic function, `maxVal`, having one type parameter, `T`:

```hack
function maxVal<T>(T $p1, T $p2): T {
  return $p1 > $p2 ? $p1 : $p2;
}
```

The function returns the larger of the two arguments passed to it. In the case of the call `maxVal(10, 20)`, given that the type of both arguments is `int`, that is inferred as the type corresponding to the type parameter `T`, and an `int` value is returned. In the case of the call `maxVal(15.6, -20.78)`, `T` is inferred as `float`, while in `maxVal('red', 'green')`, `T` is inferred as `string`.

# Methods

# Interfaces

# Traits

# Type Aliases
