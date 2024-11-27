<h1>Contador de horas trabalhadas - LabMaker</h1>
<h2 style="margin-top: 2rem; margin-left: 1rem">{{ $user->registration }} - {{ $user->name }} {{ $user->last_name }}</h2>
<div style="display: inline-flex; gap: 2rem; margin-top: 0.25rem; margin-left: 1rem; margin-bottom: 2rem">
    <div>
        <fieldset>
            <legend><h4>Horas Totais</h4></legend>
            <strong>{{ $hours_all }} horas</strong>
        </fieldset>
    </div>
    @if($hours_query != 0)
        <div>
            <fieldset>
                <legend><h4>Horas do ano escolhido ({{ $date }})</h4></legend>
                <strong>{{ $hours_query }} horas</strong>
            </fieldset>
        </div>
    @endif
</div>
<div>
        @foreach($results_all as $rs)
            <td>
                {{ $rs->id }}
            </td>
            <td>
                {{ $rs->registration }}
            </td>
            <td>
                {{ $rs->created_at }}
            </td>
            <td>
                {{ $rs->io }}
            </td>
        @endforeach
</div>
