<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- sulla base dell'esercizio di ieri (vedi correzione qui su slack) aggiungere i seguenti vincoli di integrita':
- nomi e cognomi devono essere di >3 caratteri
- i livelli di sicurezza devono essere [1;5] per i dipendenti e [6;10] per i boss
- ral employee [10.000;100.000]
- non puo' esistere boss senza dipendenti
Durante la fase di test, utilizzare il costrutto try-catch per gestire l'errore e informare l'utente -->
    
    <h1>
    
    <?php
        class Person {
            private $name;
            private $lastname;
            public function __construct($name, $lastname) {
                $this -> setName($name);
                $this -> setLastname($lastname);
            }
            public function getName() {
                return $this -> name;
            }
            public function setName($name) {
                if (strlen($name) < 3) {
                    
                    $e = new Name("name too short");
                    throw $e;
                    
                }
                $this -> name = $name;
            }

            public function getLastname() {
                return $this -> lastname;
            }
            public function setLastname($lastname) {
                if (strlen($lastname) < 3) {

                    $e = new Lastname("lastname too short");
                    throw $e;
                }
                $this -> lastname = $lastname;
            }
            public function __toString() {
                return 
                    'name: ' . $this -> getName() . '<br>'
                    . 'lastname: ' . $this -> getLastname();
            }
        } 


        class Employee extends Person {
            private $securyLvl;
            private $ral;
            public function __construct($name, $lastname,
                                        $securyLvl, $ral) {
                parent::__construct($name, $lastname);
                $this -> setSecuryLvl($securyLvl);
                $this -> setRal($ral);
            }

            public function getSecuryLvl() {
                return $this -> securyLvl;
            }
            public function setSecuryLvl($securyLvl) {
                if (($securyLvl < 1) | ($securyLvl > 5)) {
                    
                    $e = new SecurityEmpl('must be between 1 and 5');
                    throw $e;
                    
                }
                $this -> securyLvl = $securyLvl;
            }

            public function getRal() {
                return $this -> ral;
            }
            public function setRal($ral) {

                if (($ral < 10000) | ($ral > 100000)) {

                    $e = new Ral('must be between 10000 and 100000');
                    throw $e;
                    
                }
                $this -> ral = $ral;
            }
            public function __toString() {
                return parent::__toString() . '<br>'
                    . 'securyLvl: ' . $this -> getSecuryLvl() . '<br>'
                    . 'ral: ' . $this -> getRal() . "$";
            }
        }


        class Boss extends Employee{
            private $employees;
            public function __construct($name, $lastname,
                                        $securyLvl, $ral, $employees) {
                parent::__construct($name, $lastname, $securyLvl, $ral);
                
                $this -> setEmployees($employees);
            }

            public function getSecuryLvl() { //?
                return $this -> securyLvl;
            }
            public function setSecuryLvl($securyLvl) {
                if (($securyLvl < 6) | ($securyLvl > 10)) {

                    $e = new SecurityBoss('must be between 6 and 10');
                    throw $e;
                    
                }
                $this -> securyLvl = $securyLvl;
            }

            public function getEmployees() {
                return $this -> employees;
            }
            public function setEmployees($employees) {

                if ($employees <= 0) {
                    
                    $e = new Employees('miss employees');
                    throw $e;

                }
                $this -> employees = $employees;
            }

            public function __toString(){

                return parent::__toString() . '<br>'
                    . 'employees: ' . $this -> getemployees();

            }
        }


        class Name extends Exception {}
        class Lastname extends Exception {}
        class SecurityEmpl extends Exception {}
        class Ral extends Exception {}
        class SecurityBoss extends Exception {}
        class Employees extends Exception {}
        
        
        try {
            $pers = new Person("Adriano", "Traiano");
            $empl = new Employee("Marco", "Aurelio", 2, 10000);
            $boss = new Boss("Giulio", "Cesare", 7, 100000, 1);
            echo $pers . '<br><br>'
                . $empl . '<br><br>'
                . $boss;
        } 
        catch(Name $e) {
            echo 'ERROR name Too Short';
        } catch(Lastname $e) {
            echo 'ERROR lastname Too Short';
        }catch(SecurityEmpl $e) {
            echo 'ERROR securyLvl employee must be between 1 and 5';
        }catch(Ral $e) {
            echo 'ERROR ral must be between 10000 and 100000';
        }catch(SecurityBoss $e) {
            echo 'ERROR boss securyLvl must be between 6 and 10';
        }catch(Employees $e) {
            echo 'ERROR miss employees';
        }
    ?>

    </h1>
</body>
</html>