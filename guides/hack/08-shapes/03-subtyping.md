# Structural sub-typing

**Notes from Joel M.**

```hack
shape('x' => int, 'y' => string)
```
is now considered a subtype of 

```hack
shape('x' => int)
```

The former has all the fields of the latter, so it can be effectively used in place of it. For example, you can now write a function that operates on "allshapes that have the 'owner_id' field":

```hack
function getUser(shape('owner_id' => int) $s): PersonalUser {
```
