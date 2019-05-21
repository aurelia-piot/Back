<?php
class A
    {
        public function test1(){return"test1<hr>";}
    }
class B extends A    
    {
        public function test2(){return"test2<hr>";}
    }

class C extends B    
    {
        public function test3(){return"test3<hr>";}
    }


//------------------------------------------------
// EXO : creer un objet de la Class C et afficher les methode issus de celle-ci et faire les affichages des methodes 
//-------------
$a=new A;
echo'<pre>';print_r(get_class_methods($a));echo'</pre>'; //permet d'afficher les methodes ...
echo $a->test1();

//-------------
$b=new B;
echo'<pre>';print_r(get_class_methods($b));echo'</pre>';
echo $b->test1();
echo $b->test2();

//-------------
$c=new C;
echo'<pre>';print_r(get_class_methods($c));echo'</pre>';
echo $c->test1();
echo $c->test2();
echo $c->test3();

//Si la classe B hérite de A et que la classe C herite de B , alors la class C herite de C (elle recupere tout les heritage d'avant elle)



?>