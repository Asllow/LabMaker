<h1>Contador de horas trabalhadas - LabMaker</h1>
<h3>{{ $user->registration }} - {{ $user->name }} {{ $user->last_name }}</h3>
<div style="display: inline-flex; gap: 1rem">
    <div>
        <h4>Horas Totais</h4>
        <strong>{{ $hours_all }}</strong>
    </div>
    <div>
        <h4>Horas do ano escolhido ({{ $date }})</h4>
        <strong>{{ $hours_query }}</strong>
    </div>
</div>
