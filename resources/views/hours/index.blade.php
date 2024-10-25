<h1>Contador de horas trabalhadas - LabMaker</h1>
<h2>{{ $user->registration }} - {{ $user->name }} {{ $user->last_name }}</h2>
<div style="display: inline-flex; gap: 2rem">
    <div>
        <fieldset>
            <h4>Horas Totais</h4>
            <strong>{{ $hours_all }}</strong>
        </fieldset>
    </div>
    <div>
        <h4>Horas do ano escolhido ({{ $date }})</h4>
        <strong>{{ $hours_query }}</strong>
    </div>
</div>
