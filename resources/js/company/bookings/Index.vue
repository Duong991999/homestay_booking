<template>
    <div class="row">
        <div class="col-12">
            <div class="card border w-100">
                <div class="card-header border-bottom">
                    <h5 class="card-header-title">
                        Bookings
                        <span class="badge bg-primary bg-opacity-10 text-primary ms-2"
                            >20 Rooms</span
                        >
                    </h5>
                </div>
                <div class="card-body pb-0">
                    <div class="row g-3 align-items-center justify-content-between mb-3">
                        <div class="col-md-8">
                            <form class="rounded position-relative">
                                <input
                                    class="form-control pe-5"
                                    type="search"
                                    placeholder="Search"
                                    aria-label="Search"
                                />
                                <button
                                    class="btn border-0 px-3 py-0 position-absolute top-50 end-0 translate-middle-y"
                                    type="submit"
                                >
                                    <svg
                                        class="svg-inline--fa fa-magnifying-glass"
                                        aria-hidden="true"
                                        focusable="false"
                                        data-prefix="fas"
                                        data-icon="magnifying-glass"
                                        role="img"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512"
                                    >
                                        <path
                                            fill="currentColor"
                                            d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"
                                        ></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive border-0">
                        <table class="table align-middle p-4 mb-0 table-hover table-shrink">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="border-0 rounded-start">#</th>
                                    <th scope="col" class="border-0">Name</th>
                                    <th scope="col" class="border-0">Type</th>
                                    <th scope="col" class="border-0">Date</th>
                                    <th scope="col" class="border-0">Status</th>
                                    <th scope="col" class="border-0">Payment</th>
                                    <th scope="col" class="border-0 rounded-end">Action</th>
                                </tr>
                            </thead>
                            <tbody class="border-top-0">
                                <tr v-for="(booking, index) in bookings" :key="index">
                                    <td>
                                        <h6 class="mb-0">{{ index + 1 }}</h6>
                                    </td>
                                    <td>
                                        <h6 class="mb-0">
                                            <a :href="booking.link">{{ booking.name }}</a>
                                        </h6>
                                    </td>
                                    <td>{{ booking.type }}</td>
                                    <td>
                                        <h6 class="mb-0 fw-light">{{ booking.date }}</h6>
                                    </td>
                                    <td>
                                        <div :class="`bg-${booking.statusColor} badge`">
                                            {{ booking.status }}
                                        </div>
                                    </td>
                                    <td>
                                        <div :class="`badge bg-${booking.paymentColor}`">
                                            {{ booking.payment }}
                                        </div>
                                    </td>
                                    <td>
                                        <a :href="booking.link" class="btn btn-sm btn-light mb-0"
                                            >View</a
                                        >
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            bookings: [
                {
                    name: 'Deluxe Pool View',
                    type: 'With Breakfast',
                    date: 'Nov 22 - 25',
                    status: 'Booked',
                    statusColor: 'success',
                    payment: 'Full Payment',
                    paymentColor: 'success',
                    link: '/booking_v/agent/bookings',
                },
                {
                    name: 'Deluxe Pool View with Breakfast',
                    type: 'Free Cancellation | Breakfast only',
                    date: 'Nov 24 - 28',
                    status: 'Booked',
                    statusColor: 'success',
                    payment: 'On Property',
                    paymentColor: 'warning',
                    link: '/booking_v/agent/bookings',
                },
                {
                    name: 'Luxury Room with Balcony',
                    type: 'Free Cancellation | Breakfast + Lunch/Dinner',
                    date: 'Nov 24 - 28',
                    status: 'Reserved',
                    statusColor: 'info',
                    payment: 'Half Payment',
                    paymentColor: 'info',
                    link: '/booking_v/agent/bookings',
                },
                {
                    name: 'Deluxe Room Twin Bed With Balcony',
                    type: 'Free Cancellation',
                    date: 'Nov 28 - 30',
                    status: 'Booked',
                    statusColor: 'success',
                    payment: 'Full Payment',
                    paymentColor: 'success',
                    link: '/booking_v/agent/bookings',
                },
                {
                    name: 'Deluxe Room Twin Bed With Balcony',
                    type: 'Free Cancellation | Breakfast only',
                    date: 'Nov 28 - 30',
                    status: 'Available',
                    statusColor: 'warning',
                    payment: 'On Property',
                    paymentColor: 'warning',
                    link: '/booking_v/agent/bookings',
                },
                {
                    name: 'Premium Room With Balcony',
                    type: 'Free Cancellation | Breakfast only',
                    date: 'Nov 14 - 18',
                    status: 'Cancel',
                    statusColor: 'danger',
                    payment: 'Half Payment',
                    paymentColor: 'info',
                    link: '/booking_v/agent/bookings',
                },
                {
                    name: 'Deluxe Room King Bed with Balcony',
                    type: 'Free Cancellation',
                    date: 'Nov 28 - 30',
                    status: 'Reserved',
                    statusColor: 'info',
                    payment: 'Full Payment',
                    paymentColor: 'success',
                    link: '/booking_v/agent/bookings',
                },
                {
                    name: 'Superior Room',
                    type: 'With Breakfast',
                    date: 'Nov 22 - 25',
                    status: 'Booked',
                    statusColor: 'success',
                    payment: 'Full Payment',
                    paymentColor: 'success',
                    link: '/booking_v/agent/bookings',
                },
                {
                    name: 'Studio Suite King',
                    type: 'Free Cancellation | Breakfast only',
                    date: 'Nov 21 - 24',
                    status: 'Reserved',
                    statusColor: 'info',
                    payment: 'Half Payment',
                    paymentColor: 'info',
                    link: '/booking_v/agent/bookings',
                },
                {
                    name: 'Rock Family Suite',
                    type: 'Free Cancellation | Breakfast + Lunch/Dinner',
                    date: 'Dec 02 - 06',
                    status: 'Booked',
                    statusColor: 'success',
                    payment: 'Full Payment',
                    paymentColor: 'success',
                    link: '/booking_v/agent/bookings',
                },
            ],
        };
    },
};
</script>

<style scoped>
.table-responsive {
    margin-bottom: 15px;
}
</style>
