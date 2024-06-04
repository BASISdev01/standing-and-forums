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
            <form method="GET" action="{{ route('committee.index') }}">
                <div class="card-header text-white d-flex" style="justify-content: space-between">
                    <div class="col-md-12">
                        <div class="input-group">
                            <input style="width: 100px;" type="text" id="Search"
                                value="{{ request('company_name') }}" name="company_name" class="form-control me-2 ms-2"
                                title="Search with Company Name" placeholder="Company Name" />
                            <select name="priority_lable" style="width: 105px;" title="Select Priority" class="form-select"
                                aria-label="Default select example">
                                <option value="">Select Priority</option>
                                <option value="first" @if (request('priority_lable') == 'first') selected @endif>First Priority
                                </option>
                                <option value="second" @if (request('priority_lable') == 'second') selected @endif>Second Priority
                                </option>
                            </select>
                            <select name="committee" style="width: 140px;" title="Select Standing Committee"
                                class="form-select" aria-label="Default select example">
                                <option value="">Select Committee</option>
                                @foreach ($standingCommittee as $committee)
                                    <option value="{{ $committee }}" @if (request('committee') == $committee) selected @endif>
                                        {{ $committee }}</option>
                                @endforeach
                            </select>
                            <select name="forum" style="width: 100px;" title="Select Forums" class="form-select"
                                aria-label="Default select example">
                                <option value="">Select Forum</option>
                                @foreach ($forums as $forum)
                                    <option value="{{ $forum }}" @if (request('forum') == $forum) selected @endif>
                                        {{ $forum }}</option>
                                @endforeach
                            </select>
                            <select name="year" title="Select Year" class="form-select"
                                aria-label="Default select example">
                                <option value="">Year</option>
                                @foreach ($Years as $Year)
                                    <option value="{{ $Year }}" @if (request('year') == $Year) selected @endif>
                                        {{ $Year }}</option>
                                @endforeach
                                </option>
                            </select>
                            <select name="status" style="width: 60px;" title="Select Year" class="form-select"
                                aria-label="Default select example">
                                <option value="pending" @if (request('status') == 'pending') selected @endif>Pending
                                </option>
                                <option value="approved" @if (request('status') == 'approved') selected @endif>Approved
                                </option>
                                <option value="rejected" @if (request('status') == 'rejected') selected @endif>Rejected
                                </option>
                            </select>
                            <button class="btn btn-primary rounded-end" title="Search" type="submit"><i
                                    class='bx bx-search'></i></button>

                            <a href="{{ route('committee.index') }}" title="Filter Reset" class="btn btn-warning mx-2 rounded"><i
                                    class="bx bx-sync"></i>
                            </a>

                            <a href="{{ route('committee.index') }}" title="Create A Request" class="btn btn-info mx-2 rounded"><i
                                    class='bx bx-plus me-1'></i>
                            </a>
                            <a href=""
                                title="Export all Data" class="btn btn-secondary rounded">Export<i
                                    class="ms-2 fa-solid fa-file-export"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
            <div class="card-body">
                <table class="table table-bordered myTable">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center fs-7" style="width: 30px !important; padding:5px !important;">Sl. No.
                            </th>
                            <th class="fs-7 text-center" style="width: 40px !important; padding:5px !important;">
                                Submitted Date</th>
                            <th class="fs-7 text-center" style="width: 70px !important; padding:5px !important;">Year
                            </th>
                            <th class="fs-7 text-center" style="width: 60px !important; padding:5px !important;">
                                Rep.Name and Designation
                            </th>
                            <th class="fs-7 text-center" style="width: 40px !important; padding:5px !important;">Email &
                                Phone</th>
                            <th class="fs-7 text-center" style="width: 100px !important; padding:5px !important;">1st
                                Priority</th>
                            <th class="fs-7 text-center" style="width: 100px !important; padding:5px !important;">2nd
                                Priority</th>
                            <th class="fs-7 text-center" style="width: 190px !important; padding:5px !important;">
                                Comments</th>
                            <th class="fs-7 text-center" style="width: 100px !important; padding:5px !important;">Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $id = 1;
                        @endphp
                        @foreach ($registrationDataset as $registration)
                            <tr>
                                <td class="text-center" style="padding:5px !important;">
                                    {{ ($registrationDataset->currentPage() - 1) * $registrationDataset->perPage() + $id }}
                                </td>

                                <td class="text-center" style="padding:5px !important;">
                                    {{ $registration->registration['submitted_date'] }}
                                </td>
                                <td class="text-center" style="padding:5px !important;">
                                    {{ $registration->registration['year'] }}
                                </td>

                                <td class="text-center" style="padding:5px !important;">
                                    {{ $registration->par_name }}<br> {{ $registration->par_designation }}
                                </td>
                                <td class="text-center" style="padding:5px !important;">
                                    {{ $registration->par_email }} <br> {{ $registration->par_phone }}
                                </td>
                                <td class="text-center" style="padding:5px !important;">
                                    @if ($registration->priority_lable == 'first')
                                        {{ $registration->priority }}
                                    @endif
                                </td>
                                <td class="text-center" style="padding:5px !important;">
                                    @if ($registration->priority_lable == 'second')
                                        {{ $registration->priority }}
                                    @endif
                                </td>
                                <td class="text-center" style="padding:5px !important;">
                                    <textarea class="form-control p-2 border border-dark-subtle" placeholder="Leave a comment here" id="floatingTextarea2"
                                        style="height: 80px"></textarea>
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
                            @php
                                $id++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
                <div class="contaner">
                    @if ($registrationDataset->total() < 1)
                        <div class="text-center">
                            <h3 class="text-danger m-4"> No Data Found </h3>
                        </div>
                    @endif
                    @if ($registrationDataset->total() > 1)
                        <div class="d-flex justify-content-center mt-4">
                            {{ $registrationDataset->appends(request()->except('page'))->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


    @push('script')
        <script></script>
    @endpush

</x-app-layout>
