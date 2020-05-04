<?php
     class DynamicFactor
      {
         private $factor = 0;
         private $helper = 2;
         
         public function get_next_factor()
         {
            $num = self::get_next_prime($this->factor);
            $this->factor = $num;

            return $this->factor;
         }

         private function get_next_prime(int $num)
         {
            switch(true)
            {
               case ($num == 0) :
                  return 2;

               case ($num == $this->factor) : // first_iteration
                  $num += 1;
                  return self::get_next_prime($num);

               case ($num % 2 == 0 ) : // is_even
                  $num += 1;
                  return self::get_next_prime($num);
               
               case (self::is_composite($num)) : 
                  $num += 1;
                  return self::get_next_prime($num);
               
               default :
                  return $num;
            }
            
         }

         private function is_composite(int $num){
            if( fmod(($num / $this->helper), 1) !== 0.0 ) // contains a decimal
            {
               $this->helper += 1;
               return self::is_composite($num);
            }
            elseif($num == $this->helper) {
               $this->helper = 2;
               return false;
            }
            else {
               $this->helper = 2;
               return true;
            }
         }

         public function get_factor()
         {
            return $this->factor;
         }

      }

      class Factorizer
      {
         private $factors = array();
         private $entry_value = 0;
         
         public function add_factor()
         {
            $initFactor = new DynamicFactor;
            $initFactor->get_next_factor();
            
            array_push($this->factors, (object) [
               $this->entry_value => $initFactor
            ]);

            $this->entry_value++;
         }

         public function get_factors()
         {
               return $this->factors;
         }

         public function get_factor_with_index($index)
         {
            return $this->get_factors(){$index};
         }

         public function increase_factor($index)
         {
            echo "\n\n ref: ", self::get_factor_with_index($index)->get_next_factor(), " \n\n";
         }
        
      }

      class Test
      {
         public function test_factor_class()
         {
            $factor = new DynamicFactor;
            echo "This is what factor does: ", $factor->get_next_factor(), "\n\n";
         }
         
         public function test_get_factor($index)
         {
            $factorizer = new Factorizer();
            $result = "";
            $factorizer->add_factor();
            $factorizer->add_factor();
            $factorizer->add_factor();

            //$factorizer->increase_factor_(0); // 3

            echo "\n test get_factor: ", print_r($factorizer->get_factor_with_index($index));
         }

         public function test_increase_factor($index)
         {
            $factorizer = new Factorizer();
            $result = "";
            $factorizer->add_factor();
            $factorizer->add_factor();
            $factorizer->add_factor();

            //$factorizer->increase_factor_(0); // 3

            echo "\n test increase : ", print_r($factorizer->increase_factor($index));
         }
      }
      
      $test = new Test();

      $test->test_factor_class();

      $test->test_get_factor(0);
      $test->test_get_factor(1); 

      $test->test_increase_factor(0);

?>
