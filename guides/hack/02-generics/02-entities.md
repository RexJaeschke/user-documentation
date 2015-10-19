Generics can be used on many of the entities you are accustomed to in your programming with Hack.

# Classes

Consider the following example in which `Stack` is a generic class having one type parameter, `T`:

@@ entities-examples/classes.php @@

As shown, the type parameter `T` is used in the declaration of the instance property `$stack`, as the parameter type of the instance method `push`, and as the return type of the instance method `pop`. Note that although `push` and `pop` use the type parameter, they are not themselves generic methods. 

The line commented-out, attempts to call `push` with a non-`int` argument. This is rejected, because `$stInt` is a stack of `int`.

# Functions

# Methods

# Interfaces

# Traits

# Type Aliases
