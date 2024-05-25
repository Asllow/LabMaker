<?php

namespace App\Http\Controllers;
use App\Models\PunchClock;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Datetime;

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
                $results = User::where('registration', $any) ?? 0;
                if (!$results){return 'Erro 1';}
                return $results;
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
        //return to ESP the datetime
        elseif ($id == "5"){
            $currentDateTime = new DateTime('now');
            return $currentDateTime->format('dmyHis');
        }
        //check the internet
        elseif ($id == "6"){
            return "!";
        }
        else {
            abort(404);
        }
    }
}
