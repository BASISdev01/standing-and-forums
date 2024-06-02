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
        .header-content{
            width: auto;
        }
        .container {
            width: 93%;
            margin: 12px auto !important;
        }
        .accordion-button{
            cursor: pointer;
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
    </style>
</head>

<body>
    <div
        class="container mx-3 mt-3 bg-white my-md-3 my-xl-5 border border-success-subtle shadow rounded-4 overflow-hidden">
        <div class="row py-3 py-xl-4 border border-bottom rounded-top-4"
            style="background-image: url('./images/form-header-bg.png'); background-position: center center; background-size:cover; background-repeat: no-repeat;">
            <div class="col-12">
                <h3 class="text-center">Submit Your EoI To Joining BASIS Standing Committee And Forums</h3>
                <h5 class="text-center">Deadline: 10 July, 2024</h5>
                <p class="text-center">Note: Members can select a maximum two of any standing committees or forums</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <form class="p-2 p-xl-4">
                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Company Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" required class="form-control border border-dark-subtle"
                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Office Address <span
                                        class="text-danger">*</span></label>
                                <input type="password" required class="form-control border border-dark-subtle"
                                    id="exampleInputPassword1">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">E-mail
                                    <span class="text-danger">*</span></label>
                                <input type="email" required class="form-control border border-dark-subtle"
                                    id="exampleInputPassword1">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">Mobile <span
                                        class="text-danger">*</span></label>
                                <input type="text" required class="form-control border border-dark-subtle" required
                                    id="exampleInputPassword1">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Facebook Profile </label>
                                <input type="text" class="form-control border border-dark-subtle"
                                    id="exampleInputPassword1">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">LinkedIn Profile </label>
                                <input type="text" class="form-control border border-dark-subtle"
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
                            <div class="text-center bg-success-subtle p-2 p-xl-3 mb-3 rounded-3">Choose One Standing Committee
                                / Forum <span class="fw-bold">(First Priority) <span class="text-danger">*</span></span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <select class="form-select fw-semibold border border-dark-subtle"
                                    aria-label="Default select example">
                                    <option selected>Select Standing Committee</option>
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
                                        id="flexRadioDefault">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Ashik Ahmed Eshan, CEO
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <select class="form-select fw-semibold border border-dark-subtle"
                                    aria-label="Default select example">
                                    <option selected>Select Forum</option>
                                    @foreach ($forums as $forum)
                                        <option value="{{ $forum }}">{{ $forum }}</option>
                                    @endforeach
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <div class="fs-sm">Participant's Name <span class="text-danger">*</span>
                                    <a href="#" style="text-decoration: none;"
                                        class="rounded-1 text-success fs-sm d-inline-block me-2 fs-6"
                                        data-bs-toggle="modal" data-bs-target="#ChangeParticipants"><i
                                            class="fa-regular fa-pen-to-square"></i> Change</a>
                                </div>
                                <div class="form-check">
                                    <input checked class="form-check-input" type="radio" selected name=""
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        <div>Ashik Ahmed Eshan, CEO</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="mb-3">
                                <label for="" class="form-label">Briefly describe yourself and your relevance to the
                                    committee.
                                    <small>(100 words)</small>
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="form-floating">
                                    <textarea class="form-control p-2 border border-dark-subtle"
                                        placeholder="Leave a comment here" id="floatingTextarea2"
                                        style="height: 120px"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Identify key areas where the industry requires support
                                    or improvement. <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control border border-dark-subtle"
                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                                <input type="text" class="form-control mt-2 border border-dark-subtle"
                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                                <input type="text" class="form-control mt-2 border border-dark-subtle"
                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                                <div id="first-more-points"></div>
                                <div class="mb-2 d-flex justify-content-end">
                                    <a href="#" style="text-decoration: none;"
                                        class="bg-success p-2 rounded-1 text-white fs-sm mt-2 d-inline-block"
                                        id="firstMorePoints">+ Add</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-2">
                                <label for="exampleInputEmail1" class="form-label">List the initiatives to address the
                                    identified gaps. <span class="text-danger">*</span></label>
                                <input type="text" class="form-control border border-dark-subtle mt-4"
                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                                <input type="text" class="form-control mt-2 border border-dark-subtle"
                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                                <input type="text" class="form-control mt-2 border border-dark-subtle"
                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div id="first-more-gap"></div>
                            <div class="mb-2 d-flex justify-content-end">
                                <a href="#" style="text-decoration: none;"
                                    class="bg-success p-2 rounded-1 text-white fs-sm d-inline-block" id="firstMoreGap">+
                                    Add</a>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Provide the names of 03 individuals
                                    you wish to collaborate with.
                                </label>
                                <textarea class="form-control p-2 border border-dark-subtle" id="floatingTextarea2"
                                    style="height: 85px"></textarea>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Provide examples of your community or
                                    policy work. <span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control p-2 border border-dark-subtle mt-md-4" id="floatingTextarea2"
                                    style="height: 85px"></textarea>
                                <!-- <input type="text" class="form-control border border-dark-subtle mt-md-4"
                                    id="examples_involvement" aria-describedby="emailHelp">
                                <input type="text" class="form-control border border-dark-subtle mt-2"
                                    id="examples_involvement" aria-describedby="emailHelp">
                                <div id="additional-examples"></div>
                                <div class="mb-2 d-flex justify-content-end">
                                    <a href="#" style="text-decoration: none;"
                                        class="bg-success p-2 rounded-1 text-white fs-sm mt-2 d-inline-block"
                                        data-bs-toggle="modal" id="addMoreExamples">+ Add
                                    </a>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">How many hours per month can you
                                    contribute? <span class="text-danger">*</span></label>
                                <input type="text" class="form-control border border-dark-subtle"
                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Will you attend at least one monthly
                                    meeting? <span class="text-danger">*</span></label>
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input checked class="form-check-input" type="radio" name="flexRadioDefault20"
                                            id="flexRadioDefault">
                                        <label class="form-check-label fw-semibold" for="flexRadioDefault1">Yes
                                        </label>
                                    </div>
                                    <div class="form-check ms-2">
                                        <input checked class="form-check-input" type="radio" name="flexRadioDefault20"
                                            id="no">
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
                                        <div class="d-flex text-center justify-content-center text-md-center border-none bg-success-subtle p-2 p-xl-3 mb-3 rounded-3 accordion-button collapsed" style="border: none!important;"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
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
                                                    <select class="form-select fw-semibold" aria-label="Default select example">
                                                        <option selected>Select Standing Committee</option>
                                                        @foreach ($standingCommittee as $committee)
                                                            <option value="{{ $committee }}">{{ $committee }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="fs-sm">Participant's Name (Only Representative Can Join)</div>
                                                    <div class="form-check">
                                                        <input checked class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="flexRadioDefault1">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Ashik Ahmed Eshan, CEO
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <select class="form-select fw-semibold" aria-label="Default select example">
                                                        <option selected>Select Forum</option>
                                                        @foreach ($forums as $forum)
                                                            <option value="{{ $forum }}">{{ $forum }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="fs-sm">Participant's Name
                                                        <a href="#" style="text-decoration: none;"
                                                            class="rounded-1 text-success fs-sm d-inline-block me-2 fs-6"
                                                            data-bs-toggle="modal" data-bs-target="#ChangeParticipants"><i
                                                                class="fa-regular fa-pen-to-square"></i> Change</a>
                                                    </div>
                                                    <div class="form-check">
                                                        <input checked class="form-check-input" type="radio" selected name=""
                                                            id="flexRadioDefault1">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Ashik Ahmed Eshan, CEO
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Briefly describe yourself and your
                                                        relevance to the committee.
                                                        <small>(100 words)</small></label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control p-2 border border-dark-subtle"
                                                            placeholder="Leave a comment here" id="floatingTextarea2"
                                                            style="height: 120px"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Identify key areas where the industry
                                                        requires support or improvement.
                                                    </label>
                                                    <input type="text" class="form-control border border-dark-subtle"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp">
                                                    <input type="text" class="form-control mt-2 border border-dark-subtle"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp">
                                                    <input type="text" class="form-control mt-2 border border-dark-subtle"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp">
                                                    <div id="second-more-gap"></div>
                                                    <div class="mb-2 d-flex justify-content-end">
                                                        <a href="#" style="text-decoration: none;"
                                                            class="bg-success p-2 rounded-1 text-white fs-sm mt-2 d-inline-block"
                                                            id="secondMoreGap">+ Add</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-2">
                                                    <label for="exampleInputEmail1" class="form-label">List the initiatives to
                                                        address the identified gaps.</label>
                                                    <input type="text" class="form-control border border-dark-subtle mt-4"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp">
                                                    <input type="text" class="form-control mt-2 border border-dark-subtle"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp">
                                                    <input type="text" class="form-control mt-2 border border-dark-subtle"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp">
                                                </div>
                                                <div id="second-more-points"></div>
                                                <div class="mb-2 d-flex justify-content-end">
                                                    <a href="#" style="text-decoration: none;"
                                                        class="bg-success p-2 rounded-1 text-white fs-sm d-inline-block"
                                                        id="secondMorePoints">+ Add</a>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Provide the names of 03 individuals
                                                        you wish to collaborate with.
                                                    </label>
                                                    <textarea class="form-control p-2 border border-dark-subtle" id="floatingTextarea2"
                                                        style="height: 85px"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Provide examples of your community or
                                                        policy work.
                                                    </label>
                                                    <textarea class="form-control p-2 border border-dark-subtle mt-md-4" id="floatingTextarea2"
                                                        style="height: 85px"></textarea>
                                                    <!-- <input type="text" class="form-control border border-dark-subtle mt-md-4"
                                                        id="examples_involvement" aria-describedby="emailHelp">
                                                    <input type="text" class="form-control border border-dark-subtle mt-2"
                                                        id="examples_involvement" aria-describedby="emailHelp">
                                                    <div id="additional-examples"></div>
                                                    <div class="mb-2 d-flex justify-content-end">
                                                        <a href="#" style="text-decoration: none;"
                                                            class="bg-success p-2 rounded-1 text-white fs-sm mt-2 d-inline-block"
                                                            data-bs-toggle="modal" id="addMoreExamples">+ Add
                                                        </a>
                                                    </div> -->
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">How many hours per month can you
                                                        contribute?</label>
                                                    <input type="text" class="form-control border border-dark-subtle"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Will you attend at least one monthly
                                                        meeting?</label>
                                                    <div class="d-flex">
                                                        <div class="form-check">
                                                            <input checked class="form-check-input" type="radio" name="flexRadioDefault20"
                                                                id="flexRadioDefault">
                                                            <label class="form-check-label fw-semibold" for="flexRadioDefault1">Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check ms-2">
                                                            <input checked class="form-check-input" type="radio" name="flexRadioDefault20"
                                                                id="no">
                                                            <label class="form-check-label fw-semibold" for="no">No
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
                                <input type="checkbox" class="form-check-input" required id="exampleCheck1">
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
    <div class="modal fade" id="ChangeParticipants" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                <form action="">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Participants Name
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" required
                                                    class="form-control border border-dark-subtle"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Participants
                                                    Designation <span class="text-danger">*</span></label>
                                                <input type="password" required
                                                    class="form-control border border-dark-subtle"
                                                    id="exampleInputPassword1">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Participants Email
                                                    <span class="text-danger">*</span></label>
                                                <input type="password" required
                                                    class="form-control border border-dark-subtle"
                                                    id="exampleInputPassword1">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Participants
                                                    Mobile <span class="text-danger">*</span></label>
                                                <input type="password" required
                                                    class="form-control border border-dark-subtle"
                                                    id="exampleInputPassword1">
                                            </div>
                                        </div>
                                        <div class="col-12 text-center">
                                            <button type="button" class="btn btn-success"
                                                data-bs-dismiss="modal">Save</button>
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
        $(document).ready(function () {
            var exampleIndex = 1;
            var firstMorePoints = 1;
            var firstMoreGap = 1;
            var secondMoreGap = 1;
            var secondMorePoints = 1;

            $('#addMoreExamples').click(function (e) {
                e.preventDefault();
                exampleIndex++;
                var newExampleField = `
                    <div class="mb-3 example-field d-flex" id="example_${exampleIndex}">
                        <input type="text" class="form-control border border-dark-subtle mt-2" name="examples[]">
                        <div class="mt-2 ms-2 remove-example d-flex align-items-center" data-index="${exampleIndex}"><i class="text-danger fa-solid fa-trash-can"></i></div>
                    </div>
                `;
                $('#additional-examples').append(newExampleField);
            });

            $(document).on('click', '.remove-example', function (e) {
                e.preventDefault();
                var index = $(this).data('index');
                $('#example_' + index).remove();
            });

            $('#firstMoreGap').click(function (e) {
                e.preventDefault();
                firstMoreGap++;
                var newGapField = `
                    <div class="mb-3 example-field d-flex" id="first_gap_${firstMoreGap}">
                        <input type="text" class="form-control border border-dark-subtle mt-2" name="examples[]">
                        <div class="mt-2 ms-2 first-remove-gap d-flex align-items-center" data-index="${firstMoreGap}"><i class="text-danger fa-solid fa-trash-can"></i></div>
                    </div>
                `;
                $('#first-more-gap').append(newGapField);
            });

            $(document).on('click', '.first-remove-gap', function (e) {
                e.preventDefault();
                var indexGap = $(this).data('index');
                $('#first_gap_' + indexGap).remove();
            });

            $('#firstMorePoints').click(function (e) {
                e.preventDefault();
                firstMorePoints++;
                var newExampleField = `
                    <div class="mb-3 example-field d-flex" id="firstMorePoints_${firstMorePoints}">
                        <input type="text" class="form-control border border-dark-subtle mt-2" name="examples[]">
                        <div class="mt-2 ms-2 remove-example-first d-flex align-items-center" data-index="${firstMorePoints}"><i class="text-danger fa-solid fa-trash-can"></i></div>
                    </div>
                `;
                $('#first-more-points').append(newExampleField);
            });

            $(document).on('click', '.remove-example-first', function (e) {
                e.preventDefault();
                var firstIndex = $(this).data('index');
                $('#firstMorePoints_' + firstIndex).remove();
            });

            $('#secondMoreGap').click(function (e) {
                e.preventDefault();
                secondMoreGap++;
                var newSecondGapField = `
                    <div class="mb-3 example-field d-flex" id="second_gap_${secondMoreGap}">
                        <input type="text" class="form-control border border-dark-subtle mt-2" name="examples[]">
                        <div class="mt-2 ms-2 second-remove-gap d-flex align-items-center" data-index="${secondMoreGap}"><i class="text-danger fa-solid fa-trash-can"></i></div>
                    </div>
                `;
                $('#second-more-gap').append(newSecondGapField);
            });

            $(document).on('click', '.second-remove-gap', function (e) {
                e.preventDefault();
                var indexSecondGap = $(this).data('index');
                $('#second_gap_' + indexSecondGap).remove();
            });

            $('#secondMorePoints').click(function (e) {
                e.preventDefault();
                secondMorePoints++;
                var secondExampleField = `
                    <div class="mb-3 example-field d-flex" id="secondMorePoints_${secondMorePoints}">
                        <input type="text" class="form-control border border-dark-subtle mt-2" name="examples[]">
                        <div class="mt-2 ms-2 remove-example-second d-flex align-items-center" data-index="${secondMorePoints}"><i class="text-danger fa-solid fa-trash-can"></i></div>
                    </div>
                `;
                $('#second-more-points').append(secondExampleField);
            });

            $(document).on('click', '.remove-example-second', function (e) {
                e.preventDefault();
                var secondtIndex = $(this).data('index');
                $('#secondMorePoints_' + secondtIndex).remove();
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>
