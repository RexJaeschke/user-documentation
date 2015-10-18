# Examples

A shape type can have zero or more fields of arbitary type; for example:

```hack
shape('real' => float, 'imag' => float)
shape('id' => string, 'url' => string, 'count' => int)
shape('n1' => (int, float),'n2' => ?(function (array<num>): bool))

type APoint<T> = shape('x' => T, 'y' => T);
```
