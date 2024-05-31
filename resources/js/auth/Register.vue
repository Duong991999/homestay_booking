<template>
    <div class="row justify-content-center h-100" style="margin-top: 80px">
        <div class="col-12">
            <div class="shadow bg-mode rounded-3 overflow-hidden" style="border-radius: 20px">
                <div class="row g-0 align-items-center">
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="p-3 p-lg-5">
                            <img
                                src="/assets/image/slide_home_screens/logo.jpg"
                                alt=""
                                style="width: 480px; height: 480px; border-radius: 20px"
                            />
                        </div>
                        <hr
                            class="solid"
                            style="border-left: 1px solid black; height: 450px; opacity: 0.1"
                        />
                    </div>
                    <div
                        class="col-lg-6"
                        style="
                            padding-left: 40px;
                            padding-right: 40px;
                            padding-top: 20px;
                            padding-bottom: 20px;
                        "
                    >
                        <router-link
                            class="h4 text-decoration-none"
                            :to="{ name: 'welcome' }"
                            style="
                                margin-bottom: 150px;
                                margin-left: 20px;
                                color: rgb(237, 195, 169);
                            "
                        >
                            <img
                                class=""
                                src="assets/image/slide_home_screens/logo.jpg"
                                height="50"
                                alt="Homestaybooking"
                                style="margin-right: 3px; border-radius: 40px"
                            />HomestayBooking
                        </router-link>
                        <div class="p-4 p-sm-7 align-items-center">
                            <form>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input
                                        type="text"
                                        name="name"
                                        placeholder="Enter your name"
                                        class="form-control"
                                        v-model="user.name"
                                        :class="[{ 'is-invalid': errorFor('name') }]"
                                        style="border-radius: 10px; height: 42px"
                                    />
                                    <v-errors :errors="errorFor('name')"></v-errors>
                                </div>

                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input
                                        type="text"
                                        name="email"
                                        placeholder="Enter your e-mail"
                                        class="form-control"
                                        v-model="user.email"
                                        :class="[{ 'is-invalid': errorFor('email') }]"
                                        style="border-radius: 10px; height: 42px"
                                    />
                                    <v-errors :errors="errorFor('email')"></v-errors>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input
                                        type="password"
                                        name="password"
                                        placeholder="Enter your password"
                                        class="form-control"
                                        v-model="user.password"
                                        :class="[{ 'is-invalid': errorFor('password') }]"
                                        style="border-radius: 10px; height: 42px"
                                    />
                                    <v-errors :errors="errorFor('password')"></v-errors>
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">Re-type Password</label>
                                    <input
                                        type="password"
                                        name="password_confirmation"
                                        placeholder="Confirm your password"
                                        class="form-control"
                                        v-model="user.password_confirmation"
                                        :class="[
                                            { 'is-invalid': errorFor('password_confirmation') },
                                        ]"
                                        style="border-radius: 10px; height: 42px"
                                    />
                                    <v-errors
                                        :errors="errorFor('password_confirmation')"
                                    ></v-errors>
                                </div>

                                <button
                                    type="submit"
                                    class="btn btn-lg btn-block"
                                    :disabled="loading"
                                    @click.prevent="register"
                                    style="background-color: antiquewhite; color: #ee6363"
                                >
                                    Register
                                </button>

                                <hr />

                                <div>
                                    Already have an account?
                                    <router-link
                                        :to="{ name: 'login' }"
                                        class="font-weight-bold text-decoration-none"
                                        style="color: rgb(237, 195, 169)"
                                        >Log-in</router-link
                                    >
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import validationErrors from '../shared/mixins/validationErrors';
import { logIn } from './../shared/utils/auth';

export default {
    mixins: [validationErrors],
    data() {
        return {
            user: {
                name: null,
                email: null,
                password: null,
                password_confirmation: null,
            },
            loading: false,
        };
    },
    methods: {
        async register() {
            this.loading = true;
            this.errors = null;

            try {
                const response = await axios.post('/register', this.user);

                if (201 == response.status) {
                    logIn();
                    this.$store.dispatch('loadUser');
                    this.$router.push({ name: 'home' });
                }
            } catch (error) {
                this.errors = error.response && error.response.data.errors;
            }

            this.loading = false;
        },
    },
};
</script>
<style></style>
