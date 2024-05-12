@include('header')

<div class="container-fluid m-4">
    <table class="table-sm table-responsive table-striped">
        <thead>
        <tr>
            <th>Block Index</th>
            <th>Timestamp</th>
            <th>Data</th>
            <th>Previous Hash</th>
            <th>Hash</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $blockData)
            @if($blockData["Previous Hash"] == '0')
                @continue
            @endif
                <?php $data = json_decode($blockData->data); ?>
            <tr>
                <td style="max-width: 10px !important; overflow-x: auto; border: 2px solid white;">{{ $blockData->blockchain_id }}</td>
                <td style="max-width: 30px !important; overflow-x: auto; border: 2px solid white;">{{ $blockData->timestamp}}</td>
                <td style="max-width: 300px !important; overflow-x: auto; border: 2px solid white;">
                    {{ print_r($data) }}
                </td>
                <td style="width: 300px;max-width: 300px !important; overflow-x: auto; border: 2px solid white;">{{ $blockData->previous_hash }}</td>
                <td style="width: 300px;max-width: 300px !important; overflow-x: auto; border: 2px solid white;">{{ $blockData ->hash}}</td>
                <td style="max-width: 10px !important; overflow-x: auto; border: 2px solid white;">Valid</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@include('footer')
