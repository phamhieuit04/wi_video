<template>
    <div class="w-96 bg-[#181818] flex h-screen flex-col gap-8 p-5">
        <div class="flex gap-2 grow flex-col">
            <div class="flex items-center gap-2">
                <img class="size-30" src="../../../public/assets/images/user-pro-img.png" alt="" />
                <h1 class="font-bold text-2xl w-[100%] text-center">Hieu Pham</h1>
            </div>
            <ul class="flex gap-2 justify-between">
                <li><span class="font-medium">100</span> videos </li>
                <li><span class="font-medium">100</span> followers</li>
                <li><span class="font-medium">100</span> following</li>
            </ul>
        </div>
        <button @click="logout()" class="h-12 bg-red-600 rounded-lg font-bold cursor-pointer hover:opacity-75">
            Đăng xuất
        </button>
    </div>
</template>

<script>
import api from '../Api/axios';

export default {
    data() {
        return {
            token: ""
        }
    },
    mounted() {
        this.token = localStorage.getItem('token');
    },
    methods: {
        async logout() {
            await api.get('/logout', {
                headers: {
                    Authorization: 'Bearer ' + this.token
                }
            }).then((res) => {
                if (res.status == 200) {
                    this.$router.push('/auth')
                }
            }).catch((err) => {
                console.log(err);
            });
        }
    }
}
</script>