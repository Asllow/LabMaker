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
    <table style="border-collapse: separate; border-spacing: 2.5rem 0;">
        <thead class="">
        <tr>
            <th scope="col" class="px-6 py-3">Id</th>
            <th scope="col" class="px-6 py-3">Matrícula</th>
            <th scope="col" class="px-6 py-3">Data</th>
            <th scope="col" class="px-6 py-3">Entrada/Saída</th>
        </tr>
        </thead>
        @foreach($results_all as $rs)
            <tbody>
                <tr>
                    <td style="padding: 0.75rem 0">
                        {{ $rs->id }}
                    </td>
                    <td style="padding: 0.75rem 0">
                        {{ $rs->registration }}
                    </td>
                    <td style="padding: 0.75rem 0">
                        {{ $rs->created_at }}
                    </td>
                    <td style="padding: 0.75rem 0">
                        {{ $rs->io }}
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>
</div>
