<template>
    <div class="card shadow mt-5 w-100">
        <div class="card-body">
            <div class="bg-light rounded p-3 d-none d-lg-block">
                <div class="row row-cols-7 g-4">
                    <div class="col"><h6 class="mb-0">Guest</h6></div>
                    <div class="col"><h6 class="mb-0">Booking Date</h6></div>
                    <div class="col"><h6 class="mb-0">Check-In</h6></div>
                    <div class="col"><h6 class="mb-0">Check-Out</h6></div>
                    <div class="col"><h6 class="mb-0">Type Room</h6></div>
                    <div class="col"><h6 class="mb-0">Status</h6></div>
                    <div class="col"><h6 class="mb-0">Action</h6></div>
                </div>
            </div>

            <div
                v-for="(booking, index) in sortedBookings"
                :key="index"
                class="row row-cols-xl-7 align-items-lg-center border-bottom g-4 px-2 py-4"
            >
                <div class="col">
                    <small class="d-block d-lg-none">Booked by:</small>
                    <div class="d-flex align-items-center">
                        <div class="ms-2">
                            <h6 class="mb-0 fw-light">{{ booking.guest }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <small class="d-block d-lg-none">Booking date:</small>
                    <h6 class="mb-0 fw-normal">{{ booking.bookingDate }}</h6>
                </div>
                <div class="col">
                    <small class="d-block d-lg-none">Check-in:</small>
                    <h6 class="mb-0 fw-normal">{{ booking.checkIn }}</h6>
                </div>
                <div class="col">
                    <small class="d-block d-lg-none">Check-out:</small>
                    <h6 class="mb-0 fw-normal">{{ booking.checkOut }}</h6>
                </div>
                <div class="col">
                    <small class="d-block d-lg-none">Room no:</small>
                    <h6 class="mb-0 fw-normal">{{ booking.roomNo }}</h6>
                </div>
                <div class="col">
                    <small class="d-block d-lg-none">Payment:</small>
                    <div :class="badge">{{ booking.status }}</div>
                </div>
                <div class="col">
                    <a :href="booking.detailLink" class="btn btn-sm btn-light mb-0">View</a>
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
                    guest: 'Lori Stevens',
                    bookingDate: '02 Dec 2022',
                    checkIn: '18 Dec 2022',
                    checkOut: '22 Dec 2022',
                    roomNo: 'G102',
                    status: 'Booked',
                    detailLink: '/booking_v/admin/guests/detail',
                },
                {
                    guest: 'Carolyn Ortiz',
                    bookingDate: '01 Dec 2022',
                    checkIn: '16 Dec 2022',
                    checkOut: '22 Dec 2022',
                    roomNo: 'G103',
                    status: 'Booked',
                    detailLink: '/booking_v/admin/guests/detail',
                },
                {
                    guest: 'Billy Vasquez',
                    bookingDate: '29 Nov 2022',
                    checkIn: '10 Dec 2024',
                    checkOut: '14 Dec 2024',
                    roomNo: 'G105',
                    status: 'Pending',
                    detailLink: '/booking_v/admin/guests/detail',
                },
                {
                    guest: 'Samuel Bishop',
                    bookingDate: '14 Nov 2022',
                    checkIn: '07 Dec 2024',
                    checkOut: '09 Dec 2024',
                    roomNo: 'G102',
                    status: 'Pending',
                    detailLink: '/booking_v/admin/guests/detail',
                },
                {
                    guest: 'Amanda Reed',
                    bookingDate: '10 Nov 2022',
                    checkIn: '02 Dec 2024',
                    checkOut: '05 Dec 2024',
                    roomNo: 'G102',
                    status: 'Booked',
                    detailLink: '/booking_v/admin/guests/detail',
                },
                {
                    guest: 'Jacqueline Miller',
                    bookingDate: '05 Nov 2022',
                    checkIn: '27 Nov 2024',
                    checkOut: '01 Dec 2024',
                    roomNo: 'G105',
                    status: 'Booked',
                    detailLink: '/booking_v/admin/guests/detail',
                },
                {
                    guest: 'Joan Wallace',
                    bookingDate: '05 Nov 2022',
                    checkIn: '23 Nov 2024',
                    checkOut: '26 Nov 2024',
                    roomNo: 'F105',
                    status: 'Booked',
                    detailLink: '/booking_v/admin/guests/detail',
                },
                {
                    guest: 'Dennis Stevens',
                    bookingDate: '14 Nov 2022',
                    checkIn: '07 Dec 2024',
                    checkOut: '09 Dec 2024',
                    roomNo: 'G102',
                    status: 'Canceled',
                    detailLink: '/booking_v/admin/guests/detail',
                },
                {
                    guest: 'Louis Ferguson',
                    bookingDate: '02 Dec 2022',
                    checkIn: '18 Dec 2024',
                    checkOut: '22 Dec 2024',
                    roomNo: 'G102',
                    status: 'Booked',
                    detailLink: '/booking_v/admin/guests/detail',
                },
            ],
        };
    },
    computed: {
        sortedBookings() {
            const now = new Date();
            return this.bookings
                .filter((booking) => {
                    const checkIn = new Date(booking.checkIn);
                    const checkOut = new Date(booking.checkOut);
                    return checkIn >= now || checkOut >= now;
                })
                .sort((a, b) => {
                    const checkInA = new Date(a.checkIn);
                    const checkOutA = new Date(a.checkOut);
                    const checkInB = new Date(b.checkIn);
                    const checkOutB = new Date(b.checkOut);

                    const diffCheckInA = checkInA >= now ? checkInA - now : Infinity;
                    const diffCheckOutA = checkOutA >= now ? checkOutA - now : Infinity;
                    const diffCheckInB = checkInB >= now ? checkInB - now : Infinity;
                    const diffCheckOutB = checkOutB >= now ? checkOutB - now : Infinity;

                    const closestA = Math.min(diffCheckInA, diffCheckOutA);
                    const closestB = Math.min(diffCheckInB, diffCheckOutB);

                    return closestA - closestB;
                });
        },
    },
};
</script>
