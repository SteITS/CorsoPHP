<?php
        /*error_reporting(E_ALL);
        function stampaTitolo($par,$titolo="test"){
            echo ("<h1>$titolo</h1>");
            echo ("<h1>$titolo</h1>");
        }*/
        function createTitle($title, $livello=1) {
            return "<h{$livello}>".$title ."</h{$livello}>";
        }

        function createPar($par) {
            return "<p>".$par ."</p>";
        }
        function createList($lista) {
            $lista_puntata="<ul>";

            foreach ($lista as $item) {
                $lista_puntata.= "<li>".$item."</li>";
            }

            $lista_puntata .= "</ul>";
            return $lista_puntata;
        }
    ?>