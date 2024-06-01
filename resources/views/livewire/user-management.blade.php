<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show  mb-2" role="alert">
                    <i class="bi bi-check-circle"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead class="table-dark">
                    <tr>
                        <th>S.L</th>
                        <th width="25%">Name</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>E. Passed</th>
                        <th>Registrations</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $key=>$user)
                        <tr>
                            <td class="align-middle">{{$users->firstItem()+$key}}.</td>
                            <td class="align-middle">{{$user->name}}</td>
                            <td class="align-middle">{{$user->email}}</td>
                            <td class="align-middle">{{date('d-F-Y',strtotime($user->created_at))}}</td>
                            <td class="align-middle text-center">{{$user->entries_count}}</td>
                            <td class="align-middle text-center">{{$user->registrations_count}}</td>
                            <td class="align-middle text-center">
                                <button wire:confirm="Are you sure want to delete this user?"
                                        wire:click="delete({{$user->id}})" class="btn btn-danger btn-sm"><i
                                        class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-danger"><i class="bi bi-ban"></i> Users Not found!
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            {{$users->links()}}
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header">
                    New User Create Form
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="store">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
                            <input type="text" autocomplete="off" wire:model="name" placeholder="Enter full name"
                                   class="form-control @error('name') is-invalid @enderror" id="name">
                            @error('name')
                            <div class="invalid-feedback"><i class="bi bi-exclamation-triangle"></i> {{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                            <input type="email" autocomplete="off" wire:model="email" placeholder="example@email.com"
                                   class="form-control @error('email') is-invalid @enderror" id="email">
                            @error('email')
                            <div class="invalid-feedback"><i class="bi bi-exclamation-triangle"></i> {{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
                            <input type="password" autocomplete="off" wire:model="password" placeholder="************"
                                   class="form-control @error('password') is-invalid @enderror" id="password">
                            @error('password')
                            <div class="invalid-feedback"><i class="bi bi-exclamation-triangle"></i> {{$message}}</div>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success"><i class="bi bi-save-fill"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
