# Stack
Stack class with below operations using a single queue (SPLQueue from Standard PHP Library)

* s_push(item) -- Push item onto stack.
* s_pop() -- Removes the item on top of the stack.
* s_top() -- Get the top item.
* is_empty() -- Return whether the stack is empty.

## Requirements
PHP 7.1 and PHPUnit 6

## Usage
    $my_stack = new Stack(5);
    $my_stack->s_push(12);
    $my_stack->s_push('a');
    $my_stack->s_top();
    $my_stack->s_pop();

## Testing
    phpunit --bootstrap src/Stack.php tests/StackTest
