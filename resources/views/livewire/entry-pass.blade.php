<x-slot:title>Entry Pass</x-slot:title>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card text-center shadow-sm border-0">
                <div class="card-header d-flex justify-content-between">
       <span style="font-size: 18px;" class="text-uppercase">
           Entry Pass
       </span>
                    <button wire:click="resetAll" class="btn btn-sm btn-warning text-white"><i
                            class="bi bi-arrow-clockwise"></i> Reset
                    </button>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="{{$searchResult && $searchResult->is_entry===0?'pass':'search'}}">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="pass_id"><i class="bi bi-person-badge-fill"></i></span>
                            <input wire:model="passId" type="tel" id="pass_id" name="pass_id" class="form-control"
                                   placeholder="Search by ID">
                        </div>
                        <p class="mt-3 text-center">
                            @if($searchResult)
                                <img src="{{$searchResult->image??'/images/male.png'}}"
                                     class="rounded mx-auto d-block img-thumbnail" alt="...">
                                <span id="result"
                                      class="text-dark fw-bold text-uppercase">{{$searchResult->company_name}}</span><br>
                                <span id="result" class="text-dark">{{$searchResult->name}}</span><br>

                                <span class="badge bg-primary">{{\App\AppConstant::getTypes()[$searchResult->auth_rep]}}</span>
                            @endif
                        </p>
                        @if($showSearchButton)
                            <div class="d-grid">
                                <button wire:click="search" class="btn btn-primary"><i class="bi bi-search"></i> Search</button>
                            </div>
                        @endif
                        @if($searchResult && $searchResult->is_entry===0)
                            <div class="d-grid">
                                <button wire:click="pass" class="btn btn-success mt-2"><i class="bi bi-check-circle"></i> Pass
                                </button>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
            @if(session()->has('success'))
                <div class="alert alert-success py-2 mt-2">
                    <i class="bi bi-check-circle"></i> {{ session('success') }}
                </div>
            @elseif(session()->has('warning'))
                <div class="alert alert-warning py-2 mt-2">
                    <i class="bi bi-x-circle-fill"></i> {{ session('warning') }}
                </div>
            @elseif(session()->has('error'))
                <div class="alert alert-danger py-2 mt-2">
                    <i class="bi bi-ban"></i> {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
</div>

@push('style')
    <style>
        .img-thumbnail {
            height: 120px;
            width: 120px;
            object-fit: contain;
        }
    </style>
@endpush
