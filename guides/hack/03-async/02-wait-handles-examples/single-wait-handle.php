<?hh

namespace Hack\UserDocumentation\Async\WaitHandles\Examples\SingleWaitHandle;

async function foo(): Awaitable<int> {
  return 3;
}

async function single_wait_handle_main(): Awaitable<void> {
  $wait_handle = foo(); // wait handle of Awatiable<int>
  $result = await $wait_handle; // an int after $wait_handle completes
  var_dump($result);
}

single_wait_handle_main();
