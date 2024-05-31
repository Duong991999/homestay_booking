<template>
    <div>
        <div class="image-list">
            <div v-for="(image, index) in imageList" :key="index" class="image-item">
                <img :src="image.file_path" :alt="image.file_name" class="preview-image" />
                <i class="far fa-times-circle delete-image" @click="deleteImage(image)"></i>
                <!-- <i class="fas fa-times delete-image" @click="deleteImage(image)"></i> -->
            </div>
        </div>
        <div class="custom-file-upload">
            <input
                type="file"
                ref="fileInput"
                multiple
                @change="handleFileInputChange"
                id="file-input"
            />
            <label for="file-input" style="border-radius: 10px">Thêm ảnh</label>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            deleteItemId: [],
            addFileList: {},
        };
    },
    props: {
        imageList: {
            type: Array,
        },
    },
    methods: {
        handleFileInputChange(event) {
            const files = event.target.files;
            if (files && files.length > 0) {
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    let idImg = `from-input-${this.imageList.length}`;
                    this.addFileList[idImg] = file;
                    const reader = new FileReader();

                    reader.onload = (e) => {
                        const image = {
                            type: 'from-input',
                            file_path: e.target.result,
                            file_name: file.name,
                            id: idImg,
                        };
                        this.imageList.push(image);
                    };

                    reader.readAsDataURL(file);
                }
            }
            this.$emit('file-selected', {
                deleted_id: this.deleteItemId,
                files: Object.values(this.addFileList),
            });
        },
        deleteImage(image) {
            if (image.type == 'from-input') {
                delete this.addFileList[image.id];
            } else {
                this.deleteItemId.push(image.id);
            }
            let index = this.imageList.findIndex((item) => item.id == image.id);
            if (index !== -1) {
                this.imageList.splice(index, 1);
            }
            this.$emit('file-selected', {
                deleted_id: this.deleteItemId,
                files: Object.values(this.addFileList),
            });
        },
    },
};
</script>

<style>
.image-item {
    display: inline-block;
    width: 150px;
    height: 100px;
    position: relative;
    margin-right: 10px;
}

.image-item img {
    max-width: 150px;
    max-height: 100px;
    position: absolute;
}

.delete-image {
    color: #d73c3c;
    position: absolute;
    top: 0;
    right: 0;
    cursor: pointer;
}
.custom-file-upload {
    position: relative;
    display: inline-block;
    display: flex;
    justify-content: center;
    align-items: center;
}

.custom-file-upload input[type='file'] {
    opacity: 0;
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    cursor: pointer;
}

.custom-file-upload label {
    display: inline-block;
    padding: 8px 12px;
    background-color: #eaeaea;
    color: #333;
    border: 1px solid #ccc;
    border-radius: 4px;
    cursor: pointer;
}
</style>
