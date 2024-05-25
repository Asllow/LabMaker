<?php

namespace App\Http\Controllers;
use App\Models\IdMaker;
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
        $this->checkAny($id);
        switch ($id) {
            case "1":
                $this->checkAny($any);
                $results = User::firstWhere('registration', $any) ?? 0;
                if (!$results) {return 'Erro 1';}
                return $results->registration . $results->name . " " . $results->last_name;
            case "2":
                $this->checkAny($any);
                $registration = IdMaker::firstWhere('hexa_id', $any) ?? 0;
                if (!$registration) {return 'Erro 2';}
                $results = User::firstWhere('registration', $registration->registration) ?? 0;
                if (!$results) {return 'Erro 3';}
                return $registration->registration . $results->name . " " . $results->last_name;
            case "3":
                $this->checkAny($any);
                $io = DB::select('select io from id_maker where registration = ?', array($any))[0] ?? 0;
                if (!$io) {return 'Erro 4';}
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
            case "4":
                $registrations = DB::select('select registration from id_maker where io = 1') ?? 0;
                if (!$registrations) {
                    return "Saida Registrada 1";
                }
                $size = sizeof($registrations);
                for ($i = 0; $i < $size; $i++) {
                    DB::update('update id_maker set io = 0 where registration = ?', array($registrations[$i]->registration));
                    PunchClock::create([
                        'registration' => $registrations[$i]->registration,
                        'io' => '0'
                    ]);
                }
                return "Saida Registrada";
            case "5":
                $currentDateTime = new DateTime('now');
                return $currentDateTime->format('dmyHis');
            case "6":
                return "!";
            default:
                abort(404);
        }
    }
    private function checkAny($any): void
    {
        if ($any == "0"){
            abort(404);
        }
    }
}
