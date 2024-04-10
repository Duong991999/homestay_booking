<template>
    <div>
        <nav class="navbar-parent">
            <div class="navbar-title">
                <router-link class="navbar-brand" :to="{ name: 'home' }"
                    >HomestayBooking</router-link
                >
                <div class="navbar-login">
                    <router-link
                        :to="{ name: 'basket' }"
                        class="nav-link-1"
                        style="text-decoration: none"
                    >
                        Basket
                        <span v-if="itemsInBasket" class="badge badge-secondary">{{
                            itemsInBasket
                        }}</span>
                    </router-link>

                    <router-link
                        :to="{ name: 'register' }"
                        class="nav-link-1"
                        v-if="!isLoggedIn"
                        style="text-decoration: none"
                        >Register</router-link
                    >

                    <router-link
                        :to="{ name: 'login' }"
                        class="nav-link-1"
                        v-if="!isLoggedIn"
                        style="text-decoration: none"
                        >Sign-in</router-link
                    >

                    <a
                        class="nav-link-1"
                        href="#"
                        @click.prevent="logout"
                        style="text-decoration: none"
                        v-if="isLoggedIn"
                        >Logout</a
                    >
                </div>
            </div>

            <div class="narbar-d">
                <div class="nav-item dropdown" v-if="!isLoggedIn">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarDropdown"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        User Menu
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!-- You can add more dropdown items here -->
                        <router-link :to="{ name: 'profile' }" class="dropdown-item"
                            >Profile</router-link
                        >
                    </div>
                </div>
                <div class="nav-item dropdown" v-if="!isLoggedIn">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarDropdown"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        User Menu
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!-- You can add more dropdown items here -->
                        <router-link :to="{ name: 'profile' }" class="dropdown-item"
                            >Profile</router-link
                        >
                    </div>
                </div>
                <div class="nav-item dropdown" v-if="!isLoggedIn">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarDropdown"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        User Menu
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!-- You can add more dropdown items here -->
                        <router-link :to="{ name: 'profile' }" class="dropdown-item"
                            >Profile</router-link
                        >
                    </div>
                </div>
            </div>
        </nav>

        <div class="container mt-4 mb-4 pr-4 pl-4">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import { mapState, mapGetters } from 'vuex';

export default {
    data() {
        return {
            lastSearch: this.$store.state.lastSearch,
        };
    },
    computed: {
        ...mapState({
            lastSearchComputed: 'lastSearch',
            isLoggedIn: 'isLoggedIn',
        }),
        ...mapGetters({
            itemsInBasket: 'itemsInBasket',
        }),
        somethingElse() {
            return 1 + 2;
        },
    },
    methods: {
        async logout() {
            try {
                axios.post('/logout');
                this.$store.dispatch('logout');
            } catch (error) {
                this.$store.dispatch('logout');
            }
        },
    },
};
</script>

<style scoped>
.navbar-parent {
    background-color: #003b95;
}
.navbar-brand {
    color: aliceblue;
    margin: 16px 16px 16px 30px;

    justify-content: center;
}
.navbar-login {
    flex-direction: row;
}
.navbar-item-1 {
    padding: 16px;
    justify-content: space-between;
}

.nav-link-1 {
    background-color: aliceblue;
    color: #003b95;
    padding: 8px 20px;
    margin: 10px;
    justify-content: center;
    border: 1px solid #003b95;
    border-radius: 5px;
}
.navbar-title {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.dropdown {
    display: inline-block;
    flex-direction: row;
    border: 1px solid white;
    border-radius: 20px;
    margin: 16px;
}
</style>
