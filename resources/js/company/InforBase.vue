<template>
    <div class="w-50 mx-auto" style="margin-top: 200px">
        <div class="card card-body">
            <form>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Homestay của bạn tên gì?</label>
                    <input
                        type="email"
                        class="form-control"
                        id="exampleFormControlInput1"
                        placeholder="Tên Homestay"
                    />
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1"
                        >Homestay của bạn đang đăng ký nằm ở đâu?</label
                    >
                    <div>
                        <p>
							Chúng tôi có thể gửi thư để xác nhận vị trí chỗ nghỉ của Quý vị nên hãy
                            đảm bảo cung cấp địa chỉ chính xác thông tin này sẽ khó thay đổi sau
                            đó.
						</p>
                        <h6>Thành phố</h6>
                        <input
                            type="email"
                            class="form-control"
                            id="exampleFormControlInput1"
                            placeholder="Thành phố"
                        />
                        <h6>Địa chỉ</h6>
                        <input
                            type="email"
                            class="form-control"
                            id="exampleFormControlInput1"
                            placeholder="Địa chỉ"
                        />
                    </div>
                    <h6>Mã bưu chính</h6>
                    <input
                        type="email"
                        class="form-control"
                        id="exampleFormControlInput1"
                        placeholder="Mã bưu chính"
                    />
					<Multiselect
					v-model="value"
					:options="options"
					mode="tags"
				  />
                </div>
            </form>
        </div>
        <router-link :to="{ name: 'inforroom' }" class="text-decoration-none">
            <button class="">Tiếp tục</button>
        </router-link>
    </div>
</template>
<script>
  import Multiselect from '@vueform/multiselect/dist/multiselect.vue2.js'

  export default {
    components: {
      Multiselect,
    },
    data() {
      return {
        value: null,
        options: [
          'Batman',
          'Robin',
          'Joker',
        ]
      }
    }
  }
</script>

<style src="@vueform/multiselect/themes/default.css"></style>