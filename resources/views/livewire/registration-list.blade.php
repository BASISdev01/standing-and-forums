<div>
    @if($msg = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{$msg}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif($msg = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> {{$msg}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">
        <div class="d-flex justify-content-between">
            <div class="text-center align-self-center text-uppercase"><strong>Registrations List({{$registrations->total()}})</strong></div>
          {{--  <div>
                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#registerModal">
                    <i class="bi bi-person-plus"></i> Registration
                </button>
                <a href="{{route('excel.export',['company_name'=>$company_name,'rep_name'=>$rep_name,'mobile'=>$mobile,'reg_id'=>$reg_id,'type'=>$type])}}" class="btn btn-success btn-sm"><i class="bi bi-file-earmark-excel"></i> Excel Export</a>
            </div>--}}
        </div>
        <div class="col-md-12 mt-2">
            <div class="row g-2">
                <div class="col-md-2 mb-2">
                    <input type="text" wire:model.live.debounce.800ms="reg_id" placeholder="Search by ID" class="form-control">
                </div>
                <div class="col-md-3 mb-2">
                    <input type="text" wire:model.live.debounce.500ms="company_name" placeholder="Search by Company name" class="form-control">
                </div>
                <div class="col-md-2 mb-2">
                    <input type="date" wire:model.live.debounce.500ms="date" placeholder="DD-MM-YYY" class="form-control">
                </div>
                <div class="col-md-3 mb-2">
                    <input type="text" wire:model.live.debounce.500ms="rep_name" placeholder="Search by name" class="form-control">
                </div>
                <div class="col-md-2 mb-2">
                    <input type="text" wire:model.live.debounce.800ms="mobile" placeholder="Search by Mobile" class="form-control">
                </div>
                <div class="col-md-2 mb-2">
                    <select name="pass" id="pass" wire:model.change="pass" class="form-select">
                        <option value="">Entry Pass</option>
                        <option value="1">Passed</option>
                        <option value="2">Remaining</option>
                    </select>
                </div>
                <div class="col-md-2 mb-2">
                    <select name="type" id="type" wire:model.change="reg_type" class="form-select">
                        <option value="">Reg. Type</option>
                        <option value="1">Manual</option>
                        <option value="2">Self</option>
                    </select>
                </div>
                <div class="col-md-2 mb-2">
                    <select name="type" id="type" wire:model.change="type" class="form-select">
                        <option value="">Type</option>
                        @foreach($userTypes as $key=>$t)
                            <option value="{{strtolower($key)}}">{{$t}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#registerModal">
                        <i class="bi bi-person-plus"></i> Registration
                    </button>
                </div>
                <div class="col-md-4">
                  <div class="text-end">
                      <a href="{{route('excel.export',['company_name'=>$company_name,'rep_name'=>$rep_name,'mobile'=>$mobile,'reg_type'=>$reg_type,'reg_id'=>$reg_id,'type'=>$type,'pass'=>$pass,'date'=>$date])}}" class="btn btn-success"><i class="bi bi-file-earmark-excel"></i> Excel Export</a>
                      <button type="button" wire:click="resetFiltering" class="btn btn-warning">
                          <i class="bi bi-arrow-clockwise"></i> Reset Filtering
                      </button>
                  </div>
                </div>
            </div>
            <div class="table-responsive mt-2 reg_table">
                <table class="table table-striped table-sm">
                    <thead class="table-dark">
                    <tr>
                        <th>#ID</th>
                        <th width="25%">Company Name</th>
                        <th>Participant Name</th>
                        <th>Email & Mobile</th>
                        <th width="8%">Type</th>
                        <th width="8%">Entry Pass</th>
                        @if(\Auth::user()->role===1)
                        <th class="text-center">Actions</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody wire:poll.3s.keep-alive>
                    @forelse($registrations as $register)
                        <tr>
                            <td class="align-middle"><strong>{{sprintf('%04d',$register->reg_id)}}</strong></td>
                            <td class="align-middle">
                                <img src="{{$register->logo??'/images/broken-image.png'}}" style="height: 40px; width: 40px; object-fit: contain" class="img-thumbnail" alt=""> {{$register->company_name}}
                            </td>
                            <td class="align-middle">
                                <span wire:click="updateName('{{$register->membership_id}}')"> <img src="{{$register->image??'/images/avatar.png'}}" style="height: 40px; width: 40px; object-fit: contain" class="img-thumbnail" alt=""> {{$register->name}}</span>
                            </td>
                            <td class="align-middle">
                                {{$register->email}} @if($register->sent)
                                    <i class="bi bi-check text-success fw-bold"></i>
                                @endif<br>
                                {{$register->mobile}}</td>
                            <td class="align-middle">
                                @if($register->auth_rep==='YES')
                                    <span class="badge bg-primary w-100">Member</span>
                                @elseif($register->auth_rep==='NO')
                                    <span class="badge bg-info w-100">Member Alt</span>
                                @elseif($register->auth_rep==='VIP')
                                    <span class="badge bg-warning w-100">VIP</span>
                                @elseif($register->auth_rep==='JOURNALIST')
                                    <span class="badge bg-danger w-100">Journalist</span>
                                @elseif($register->auth_rep==='AMBASSADOR')
                                    <span class="badge bg-success w-100">Ambassador</span>
                                @elseif($register->auth_rep==='GOVT')
                                        <span class="badge bg-secondary w-100">Govt</span>
                                @elseif($register->auth_rep==='PAST_EC')
                                    <span class="badge bg-secondary w-100">Past EC and Founding Member</span>
                                @elseif($register->auth_rep==='BANKS')
                                    <span class="badge bg-secondary w-100">Banks</span>
                                @elseif($register->auth_rep==='ASSOCIATIONS')
                                    <span class="badge bg-secondary w-100">Associations</span>
                                @elseif($register->auth_rep==='OTHER')
                                        <span class="badge bg-dark w-100">Other</span>
                                @endif
                            </td>
                            <td class="text-center align-middle">
                                @if($register->is_entry)
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                    {{--                            @else--}}
                                    {{--                                <button class="btn btn-sm btn-warning text-white"><i class="bi bi-clock-history"></i></button>--}}
                                @endif
                            </td>
                            @if(\Auth::user()->role===1)
                            <td class="align-middle text-center" width="13%">
                                @if($register->is_entry)
                                    <button type="button" onclick="gatePass({{$register->id}},0)" title="Undo Entry"
                                            data-toggle="tooltip" class="btn btn-info btn-sm"><i
                                            class="bi bi-arrow-clockwise"></i></button>
                                @else
                                    <button type="button" onclick="gatePass({{$register->id}},1)" title="Entry Pass"
                                            data-toggle="tooltip" class="btn btn-success btn-sm"><i
                                            class="bi bi-box-arrow-in-right"></i></button>
                                @endif
                                <button id="sendEmailBtn" onclick="sendEmail(this,{{$register->id}})" title="Send Email"
                                        data-toggle="tooltip" class="btn btn-secondary btn-sm">
                                    <i id="icon_{{$register->id}}" class="bi bi-envelope-check"></i>
                                    <span id="loader_{{$register->id}}" class="spinner-border spinner-border-sm d-none"
                                          aria-hidden="true"></span>
                                </button>
                                <a href="{{route('download.pass',$register->id)}}" title="Download Entry Pass"
                                   data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                        class="bi bi-person-badge"></i></a>
                                    <button type="button" wire:click="delete({{$register->id}})" wire:confirm="Are you sure want to delete this?" title="Delete"
                                       data-toggle="tooltip" class="btn btn-danger btn-sm"><i
                                            class="bi bi-trash"></i></button>
                                <div id="msg_{{$register->id}}" role="alert"></div>
                            </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{\Auth::user()->role===1?7:6}}" class="text-center text-danger"><i class="bi bi-ban"></i> Data Not found!</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            {{$registrations->links()}}
        </div>
    </div>
</div>
@push('style')
    <style>
        tbody{
            font-size: 14px;
        }
    </style>
@endpush

@push('script')
    <script>
        function sendEmail(button, id) {
            $(button).prop('disabled', true);
            $(`#msg_${id}`).hide().text('');
            $(`#icon_${id}`).hide();
            $(`#loader_${id}`).removeClass('d-none');
            $.ajax({
                url: `/admin/email/${id}/send`,
                method: 'GET',
                success: function (data) {
                    $(`#msg_${id}`).removeClass('alert-danger').addClass('text-success fw-bold').text('Email sent...').show();
                },
                error: function (error) {
                    $(`#msg_${id}`).removeClass('text-success').addClass('text-danger').text('Email not sent...').show();
                },
                complete: function () {
                    setTimeout(function () {
                        $(`#msg_${id}`).hide().text('');
                    }, 1000)
                    $(`#icon_${id}`).show();
                    $(`#loader_${id}`).addClass('d-none');
                    $(button).removeAttr('disabled');
                }
            });
        }
        function gatePass(id, status) {
            $(`#msg_${id}`).hide().text('');
            $.ajax({
                url: `/admin/member/${id}/enter/${status}`,
                method: 'GET',
                success: function (data) {
                    $(`#msg_${id}`).removeClass('alert-danger').addClass('text-success fw-bold').text(status?'Gate Passed':'Undo Pass').show();
                },
                error: function (error) {
                    $(`#msg_${id}`).removeClass('text-success').addClass('text-danger').text('Already entered').show();
                },
                complete: function () {
                    setTimeout(function () {
                        $(`#msg_${id}`).hide().text('');
                    }, 1000)
                }
            });
        }
    </script>
@endpush
