<?php
/** Stack implementation using Queue (SplQueue from Standard PHP Library)
* User: criticus
* Date: 2/13/17
* Time: 9:23 PM
*/

class Stack extends SplQueue
{
    /**
     * @var int maxim size of the stack
     */
    protected $limit;
    /**
     * @var int current size of the stack
     */
    protected $size;

    /**
     * Stack constructor.
     * @param int $limit
     */
    public function __construct(int $limit)
    {
        $this->limit = $limit;
        $this->size = 0;
    }

    //Add an item to the top of the stack.
    //Prevent stack overflow.

    /**
     * Gets the top item of the stack
     * @return mixed
     */
    public function s_top()
    {
        $last_item = $this->s_pop();
        $this->s_push($last_item);
        return $last_item;
    }


    /**
     * Removes the item on top of the stack.
     * @return mixed
     * @throws Exception if stack is empty
     */
    public function s_pop()
    {
        if ($this->size == 0) {
            throw new Exception('Stack is empty.');
        }

        return $this->s_dequeue();

    }

    /**
     * Pushes $item onto the stack
     * @param mixed $item
     * @throws Exception if stack is full already
     */
    public function s_push($item): void
    {
        if ($this->size >= $this->limit) {
            throw new Exception('Stack is full.');
        }

        $this->s_enqueue($item);
        $this->s_reinsert();

    }

    /**
     * Returns whether the stack is empty
     * @return bool
     */
    public function is_empty(): bool
    {
        return (bool)!$this->size;
    }


    /**
     * Calls the parent enqueue and increases size of the stack
     * @param mixed $item
     * @return void
     */
    private function s_enqueue($item): void
    {
        $this->enqueue($item);
        $this->size++;
    }

    /**
     * Calls the parent dequeue and decreases size of the stack
     * @return mixed
     */
    private function s_dequeue()
    {
        $this->size--;
        return $this->dequeue();
    }

    /**
     * If n is the number of elements in the queue then remove and insert each element except the last inserted
     *  n-1 times. Using this function we can implement stack with one queue.
     * @return void
     */
    private function s_reinsert(): void
    {
        for ($i = 1; $i < $this->size; $i++) {
            $this->s_enqueue($this->s_pop());

        }
    }

}

