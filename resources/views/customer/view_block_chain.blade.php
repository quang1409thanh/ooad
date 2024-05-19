@include('header')

<!-- breadcrumb-area start -->
<div class="breadcrumb-area bg-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">View BlockChain</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->
<div class="content-wraper mt-10">
    <div class="container-fluid">
        <div class="checkout-area">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 col-sm-12">
                            <div class="checkbox-form checkout-review-order">
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
                                        @if($blockData->previous_hash == '0')
                                            @continue
                                        @endif
                                            <?php $data = json_decode($blockData->data); ?>
                                        <tr>
                                            <td style="max-width: 10px !important; overflow-x: auto; border: 2px solid white;">{{ $blockData->blockchain_id }}</td>
                                            <td style="max-width: 300px !important; overflow-x: auto; border: 2px solid white;">{{ $blockData->timestamp}}</td>
                                            <td style="max-width: 300px !important; overflow-x: auto; border: 2px solid white;">
                                                {{ print_r($data) }}
                                            </td>
                                            <td style="width: 300px;max-width: 300px !important; overflow-x: auto; border: 2px solid white;">{{ $blockData->previous_hash }}</td>
                                            <td style="width: 300px;max-width: 300px !important; overflow-x: auto; border: 2px solid white;">{{ $blockData ->hash}}</td>
                                            <td style="max-width: 10px !important; overflow-x: auto; border: 2px solid white;">
                                                Valid
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    /* Áp dụng border cho các cột trong phần header của bảng */
    .table-sm thead th {
        border: 1px solid #ddd; /* Border cho các cột trong phần header */
    }

    /* Áp dụng border cho các cột trong phần body của bảng */
    .table-sm tbody td {
        border: 1px solid #ddd; /* Border cho các cột trong phần body */
    }

</style>
@include('footer')
