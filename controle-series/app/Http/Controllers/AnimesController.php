<?php

namespace App\Http\Controllers;

class AnimesController extends Controller
{
   public function listarAnimes() {
        $animes=[
            'Code Geass',
            'Fullmetal Alchemist',
            'Steins Gate'
        ];
        $html = "<ul>";
            foreach($animes as $anime){
                $html .="<li>$anime</li>";
            }
        $html .= "</ul>";
            return $html;
    }

}