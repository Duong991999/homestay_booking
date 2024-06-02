<template>
    <div class="card border w-100">
        <!----><!----><!---->
        <div class="card-header border-bottom">
            <h4 class="card-header-title">Personal Information</h4>
        </div>
        <div class="card-body">
            <!----><!---->
            <form class="row g-3">
                <div class="col-12">
                    <label class="form-label"
                        >Upload your profile photo<span class="text-danger">*</span></label
                    >
                    <div class="d-flex align-items-center">
                        <label
                            class="position-relative me-4"
                            for="uploadfile-1"
                            title="Replace this pic"
                            ><span class="avatar avatar-xl"
                                ><img
                                    id="uploadfile-1-preview"
                                    class="avatar-img rounded-circle border border-white border-3 shadow"
                                    src="/booking_v/assets/01-7N0KytgQ.jpg"
                                    alt="" /></span></label
                        ><label class="btn btn-sm btn-primary-soft mb-0" for="uploadfile-1"
                            >Change</label
                        ><!----><input
                            id="uploadfile-1"
                            class="form-control d-none form-control"
                            type="file"
                            directory="false"
                        />
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Full Name<span class="text-danger">*</span></label
                    ><input class="form-control" type="text" placeholder="Enter your full name" />
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email address<span class="text-danger">*</span></label
                    ><input class="form-control" type="email" placeholder="Enter your email id" />
                </div>
                <div class="col-md-6">
                    <label class="form-label">Mobile number<span class="text-danger">*</span></label
                    ><input
                        class="form-control"
                        type="text"
                        placeholder="Enter your mobile number"
                    />
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <label class="form-label">Date of Birth<span class="text-danger">*</span></label
                    ><!----><input
                        id="birthday"
                        class="form-control flatpickr-input"
                        type="text"
                        placeholder="Enter date of birth"
                    />
                </div>
                <div class="col-md-6">
                    <label class="form-label"
                        >Select Gender<span class="text-danger">*</span></label
                    >
                    <div class="d-flex gap-4">
                        <div class="radio-bg-light">
                            <div class="form-check">
                                <input
                                    id="flexRadioDefault1"
                                    class="form-check-input"
                                    type="radio"
                                    name="flexRadioDefault"
                                    value="male"
                                /><label for="flexRadioDefault1" class="form-check-label">
                                    Male
                                </label>
                            </div>
                        </div>
                        <div class="radio-bg-light">
                            <div class="form-check">
                                <input
                                    id="flexRadioDefault2"
                                    class="form-check-input"
                                    type="radio"
                                    name="flexRadioDefault"
                                    value="female"
                                /><label for="flexRadioDefault2" class="form-check-label">
                                    Female
                                </label>
                            </div>
                        </div>
                        <div class="radio-bg-light">
                            <div class="form-check">
                                <input
                                    id="flexRadioDefault3"
                                    class="form-check-input"
                                    type="radio"
                                    name="flexRadioDefault"
                                    value="other"
                                /><label for="flexRadioDefault3" class="form-check-label">
                                    Others
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <fieldset class="">
                        <legend
                            tabindex="-1"
                            class="form-label bv-no-focus-ring col-form-label pt-0"
                        >
                            Address
                        </legend>
                        <div class="">
                            <textarea
                                class="form-control"
                                rows="3"
                                wrap="soft"
                                spellcheck="false"
                            ></textarea
                            ><!----><!----><!---->
                        </div>
                    </fieldset>
                </div>
                <div class="col-12 text-end">
                    <a href="#" class="btn btn-primary mb-0">Save Changes</a>
                </div>
            </form>
        </div>
        <!----><!---->
    </div>
</template>
