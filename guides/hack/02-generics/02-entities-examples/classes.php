<?hh // strict

namespace Hack\UserDocumentation\Generics\Entities\Classes;

class StackUnderflowException extends \Exception {}

class Stack<T> {
  private array<T> $stack;
  private int $stackPtr;

  public function __construct() {
    $this->stackPtr = 0;
    $this->stack = array();
  }

  public function push(T $value): void {
    $this->stack[$this->stackPtr++] = $value;
  }

  public function pop(): T {
    if ($this->stackPtr > 0) {
      return $this->stack[--$this->stackPtr];
    } else {
      throw new StackUnderflowException();
    }
  }
}

function useIntStack(Stack<int> $stInt): void {
  $stInt->push(10);
  $stInt->push(20);
  $stInt->push(30);
  echo 'pop => ' . $stInt->pop() . "\n";
//  $stInt->push(10.5);	// rejected as not being type-safe
}
