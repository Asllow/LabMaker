<h1>Contador de horas trabalhadas - LabMaker</h1>
<h2 style="margin-top: 1rem">{{ $user->registration }} - {{ $user->name }} {{ $user->last_name }}</h2>
<div style="display: inline-flex; gap: 2rem; margin-top: 1rem; margin-left: 1rem">
    <div>
        <fieldset>
            <h4>Horas Totais</h4>
            <strong>{{ $hours_all }}</strong>
        </fieldset>
    </div>
    <div>
        <fieldset>
            <h4>Horas do ano escolhido ({{ $date }})</h4>
            <strong>{{ $hours_query }}</strong>
        </fieldset>
    </div>
</div>
