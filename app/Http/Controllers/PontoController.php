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
                return $this->checkRegistration($any);
            case "2":
                return $this->checkHexaId($any);
            case "3":
                return $this->pushInPunchClock($any, $timestamp);
            case "4":
                return $this->removeRemnants();
            case "5":
                return $this->getDateTime();
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
    private function checkRegistration($any): string
    {
        $this->checkAny($any);
        $results_user = User::firstWhere('registration', $any) ?? 0;
        if (!$results_user) {return 'Erro 1';}
        return $results_user->registration . $results_user->name . " " . $results_user->last_name;
    }
    private function checkHexaId($any): string
    {
        $this->checkAny($any);
        $results_id_maker = IdMaker::firstWhere('hexa_id', $any) ?? 0;
        if (!$results_id_maker) {return 'Erro 2';}
        $results_user = User::firstWhere('registration', $results_id_maker->registration) ?? 0;
        if (!$results_user ) {return 'Erro 3';}
        return $results_id_maker->registration . $results_user ->name . " " . $results_user ->last_name;
    }
    private function pushInPunchClock($any, $timestamp): string
    {
        $this->checkAny($any);
        $results_id_maker = IdMaker::firstWhere('registration', $any) ?? 0;
        if (!$results_id_maker) {return 'Erro 4';}
        $io = match ($results_id_maker->io) {
            0 => 1,
            1 => 0,
        };
        $texto = match ($io) {
            0 => "Saida",
            1 => "Entrada",
        };
        $results_id_maker->update(['io' => $io]);
        PunchClock::create([
            'registration' => $any,
            'io' => $io,
            'created_at' => $timestamp,
        ]);
        return "Inscrito|" . $texto;
    }
    private function removeRemnants(): string
    {
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
    }
    private function getDateTime(): string
    {
        $currentDateTime = new DateTime('now');
        return $currentDateTime->format('dmyHis');
    }
}
