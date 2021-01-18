<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- creare 3 classi per rappresentare la seguente realta':
- persona
- dipendente
- boss
cercare inoltre di sciegliere alcune variabili di istanza (max 3 o 4 per classe) che possono avere senso in questa realta' e decidere le relazione di parantela (chi estende chi);
per ogni classe definire eventuale classe padre, variabili di istanza, costruttore, proprieta' e toString;
instanziando le varie classi provare a stampare cercando di ottenere un log sensato -->
    
    <h1>
    
    <?php
        class Person {

            public $name;
            public $lastname;

            public function __construct($name, $lastname){
                $this -> name = $name;
                $this -> lastname = $lastname;
            }

            public function __toString(){
                
                return "nome: " . $this -> name . '<br>'
                    . "cognome: " . $this -> lastname . '<br>';
            }

        }

        

        class EmployeePerson extends Person {

            public $salary;

            public function __construct($name, $lastname, $salary){

                parent::__construct($name, $lastname);
                
                $this -> salary = $salary;

            }

            public function __toString(){
                return parent::__toString()
                    . "stipendio: " . $this -> salary . '<br>';

            }


        }


        class BossEmployeePerson extends EmployeePerson{
            public $firm;

            public function __construct($name, $lastname, $salary, $firm) {
                parent::__construct($name, $lastname, $salary);

                $this -> firm = $firm;

            }

            public function __toString(){

                return parent::__toString()
                    . "azienda: " . $this -> firm . '<br>';

            }
        }

        $pers1 = new Person("Adriano", "Traiano");
        $empl1 = new EmployeePerson("Marco", "Antonio", 1000);
        $boss1 = new BossEmployeePerson("Giulio", "Cesare", 1000, "abc.srls");
        echo $pers1 . '<br>'
            . $empl1 . '<br>'
            . $boss1;
    ?>

    </h1>
</body>
</html>