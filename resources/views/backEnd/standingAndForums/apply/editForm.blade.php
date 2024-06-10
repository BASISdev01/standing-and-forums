<x-app-layout>
    <x-slot:title>Compliance</x-slot:title>
    @push('style')
        <style>
            a {
                text-decoration: none;
            }

            input::placeholder {
                color: rgb(192, 192, 192) !important;
            }

            .alert-container {
                width: 100%;
            }

            .logout-toggle-btn {
                top: 0.6rem;
                right: 3rem;
            }

            .header-content {
                width: auto;
            }

            .container {
                width: 93%;
                margin: 12px auto !important;
            }

            .accordion-button {
                cursor: pointer;
            }

            .logout-container:focus .fa-chevron-down {
                transform: rotate(180deg);
            }

            .profile-image {
                height: 40px;
                width: 40px;
                border: 1px solid gray;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 0;
                border-radius: 50%;
                overflow: hidden;
            }

            .profile-image img {
                max-height: 100%;
                max-width: 100%;
                object-fit: fill;
            }

            .alert-container {
                top: 12px;
                left: 50%;
                transform: translateX(-50%);
                z-index: 99;
            }

            .form-bottom-overlay {
                height: 100%;
                width: 100%;
                position: absolute;
                background-color: rgba(0, 0, 0, 0.50);
                top: 0;
                left: 0;
            }

            @media screen and (max-width: 767px) {
                .line-clamp-1 {
                    overflow: hidden;
                    display: -webkit-box;
                    -webkit-box-orient: vertical;
                    -webkit-line-clamp: 1;
                    text-overflow: ellipsis;
                    height: 1lh;
                    width: 32ch;
                }

            }

            @media screen and (min-width:767px) {
                .container {
                    width: 60%;
                    margin: auto;
                }

                .alert-container {
                    top: 90vh;
                    left: 50%;
                    transform: translateX(-50%);
                    z-index: 99;
                }
            }

            input:focus,
            textarea:focus,
            select:focus {
                box-shadow: 0px 0px 2px 3px rgba(0, 128, 0, 0.4) !important;
            }

            .custom-input-focus {
                box-shadow: 0px 0px 1px 1px rgba(255, 0, 0, 0.4) !important;
                border-color: red;
            }

            select option:hover {
                background-color: rgba(0, 128, 0, 0.4) !important;
            }

            button {
                padding: 0.4rem 2rem !important;
            }

            body {
                background-image: url('./images/form-bg.png'), linear-gradient(90deg, #fffbf9, #FFF4FF, #F0FCFF);
            }

            .form-header {
                background-image: url('./images/form-header-bg.png');
                background-size: cover;
                background-position: center center;
                background-repeat: no-repeat;
            }

            .fs-sm {
                font-size: 12px;
            }

            /* For icon rotation */
            .rotate-icon {
                transition: transform 0.3s ease;
            }

            .rotate-icon.collapsed {
                transform: rotate(0deg);
            }

            .rotate-icon:not(.collapsed) {
                transform: rotate(180deg);
            }

            #charCount {
                font-size: 0.875em;
                color: #6c757d;
            }

            #preloader {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.7);
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                z-index: 9999;
            }

            #C_loader {
                display: block;

                left: 50%;
                top: 50%;
                width: 150px;
                height: 150px;
                margin: -75px 0 0 -75px;
                border-radius: 50%;
                border: 3px solid transparent;
                border-top-color: #007F3E;
                -webkit-animation: spin 2s linear infinite;
                animation: spin 2s linear infinite;
            }

            #C_loader:before {
                content: "";
                position: absolute;
                top: 5px;
                left: 5px;
                right: 5px;
                bottom: 5px;
                border-radius: 50%;
                border: 3px solid transparent;
                border-top-color: #ED1C24;
                -webkit-animation: spin 3s linear infinite;
                animation: spin 3s linear infinite;
            }

            #C_loader:after {
                content: "";
                position: absolute;
                top: 15px;
                left: 15px;
                right: 15px;
                bottom: 15px;
                border-radius: 50%;
                border: 3px solid transparent;
                border-top-color: #6EC8BF;
                -webkit-animation: spin 1.5s linear infinite;
                animation: spin 1.5s linear infinite;
            }

            @-webkit-keyframes spin {
                0% {
                    -webkit-transform: rotate(0deg);
                    -ms-transform: rotate(0deg);
                    transform: rotate(0deg);
                }

                100% {
                    -webkit-transform: rotate(360deg);
                    -ms-transform: rotate(360deg);
                    transform: rotate(360deg);
                }
            }

            @keyframes spin {
                0% {
                    -webkit-transform: rotate(0deg);
                    -ms-transform: rotate(0deg);
                    transform: rotate(0deg);
                }

                100% {
                    -webkit-transform: rotate(360deg);
                    -ms-transform: rotate(360deg);
                    transform: rotate(360deg);
                }
            }
        </style>
    @endpush
    <div id="preloader" hidden>
        <div id="C_loader" class="mx-auto"></div>
        <p class="text-white mt-2 fs-3" id="Uploading">Submitting.....</p>
    </div>

    <div class="pb-3 pb-md-5 position-relative">
        @if (session()->has('success') || session()->has('error'))
            <div id="autoCloseAlert"
                class="d-flex alert-container justify-content-center justify-content-md-end position-fixed position-absolute">
                <div class="alert {{ session()->has('success') ? 'bg-success' : 'bg-danger' }} text-white alert-dismissible me-3 d-flex align-items-center"
                    role="alert">
                    {{ session('success') ?? session('error') }}
                    {{--  <button type="button" class="btn-close mt-3 px-2 me-2" data-bs-dismiss="alert"
                    aria-label="Close"></button>  --}}
                </div>
            </div>
        @endif



        <div class="container px-0 w-75 mt-3 bg-white my-md-3 my-xl-5 border border-success-subtle shadow rounded-4 overflow-hidden">
            <div class="row py-0 pb-xl-4 border border-bottom rounded-top-4"
                style="background-image: url('/images/form-header-bg.png'); background-position: center center; background-size:cover; background-repeat: no-repeat;">
                <div class="col-12">
                    <div class="row mb-3 py-3 bg-dark-subtle">
                        <div class="col-12">
                            <!-- Changes -->
                            <div
                                class="me-md-2 d-flex flex-column flex-md-row justify-content-center align-items-start justify-content-md-center align-items-md-center">
                                <div
                                    class="d-flex justify-content-start align-items-center mb-2 mb-md-0 position-relative">
                                    <div class="profile-image d-flex bg-white" type="button" data-toggle="collapse"
                                        data-target="#responsiveCollapse" aria-expanded="false"
                                        aria-controls="responsiveCollapse">
                                        <img src="{{ Logo($registerDataset->registration['membership_id']) }}" alt="">
                                    </div>
                                    <p class="mb-0 ms-2 me-md-2 line-clamp-1" type="button" data-toggle="collapse"
                                        data-target="#responsiveCollapse" aria-expanded="false"
                                        aria-controls="responsiveCollapse">{{ companyName($registerDataset->registration['membership_id'])  }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-center">Submit your EoI to Join BASIS Standing Committee and Forums</h3>
                    <h5 class="text-center">Deadline: 12 June, 2024</h5>
                    <p class="text-center">Note: Members can select a maximum two of any standing committees or forums
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <form class="p-2 p-xl-4 px-xl-5 pb-0"
                action="{{ route('committee.update') }}"
                    enctype="multipart/form-data"  method="post" onsubmit="return validateForm();">
                    @csrf
                    <div class="col-12">
                        <div class="row mb-3">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Company Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control border border-dark-subtle"
                                        id="exampleInputEmail1" name="company_name"
                                        value="{{ $registerDataset->registration['company_name'] }}" aria-describedby="emailHelp" required
                                        >
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Office Address <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="company_address" value="{{ $registerDataset->registration['company_address'] }}"
                                        class="form-control  border border-dark-subtle" required >
                                </div>
                            </div>
                            <input name="par_name" id="first_par_name" value="{{ $registerDataset->par_name }}"
                                hidden />
                            <input name="par_designation" id="first_par_designation"
                                value="{{ $registerDataset->par_designation ?? perDesignation($registerDataset->registration['membership_id']) }}" hidden />
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">E-mail
                                        <span class="text-danger">*</span></label>
                                    <input type="email" name="par_email" id="first_par_email"
                                        value="{{ $registerDataset->par_email }}"
                                        class="form-control border border-dark-subtle" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3"><label for="exampleInputPassword1" class="form-label"> Mobile
                                        <span class="text-danger">*</span></label>
                                    <input type="number" name="par_phone" id="first_par_phone"
                                        value="{{ $registerDataset->par_phone }}"
                                        class="form-control border border-dark-subtle" required maxlength="11"
                                        oninput="this.value = this.value.slice(0, 11); this.value = this.value.replace(/[^0-9]/g, '');">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Facebook Profile </label>
                                    <input type="text"
                                        value="{{ $registerDataset->registration['par_facebook_link'] }}"
                                        name="par_facebook_link" placeholder="https://www.facebook.com/"
                                        class="@error('par_facebook_link') is-invalid @enderror form-control border border-dark-subtle">
                                </div>
                                @error('par_facebook_link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">LinkedIn Profile </label>
                                    <input type="text" name="par_linkedIn_link"
                                        value="{{ $registerDataset->registration['par_linkedIn_link'] }}"
                                        placeholder="https://www.linkedin.com/in/"
                                        class="form-control border @error('par_linkedIn_link') is-invalid @enderror border-dark-subtle"
                                        id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                @error('par_linkedIn_link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        @php
                            $standingCommittee = standingCommittee();
                            $forums = forums();
                        @endphp

                        <!-- Priority -->
                        <div class="row mb-2">
                            <div class="col-12">
                                <div class="text-center p-2 p-xl-3 mb-3 rounded-3" style="background:#D1E7DD">Choose One
                                    Standing
                                    Committee
                                    / Forum <span class="fw-bold text-capitalize">({{ $registerDataset->priority_lable }} Priority) <span
                                            class="text-danger">*</span></span>
                                </div>
                            </div>
                            <input name="priority_type" id="first_priority_type" value="{{ $registerDataset->priority_type }}" hidden />
                            <input name="priority" id="first_priority" value="{{ $registerDataset->priority }}" hidden />
                            <input name="priority_lable" value="{{ $registerDataset->priority_lable }}" hidden />
                            <input name="register_id" value="{{ $registerDataset->registration['id'] }}" hidden />
                            <input name="priority_id" value="{{ $registerDataset->id }}" hidden />
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <select id="first_priority_committe"
                                        class="form-select fw-semibold border border-dark-subtle"
                                        aria-label="Default select example" @if($registerDataset->priority_type == 'forum')
                                        disabled
                                        @endif >
                                        <option value ="" selected>Select Standing Committee</option>
                                        @foreach ($standingCommittee as $committee)
                                            <option value="{{ $committee }}"
                                                @if ($registerDataset->priority == $committee) selected @endif>{{ $committee }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <div class="fs-sm">Participant's Name (Only Representative Can Join) <span
                                            class="text-danger">*</span></div>
                                    <div class="form-check">
                                        <input checked class="form-check-input" type="radio" selected
                                        @if($registerDataset->priority_type == 'forum')
                                            disabled
                                        @endif
                                            name="" id="firstPriorityCommitteNameField">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            {{ perName($registerDataset->registration['membership_id'])  }}, {{  perDesignation($registerDataset->registration['membership_id']) }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <select id="first_priority_forum" @if($registerDataset->priority_type == 'committe')
                                        disabled
                                    @endif
                                        class="form-select fw-semibold border border-dark-subtle"
                                        aria-label="Default select example" required>
                                        <option value ="" selected>Select Forum</option>
                                        @foreach ($forums as $forum)
                                            <option value="{{ $forum }}"
                                                @if ($registerDataset->priority == $forum) selected @endif>{{ $forum }}
                                            </option>
                                        @endforeach
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <div class="fs-sm d-flex">Participant's Name <span
                                            class="text-danger me-2">*</span>
                                        <div id="firstPriorityForumParticipantName"  @if($registerDataset->priority_type == 'committe')
                                            hidden
                                        @endif>
                                            <a href="#" style="text-decoration: none;"
                                                class="rounded-1 text-success fs-sm d-inline-block me-2 fs-6"
                                                onclick="openForm('first')"><i
                                                    class="fa-regular fa-pen-to-square"></i>
                                                Change</a>
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <input checked class="form-check-input" type="radio" selected  @if($registerDataset->priority_type == 'committe')
                                        disabled
                                    @endif
                                            name="" id="firstPriorityNameField">
                                        <label class="form-check-label" for="flexRadioDefault1"
                                            id="firstPriorityNameField_show">
                                            <div>{{ $registerDataset->par_name ?? perName($registerDataset->registration['membership_id'])  }}, {{  $registerDataset->par_designation ?? perDesignation($registerDataset->registration['membership_id']) }}
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="mb-3">
                                    <label for="" class="form-check-label">Briefly describe yourself and your
                                        relevance
                                        to the
                                        committee.
                                        <small>(Min: 100 words)</small>
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="form-floating">
                                        <textarea class="form-control p-2 border border-dark-subtle" placeholder="Leave a comment here"
                                            id="first_priority_relevance_to_committee" name="priority_relevance_to_committee" style="height: 120px"
                                            required>{{ $registerDataset->priority_relevance_to_committee }}</textarea>
                                        <div id="wordCount" class="text-end mt-1">0 / 100</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Identify key areas where this Standing
                                        Committee / Forum can contribute
                                        <span class="text-danger">*</span>
                                    </label>
                                    @foreach (json_decode($registerDataset->priority_support_or_improvement, true) as $priority_support_or_improvement)
                                        <input type="text" value="{{ $priority_support_or_improvement }}"
                                            name="priority_support_or_improvement[]"
                                            class="form-control border border-dark-subtle mb-2" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" required>
                                    @endforeach
                                    <div id="first-more-points"></div>
                                    <div class="mb-2 d-flex justify-content-end">
                                        <div id="firstMorePoints_Button">
                                            <a href="#" style="text-decoration: none;"
                                                class="bg-success p-2 rounded-1 text-white fs-sm mt-2 d-inline-block"
                                                id="firstMorePoints">+ Add</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Provide examples/experience of
                                        your
                                        contribution to policy work or position held related to community engagement.
                                        <span class="text-danger">*</span>
                                    </label>
                                    <textarea class="form-control p-2 border border-dark-subtle" id="floatingTextarea2" style="height: 130px"
                                        name="priority_community_or_policy" required>{{ $registerDataset->priority_community_or_policy }}</textarea>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">How many hours per month can
                                        you
                                        contribute? <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control border border-dark-subtle"
                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                        name="priority_contribute_hours" value="{{ $registerDataset->priority_contribute_hours }}" maxlength="1"
                                        oninput="this.value = this.value.slice(0, 4); this.value = this.value.replace(/[^0-9]/g, '');"
                                        required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Will you attend at least one
                                        monthly
                                        meeting? <span class="text-danger">*</span></label>
                                    <div class="d-flex">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"  @if($registerDataset->priority_attend_monthly_meeting == 'Yes')
                                                    checked
                                                @endif
                                                name="priority_attend_monthly_meeting" id="flexRadioDefault"
                                                value="Yes">
                                            <label class="form-check-label fw-semibold" for="flexRadioDefault1">Yes
                                            </label>
                                        </div>
                                        <div class="form-check ms-2">
                                            <input class="form-check-input" type="radio" @if($registerDataset->priority_attend_monthly_meeting == 'No')
                                                    checked
                                                @endif
                                                name="priority_attend_monthly_meeting" id="no"
                                                value="No">
                                            <label class="form-check-label fw-semibold" for="no">No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Agree With -->
                    <div class="form-bottom position-relative py-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3 form-check">
                                    <input type="checkbox" @if($registerDataset->registration['is_agree'] == 1)
                                        checked
                                    @endif class="form-check-input" value='1' id="is_agree" name="is_agree"
                                        required>
                                    <label class="form-check-label" for="exampleCheck1">I agree with the <a
                                            href="#" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">Terms
                                            & Conditions</a> <span class="text-danger">*</span><br>
                                        This is an EOI form only. BASIS EC holds the right to finalize the Standing
                                        Committee / Forum members.
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3 mb-md-0">
                            <div class="col-12 text-center mt-4">
                                <button type="submit" onclick="showError()" class="btn btn-success text-center"
                                    >save</button>
                                <a href="{{ route('committee.index',['status'=>'pending']) }}" class="btn btn-danger text-center ms-3">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>


        <!-- Terms & Condition Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-success-subtle">
                        <div class="d-flex justify-content-center w-100">
                            <h5 class="modal-title" id="staticBackdropLabel">Terms & Conditions</h5>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        1. Active members can select up to two standing committees or forums (combination of both should
                        not
                        exceed two).<br><br>
                        2. Members may be withdrawn from a standing committee if their annual dues are pending for more
                        than
                        six months.<br><br>
                        3. The EC body reserves the rights to add or reassign any member to or from any committee or
                        forum.<br><br>
                    </div>
                </div>
            </div>
        </div>

        <!-- Change Participants Modal -->
        <div class="modal fade" id="ChangeParticipants" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-success-subtle">
                        <div class="d-flex justify-content-center w-100">
                            <h5 class="modal-title" id="staticBackdropLabel">Change Participants</h5>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <form action="" id="changeParticipantForm">
                                        <input id="par_type" value="" hidden />
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Participants
                                                        Name
                                                        <span class="text-danger">*</span></label>
                                                    <input type="text" name="name"
                                                        class="form-control border border-dark-subtle"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Participants
                                                        Designation <span class="text-danger">*</span></label>
                                                    <input type="text" name="designation"
                                                        class="form-control border border-dark-subtle">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Participants
                                                        Email
                                                        <span class="text-danger">*</span></label>
                                                    <input type="email" name="email"
                                                        class="form-control border border-dark-subtle">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Participants
                                                        Mobile <span class="text-danger">*</span></label>
                                                    <input type="number" name="phone"
                                                        class="form-control border border-dark-subtle" maxlength="11"
                                                        oninput="this.value = this.value.slice(0, 11); this.value = this.value.replace(/[^0-9]/g, '');">
                                                </div>
                                            </div>
                                            <div class="col-12 text-center">
                                                <a class="btn btn-success" onclick="changeParticipant()">Save</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @push('script')
            <script>
                $(document).ready(function() {
                    var firstMorePoints = 3;
                    var firstMoreGap = 3;
                    var secondMoreGap = 3;
                    var secondMorePoints = 3;
                    var first_CommitteeOptions = $('#first_priority_committe').html();
                    var first_ForumOptions = $('#first_priority_forum').html();
                    var second_CommitteeOptions = $('#second_priority_committee').html();
                    var second_ForumOptions = $('#second_priority_forum').html();
                    var perName = "{{ perName($registerDataset->registration['membership_id']) }}";
                    var perDesignation = "{{ perDesignation($registerDataset->registration['membership_id']) }}";
                    var perEmail = "{{perName($registerDataset->registration['membership_id']) }}";
                    var perPhone = "{{ perMobile($registerDataset->registration['membership_id']) }}";

                    //error and sueecee alert
                    var alertElement = document.getElementById('autoCloseAlert');
                    // Set a timeout to hide the alert after 4 seconds
                    if (alertElement) {
                        setTimeout(function() {
                            alertElement.classList.add('d-none')
                        }, 4000);
                    }

                    $('input, textarea').on('blur', function() {
                        $(this).removeClass('custom-input-focus');
                        $(this).removeClass('is-invalid');
                    });

                    //first priority select
                    $('#first_priority_committe').on('change', function() {
                        if ($(this).val()) {
                            $('#first_priority_forum').prop('disabled', true);
                            $('#firstPriorityForumParticipantName').attr('hidden', true);
                            $('#firstPriorityNameField').prop('disabled', true);
                            $('#first_priority_type').val('committe');
                            $('#first_priority').val($(this).val());
                            $("#firstPriorityNameField_show").text(perName + ',' + perDesignation);
                            $("#first_par_name").val(perName);
                            $("#first_par_designation").val(perDesignation);
                            //$("#first_par_email").val(perEmail);
                            //$("#first_par_phone").val(perPhone);
                            $('#first_priority_forum').removeAttr('required');
                            $('#first_priority_forum , #first_priority_committe').removeClass('custom-input-focus');
                            $('#first_priority_forum , #first_priority_committe').removeClass('is-invalid');
                        } else {
                            $('#first_priority_forum').prop('disabled', false);
                            $('#firstPriorityNameField').prop('disabled', false);
                            $('#firstPriorityForumParticipantName').removeAttr('hidden');
                            $('#first_priority_type').val('');
                            $('#first_priority').val($(this).val());
                            $('#first_priority_forum').attr('required', true);;
                        }

                        var selectedValue = $(this).val();

                        if (selectedValue) {
                            $('#second_priority_committee').html(second_CommitteeOptions).find(
                                `option[value="${selectedValue}"]`).remove();
                            $('#second_priority_forum').removeAttr('required');
                            $('#second_priority_forum').prop('disabled', false);
                            $('#second_priority_committe').removeAttr('required');
                            $('#second_priority_committe').prop('disabled', false);
                        } else {
                            $('#second_priority_committee').html(second_CommitteeOptions);
                        }
                    });

                    $('#first_priority_forum').on('change', function() {

                        if ($(this).val()) {
                            $('#first_priority_committe').prop('disabled', true);
                            $('#firstPriorityCommitteNameField').prop('disabled', true);
                            $('#first_priority').val($(this).val());
                            $('#first_priority_type').val('forum');
                            $('#first_priority_committe').removeAttr('required');
                            $('#first_priority_committe , #first_priority_forum').removeClass('custom-input-focus');
                            $('#first_priority_committe , #first_priority_forum').removeClass('is-invalid');

                        } else {
                            $('#firstPriorityCommitteNameField').prop('disabled', false);
                            $('#first_priority_committe').prop('disabled', false);
                            $('#first_priority').val('');
                            $('#first_priority_type').val('');
                            $('#first_priority_committe').removeAttr('required');
                        }

                        var selectedValue = $(this).val();
                        if (selectedValue) {
                            $('#second_priority_forum').html(second_ForumOptions).find(
                                `option[value="${selectedValue}"]`).remove();
                            $('#second_priority_forum').removeAttr('required');
                            $('#second_priority_forum').prop('disabled', false);
                            $('#second_priority_committe').removeAttr('required');
                            $('#second_priority_committe').prop('disabled', false);
                        } else {
                            $('#second_priority_forum').html(second_ForumOptions);
                        }
                    });

                    //linecount first
                    $('#first_priority_relevance_to_committee').on('input', function() {
                        const maxWords = 100;
                        const words = $(this).val().match(/\b[-?(\w+)?]+\b/gi) || [];
                        const wordCount = words.length;

                        if (wordCount > maxWords) {
                            $('#wordLimitMessage').show();
                            const trimmedText = words.slice(0, maxWords).join(' ');
                            $(this).val(trimmedText);
                            $('#wordCount').text(`${maxWords} / ${maxWords} words`);
                        } else {
                            $('#wordLimitMessage').hide();
                            $('#wordCount').text(`${wordCount} / ${maxWords} words`);
                        }
                    });

                    $('#firstMoreGap').click(function(e) {
                        e.preventDefault();
                        firstMoreGap++;
                        var newGapField = `
                        <div class="mb-3 example-field d-flex" id="first_gap_${firstMoreGap}">
                            <input type="text" class="form-control border border-dark-subtle mt-2" name="first_priority_identified_gaps[]" required>
                            <div class="mt-2 ms-2 first-remove-gap d-flex align-items-center" data-index="${firstMoreGap}"><i class="text-danger fa-solid fa-trash-can"></i></div>
                        </div>
                    `;
                        $('#first-more-gap').append(newGapField);
                        var first_priority_support_or_improvement_Button = $(
                            'input[name="first_priority_identified_gaps[]"]').length;
                        if (first_priority_support_or_improvement_Button >= 10) {
                            $('#firstMoreGap_buttonDiv').attr('hidden', true);
                        }
                    });

                    $(document).on('click', '.first-remove-gap', function(e) {
                        e.preventDefault();
                        var indexGap = $(this).data('index');
                        $('#first_gap_' + indexGap).remove();
                        $('#firstMoreGap_buttonDiv').attr('hidden', false);
                    });

                    $('#firstMorePoints').click(function(e) {
                        e.preventDefault();
                        firstMorePoints++;
                        var newExampleField = `
                        <div class="mb-3 example-field d-flex" id="firstMorePoints_${firstMorePoints}">
                            <input type="text" class="form-control border border-dark-subtle mt-2" name="first_priority_support_or_improvement[]" required>
                            <div class="mt-2 ms-2 remove-example-first d-flex align-items-center" data-index="${firstMorePoints}"><i class="text-danger fa-solid fa-trash-can"></i></div>
                        </div>
                    `;
                        $('#first-more-points').append(newExampleField);
                        var firstMorePoints_Button = $('input[name="first_priority_support_or_improvement[]"]')
                            .length;
                        if (firstMorePoints_Button >= 10) {
                            $('#firstMorePoints_Button').attr('hidden', true);
                        }
                    });

                    $(document).on('click', '.remove-example-first', function(e) {
                        e.preventDefault();
                        var firstIndex = $(this).data('index');
                        $('#firstMorePoints_' + firstIndex).remove();
                        $('#firstMorePoints_Button').attr('hidden', false);
                    });

                });

                function openForm(label) {
                    $("#ChangeParticipants").modal('show');
                    $("#par_type").val(label);
                }

                function changeParticipant() {
                    var formData = new FormData(document.getElementById("changeParticipantForm"));
                    var type = $("#par_type").val();
                    var formDataObj = {};
                    formData.forEach(function(value, key) {
                        formDataObj[key] = value;
                    });
                    $("#" + type + "_par_name").val(formDataObj.name);
                    $("#" + type + "PriorityNameField_show").text(formDataObj.name + ',' + formDataObj.designation);
                    $("#" + type + "_par_designation").val(formDataObj.designation);
                    $("#" + type + "_par_email").val(formDataObj.email);
                    $("#" + type + "_par_phone").val(formDataObj.phone);
                    $("#ChangeParticipants").modal('hide');
                    $("#changeParticipantForm")[0].reset();
                }

                function validateForm() {

                    $("#preloader").removeAttr("hidden").show();

                }

                function showError() {
                    var requiredFields = document.querySelectorAll('[required]');
                    var isValid = true;
                    for (var i = 0; i < requiredFields.length; i++) {
                        console.log(requiredFields[i]);
                        if (requiredFields[i].value.trim() === '') {
                            requiredFields[i].classList.add('custom-input-focus');
                            requiredFields[i].classList.add('is-invalid');

                        } else {
                            requiredFields[i].classList.remove('custom-input-focus');
                            requiredFields[i].classList.remove('is-invalid');
                        }
                    }
                }
            </script>
        @endpush

</x-app-layout>
