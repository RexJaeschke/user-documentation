# Examples

```hack
type Complex = shape('real' => float, 'imag' => float);
type IdSet = shape('id' => string, 'url' => string, 'count' => int);
type APoint<T> = shape('x' => T, 'y' => T);
type Sh = shape('n1' => (int, float),'n2' => ?(function (array<num>): bool));
```
