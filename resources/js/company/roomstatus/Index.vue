<template>
    <div class="container mt-5">
        <div class="card w-100 border">
            <div class="card-header border-bottom card-header-custom">
                <h4 class="mb-0 title">Danh sách phòng</h4>
            </div>

            <div class="row col-lg-10 m-4">
                <div class="col-lg-5 m-2">
                    <input
                        class="input__field"
                        type="date"
                        v-model="checkin_date"
                        @focus="isFocused = true"
                        @blur="isFocused = false"
                    />
                    <span class="input__label">Tra cứu ngày</span>
                </div>
                <div class="col-lg-5 m-2">
                    <button
                        class="btn border-0 m-2"
                        @click="check"
                        :disabled="loading"
                        style="
                            background-color: rgb(240 181 145 / 50%);
                            color: #ef7d4ae6;
                            width: 150px;
                            border-radius: 10px;
                        "
                    >
                        <span v-if="!loading">Tra cứu </span>
                        <span v-if="loading">
                            <i class="fas fa-circle-notch fa-spin"></i> Checking...
                        </span>
                    </button>
                </div>
            </div>
            <div class="room-type m-4" v-for="(roomType, index) in roomTypes" :key="index">
                <h5>{{ roomType.type }}</h5>
                <div class="rooms">
                    <div
                        v-for="(room, idx) in roomType.rooms"
                        :key="idx"
                        :class="['room', room.status]"
                    >
                        {{ room.number }}
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
            roomTypes: [
                {
                    type: 'Phòng Đơn',
                    rooms: [
                        { number: '101', status: 'available' },
                        { number: '102', status: 'occupied' },
                        { number: '103', status: 'available' },
                        { number: '104', status: 'occupied' },
                    ],
                },
                {
                    type: 'Phòng Đôi',
                    rooms: [
                        { number: '201', status: 'available' },
                        { number: '202', status: 'available' },
                        { number: '203', status: 'occupied' },
                    ],
                },
                // Thêm các loại phòng khác theo ý muốn
            ],
            selectedDate: null,
        };
    },
    computed: {
        dateState() {
            return this.selectedDate ? true : false;
        },
    },
};
</script>

<style scoped>
.container {
    margin-top: 150px;
}

.card-header-custom {
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    background-color: #fff;
}

.room-type {
    border: 1px solid #ccc;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
}

.rooms {
    display: flex;
    flex-wrap: wrap;
}

.room {
    width: 50px;
    height: 30px;
    margin: 5px;
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: bold;
    color: #fff;
}

.available {
    background-color: rgb(9, 223, 9);
}

.occupied {
    background-color: rgb(251, 69, 69);
}

.title {
    font-weight: bold;
}
.input__label {
    position: absolute;
    left: 10px;
    /* Điều chỉnh khoảng cách từ mép trái */
    top: -10px;
    /* Điều chỉnh khoảng cách từ mép trên */
    background: white;
    /* Đổi màu nền nếu cần */
    padding: 0 5px;
    /* Điều chỉnh padding nếu cần */
    font-weight: bold;
    color: #888;
    /* Đổi màu chữ nếu cần */
    z-index: 1;
}

.input__field {
    box-sizing: border-box;
    width: 100%;
    border: 2px solid #ccc;
    padding: 10px;
    border-radius: 10px;
}

.input__field:focus + .input__label,
.input__field:not(:placeholder-shown) + .input__label {
    top: -10px;
    /* Điều chỉnh vị trí khi input field được focus */
    font-size: 12px;
    /* Điều chỉnh kích thước chữ khi input field được focus */
    color: #333;
    /* Đổi màu chữ khi input field được focus */
}
</style>
