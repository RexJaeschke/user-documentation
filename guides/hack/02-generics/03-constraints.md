#Generic Type Constraints

A generic type-constraint indicates a requirement that a type must fulfill in order to be accepted as a type argument for a given type parameter. (For example, it might have to be a given class type or a subtype of that class type, or it might have to implement a given interface.) 

There are two kinds of generic type constraints, specified by the `as` and `super` keywords, respectively. Each is discussed below. 

## Specifying Constraints via `as`

Consider the following example in which class `Complex` has one type parameter, `T`, and that has a constraint, `num`:

```hack
class Complex<T as num> {
  private T $real;
  private T $imag;
  public function __construct(T $real, T $imag) {
    $this->real = $real;
    $this->imag = $imag;
  }
  public static function add(Complex<T> $z1, Complex<T> $z2): Complex<T> {
    return new Complex($z1->real + $z2->real, $z1->imag + $z2->imag);
  }
  …
  public function __toString(): string {
    if ($this->imag < 0.0) {                                                       
      return "(" . $this->real . " - " . (-$this->imag) . "i)";
    }
    …
  }
}
```

Without the `as num` constraint, a number of errors are reported, including the following: 
 * The `return` statement in method `add` performs arithmetic on a value of unknown type `T`, yet arithmetic isn't defined for all possible type arguments.
 * The `if` statement in method `__toString` compares a value of unknown type `T` with a `float`, yet such a comparison isn't defined for all possible type arguments.
 * The `return` statement in method `__toString` negates a value of unknown type `T`, yet such an operation isn't defined for all possible type arguments. Similarly, a value of unknown type `T` is being concatenated with a string.

The following code creates `float` and `int` instances, respectively, of class `Complex`:

```hack
$c1 = new Complex(10.5, 5.67);
echo "\$c1 + \$c2 = " . Complex::add($c1, $c2) . "\n";
$c3 = new Complex(5, 6);
echo "\$c3 + \$c4 = " . Complex::add($c3, $c4) . "\n";
```

In summary, `T as U` asserts that `T` must be a subtype of `U`.

## Specifying Constraints via `super`

Unlike, an `as` type constraint, `T super U` asserts that `T` must be a supertype of `U`.

```hack
<T super V>
```

