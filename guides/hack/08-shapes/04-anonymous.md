# Nested/anonymous shapes

So far, every shape must have been defined with named type declaration. Sometimes though, the structure doesn't really "deserve" a separate name, and now you can declare them inline:

```hack
type s = shape(
  'x' => int,
  'y' => int,
  'subshape' => shape(
  ...
  )
);
```

You can even put them directly on function signatures:

function getCoords() : shape('x' => int, 'y' => int) {

though in more complicated cases a named shape will probably still be better for readability.
