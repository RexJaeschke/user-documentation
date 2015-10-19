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

The `push` and `pop` methods in the classes example are generic in that they execute in the context of the type parameter `T`. However, a method can have its own type parameters, even if it does not belong to a generic class. Conside the library type `Pair`:

```hack
final class Pair<Tv1, Tv2> implements ConstVector<mixed> {
  // …
  public function map<Tu>( (function(Tv): Tu) $callback ):
    Vector<Tu>  public function zip<Tu>(Traversable<Tu> $iter):     Vector<Pair<mixed, Tu>> {…}
  public function zip<Tu>( Traversable<Tu> $iterable ): Vector<Pair<mixed, Tu>>
}
```
As we can see, methods `map` and `zip` each take a generic parameter, `Tu`, whose type is inferred from an argument passed to each method.

# Interfaces

Like a class, an interface can have type parameters; for example:

```hack
interface MyCollection<T> {
  public function put(T $item): void;
  public function get(): T;
}

class MyList<T> implements MyCollection<T> {
  public function put(T $item): void {  /* ... */ }
  public function get(): T {            /* ... */ }
  /// …
}

class MyQueue<T> implements MyCollection<T> {
  public function put(T $item): void {  /* ... */ }
  public function get(): T {            /* ... */ }
  // …
}

function processCollection<T>(MyCollection<T> $p1): void {
  /* can process any object whose class implements MyCollection */
}

processCollection(new MyList(/* … */));
processCollection(new MyQueue(/* … */));
```

Here, we have generic list and queue classes each of which implements the same generic interface, enabling those classes to store and retrieve elements in a consistent manner. 

# Traits

Like a generic class, a generic trait has a type-parameter list; for example:

```hack 
trait MyTrait<T1, T2> {
  public static function f(T1 $value): void {
  // ...
}
```

# Type Aliases

A type alias can alias any type, including a generic type. For example:

```hack
newtype Matrix<T> = Vector<Vector<T>>;
type Serialized<T> = string;	// T is not used
```
