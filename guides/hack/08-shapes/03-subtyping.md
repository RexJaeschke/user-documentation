# Shape Subtyping

Consider two shape types having a common initial sequence of fields. For example:

```hack
enum Bank: int {
  DEPOSIT = 1;
  // ...
}

type Transaction = shape('trtype' => Bank);
type Deposit = shape('trtype' => Bank, 'toaccnum' => int, 'amount' => float);
```
The shape type with the larger field set, `Deposit`, is a subtype of the one with the smaller field set, `Transaction`. The former has all the fields of the latter, so a value of the former can be used in place of the latter. For example, you can now write a function that operates on "all shapes that have a field called `'trtype'` having type `Bank`". For example:

```hack
function processTransaction(Transaction $t): void {
  // ...
}
```
