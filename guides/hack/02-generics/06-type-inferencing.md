#Type Inferencing 

Some languages require the type arguments associated with a generic class to be specified at instantiation time, using syntax something like new Stack<int>() to create a Stack of int. However, that is not permitted in Hack. As such, what is being allocated here is a stack of unknown type. When method push is called with an int argument, the compiler infers that the stack can hold values of that type. Then when push is called with a float argument, the compiler infers that the stack can also hold values of that type. Values of yet other types can also be pushed.

In the following example, the type of the Stack designated by $st is not fixed (i.e., established) until that Stack is made available outside of its creating function, in this case, when the creating function returns to its caller:

```hack
function f1(): Stack<num> {
  $st = new Stack();
  $st->push(100);		// allows ints to be pushed
  $st->push(10.5); 		// allows floats to be pushed
  return $st;			// fixes the type as Stack<num>
}
```

Now consider the following example:

```hack
function f2(): void {
  $st = new Stack();
  $st->push(100);
  process($st);			// fixes the type as Stack<int>
  $st->push(10.5);		// rejected once stack type fixed
}
```

When the Stack is passed to function process, the Stack's type is fixed as Stack<int>, and the subsequent attempt to push on a float is rejected.

Note that a similar situation occurs with objects created from collection literals (§10.4.3) having no initial values, as in Vector {} and Map {}.
