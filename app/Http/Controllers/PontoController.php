<?php

namespace App\Http\Controllers;
use App\Models\PunchClock;
use Illuminate\Support\Facades\DB;
use Datetime;

use Illuminate\Http\Request;

class PontoController extends Controller
{
    public function index(): string
    {
        return "teste";
    }

    public function ponto(string $id, string $any, string $timestamp)
    {
        if ($id == "0"){
            abort(404);
        }
        elseif ($id == "1"){
            if ($any == "0"){
                abort(404);
            }else {
                $results = DB::select('select registration, name, last_name from users where registration = ?', array($any))[0] ?? 0;
                if (!$results){return 'Erro 1';}
                return $results->registration . $results->name . " " . $results->last_name;
            }

        }
        elseif ($id == "2"){
            if ($any == "0"){
                abort(404);
            }else {
                $registration = DB::select('select registration from id_maker where hexa_id = ?', array($any))[0]->registration ?? 0;
                if (!$registration){return 'Erro 2';}
                $results = DB::select('select name, last_name from users where registration = ?', array($registration))[0];
                if (!$results){return 'Erro 3';}
                return $registration . $results->name . " " . $results->last_name;
            }
        }
        elseif ($id == "3"){
            if ($any == "0"){
                abort(404);
            }else {
                $io = DB::select('select io from id_maker where registration = ?', array($any))[0] ?? 0;
                if (!$io){return 'Erro 4';}
                $io = match ($io->io) {
                    0 => 1,
                    1 => 0,
                };
                $texto = match ($io) {
                    0 => "Saida",
                    1 => "Entrada",
                };
                DB::update('update id_maker set io = ? where registration = ?', array($io, $any));
                PunchClock::create([
                    'registration' => $any,
                    'io' => $io,
                    'created_at' => $timestamp,
                ]);
                return "Inscrito|" . $texto;
            }
        }
        elseif ($id == "4"){
            $registrations = DB::select('select registration from id_maker where io = 1') ?? 0;
            if (!$registrations){return "Saida Registrada 1";}
            $size = sizeof($registrations);
            for ($i = 0; $i < $size; $i++){
                DB::update('update id_maker set io = 0 where registration = ?', array($registrations[$i]->registration));
                PunchClock::create([
                    'registration' => $registrations[$i]->registration,
                    'io' => '0'
                ]);
            }
            return "Saida Registrada";
        }
        elseif ($id == "5"){
            $currentDateTime = new DateTime('now');
            $currentDateTime = $currentDateTime->format('dmyHis');
            return $currentDateTime;
        }
        elseif ($id == "6"){
            return "!";
        }
        elseif ($id == "99"){
            $registrations = DB::select('select registration from id_maker') ?? 0;
            array_multisort(array_column($registrations, 'registration'), SORT_ASC, $registrations);
            $registrations2 = DB::select('select registration from users') ?? 0;
            array_multisort(array_column($registrations2, 'registration'), SORT_ASC, $registrations2);
            $size = sizeof($registrations);
            for ($i = 0; $i < $size; $i++){
                $matriz[$i] = $registrations[$i]->registration;
            }
            $matriz2 = array();
            for ($i = 0; $i < $size; $i++){
                if (in_array($registrations2[$i]->registration, $matriz)){
                }else{
                    $matriz2[] = $registrations2[$i];
                }
            }
            if (!$matriz2){return 'Erro 7';}
            $size2 = sizeof($matriz2);
            for ($i = 0; $i < $size2; $i++){
                $results = DB::select('select name, last_name from users where registration = ?', array($matriz2[$i]->registration))[0];
                $matriz3[$i] = $results;
            }

            dd($matriz3, $matriz2);
        }
        else {
            abort(404);
        }
    }
}
