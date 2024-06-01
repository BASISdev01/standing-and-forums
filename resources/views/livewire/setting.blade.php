<x-slot:title>Settings</x-slot:title>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            @if(session()->has('success'))
                <div class="alert alert-success py-2 mb-2">
                    <i class="bi bi-check-circle"></i> {{ session('success') }}
                </div>
            @endif
            <div class="card border-0 shadow-sm">
                <div class="card-header">
                    Settings
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="store">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title<span class="text-danger">*</span></label>
                            <input type="text" wire:model="title" placeholder="25 YEARS OF BASIS" class="form-control @error('title') is-invalid @enderror" id="title">
                            @error('title')
                            <div class="invalid-feedback"><i class="bi bi-exclamation-triangle"></i> {{$message}}</div>
                            @enderror
                        </div>
                        {{--  <div class="mb-3">
                              <label for="logo" class="form-label">Logo<span class="text-danger">*</span></label>
                              <input type="file" wire:model="logo" class="form-control @error('logo') is-invalid @enderror" id="logo">
                              @error('logo')
                              <div class="invalid-feedback"><i class="bi bi-exclamation-triangle"></i> {{$message}}</div>
                              @enderror
                          </div>--}}
                        <div class="mb-3">
                            <label for="copyright" class="form-label">Copyright<span class="text-danger">*</span></label>
                            <input type="text" wire:model="copyright" placeholder="All rights Reserved" class="form-control @error('copyright') is-invalid @enderror" id="copyright">
                            @error('copyright')
                            <div class="invalid-feedback"><i class="bi bi-exclamation-triangle"></i> {{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="deadline" class="form-label">Registration Deadline<span class="text-danger">*</span></label>
                            <input type="date" wire:model="deadline" placeholder="DD-MM-YYYY" class="form-control @error('deadline') is-invalid @enderror" id="deadline">
                            @error('deadline')
                            <div class="invalid-feedback"><i class="bi bi-exclamation-triangle"></i> {{$message}}</div>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-success" type="submit"><i class="bi bi-save-fill"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
