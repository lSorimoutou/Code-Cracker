<?php
use PHPUnit\Framework\TestCase;
include 'codeCraker.class.php';

/**
 * Test
 */
class Test extends TestCase
{
    /** @test test_initial_decrypt */
    public function test_initial_decrypt()
    {
        $codeCraker1 = new codeCracker("");
        $this->assertSame("", $codeCraker1->decrypt(""));
    }

    /** @test test_initial_crypt */
    public function test_initial_encrypt()
    {
        $codeCraker1 = new codeCracker("");
        $this->assertSame("", $codeCraker1->encrypt(""));
    }

     /** @test test_base1_decrypt */
     public function test_base1_decrypt()
     {
         $codeCraker1 = new codeCracker("b c");
         $this->assertSame("b a", $codeCraker1->decrypt("c b"));
     }
 
     /** @test test_base1_crypt */
     public function test_base1_encrypt()
     {
         $codeCraker1 = new codeCracker("b c");
         $this->assertSame("c b", $codeCraker1->encrypt("b a"));
     }
 

    /** @test test_decrypt_problem */
    public function test_decrypt_problem()
    {
        $key = "! ) \" ( £ * % & > < @ a b c d e f g h i j k l m n o";
        $codeCraker1 = new codeCracker($key);
        $this->assertSame("a b c d e f g h i j k l m n o p q r s t u v w x y z", $codeCraker1->decrypt($key ));
    }

     /** @test test_crypt_problem */
     public function test_encrypt_problem()
     {
         $key = "! ) \" ( £ * % & > < @ a b c d e f g h i j k l m n o";
         $codeCraker1 = new codeCracker($key);
         $this->assertSame("! ) \" ( £ * % & > < @ a b c d e f g h i j k l m n o", $codeCraker1->encrypt("a b c d e f g h i j k l m n o p q r s t u v w x y z"));
     }

}
