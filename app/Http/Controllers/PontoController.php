<?php

namespace App\Http\Controllers;
use App\Models\IdMaker;
use App\Models\MInecraft;
use App\Models\PunchClock;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Datetime;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use function Laravel\Prompts\error;

class PontoController extends Controller
{
    public function index(): string
    {
        return view('ponto.index');
    }

    public function seeligaredesligar(int $operation){
        if ($operation == 1){
            $any = "ligar";
        }
        else{
            $any = "desligar";
        }
        $results_id_maker = MInecraft::firstWhere('id', $any) ?? 0;
        return $results_id_maker->estado;
    }

    public function ligaredesligar(int $operation)
    {
        if ($operation == 1){
            $any = "ligar";
        }
        else{
            $any = "desligar";
        }
        $results_id_maker = MInecraft::firstWhere('id', $any) ?? 0;
        $io = match ($results_id_maker->estado) {
            0 => 1,
            1 => 0,
        };
        $results_id_maker->update(['estado' => $io]);
        return "FEITO";
    }

    public function gethours(string $registration, string $date)
    {
        if ($registration == '0'){
            abort(404);
        }
        $user = User::firstWhere('registration', $registration) ?? 0;
        $results_all = PunchClock::where('registration', $registration)->get() ?? 0;
        $hours_all = $this->get_hours($results_all);
        $hours_query = 0;
        if ($date != 0){
            $results_query = PunchClock::where('registration', $registration)->whereYear('created_at', $date)->get() ?? 0;
            $hours_query = $this->get_hours($results_query);
        }
        return view('hours.index', compact('hours_all', 'hours_query', 'user', 'date', 'results_all'));
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
            case "9":
                return $this->removeRemnants1();
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
        $results_id_maker = IdMaker::firstWhere('registration', $any) ?? 0;
        $seek_active = $results_id_maker->active;
        if ($seek_active == 0){return 'Erro 7';}
        return $results_user->registration . $results_user->name . " " . $results_user->last_name;
    }
    private function checkHexaId($any): string
    {
        $this->checkAny($any);
        $results_id_maker = IdMaker::firstWhere('hexa_id', $any) ?? 0;
        if (!$results_id_maker) {return 'Erro 2';}
        $seek_active = $results_id_maker->active;
        if ($seek_active == 0){return 'Erro 6';}
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
        $results_id_maker = IdMaker::where('io', 1)->get() ?? 0;
        if (!$results_id_maker) {
            return "Erro 5";
        }elseif (count($results_id_maker)==0){
            return "Usuarios Ausentes";
        }
        foreach ($results_id_maker as $results) {
            $results->update(['io' => 0]);
            PunchClock::where('registration', $results->registration)->orderBy('created_at', 'desc')->limit(1)->delete();
        }
        return "Entrada de ponto excluída";
    }
    private function removeRemnants1(): string
    {
        $results_id_maker = IdMaker::where('io', 1)->get() ?? 0;
        if (!$results_id_maker) {
            return "Erro 5";
        }elseif (count($results_id_maker)==0){
            return "Usuarios Ausentes";
        }
        foreach ($results_id_maker as $results) {
            $results->update(['io' => 0]);
            PunchClock::create([
                'registration' => $results->registration,
                'io' => '0'
            ]);
        }
        return "Usuários Deslogados";
    }
    private function getDateTime(): string
    {
        $currentDateTime = new DateTime('now');
        return $currentDateTime->format('dmyHis');
    }

    private function get_hours($initarray){
        $results_year = [];
        $n = 0;
        $switch = 0;
        foreach ($initarray as $result){
            switch ($switch) {
                case 0:
                    $results_year[$n][0] = $result->created_at;
                    $switch = 1;
                    break;
                case 1:
                    $results_year[$n][1] = $result->created_at;
                    $switch = 0;
                    $n+=1;
                    break;
            }
        }
        if (count($results_year[count($results_year)-1]) == 1){
            array_pop($results_year);
        }
        $totalDuration = [];
        foreach ($results_year as $result){
            $startTime = Carbon::parse($result[0]);
            $finishTime = Carbon::parse($result[1]);
            $stepDuration = $startTime->diff($finishTime)->format('%H:%I:%S');
            $totalDuration[] = $stepDuration;
        }

        $interval = CarbonInterval::seconds(0);
        foreach ($totalDuration as $duration){
            $interval->add(CarbonInterval::createFromFormat('H:i:s', $duration))->cascade();
        }
        $year = $interval->format('%Y');
        $month = $interval->format('%M');
        $days = $interval->format('%D');
        $hours = $interval->format('%H');
        $minutes = $interval->format('%I');
        $seconds = $interval->format('%S');

        $hoursyear = $year * 12 * 31 * 23;
        $hoursmonth = $month * 31 * 23;
        $hoursday = $days * 23;
        $totalhours = $hours + $hoursyear + $hoursmonth + $hoursday;
        $bleh = [$year, $month, $days, $hours, $minutes, $seconds, $interval];
        return $totalhours . ":" . $minutes . ":" . $seconds;
    }
}
