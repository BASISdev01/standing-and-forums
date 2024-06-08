<x-app-layout>
    <x-slot:title>Dashboard</x-slot:title>
    @push('style')
        <style>
            .logImage {
                height: 40px;
                width: 40px;
                margin-top: 12px;
            }
        </style>
    @endpush
    <div class="row d-filex">
        <div class="col-lg-12 col-md-4 order-1">
            <div class="row g-4 mb-3">
                <div class="col-lg-3 col-md-12 col-6 mb-2">
                    <div class="card p-1 ps-2">
                        <div class="d-flex">
                            <img src="/assets/img/icons/unicons/website_login.png" alt="Credit Card"
                            class="rounded logImage" />
                            <div class="d-flex flex-column align-items-center justify-content-center ps-3">
                                <div class="fw-semibold d-block text-center mb-1">Logged In Members</div>
                                <h3 class="card-title text-nowrap mt-1 mb-1 text-center">{{ logShow('member_login') }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-6 mb-2">
                    <div class="card p-1 ps-2">
                        <div class="d-flex">
                            <img src="/assets/img/icons/unicons/application_Submit.png"  alt="Credit Card"
                            class="rounded logImage" />
                            <div class="d-flex flex-column align-items-center justify-content-center ps-3">
                                <div class="fw-semibold text-center d-block">Total Applied</div>
                                <div class="fs-4 fw-semibold text-nowrap text-center mb-1">{{ logShow('applied') }} <small style="font-size:12px;">( Company - {{ companyLog() }} )</small></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-6 mb-2">
                    <div class="card p-1 ps-2">
                        <div class="d-flex">
                            <img src="/assets/img/icons/unicons/pending.png" alt="Credit Card"
                            class="rounded logImage" />
                            <div class="d-flex flex-column align-items-center justify-content-center ps-3">
                                <span class="fw-semibold d-block text-center mb-1">Total Pending</span>
                                <h3 class="card-title text-nowrap mt-1 mb-1 text-center">{{ logShow('pending') }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-6 mb-2">
                    <div class="card p-1 ps-2">
                        <div class="d-flex">
                            <img src="/assets/img/icons/unicons/Approved.png" alt="Credit Card"
                            class="rounded logImage" />
                            <div class="d-flex flex-column align-items-center justify-content-center ps-3">
                                <span class="fw-semibold d-block text-center mb-1">Total Approved</span>
                                <h3 class="card-title text-nowrap mt-1 mb-1 text-center">{{ logShow('approved') }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4 mb-3">
                <div class="col-lg-6 col-md-12 col-6 mb-2">
                    <div class="card">
                        <span class="border border-start-0 border-end-0 border-top-0 border-end border-success fw-semibold d-block text-center mt-2 mb-2 fs-5">Standing Committee Total Applied - {{ committeLog() }}</span>
                        <div class="row">
                            <div class="col">
                                <ul class="mb-5">
                                    @php
                                        $standingCommittee = standingCommittee();

                                    @endphp
                                    @foreach ($standingCommittee as $committee)
                                        <li class="fw-semibold d-block mb-2 ms-4">
                                            {{ $committee }} - <span class="text-primary"> ( {{ committeLog($committee) }} )</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-2">
                    <div class="card">
                        <span class="border border-start-0 border-end-0 border-top-0 border-end border-success fw-semibold d-block text-center mt-2 mb-2 fs-5">Forums Total Applied - {{ ForumsLog() }}</span>
                        <div class="row">
                            <div class="col">
                                <ul class="mb-5">
                                    @php
                                        $forums = forums();

                                    @endphp
                                    @foreach ($forums as $forum)
                                        <li class="fw-semibold d-block mb-2 ms-4">
                                            {{ $forum }} - <span class="text-primary"> ( {{ ForumsLog($forum) }} )</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
