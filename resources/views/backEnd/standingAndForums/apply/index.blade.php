<x-app-layout>
    <x-slot:title>Compliance</x-slot:title>
    {{--  <x-breadcrumb>
        <x-slot:section>Compliance</x-slot:section>
        <x-slot:title>Manage Compliance</x-slot:title>
    </x-breadcrumb>  --}}
    @push('style')
        <style>
            .hidden {
                display: none;
            }

            .myTable tbody tr td {
                padding: 0px;
                font-size: 13px;
                /* font-weight: bold;*/
            }

            .myTable thead tr th {
                font-size: 10px;
            }
        </style>
    @endpush
    <!-- Show All Certificates Request Table-->
    <div class="card pb-4">
        <div class="container">
            <form method="GET" action="">
                <div class="card-header text-white d-flex" style="justify-content: space-between">
                    <div class="col-md-12">
                        <div class="input-group">
                            <input style="width: 140px;" type="text" id="Search"
                                value="{{ request('company_name') }}" name="company_name" class="form-control me-2 ms-2"
                                title="Search with Company Name" placeholder="Search with Company Name...." />
                            <select name="date_type" title="Select Standing Committee" class="form-select" aria-label="Default select example">
                                @foreach ($standingCommittee as $committee)
                                    <option value="committee" @if (request('committee') == $committee) selected @endif>{{ $committee }}</option>
                                @endforeach
                            </select>
                            <select name="date_type" style="width: 140px;" title="Select Forums" class="form-select" aria-label="Default select example">
                                @foreach ($forums as $forum)
                                    <option value="committee" @if (request('committee') ==  $forum) selected @endif>{{ $forum }}</option>
                                @endforeach
                            </select>

                            <select name="year" title="Select Year" class="form-select" aria-label="Default select example">
                                <option value="">Select Year</option>
                                @foreach ($Years as $Year)
                                    <option value="committee" @if (request('Year') ==  $Year) selected @endif>{{ $Year }}</option>
                                @endforeach
                                </option>
                            </select>
                            <button class="btn btn-primary rounded-end" title="Search" type="submit"><i class='bx bx-search'></i> Search</button>

                            <a href=""
                                title="Filter Reset" class="btn btn-warning mx-2 rounded"><i class="bx bx-sync"></i>Reset
                            </a>

                            <a href="{{ url('/form') }}"
                                title="Create A Request" class="btn btn-info mx-2 rounded"><i class='bx bx-plus me-1'></i>
                            </a>

                            {{--  @can('Compliance Export')  --}}
                                <a
                                    @if (!empty(request()->all()))
                                        href=" "
                                    @else
                                        href=""
                                    @endif
                                    title="Export all Data" class="btn btn-secondary rounded">Export<i class="ms-2 fa-solid fa-file-export"></i>
                                </a>
                            {{--  @endcan  --}}
                        </div>
                    </div>
                </div>
            </form>
            <div class="card-body px-0">
                <table class="table table-bordered myTable">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center fs-7" style="width: 30px !important; padding:5px !important;">Sl. No.
                            </th>
                            <th class="fs-7 text-center" style="width: 40px !important; padding:5px !important;">Submitted Date</th>
                            <th class="fs-7 text-center" style="width: 70px !important; padding:5px !important;">Year</th>
                            <th class="fs-7 text-center" style="width: 60px !important; padding:5px !important;">
                                Rep.Name and Designation
                            </th>
                            <th class="fs-7 text-center" style="width: 40px !important; padding:5px !important;">Email & Phone</th>
                            <th class="fs-7 text-center" style="width: 100px !important; padding:5px !important;">1st Priority</th>
                            <th class="fs-7 text-center" style="width: 100px !important; padding:5px !important;">2nd Priority</th>
                            <th class="fs-7 text-center" style="width: 190px !important; padding:5px !important;">Comments</th>
                            <th class="fs-7 text-center" style="width: 100px !important; padding:5px !important;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="Resource-container">
                        @php
                            $id = 1;
                        @endphp
                        <tr>
                            <td class="text-center" style="padding:5px !important;">
                               1
                            </td>
                            <td class="text-center" style="padding:5px !important;">
                                20, May 2024
                             </td>
                             <td class="text-center" style="padding:5px !important;">
                                2024
                             </td>
                             <td class="text-center" style="padding:5px !important;">
                                Mr. Kamal <br> CEO
                             </td>
                             <td class="text-center" style="padding:5px !important;">
                                enail@gmail.com <br>
                                01764388484
                             </td>
                             <td class="text-center" style="padding:5px !important;">
                                FinTech & Digital Payment
                             </td>
                             <td class="text-center" style="padding:5px !important;">
                                Testing & Quality Assurance Forum
                             </td>
                             <td class="text-center" style="padding:5px !important;">
                                <textarea class="form-control p-2 border border-dark-subtle" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 80px"></textarea>
                             </td>
                             <td class="text-center" style="padding:5px !important;">
                                <div class="row me-1">
                                    <div class="col-12 col-md-6">
                                        <a href="" class="btn btn-sm mx-1 btn-danger"
                                            title="View Compliance">
                                            <i class='bx bxs-trash me-1'></i>Delete
                                        </a>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <a href="" class="btn btn-sm mx-1 btn-primary"
                                            title="View Compliance">
                                            <i class='bx bx-check-double me-1'></i>View
                                        </a>
                                    </div>
                                    <div class="col-12 col-md-12 m-2">
                                        <a href="" class="btn btn-sm mx-1 btn-success fw-bold"
                                            title="View Compliance">
                                            <i class='bx bx-check-double me-1'></i>Approve
                                        </a>
                                    </div>
                                </div>
                             </td>
                        </tr>
                        {{--  @foreach ($Compliances as $Compliance)
                            <tr style="padding:10px !important;">
                                <td class="text-center" style="padding:5px !important;">
                                    {{ ($Compliances->currentPage() - 1) * $Compliances->perPage() + $id }}
                                </td>
                                <td class="text-center" style="padding:5px !important;">
                                    {{ date('d M, Y', strtotime($Compliance['submitted_date'])) }}<br>
                                    {{ date('d M, Y', strtotime($Compliance['updated_at'])) }}

                                </td>
                                <td class="text-center">
                                    {{ $Compliance['submitted_year'] }}
                                </td>
                                <td class="text-center" style="padding: 10px !important">
                                    {{ $Compliance['member']['company_name'] }} <br>
                                    {{ $Compliance['member']['company_type'] }} <br>
                                    {{ memberNO($Compliance['member']['id']) ?? '' }}
                                </td>
                                    @php
                                        $oldCompanyRpInfo = oldCompanyRp($Compliance['member_id']);
                                    @endphp
                                <td class="text-center">
                                    <div class="row mb-1">
                                        <div class="col-7">
                                            <div class="text-start ms-2">
                                                Local Market:
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="text-start">
                                                <span class="badge bg-label-danger align-items-end" style="margin-left: -1rem">BDT {{ $Compliance['software_local_market'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-7">
                                            <div class="d-flex justify-content-start ms-2">
                                                International Market:
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="d-flex justify-content-start">
                                                <span class="badge bg-label-danger" style="margin-left: -1rem">$ {{ $Compliance['software_overseas'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    Total Employees: <span class="badge bg-label-danger ms-1">{{ $Compliance['total_hr'] }}</span><br>
                                </td>
                                <td class=" ps-1">
                                    <a href="#" title="View Income Tax Return" @if (empty($Compliance['income_tax'])) hidden @endif class="btn btn-sm btn-secondary btn-custom-size fw-bold fs-9 m-1" style="width: 110px"> Income Tax</a>
                                    <a href="#" title="View Updated Trade License" @if (empty($Compliance['trade_license'])) hidden @endif class="btn btn-sm btn-secondary btn-custom-size fw-bold fs-9 m-1" style="width: 110px">Trade License</a>
                                    <a href="#" title="View TIN Certificate" @if (empty($Compliance['member']['trade_license'])) hidden @endif class="btn btn-sm btn-secondary btn-custom-size fw-bold fs-9 m-1" style="width: 110px"> TIN Certificate</a>
                                    <a href="#" title="View Form X" @if (empty($Compliance['form_x'])) hidden @endif class="btn btn-sm btn-secondary btn-custom-size fw-bold fs-9 m-1" style="width: 110px"> Form X</a>
                                </td>
                                <td class="">
                                    <div class="w-100 d-flex flex-column align-items-center">
                                        @can('Compliance View')
                                            <a href="{{ url('dashboard/compliance/' . $Compliance['id']) }}" class="btn btn-sm mx-1 btn-success btn-custom-size fs-9"
                                                title="View Compliance">
                                                <i class="fa-solid fa-eye me-1"></i>View
                                            </a>
                                        @endcan
                                        <div class="form-check form-switch mt-2 ps-0 text-center">
                                            @can('Compliance Lock')
                                                <input name="show_home_page" title="Lock The Compliance Form" id="lock_{{ $Compliance['id'] }}" class="form-check-input ms-1 fs-6"
                                                    type="checkbox" @if ($Compliance['is_lock'] == 1) value="0" checked @else value="1" @endif
                                                    data-id="{{ $Compliance['id'] }}" onclick="lock(this)" />
                                            @endcan
                                        </div>
                                    </div>

                                </td>  --}}
                            </tr>
                            @php
                                $id++;
                            @endphp
                        {{--  @endforeach  --}}
                    </tbody>
                </table>
                <div class="contaner">
                    {{--  @if ($Compliances->total() < 1)
                        <div class="text-center">
                            <h3 class="text-danger m-4"> No Data Found </h3>
                        </div>
                    @endif
                    @if ($Compliances->total() > 15)
                        <div class="d-flex justify-content-center mt-4">
                            {{ $Compliances->appends(request()->except('page'))->links() }}
                        </div>
                    @endif  --}}
                </div>
            </div>
        </div>
    </div>


    @push('script')
        <script>

        </script>
    @endpush

</x-app-layout>
