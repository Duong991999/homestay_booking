<template>
    <div class="container mt-5">
        <div class="card w-100 border">
            <div class="card-header border-bottom card-header-custom">
                <h4 class="mb-0 title">Danh sách phòng</h4>
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
        };
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
</style>
