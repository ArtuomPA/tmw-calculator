<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CalculatorController extends Controller
{
    public function viewBuild($id=-1) {
        return view("calculator");
    }

    public function ajaxCalculate(Request $request) {
        $agility = $request->input('agility');
        $dexterity = $request->input('dexterity');
        $vitality = $request->input('vitality');
        $luck = $request->input('luck');
        $intelligence = $request->input('intelligence');
        $strength = $request->input('strength');
        
        $data = [];

        $data["evade"] = $agility;
        $data["damageArchers"] = $dexterity+intval($luck/5)+intval($strength/5);
        $data["damageSword"] = intval($dexterity/5)+intval($luck/5)+$strength+intval(($strength/10)**2);
        $data["damageMagic"] = $intelligence;
        $data["maxHealth"] = $vitality;
        $data["reductionDamage"] = intval(0.8*$vitality);
        $data["healthRegeneration"] = 2*$vitality;
        $data["healthRestoration"] = intval($vitality/5);
        $data["manaIncrease"] = $intelligence;
        $data["manaRegeneration"] = 2*$intelligence;
        $data["manaRestoration"] = intval($vitality/6);
        $data["magicProtection"] = $intelligence;
        
        if (($vitality + $luck/3)>93) {
            $data["poisonImmunity"] = "Есть";
        } else {
            $data["poisonImmunity"] = "Нет";
        }
                
        return view("ajax-calculated", $data);
    }
}
