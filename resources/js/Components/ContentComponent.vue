<script setup>
import ReportVideoModal from '../Modals/ReportVideoModal.vue';
import UploadVideoModal from '../Modals/UploadVideoModal.vue';
</script>

<template>
    <div class="grow h-screen">
        <div class="bg-[#0d0d0d] flex items-center justify-between h-18 px-5">
            <div class="flex gap-4 items-center">
                <h1 class="font-bold text-xl">{{ video.author?.name }}</h1>
                <button v-if="!video.is_my_video"
                    class="bg-red-600 py-2 px-3.5 rounded-md flex items-center gap-2 cursor-pointer hover:opacity-75">
                    <p v-if="!video.is_follow">Theo dõi</p>
                    <p v-else>Bỏ theo dõi</p>
                    <i class="fa fa-heart-circle-plus"></i>
                </button>
            </div>
            <button @click="showModal('report_video')" type="button" class="p-2.5 cursor-pointer hover:opacity-75">
                <img src="../../../public/assets/images/ic_report.png" width="18px" height="18px" alt="">
            </button>
        </div>
        <div class="px-5 flex flex-col items-center justify-center grow">
            <div class="w-[100%]">
                <iframe :src="video.video_url" allow="autoplay" class="h-[750px] w-[100%]"></iframe>
                <p class="text-center">{{ video.caption }}</p>
            </div>
            <div class="h-12 flex items-center gap-1">
                <button class="bg-red-600 size-10 rounded-sm cursor-pointer hover:opacity-75" @click="back()">
                    <i class="fa-solid fa-angle-left"></i>
                </button>
                <button @click="showModal('upload_video')"
                    class="bg-red-600 size-10 rounded-sm cursor-pointer hover:opacity-75">
                    <i class="fa-solid fa-plus"></i>
                </button>
                <button class="bg-red-600 size-10 rounded-sm cursor-pointer hover:opacity-75" @click="next()">
                    <i class="fa-solid fa-angle-right"></i>
                </button>
            </div>
        </div>
    </div>

    <UploadVideoModal v-if="isShowUploadVideoModal" @close_modal="closeModal('upload_video')" />

    <ReportVideoModal v-if="isShowReportVideoModal" @close_modal="closeModal('report_video')" />
</template>

<script>
import api from '../Api/axios';

export default {
    data() {
        return {
            token: "",
            video: "",
            videoId: 1,
            isShowUploadVideoModal: false,
            isShowReportVideoModal: false,
        }
    },
    mounted() {
        this.token = localStorage.getItem('token');
        this.getVideo();
    },
    methods: {
        async getVideo() {
            await api.get('/get-video', {
                headers: {
                    Authorization: "Bearer " + this.token
                },
                params: {
                    video_id: this.videoId
                }
            }).then((res) => {
                if (res.status == 200) {
                    this.video = res.data.data;
                }
            }).catch((err) => {
                console.log(err);
            });
        },
        back() {
            this.videoId -= 1;
            if (this.videoId == 0) {
                this.videoId = 1;
                alert('Đã tới video đầu tiên!');
            }
            this.getVideo();
        },
        next() {
            this.videoId += 1;
            this.getVideo();
        },
        showModal(modal) {
            switch (modal) {
                case 'upload_video':
                    this.isShowUploadVideoModal = true
                    break;
                case 'report_video':
                    this.isShowReportVideoModal = true
                    break;
            }
        },
        closeModal(modal) {
            switch (modal) {
                case 'upload_video':
                    this.isShowUploadVideoModal = false
                    break;
                case 'report_video':
                    this.isShowReportVideoModal = false
                    break;
            }
        }
    }
}
</script>