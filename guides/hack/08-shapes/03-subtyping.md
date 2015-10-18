# Shape Subtyping

Consider a shape type `Transaction` that has a field set that is the same as the leading subset of the fields in shape type `Deposit`.

```hack
enum Bank: int {
  DEPOSIT = 1;
  // ...
}

type Transaction = shape('trtype' => Bank);
type Deposit = shape('trtype' => Bank, 'toaccnum' => int, 'amount' => float);
```
As such, shape type `Deposit` is a subtype of shape type `Transaction`. The former has all the fields of the latter, so it can be effectively used in place of it. For example, you can now write a function that operates on "all shapes that have a 'trtype' field of type `Bank`". For example:

```hack
function processTransaction(Transaction $t): void {

}
```
