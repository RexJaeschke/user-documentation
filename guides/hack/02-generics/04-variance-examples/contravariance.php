<?hh

namespace Hack\UserDocumentation\Generics\Variance\Examples\Contravariance;

class C<-T> {
  public function __construct(private T $t) {}
}

class Animal {}
class Cat extends Animal {}

function f(C<Cat> $p1): void { var_dump($p1); }

function main(): void {
  f(new C(new Animal()));	// accepted
  f(new C(new Cat()));
}

main();
