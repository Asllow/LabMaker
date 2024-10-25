<h1>Contador de horas trabalhadas - LabMaker</h1>
<h2 style="margin-top: 2rem; margin-left: 1rem">{{ $user->registration }} - {{ $user->name }} {{ $user->last_name }}</h2>
<div style="display: inline-flex; gap: 2rem; margin-top: 0.25rem; margin-left: 1rem">
    <div>
        <fieldset>
            <legend><h4>Horas Totais</h4></legend>
            <strong>{{ $hours_all }} horas</strong>
        </fieldset>
    </div>
    <div>
        <fieldset>
            <legend><h4>Horas do ano escolhido ({{ $date }})</h4></legend>
            <strong>{{ $hours_query }} horas</strong>
        </fieldset>
    </div>
</div>
