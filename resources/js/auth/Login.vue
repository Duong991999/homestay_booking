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
                                style="width: 460px; height: 460; border-radius: 20px"
                            />
                        </div>
                        <hr
                            class="solid"
                            style="border-left: 1px solid black; height: 450px; opacity: 0.1"
                        />
                    </div>
                    <div class="col-lg-6" style="padding: 40px">
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
                                    <label for="email">E-mail</label>
                                    <input
                                        type="text"
                                        name="email"
                                        placeholder="Enter your e-mail"
                                        class="form-control"
                                        v-model="email"
                                        :class="[{ 'is-invalid': errorFor('email') }]"
                                        style="border-radius: 10px; height: 42px"
                                    />
                                    <v-errors :errors="errorFor('email')"></v-errors>
                                </div>

                                <div class="form-group">
                                    <label for="email">Password</label>
                                    <input
                                        type="password"
                                        name="password"
                                        placeholder="Enter your password"
                                        class="form-control"
                                        v-model="password"
                                        :class="[{ 'is-invalid': errorFor('password') }]"
                                        style="border-radius: 10px; height: 42px"
                                    />
                                    <v-errors :errors="errorFor('password')"></v-errors>
                                </div>
                                <div
                                    class="invalid-feedback"
                                    v-if="message_errors"
                                    style="display: block; margin-bottom: 1.25rem"
                                >
                                    {{ message_errors }}
                                </div>
                                <button
                                    type="submit"
                                    class="btn btn-lg btn-block"
                                    :disabled="loading"
                                    @click.prevent="login"
                                    style="background-color: antiquewhite; color: #ee6363"
                                >
                                    Log-in
                                </button>

                                <hr />

                                <div>
                                    No account yet?
                                    <router-link
                                        :to="{ name: 'register' }"
                                        class="font-weight-bold text-decoration-none"
                                        style="color: rgb(237, 195, 169)"
                                        >Register</router-link
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
            email: null,
            password: null,
            loading: false,
            message_errors: null,
        };
    },
    methods: {
        async login() {
            this.loading = true;
            this.errors = null;
            try {
                const response = await axios.post('/api/auth/login', {
                    email: this.email,
                    password: this.password,
                });
                this.$store.dispatch('login', response.data.data);
                logIn();
                this.$router.push({ name: 'welcome' });
            } catch (error) {
                this.loading = true;
                this.errors =
                    error.response && (error.response.data.errors || !error.response.data.success);
                if (!error.response.data.success) {
                    this.message_errors = error.response.data.message;
                }
            }
            this.loading = false;
        },
    },
};
</script>
<style></style>
