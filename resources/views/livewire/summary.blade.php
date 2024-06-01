<div class="row" wire:poll.3s.keep-alive>
    <div class="col-xl-3 col-md-6 mb-4">
        <x-summary-card border="primary" icon="man.png" :count="$summary->registration">
            Total Registration
        </x-summary-card>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <x-summary-card border="info" icon="calendar.png" :count="$summary->today_registration">
            Today Registration
        </x-summary-card>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <x-summary-card border="success" icon="security-gate.png" :count="$summary->passed">
            Entry Passes Issued
        </x-summary-card>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <x-summary-card border="warning" icon="hourglass.png" :count="$summary->remaining">
            Remaining Entry Passes
        </x-summary-card>
    </div>
</div>
