<template>
    <div class="fixed inset-0 bg-black/75 flex items-center justify-center">
        <div class="bg-white text-black p-5 rounded-xl w-[450px] flex flex-col gap-5">
            <h5 class="text-center font-bold text-3xl">Đăng tải video</h5>
            <div class="flex flex-col gap-2">
                <div class="flex items-center gap-2">
                    <label for="choose_video"
                        class="bg-red-600 text-white py-2 px-4 rounded-md hover:opacity-75 cursor-pointer min-w-32 w-32 text-center">
                        Chọn video
                    </label>
                    <p class="text-lg truncate">{{ video.name }}</p>
                </div>
                <input @change="onChooseVideo" id="choose_video" type="file" accept=".mp4" value="" class="hidden" />
                <div class="flex flex-col gap-1">
                    <p>Mô tả:</p>
                    <textarea v-model="description" class="w-full rounded-lg outline-2 outline-gray-300 p-2 min-h-20"
                        maxlength="255"></textarea>
                </div>
            </div>
            <div class="flex gap-3 justify-end">
                <button @click="$emit('close_modal')" type="button"
                    class="cursor-pointer hover:opacity-75">Đóng</button>
                <button type="button" @click="uploadVideo(), $emit('close_modal')"
                    class="bg-red-600 text-white py-2 px-4 rounded-lg hover:opacity-75 cursor-pointer">Đăng tải</button>
            </div>
        </div>
    </div>
</template>

<script>
import api from '../Api/axios';

export default {
    data() {
        return {
            video: "",
            description: ""
        }
    },
    methods: {
        onChooseVideo(event) {
            this.video = event.target.files[0];
        },
        async uploadVideo() {
            await api.post('/upload-video', {
                video: this.video,
                description: this.description
            }, {
                headers: {
                    "Content-Type": "multipart/form-data",
                    Authorization: 'Bearer ' + localStorage.getItem('token')
                }
            }).then((res) => {
                if (res.status == 200) {
                    console.log(res.data.data);
                }
            }).catch((err) => {
                console.log(err);
            });
        }
    }
}
</script>