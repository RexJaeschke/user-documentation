#Examples

**Under Construction** This code has **NOT** been compiled/tested

```Hack
<?hh // strict

// Complex.php - Complex number implementation file

namespace Complex;

newtype Complex = shape('real' => float, 'imag' => float);

function createComplex(num $real = 0.0, num $imag = 0.0): Complex {
  return shape('real' => $real, 'imag' => $imag);
}

function getI(): Complex {
  return shape('real' => 0.0, 'imag' => 1.0);

function getReal(Complex $z): float {
  return $z['real'];
}

function getImag(Complex $z): float {
  return $z['imag'];
}

function setReal(Complex $z, num $real = 0.0): void {
  $z['real'] = $real;
}

function setImag(Complex $z, num $imag = 0.0): void {
  $z['imag'] = $imag;
}

function add(Complex $z1, Complex $z2): Complex {
  return shape('real' => $z1['real'] + $z2['real'],
               'imag' => $z1['imag'] + $z2['imag']);
}

function subtract(Complex $z1, Complex $z2): Complex {
  return shape('real' => $z1['real'] - $z2['real'],
               'imag' => $z1['imag'] - $z2['imag']);
}

function toString(Complex $z): string {
  if ($z['imag'] < 0.0) {
    return "(" . $z['real'] . " - " . (-$z['imag']) . "i)";
  } else if (1.0/$z['imag'] == -INF) {
    return "(" . $z['real'] . " - " . 0.0 . "i)";
  } else {
    return "(" . $z['real'] . " + " . (+$z['imag']) . "i)";
  }
}
```

**Will need to add explicit calls to the toString function, to the following.**

```Hack
<?hh // strict

namespace Complex_test_1;

// Complex_test_1.php

require_once 'Complex.php';

function main(): void {
  $z1 = \Complex\getI();
  echo "\$z1 contains " . $z1 ."\n";

  $z2 = \Complex\createComplex();
  echo "\$z2 contains " . $z2 ."\n";

  $z3 = \Complex\createComplex(10);
  echo "\$z3 contains " . $z3 ."\n";

  $z4 = \Complex\createComplex(-4, 3.5);
  echo "\$z4 contains " . $z4 ."\n";

  echo "\$z4's real part is " . \Complex\getReal($z4) ."\n";
  echo "\$z4's imaginary part is " . \Complex\getImag($z4) ."\n";

  \Complex\setReal($z2, -3);
  \Complex\setImag($z2, 2.67);
  echo "\$z2 contains " . $z2 ."\n";

  $z5 = \Complex\add($z2, $z4);
  echo "\$z5 contains \$z2 + \$z4: " . $z5 ."\n";

  $z6 = \Complex\subtract($z2, $z4);
  echo "\$z6 contains \$z2 - \$z4: " . $z6 ."\n";
}

main();
```
