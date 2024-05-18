<template>
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.5)">
        <div class="w-50 m-auto">
            <div class="card card-body">
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
                        class="btn btn-primary btn-lg btn-block"
                        :disabled="loading"
                        @click.prevent="login"
                    >
                        Log-in
                    </button>

                    <hr />

                    <div>
                        No account yet?
                        <router-link :to="{ name: 'register' }" class="font-weight-bold"
                            >Register</router-link
                        >
                    </div>
                </form>
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
                const response = await axios.post('/api/login', {
                    email: this.email,
                    password: this.password,
                });
                this.$store.dispatch('login', response.data.data);
                logIn();

                this.$router.push({ name: 'home' });
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
