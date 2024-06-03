<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Registration Form of BASIS Standing Committee and Forums</title>

    <link rel="icon" type="image/x-icon" href="https://basis.org.bd/public/images/favicon.png" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <style>
            a {
                text-decoration: none;
            }

            .logout-toggle-btn{
                top:0.6rem;
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
            .logout-container:focus .fa-chevron-down{
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
            @media screen and (max-width: 767px){
                .line-clamp-1{
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
            }

            input:focus,
            textarea:focus,
            select:focus {
                box-shadow: 0px 0px 2px 3px rgba(0, 128, 0, 0.4) !important;
            }

            select option:hover {
                background-color: rgba(0, 128, 0, 0.4) !important;
            }

            select option:hover {
                color: red !important;
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
            .rotate-icon:not(.collapsed){
            transform: rotate(180deg);
            }
            #charCount {
                font-size: 0.875em;
                color: #6c757d;
            }
        </style>
</head>

<body class="pb-3 pb-md-5">
    <div class="container mx-3 mt-3 bg-white my-md-3 my-xl-5 pb-3 pb-xl-4 border border-success-subtle shadow rounded-4 overflow-hidden">
        <div class="row py-0 pb-xl-4 border border-bottom rounded-top-4"
            style="background-image: url('./images/form-header-bg.png'); background-position: center center; background-size:cover; background-repeat: no-repeat;">
            <div class="col-12">
                <div class="row mb-3 py-3 bg-dark-subtle">
                    <div class="col-12">
                        <!-- Changes -->
                        <div class="me-md-2 d-flex flex-column flex-md-row justify-content-center align-items-start justify-content-md-center align-items-md-center">
                            <div class="d-flex justify-content-start align-items-center mb-2 mb-md-0 position-relative">
                                <div class="profile-image d-flex bg-white" type="button" data-toggle="collapse" data-target="#responsiveCollapse" aria-expanded="false" aria-controls="responsiveCollapse">
                                    <img  src="{{ auth()->user()->logo }}"
                                        alt="">
                                </div>
                                <p class="mb-0 ms-2 me-md-2 line-clamp-1" type="button" data-toggle="collapse" data-target="#responsiveCollapse" aria-expanded="false" aria-controls="responsiveCollapse">{{ auth()->user()->company_name }}</p>
                                <a class="d-block d-md-none position-absolute logout-toggle-btn" type="button" data-toggle="collapse" data-target="#responsiveCollapse" aria-expanded="false" aria-controls="responsiveCollapse">
                                    <i class="text-dark fas fa-chevron-down rotate-icon collapsed"></i>
                                </a>
                            </div>
                            <div class="d-none d-md-flex justify-content-start collapse" id="responsiveCollapse">
                                <a class="text-success px-2 py-1 rounded border border-success" href="{{ route('member.logout') }}"><i class=" me-1 fa-solid fa-arrow-right-from-bracket"></i>
                                Logout</a>
                            </div>
                            <!-- Toogle Logout for mobile -->
                            <div class="d-block d-md-none">
                                  <div class="collapse d-md-block" id="responsiveCollapse">
                                    <div class="d-flex justify-content-start collapse" id="responsiveCollapse">
                                        <a class="text-success px-2 py-1 rounded border border-success" href="{{ route('member.logout') }}"><i class=" me-1 fa-solid fa-arrow-right-from-bracket"></i>
                                        Logout</a>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="text-center">Submit Your EoI To Join BASIS Standing Committee And Forums</h3>
                <h5 class="text-center">Deadline: 10 June, 2024</h5>
                <p class="text-center">Note: Members can select a maximum two of any standing committees or forums</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <form class="p-2 p-xl-4" action="{{ route('form.submit') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Company Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control border border-dark-subtle"
                                    id="exampleInputEmail1" name="company_name" value="{{ auth()->user()->company_name }}"
                                    aria-describedby="emailHelp" required readonly>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Office Address <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="company_address" value="{{ auth()->user()->address }}"
                                    class="form-control  border border-dark-subtle" id="exampleInputPassword1" required
                                    readonly>
                            </div>
                        </div>
                        <input name="first_par_name" id="first_par_name" value="{{ auth()->user()->name }}" hidden />
                        <input name="first_par_designation" id="first_par_designation" value="{{ auth()->user()->name }}" hidden />
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">E-mail
                                    <span class="text-danger">*</span></label>
                                <input type="email" name="first_par_email" id="first_par_email" value="{{ auth()->user()->email }}"
                                    class="form-control border border-dark-subtle" id="exampleInputPassword1" required
                                    readonly>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">Mobile <span class="text-danger">*</span></label>
                                <input type="text" name="first_par_phone" id="first_par_phone" value="{{ auth()->user()->mobile }}"
                                    class="form-control border border-dark-subtle" id="exampleInputPassword1" required
                                    readonly>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Facebook Profile </label>
                                <input type="text" value="" name="par_facebook_link" class="form-control border border-dark-subtle"
                                    id="exampleInputPassword1">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">LinkedIn Profile </label>
                                <input type="text" name="par_linkedIn_link" class="form-control border border-dark-subtle"
                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                        </div>
                    </div>

                    @php
                        $standingCommittee = standingCommittee();
                        $forums = forums();
                    @endphp

                    <!-- First Priority -->
                    <div class="row mb-2">
                        <div class="col-12">
                            <div class="text-center bg-success-subtle p-2 p-xl-3 mb-3 rounded-3">Choose One Standing
                                Committee
                                / Forum <span class="fw-bold">(First Priority) <span
                                        class="text-danger">*</span></span>
                            </div>
                        </div>
                        <input name="first_priority_type" id="first_priority_type" value="" hidden />
                        <input name="first_priority" id="first_priority" value="" hidden />
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <select id="first_priority_committe" class="form-select fw-semibold border border-dark-subtle"
                                    aria-label="Default select example">
                                    <option value ="" selected>Select Standing Committee</option>
                                    @foreach ($standingCommittee as $committee)
                                        <option value="{{ $committee }}">{{ $committee }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <div class="fs-sm">Participant's Name (Only Representative Can Join) <span
                                        class="text-danger">*</span></div>
                                <div class="form-check">
                                    <input checked class="form-check-input" type="radio" selected name=""
                                        id="firstPriorityCommitteNameField">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        {{ auth()->user()->name }}, {{ auth()->user()->designation }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <select  id="first_priority_forum" class="form-select fw-semibold border border-dark-subtle"
                                    aria-label="Default select example">
                                    <option value ="" selected>Select Forum</option>
                                    @foreach ($forums as $forum)
                                        <option value="{{ $forum }}">{{ $forum }}</option>
                                    @endforeach
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <div class="fs-sm d-flex">Participant's Name <span class="text-danger me-2">*</span>
                                    <div id="firstPriorityForumParticipantName">
                                        <a href="#" style="text-decoration: none;"
                                        class="rounded-1 text-success fs-sm d-inline-block me-2 fs-6" onclick="openForm('first')"><i
                                            class="fa-regular fa-pen-to-square" ></i> Change</a>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input checked class="form-check-input" type="radio" selected name=""
                                        id="firstPriorityNameField">
                                    <label class="form-check-label" for="flexRadioDefault1" id="firstPriorityNameField_show">
                                        <div>{{ auth()->user()->name }}, {{ auth()->user()->designation }}</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="mb-3">
                                <label for="" class="form-label">Briefly describe yourself and your relevance
                                    to the
                                    committee.
                                    <small>(100 words)</small>
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="form-floating">
                                    <textarea class="form-control p-2 border border-dark-subtle" placeholder="Leave a comment here"
                                        id="first_priority_relevance_to_committee" name="first_priority_relevance_to_committee" style="height: 120px" required></textarea>
                                    <div id="wordCount" class="text-end mt-1">0 / 100</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Identify key areas where the industry
                                    requires support
                                    or improvement. <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="first_priority_support_or_improvement[]" class="form-control border border-dark-subtle"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                <input type="text" name="first_priority_support_or_improvement[]" class="form-control mt-2 border border-dark-subtle"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                <input type="text" name="first_priority_support_or_improvement[]" class="form-control mt-2 border border-dark-subtle"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" required>
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
                            <div class="mb-2">
                                <label for="exampleInputEmail1" class="form-label">List the initiatives to address the
                                    identified gaps. <span class="text-danger">*</span></label>
                                <input type="text"  name="first_priority_identified_gaps[]" class="form-control border border-dark-subtle mt-4"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                <input type="text" name="first_priority_identified_gaps[]" class="form-control mt-2 border border-dark-subtle"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                <input type="text" name="first_priority_identified_gaps[]" class="form-control mt-2 border border-dark-subtle"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" required>
                            </div>
                            <div id="first-more-gap"></div>
                            <div class="mb-2 d-flex justify-content-end">
                                <div id="firstMoreGap_buttonDiv">
                                    <a href="#" style="text-decoration: none;"
                                    class="bg-success p-2 rounded-1 text-white fs-sm d-inline-block"
                                    id="firstMoreGap">+
                                    Add</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Provide the names of 03 individuals
                                    you wish to collaborate with.
                                </label>
                                <textarea class="form-control p-2 border border-dark-subtle" id="floatingTextarea2" name="first_priority_three_collaborates" style="height: 85px" required></textarea>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Provide examples of your community
                                    or
                                    policy work. <span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control p-2 border border-dark-subtle mt-md-4" id="floatingTextarea2" style="height: 85px" name="first_priority_community_or_policy" required></textarea>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">How many hours per month can you
                                    contribute? <span class="text-danger">*</span></label>
                                <input type="text" class="form-control border border-dark-subtle"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" name="first_priority_contribute_hours" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Will you attend at least one
                                    monthly
                                    meeting? <span class="text-danger">*</span></label>
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input checked class="form-check-input" type="radio"
                                            name="first_priority_attend_monthly_meeting" id="flexRadioDefault" value="Yes">
                                        <label class="form-check-label fw-semibold" for="flexRadioDefault1">Yes
                                        </label>
                                    </div>
                                    <div class="form-check ms-2">
                                        <input class="form-check-input" type="radio"
                                            name="first_priority_attend_monthly_meeting" id="no" value="No" >
                                        <label class="form-check-label fw-semibold" for="no">No
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Second Priority -->
                    <div class="row my-4">
                        <div class="col-12">
                            <div class="accordion border-none" id="accordionExample">
                                <div class="accordion-item" style="border: none !important;">
                                    <div class="row">
                                        <div class="d-flex text-center justify-content-center text-md-center border-none bg-success-subtle p-2 p-xl-3 mb-3 rounded-3 accordion-button collapsed"
                                            style="border: none!important;" data-bs-toggle="collapse"
                                            data-bs-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            <div class="mb-0">
                                                Are you interested in joining another Standing Committee
                                                / Forum <span class="fw-bold"> (Second Priority) ?</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <select id="second_priority_committee" class="form-select fw-semibold"
                                                        aria-label="Default select example">
                                                        <option value ="" selected>Select Standing Committee</option>
                                                        @foreach ($standingCommittee as $committee)
                                                            <option value="{{ $committee }}">{{ $committee }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="fs-sm">Participant's Name (Only Representative Can
                                                        Join)</div>
                                                    <div class="form-check">
                                                        <input checked class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="secondPriorityCommitteNameField">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            {{ auth()->user()->name }}, {{ auth()->user()->designation }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <select id="second_priority_forum" class="form-select fw-semibold"
                                                        aria-label="Default select example">
                                                        <option value ="" selected>Select Forum</option>
                                                        @foreach ($forums as $forum)
                                                            <option value="{{ $forum }}">{{ $forum }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <div class="fs-sm d-flex">Participant's Name
                                                        <div class="ms-2" id="secondtPriorityForumParticipantName">
                                                            <a href="#" style="text-decoration: none;"
                                                            class="rounded-1 text-success fs-sm d-inline-block me-2 fs-6"
                                                            onclick="openForm('second')"><i
                                                                class="fa-regular fa-pen-to-square"></i> Change</a>
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <input checked id="secondPriorityNameField" class="form-check-input" type="radio"
                                                            selected name="" id="flexRadioDefault1">
                                                        <label class="form-check-label" for="flexRadioDefault1" id="secondPriorityNameField_show">
                                                            {{ auth()->user()->name }}, {{ auth()->user()->designation }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <input name="second_priority_type" id="second_priority_type" value="" hidden />
                                            <input name="second_priority" id="second_priority" value="" hidden />
                                            <input name="second_par_name" id="second_par_name" value="{{ auth()->user()->name }}" hidden />
                                            <input name="second_par_designation" id="second_par_designation" value="{{ auth()->user()->designation }}" hidden />
                                            <input name="second_par_email" id="second_par_email" value="{{ auth()->user()->email }}" hidden />
                                            <input name="second_par_phone" id="second_par_phone" value="{{ auth()->user()->mobile }}" hidden />
                                            <div class="col-12 col-md-12">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Briefly describe yourself
                                                        and your
                                                        relevance to the committee.
                                                        <small>(100 words)</small></label>
                                                    <div class="form-floating">
                                                        <textarea name="first_priority_relevance_to_committee" class="form-control p-2 border border-dark-subtle" placeholder="Leave a comment here"
                                                            id="floatingTextarea2" style="height: 120px"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Identify key areas where
                                                        the industry
                                                        requires support or improvement.
                                                    </label>
                                                    <input type="text"
                                                        class="form-control border border-dark-subtle"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp" name="second_priority_support_or_improvement[]">
                                                    <input type="text"
                                                        class="form-control mt-2 border border-dark-subtle"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp" name="second_priority_support_or_improvement[]">
                                                    <input type="text"
                                                        class="form-control mt-2 border border-dark-subtle"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp" name="second_priority_support_or_improvement[]">
                                                    <div id="second-more-gap"></div>
                                                    <div class="mb-2 d-flex justify-content-end">
                                                        <div id="second_priorityMoreGap_button">
                                                            <a href="#" style="text-decoration: none;"
                                                            class="bg-success p-2 rounded-1 text-white fs-sm mt-2 d-inline-block"
                                                            id="secondMoreGap">+ Add</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-2">
                                                    <label for="exampleInputEmail1" class="form-label">List the
                                                        initiatives to
                                                        address the identified gaps.</label>
                                                    <input type="text"
                                                        class="form-control border border-dark-subtle mt-4"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp" name="second_priority_identified_gaps[]">
                                                    <input type="text"
                                                        class="form-control mt-2 border border-dark-subtle"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp" name="second_priority_identified_gaps[]">
                                                    <input type="text"
                                                        class="form-control mt-2 border border-dark-subtle"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp" name="second_priority_identified_gaps[]">
                                                </div>
                                                <div id="second-more-points"></div>
                                                <div class="mb-2 d-flex justify-content-end">
                                                    <div id="second_priorityMorePoints_button">
                                                        <a href="#" style="text-decoration: none;"
                                                            class="bg-success p-2 rounded-1 text-white fs-sm d-inline-block"
                                                        id="secondMorePoints">+ Add</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Provide the
                                                        names of 03 individuals
                                                        you wish to collaborate with.
                                                    </label>
                                                    <textarea name="second_priority_three_collaborates" class="form-control p-2 border border-dark-subtle" id="floatingTextarea2" style="height: 85px"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Provide
                                                        examples of your community or
                                                        policy work.
                                                    </label>
                                                    <textarea name="second_priority_community_or_policy" class="form-control p-2 border border-dark-subtle mt-md-4" id="floatingTextarea2" style="height: 85px"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">How many hours
                                                        per month can you
                                                        contribute?</label>
                                                    <input type="text" name="second_priority_contribute_hours"
                                                        class="form-control border border-dark-subtle"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Will you attend
                                                        at least one monthly
                                                        meeting?</label>
                                                    <div class="d-flex">
                                                        <div class="form-check">
                                                            <input checked class="form-check-input" type="radio"
                                                                name="second_priority_attend_monthly_meeting" value="Yes" id="flexRadioDefault">
                                                            <label class="form-check-label fw-semibold"
                                                                for="flexRadioDefault1">Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check ms-2">
                                                            <input class="form-check-input" type="radio"
                                                                name="second_priority_attend_monthly_meeting" value="NO" id="no">
                                                            <label class="form-check-label fw-semibold"
                                                                for="no">No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Agree With -->
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="is_agree" required>
                                <label class="form-check-label" for="exampleCheck1">I Agree With <a href="#"
                                        data-bs-toggle="modal" data-bs-target="#staticBackdrop">Terms & Conditions</a>
                                    <span class="text-danger">*</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 mb-md-0">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-success text-center">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Terms & Condition Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success-subtle">
                    <div class="d-flex justify-content-center w-100">
                        <h5 class="modal-title" id="staticBackdropLabel">Terms & Conditions</h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    1. Active members can select up to two standing committees or two forums.<br><br>
                    2. Members may be terminated from a standing committee if their annual dues are pending for more
                    than six months.<br><br>
                    3. The EC body reserves the rights to add or reassign any member to or from any committee or
                    forum.<br><br>
                    4. If any member consistently fails to participate in meetings, he/she may be terminated from the
                    committee or forum<br><br>
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <form action="" id="changeParticipantForm">
                                    <input id="par_type" value="" hidden/>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Participants Name
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" required name="name"
                                                    class="form-control border border-dark-subtle"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Participants
                                                    Designation <span class="text-danger">*</span></label>
                                                <input type="text" required name="designation"
                                                    class="form-control border border-dark-subtle"
                                                    id="exampleInputPassword1">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Participants
                                                    Email
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" required name="email"
                                                    class="form-control border border-dark-subtle"
                                                    id="exampleInputPassword1">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Participants
                                                    Mobile <span class="text-danger">*</span></label>
                                                <input type="text" name="modile"
                                                    class="form-control border border-dark-subtle"
                                                    id="exampleInputPassword1">
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
            var perName = "{{ auth()->user()->name }}";
            var perDesignation = "{{ auth()->user()->designation }}";
            var perEmail = "{{ auth()->user()->email }}";
            var perPhone = "{{ auth()->user()->mobile }}";

            //Company Name and Logout
            $('#responsiveCollapse').on('show.bs.collapse', function () {
                $('.rotate-icon').removeClass('collapsed');
            });

            //first priority select
            $('#first_priority_committe').on('change', function() {
                if ($(this).val()) {
                    $('#first_priority_forum').prop('disabled', true);
                    $('#firstPriorityForumParticipantName').attr('hidden', true);
                    $('#firstPriorityNameField').prop('disabled', true);
                    $('#first_priority_type').val('committe');
                    $('#first_priority').val($(this).val());
                    $("#firstPriorityNameField_show").text( perName + ','+ perDesignation);
                    $("#first_par_name").val(perName);
                    $("#first_par_designation").val(perDesignation);
                    $("#first_par_email").val(perEmail);
                    $("#first_par_phone").val(perPhone);
                } else {
                    $('#first_priority_forum').prop('disabled', false);
                    $('#firstPriorityNameField').prop('disabled', false);
                    $('#firstPriorityForumParticipantName').removeAttr('hidden', false);
                    $('#first_priority_type').val('');
                    $('#first_priority').val($(this).val());


                }

                var selectedValue = $(this).val();

                if (selectedValue) {
                    $('#second_priority_committee').html(second_CommitteeOptions).find(`option[value="${selectedValue}"]`).remove();
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

                } else {
                    $('#firstPriorityCommitteNameField').prop('disabled', false);
                    $('#first_priority_committe').prop('disabled', false);
                    $('#first_priority').val('');
                    $('#first_priority_type').val('');
                }

                var selectedValue = $(this).val();
                if (selectedValue) {
                    $('#second_priority_forum').html(second_ForumOptions).find(`option[value="${selectedValue}"]`).remove();
                } else {
                    $('#second_priority_forum').html(second_ForumOptions);
                }
            });

            //linecount first
            $('#first_priority_relevance_to_committee').on('input', function() {
                const maxWords  = 100;
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

            //second priority select
            $('#second_priority_committee').on('change', function() {
                if ($(this).val()) {
                    $('#second_priority_forum').prop('disabled', true);
                    $('#secondPriorityNameField').prop('disabled', true);
                    $('#second_priority_type').val('committe');
                    $('#secondtPriorityForumParticipantName').attr('hidden', true);
                    $('#second_priority').val($(this).val());
                    $("#secondPriorityNameField_show").text( perName + ','+ perDesignation);
                    $("#second_par_name").val(perName);
                    $("#second_par_designation").val(perDesignation);
                    $("#second_par_email").val(perEmail);
                    $("#second_par_phone").val(perPhone);
                } else {
                    $('#second_priority_type').val('');
                    $('#second_priority_forum').prop('disabled', false);
                    $('#secondPriorityNameField').prop('disabled', false);
                    $('#secondtPriorityForumParticipantName').removeAttr('hidden', false);
                    $('#second_priority').val('');
                }

                var selectedValue = $(this).val();

                if (selectedValue) {
                    $('#first_priority_committe').html(first_CommitteeOptions).find(`option[value="${selectedValue}"]`).remove();
                } else {
                    $('#first_priority_committe').html(first_CommitteeOptions);
                }
            });

            $('#second_priority_forum').on('change', function() {

                if ($(this).val()) {
                    $('#second_priority_type').val('forum');
                    $('#second_priority_committee').prop('disabled', true);
                    $('#secondPriorityCommitteNameField').prop('disabled', true);
                    $('#second_priority').val($(this).val());
                } else {
                    $('#second_priority_committee').prop('disabled', false);
                    $('#secondPriorityCommitteNameField').prop('disabled', false);
                    $('#second_priority_type').val('');
                    $('#second_priority').val('');


                }

                var selectedValue = $(this).val();
                if (selectedValue) {
                    $('#first_priority_forum').html(first_ForumOptions).find(`option[value="${selectedValue}"]`).remove();
                } else {
                    $('#first_priority_forum').html(first_ForumOptions);
                }
            });

            $('#responsiveCollapse').on('hide.bs.collapse', function () {
                $('.rotate-icon').addClass('collapsed');
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
                var first_priority_support_or_improvement_Button = $('input[name="first_priority_identified_gaps[]"]').length;
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
                var firstMorePoints_Button = $('input[name="first_priority_support_or_improvement[]"]').length;
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

            $('#secondMoreGap').click(function(e) {
                e.preventDefault();
                secondMoreGap++;
                var newSecondGapField = `
                    <div class="mb-3 example-field d-flex" id="second_gap_${secondMoreGap}">
                        <input type="text" class="form-control border border-dark-subtle mt-2" name="second_priority_support_or_improvement[]">
                        <div class="mt-2 ms-2 second-remove-gap d-flex align-items-center" data-index="${secondMoreGap}"><i class="text-danger fa-solid fa-trash-can"></i></div>
                    </div>
                `;
                $('#second-more-gap').append(newSecondGapField);
                var second_priorityMoreGap_button = $('input[name="second_priority_support_or_improvement[]"]').length;
                if (second_priorityMoreGap_button >= 10) {
                    $('#second_priorityMoreGap_button').attr('hidden', true);
                }
            });

            $(document).on('click', '.second-remove-gap', function(e) {
                e.preventDefault();
                var indexSecondGap = $(this).data('index');
                $('#second_gap_' + indexSecondGap).remove();
                $('#second_priorityMoreGap_button').attr('hidden', false);
            });

            $('#secondMorePoints').click(function(e) {
                e.preventDefault();
                secondMorePoints++;
                var secondExampleField = `
                    <div class="mb-3 example-field d-flex" id="secondMorePoints_${secondMorePoints}">
                        <input type="text" class="form-control border border-dark-subtle mt-2" name="second_priority_identified_gaps[]">
                        <div class="mt-2 ms-2 remove-example-second d-flex align-items-center" data-index="${secondMorePoints}"><i class="text-danger fa-solid fa-trash-can"></i></div>
                    </div>
                `;
                $('#second-more-points').append(secondExampleField);
                var second_priorityMorePoints_button = $('input[name="second_priority_identified_gaps[]"]').length;
                if (second_priorityMorePoints_button >= 10) {
                    $('#second_priorityMorePoints_button').attr('hidden', true);
                }
            });

            $(document).on('click', '.remove-example-second', function(e) {
                e.preventDefault();
                var secondtIndex = $(this).data('index');
                $('#secondMorePoints_' + secondtIndex).remove();
                $('#second_priorityMorePoints_button').attr('hidden', false);
            });
        });

        function openForm(label){
            $("#ChangeParticipants").modal('show');
            $("#par_type").val(label);
        }

        function changeParticipant(){
            var formData = new FormData(document.getElementById("changeParticipantForm"));
            var type = $("#par_type").val();
            var formDataObj = {};
            formData.forEach(function(value, key) {
                formDataObj[key] = value;
            });
            $("#" + type + "_par_name").val(formDataObj.name);
            $("#" + type + "PriorityNameField_show").text( formDataObj.name + ','+ formDataObj.designation);
            $("#" + type + "_par_designation").val(formDataObj.designation);
            $("#" + type + "_par_email").val(formDataObj.email);
            $("#" + type + "_par_phone").val(formDataObj.mobile);
            $("#ChangeParticipants").modal('hide');
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
