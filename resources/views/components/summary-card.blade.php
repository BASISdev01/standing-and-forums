@props([
    'count'=>0,
    'icon'=>'man.png',
    'border'=>'primary'
])

<div class="card border-left-{{$border}} shadow h-100 py-2">
    <div class="card-body summary_card">
        <div class="row g-0 align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-{{$border}} text-uppercase mb-1">
                    {{$slot}}
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$count}}</div>
            </div>
            <div class="col-auto">
                <img src="/images/{{$icon}}" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</div>
@push('style')
    <style>
        .summary_card{
            padding: 3px 10px !important;
        }
        .border-left-primary {
            border-left: .25rem solid #4e73df !important
        }

        .border-bottom-primary {
            border-bottom: .25rem solid #4e73df !important
        }

        .border-left-secondary {
            border-left: .25rem solid #858796 !important
        }

        .border-bottom-secondary {
            border-bottom: .25rem solid #858796 !important
        }

        .border-left-success {
            border-left: .25rem solid #1cc88a !important
        }

        .border-bottom-success {
            border-bottom: .25rem solid #1cc88a !important
        }

        .border-left-info {
            border-left: .25rem solid #36b9cc !important
        }

        .border-bottom-info {
            border-bottom: .25rem solid #36b9cc !important
        }

        .border-left-warning {
            border-left: .25rem solid #f6c23e !important
        }

        .border-bottom-warning {
            border-bottom: .25rem solid #f6c23e !important
        }

        .border-left-danger {
            border-left: .25rem solid #e74a3b !important
        }

        .border-bottom-danger {
            border-bottom: .25rem solid #e74a3b !important
        }

    </style>
@endpush

