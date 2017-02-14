<?php
/**
 * Tests for src/Stack.php
 * User: criticus
 * Date: 2/13/17
 * Time: 10:51 PM
 */


use PHPUnit\Framework\TestCase;

/**
 * @covers Stack
 */
 class StackTest extends TestCase
{
    public function testCanCreateEmptyStack()
    {
        $my_stack = new Stack(5);
        $this->assertTrue(
            $my_stack->is_empty()
        );
    }

    public function testPushElement()
    {
        $my_stack = new Stack(5);
        $my_stack->s_push(12);
        $my_stack->s_push('a');
        $my_stack->s_push('b');
        $my_stack->s_push(79);

        $this->assertFalse($my_stack->is_empty());
        $this->assertEquals(79, $my_stack->s_pop());
        $this->assertEquals('b', $my_stack->s_pop());

    }

     /**
      * @expectedException Exception
      */
    public function testPushException()
    {
        $my_stack = new Stack(1);
        $my_stack->s_push(12);
        $my_stack->s_push('a');
    }

     public function testPopElement()
     {
         $my_stack = new Stack(2);
         $my_stack->s_push(12);
         $my_stack->s_push(35);

         $this->assertEquals(35, $my_stack->s_pop());
         $this->assertEquals(12, $my_stack->s_pop());

     }

     /**
      * @expectedException Exception
      */
     public function testPopException()
     {
         $my_stack = new Stack(1);
         $my_stack->s_push(12);
         $my_stack->s_pop();
         $my_stack->s_pop();
     }

     public function testTop()
     {
         $my_stack = new Stack(5);
         $my_stack->s_push(12);
         $my_stack->s_push('a');
         $this->assertEquals('a', $my_stack->s_top());
         $my_stack->s_push(5);
         $this->assertEquals(5, $my_stack->s_top());
     }

}
