package a_and_b;

import java.util.HashMap;
import java.util.Map;

class A
{
  public void doSomething()
  {
    System.out.println( "class A did something");
  }
}

class B
{
  private Map<Integer, A> map = new HashMap<Integer, A>();
  private int currentIndex = 0;

  public void addNewA()
  {
    A new_a = new A();
    this.map.put(this.currentIndex, new_a);
    this.currentIndex++;

  }

  public A getByIndex(int index)
  {
    return this.map.get(index);
  }  

  public void doSomethingWithAmemberInsideArray(int index)
  {
	  this.getByIndex(index).doSomething();
  }
}

public class Main
{
	public static void main(String[] args)
	{
		B b = new B();

		b.addNewA();
		b.addNewA();

		System.out.println(b.getByIndex(0));
		
		b.doSomethingWithAmemberInsideArray(0); // returns error 

		// console: 
		//   stdClass Object ( [0] => A Object ( ))
		//   Uncaught Error: Call to undefined method stdClass::do_something();
	}
}

